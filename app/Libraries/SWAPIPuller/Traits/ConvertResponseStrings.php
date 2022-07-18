<?php

namespace App\Libraries\SWAPIPuller\Traits;

trait ConvertResponseStrings
{
    public function convertConsumables($consumables): int
    {
        try {
            $numbers = $this->extractOnlyOneIntegerFromString($consumables);
        } catch (\Exception $e) {
            throw new \Exception(
                "{$e->getMessage()} in vehicles resource (consumables api in response)!"
            );
        }
        $timeIntervalString = strtolower(trim(str_replace($numbers, '', $consumables)));
        switch ($timeIntervalString) {
            case 'week':
            case 'weeks':
                $numbers *= 7;
                break;
            case 'month':
            case 'months':
                $numbers *= 30;
                break;
            case 'year':
            case 'years':
                $numbers *= 365;
                break;
        }

        return $numbers;
    }

    protected function extractOnlyOneIntegerFromString($string): int
    {
        if (
            preg_match_all('/\d++/', $string, $matches) &&
            isset($matches[0][0]) &&
            !isset($matches[0][1])
        ) {
            return $matches[0][0];
        } else {
            throw new \Exception('Problem with extracting integer from string');
        }

    }

    protected function getIdFromUrl($url): int
    {
        try {
            return $this->extractOnlyOneIntegerFromString($url);
        } catch (\Exception $e) {
            throw new \Exception("{$e->getMessage()} in url API!");
        }
    }

    public function normalizeIntegerString($string)
    {
        return preg_replace('/[,.]/', '', $string);
    }

}
