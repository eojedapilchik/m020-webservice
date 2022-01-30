<?php

namespace App\Dto;

class GetBeerDTO
{
    private $id;
    private $name;
    private $description;

    public function __construct(
        string $id,
        string $name,
        string $description
    )
    {
        $this->id = $id;
        $this->name = $name;
        $this->description = $description;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }



}