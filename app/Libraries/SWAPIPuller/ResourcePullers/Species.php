<?php

namespace App\Libraries\SWAPIPuller\ResourcePullers;

use App\Libraries\SWAPIPuller\ResourcePuller;
use App\Models\Person;
use App\Models\Species as OneSpecies;

class Species extends ResourcePuller
{
    protected $relatedModelClass = OneSpecies::class;

    protected function oldhandleOneCollection($collection)
    {
        $this->model = $this->getRelatedModel();
        $this->model->id = $this->getIdFromUrl($collection->url);
        $this->model->name = $collection->name;
        $this->model->classification = $collection->classification;
        $this->model->designation = $collection->designation;
        $this->model->average_height = $collection->average_height;
        $this->model->average_lifespan = $collection->average_lifespan;
        $this->model->language = $collection->language;
        $this->model->planet_id = $this->getIdFromUrl($collection->homeworld);
        $this->attachRelatedEntities($collection->films, 'films');
    }

    protected function handleOneCollection($collection)
    {
        $this->collection = $collection;
        $this->model = $this->getRelatedModel();
        $exceptions = [
            'url' => function () {
                $this->model->id = $this->getIdFromUrl($this->collection->url);
            },
            'homeworld' => function () {
                $this->model->planet_id = $this->getIdFromUrl($this->collection->homeworld);
            },
            'skin_colors' => function () {
                return true;
            },
            'eye_colors' => function () {
                return true;
            },
            'hair_colors' => function () {
                return true;
            },
            'created' => function () {
                return true;
            },
            'edited' => function () {
                return true;
            }
        ];
        $actionsAfterSave = [
            'films' => function () {
                $this->attachRelatedEntities($this->collection->films, 'films');
            },
            'people' => function () {
                $this->fillSpeciesIdsInPeople($this->collection->people);
            }
        ];

        $this->addInModelPropertiesFromCollection($exceptions, $actionsAfterSave, $collection);
    }

    protected function fillSpeciesIdsInPeople($people)
    {
        foreach ($people as $personUrl) {
            $id = $this->getIdFromUrl($personUrl);
            $person = Person::find($id);
            $person->species_id = $this->model->id;
            $person->save();
        }
    }

}
