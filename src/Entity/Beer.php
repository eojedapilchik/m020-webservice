<?php

namespace App\Entity;


class Beer
{
    private $name;

    private $id;

    private $food;

    /**
     * @param string $name
     * @param string $id
     * @param string $food
     */
    public function __construct(
        string $name,
        string $id,
        string $food
    ) {
        $this->name = $name;
        $this->id = $id;
        $this->food = $food;
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
    public function getFood(): string
    {
        return $this->food;
    }



}