<?php

namespace App\Dto;

class GetBeerDetailsDTO extends GetBeerDTO
{
    private $tagline;
    private $image_url;
    private $first_brewed;

    public function __construct(
        string $id,
        string $name,
        string $description,
        string $tagline,
        string $image_url,
        string $first_brewed

    )
    {
      $this->tagline = $tagline;
      $this->image_url = $image_url;
      $this->first_brewed = $first_brewed;
      parent::__construct($id, $name, $description);
    }

    /**
     * @return string
     */
    public function getTagline(): string
    {
        return $this->tagline;
    }

    /**
     * @return string
     */
    public function getImageUrl(): string
    {
        return $this->image_url;
    }

    /**
     * @return string
     */
    public function getFirstBrewed(): string
    {
        return $this->first_brewed;
    }

    /**
     * @return string
     */
    public function getPhotoEncoded()
    {
        return base64_encode(file_get_contents($this->imag_url));
    }



}