<?php

namespace App\Libraries\SWAPIPuller\Traits;

trait NextStepTrait
{
    protected $nextUrl;
    protected function needNextStep() :bool
    {
        $nextUrl = $this->getNextStepUrl();
        if ($nextUrl === false) {
            return false;
        }

        return true;
    }

    protected function getNextStepUrl()
    {
        if ($this->nextUrl === null) {
            return $this->resourceUrl;
        }

        return $this->nextUrl;
    }

    protected function changeNextStepUrl()
    {
        if (!property_exists($this->response, 'next')) {
            throw new \Exception('Problem with api response!');
        }

        if ($this->response->next == null) {
            $this->nextUrl = false;
        } else {
            $this->nextUrl = $this->response->next;
        }
    }
}
