<?php

namespace App\Dto;

class GetBeerByFoodName
{
    private $name;private $id;
    private $description;

    public function __construct(
        string $name,
        string $id,
        string $description
    )
    {
        $this->name = $name;
        $this->id = $id;
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