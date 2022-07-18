<?php

namespace App\Libraries\SWAPIPuller\ResourcePullers;

use App\Libraries\SWAPIPuller\ResourcePuller;
use App\Models\Climate;
use App\Models\Planet;
use App\Models\Terrain;

class Planets extends ResourcePuller
{
    protected $relatedModelClass = Planet::class;

    public function handleOneCollection($collection)
    {
        $this->collection = $collection;
        $this->model = $this->getRelatedModel();
        $exceptions = [
            'url' => function () {
                $this->model->id = $this->getIdFromUrl($this->collection->url);
            },
            'residents' => function () {
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
            'climate' => function () {
                $this->attachEntitiesFromString(
                    $this->collection->climate, ',', Climate::class, 'climates'
                );
            },
            'terrain' => function () {
                $this->attachEntitiesFromString(
                    $this->collection->terrain,',', Terrain::class, 'terrains'
                );
            },
            'films' => function () {
                $this->attachRelatedEntities($this->collection->films, 'films');
            }
        ];

        $this->addInModelPropertiesFromCollection($exceptions, $relationshipsAfterSave, $collection);
    }
}
