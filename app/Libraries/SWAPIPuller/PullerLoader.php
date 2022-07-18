<?php

namespace App\Libraries\SWAPIPuller;

use Illuminate\Support\Collection;
use Symfony\Component\ClassLoader\ClassMapGenerator;

class PullerLoader implements IPullerLoader
{
    protected const PULLERS_DIR = __DIR__ . '/ResourcePullers';
    protected $mapPullers;
    protected $pullers;

    public function __construct()
    {
        $this->mapPullers = ClassMapGenerator::createMap(self::PULLERS_DIR);
        $this->pullers = collect([]);
        $this->loadPullers();

    }

    protected function loadPullers() :void
    {
        foreach ($this->mapPullers as $pullerName => $pullerMap) {
            $this->loadPuller(new $pullerName);
        }
    }

    protected function loadPuller(ResourcePuller $puller)
    {
        $this->pullers->push($puller);
    }

    public function getPullers(): Collection
    {
        return $this->pullers;
    }

}
