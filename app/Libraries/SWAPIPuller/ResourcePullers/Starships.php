<?php

namespace App\Libraries\SWAPIPuller\ResourcePullers;

use App\Libraries\SWAPIPuller\ResourcePuller;
use App\Models\Manufacturer;
use App\Models\Starship;

class Starships extends ResourcePuller
{
    protected $relatedModelClass = Starship::class;
    protected function oldhandleOneCollection($collection)
    {
        $this->model = $this->getRelatedModel();
        $this->model->id = $this->getIdFromUrl($collection->url);
        $this->model->name = $collection->name;
        $this->model->model = $collection->model;
        $this->model->cost_in_credits = $collection->cost_in_credits;

        $this->model->length = $collection->length;
        $this->model->max_atmosphering_speed = $collection->max_atmosphering_speed;
        $this->model->crew = $collection->crew;
        $this->model->passengers = $collection->passengers;
        $this->model->cargo_capacity = $collection->cargo_capacity;
        $this->model->consumables = $this->convertConsumables($collection->consumables);
        $this->model->hyperdrive_rating = $collection->hyperdrive_rating;
        $this->model->MGLT = $collection->MGLT;
        $this->model->starship_class = $collection->vehicle_class;

        $this->attachRelatedEntities($collection->pilots, 'people');
        $this->attachRelatedEntities($collection->films, 'films');
        $this->model->save();
    }

    public function handleOneCollection($collection)
    {
        $this->collection = $collection;
        $this->model = $this->getRelatedModel();
        $exceptions = [
            'url' => function () {
                $this->model->id = $this->getIdFromUrl($this->collection->url);
            },
            'length' => function () {
                $this->model->length = $this->normalizeIntegerString($this->collection->length);
            },
            'max_atmosphering_speed' => function () {
                $this->model->max_atmosphering_speed = preg_replace('/km/', '',$this->collection->max_atmosphering_speed);
            },
            'passengers' => function () {
                $this->model->passengers = $this->normalizeIntegerString($this->collection->passengers);
            },
            'created' => function () {
                return true;
            },
            'edited' => function () {
                return true;
            }
        ];
        $relationshipsAfterSave = [
            'pilots' => function () {
                $this->attachRelatedEntities($this->collection->pilots, 'people');
            },
            'films' => function () {
                $this->attachRelatedEntities($this->collection->films, 'films');
            },
            'manufacturer' => function () {
                $this->attachEntitiesFromString($this->collection->manufacturer, ',', Manufacturer::class,'manufacturers');
            }
        ];

        $this->addInModelPropertiesFromCollection($exceptions, $relationshipsAfterSave, $collection);
    }

}
