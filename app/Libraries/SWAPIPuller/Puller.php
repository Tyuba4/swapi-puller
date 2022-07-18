<?php

namespace App\Libraries\SWAPIPuller;

class Puller
{
    protected $pullerLoader;
    public function __construct(IPullerLoader $pullerLoader)
    {
        $this->pullerLoader = $pullerLoader;
    }
    public function pullApiResources()
    {
        $resourcePullers = $this->pullerLoader->getPullers();
        foreach ($resourcePullers as $puller) {
            $puller->pullResource();
        }

    }

}
