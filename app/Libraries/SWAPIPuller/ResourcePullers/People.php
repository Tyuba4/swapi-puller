<?php

namespace App\Libraries\SWAPIPuller\ResourcePullers;


use App\Libraries\SWAPIPuller\ResourcePuller;
use App\Models\Person;

class People extends ResourcePuller
{
    protected $relatedModelClass = Person::class;

    public function handleOneCollection($collection)
    {
        $this->collection = $collection;
        $this->model = $this->getRelatedModel();
        $exceptions = [
            'url' => function () {
                $this->model->id = $this->getIdFromUrl($this->collection->url);
            },
            'mass' => function () {
                $this->model->mass = $this->normalizeIntegerString($this->collection->mass);
            },
            'birth_year' => function () {
                $this->model->birth_year = $this->convertBirthDayFromBYFormatToInteger($this->collection->birth_year);
            },
            'homeworld' => function () {
                $this->model->planet_id = $this->getIdFromUrl($this->collection->url);
            },
            'species' => function () {
                return true;
            },
            'created' => function () {
                return true;
            },
            'edited' => function () {
                return true;
            }
        ];
        $relationshipsAfterSave = [
            'vehicles' => function () {
                $this->attachRelatedEntities($this->collection->vehicles, 'vehicles');
            },
            'starships' => function () {
                $this->attachRelatedEntities($this->collection->starships, 'starships');
            },
            'films' => function () {
                $this->attachRelatedEntities($this->collection->films, 'films');
            }
        ];

        $this->addInModelPropertiesFromCollection($exceptions, $relationshipsAfterSave, $collection);

    }

    protected function convertBirthDayFromBYFormatToInteger(string $birthDayBY)
    {
        try {
            preg_match('/[-+]?\d*\.*\d+/', $birthDayBY, $matches);
            if (isset($matches[0])) {
                $numbers = $matches[0];
            } else {
                throw new \Exception('Problem with string');
            }
        } catch (\Exception $e) {
            throw new \Exception(
                "{$e->getMessage()} in converting birthday (people resource)!"
            );
        }
        $beforeOrAfterString = trim(str_replace($numbers, '', $birthDayBY));
        if ($beforeOrAfterString === "BBY") {
            $numbers = 0 - $numbers;
        } elseif ($beforeOrAfterString !== "ABY") {
            throw new \Exception(
                'Problem with format birthday string in people resource!'
            );
        }

        return $numbers;
    }
}
