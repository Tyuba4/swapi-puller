<?php

namespace App\Libraries\SWAPIPuller\ResourcePullers;

use \App\Libraries\SWAPIPuller\ResourcePuller;
use App\Models\Film;
use App\Models\Producer;

class Films extends ResourcePuller
{
    protected $relatedModelClass = Film::class;

    public function handleOneCollection($collection)
    {
        $this->collection = $collection;
        $this->model = $this->getRelatedModel();
        $exceptions = [
            'url' => function () {
                $this->model->id = $this->getIdFromUrl($this->collection->url);
            },
            'producers' => function () {
                $this->attachProducers($this->collection);
            },
            'species' => function () {
                $this->attachRelatedEntities($this->collection->species, 'species');
            },
            'vehicles' => function () {
                $this->attachRelatedEntities($this->collection->vehicles, 'vehicles');
            },
            'starships' => function () {
                $this->attachRelatedEntities($this->collection->starships, 'starships');
            },
            'characters' => function () {
                $this->attachRelatedEntities($this->collection->characters, 'people');
            },
            'planets' => function () {
                $this->attachRelatedEntities($this->collection->planets, 'planets');
            },
            'created' => function () {
                return true;
            },
            'edited' => function () {
                return true;
            }
        ];

        $relationshipsAfterSave = [
            'producer' => function () {
                $this->attachProducers($this->collection);
            },
            'species' => function () {
                $this->attachRelatedEntities($this->collection->species, 'species');
            },
            'vehicles' => function () {
                $this->attachRelatedEntities($this->collection->vehicles, 'vehicles');
            },
            'starships' => function () {
                $this->attachRelatedEntities($this->collection->starships, 'starships');
            },
            'characters' => function () {
                $this->attachRelatedEntities($this->collection->characters, 'people');
            },
            'planets' => function () {
                $this->attachRelatedEntities($this->collection->planets, 'planets');
            }
        ];

        $this->addInModelPropertiesFromCollection($exceptions, $relationshipsAfterSave, $collection);
    }

    protected function attachProducers($collection)
    {
        $producersNameArr = explode(',', $collection->producer);
        foreach ($producersNameArr as $producerName){
            $producer = Producer::firstOrCreate([
                'name' => $producerName
            ]);
            $this->model->producers()->attach($producer->id);
        }
    }
}
