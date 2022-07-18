<?php

namespace App\Http\Controllers;

class StarWarsController extends Controller
{
    protected const NUM_OF_ENTITIES_PER_PAGE = 10;

    protected function normalizeFillableArr($arr)
    {
        unset($arr['_token']);
        foreach ($arr as $key => $item) {
            if ($item == null) {
                unset($arr[$key]);
            }
        }

        if (empty($arr)) {
            return [];
        }

        return $arr;
    }
}
