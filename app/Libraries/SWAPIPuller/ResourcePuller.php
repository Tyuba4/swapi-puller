<?php

namespace App\Libraries\SWAPIPuller;


use App\Libraries\SWAPIPuller\Traits\AttachRelatedCollections;
use App\Libraries\SWAPIPuller\Traits\ConvertResponseStrings;
use App\Libraries\SWAPIPuller\Traits\NextStepTrait;
use GuzzleHttp\Client;
use phpDocumentor\Reflection\Types\Collection;

abstract class ResourcePuller
{
    use NextStepTrait, AttachRelatedCollections, ConvertResponseStrings;

    protected $relatedModel;
    protected $resourceUrl;
    protected $responseFromApi;
    protected $response;
    protected $relatedModelClass;
    protected $model;
    protected $collection;
    public const NULL_SYNONYMS_ARR = [
        'unknown',
        'none',
        'n/a',
        'indefinite',
        null
    ];

    public function __construct()
    {
        $resourceName = (new \ReflectionClass($this))->getShortName();
        $uriResource = strtolower($resourceName);
        $this->resourceUrl = "https://swapi.dev/api/$uriResource";
    }
    abstract protected function handleOneCollection($collection);

    public function getResponseFromApi($url)
    {
        $client = new Client();
        $response = $client->get($url);
        if ($response->getStatusCode() == 200) {
            return json_decode((string) $response->getBody());
        }

        echo "Pulling $url page...<br>";
    }

    public function pullResource()
    {
        while ($this->needNextStep()) {
            $this->pullOnePage();
        }
    }

    protected function pullOnePage(): void
    {
        $this->response = $this->getResponseFromApi($this->getNextStepUrl());
        echo $this->getNextStepUrl() . "\r\n";
        $this->changeNextStepUrl();
        $this->handleResponse();
    }

    protected function handleResponse()
    {
        $results = $this->response->results;

        foreach ($results as $result) {
            $this->handleOneCollection($result);
        }
    }

    protected function getRelatedModel()
    {
        return new $this->relatedModelClass;
    }

    protected function addInModelPropertiesFromCollection(array $exceptions, $relationshipsAfterSave, $collection)
    {
        foreach ($collection as $property => $value) {
            if (in_array($value, self::NULL_SYNONYMS_ARR)) {
                continue;
            }
            if (array_key_exists($property, $relationshipsAfterSave)) {
                continue;
            }
            if (array_key_exists($property, $exceptions)) {
                $exceptions[$property]($this);
            } else {
                $this->model->$property = $value;
            }
        }
        $this->model->save();
        foreach ($relationshipsAfterSave as $relationsFunction) {
            $relationsFunction($this);
        }
    }
}
