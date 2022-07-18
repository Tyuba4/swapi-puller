<?php

namespace App\Libraries\SWAPIPuller\Traits;

trait AttachRelatedCollections
{
    protected function getRelatedCollectionsIds($relatedUrls) : array
    {
        $relatedIdsArr = [];
        foreach ($relatedUrls as $relatedUrl) {
            if (preg_match('/\d++/', $relatedUrl, $matches) && isset($matches[0])) {
                $relatedIdsArr[] = $matches[0];
            }
        }

        return $relatedIdsArr;
    }

    protected function attachRelatedEntities($relatedUrls, $relationshipName)
    {
        $ids = $this->getRelatedCollectionsIds($relatedUrls);
        foreach ($ids as $relatedId) {
            $this->model->$relationshipName()->attach($relatedId);
        }
    }

    protected function attachEntitiesFromString($string, $separator, $entityClassName, $relationshipName)
    {
        $entityArr = explode($separator, $string);
        foreach ($entityArr as $entityName) {
            $entityModel = $entityClassName::firstOrCreate([
                'name' => trim($entityName)
            ]);
            $this->model->$relationshipName()->attach($entityModel->id);
        }
    }
}
