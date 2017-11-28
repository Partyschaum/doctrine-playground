<?php

namespace Partyschaum\DoctrinePlayground;

class EntityManagerConfiguration
{
    /** @var array */
    private $dbParams;

    /** @var array */
    private $xmlMappings;

    /** @var bool */
    private $isDevMode;

    public function __construct(array $dbParams, array $xmlMappings, bool $isDevMode)
    {
        $this->dbParams = $dbParams;
        $this->xmlMappings = $xmlMappings;
        $this->isDevMode = $isDevMode;
    }

    public function dbParams(): array
    {
        return $this->dbParams;
    }

    public function xmlMappings(): array
    {
        return $this->xmlMappings;
    }

    public function isDevMode(): bool
    {
        return $this->isDevMode;
    }
}
