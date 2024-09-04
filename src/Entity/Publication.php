<?php

namespace App\Entity;

use DateTimeImmutable;
use Symfony\Component\Validator\Constraints as Assert;

class Publication
{
    private ?int $id = null;

    //#[Assert\NotBlank] // title ne peut pas être vide
    private ?string $title = null;

    //#[Assert\NotBlank]
    private ?string $description = null;

    //#[Assert\NotBlank]
    private ?string $location = null; 
    
    private ?string $zip_code = null;

    private ?string $type = null;
    private ?string $image = null;    

    //#[Assert\NotBlank]
    private ?DateTimeImmutable $date_start = null;
    
    private ?DateTimeImmutable $postedat = null;


    public function __construct(
        
        ?int $id = null, 
        ?string $title = null, 
        ?string $description = null, 
        ?string $location = null, 
        ?string $zip_code = null,
        ?string $type = null,
        ?string $image = null, 
        ?DateTimeImmutable $date_start = null,
        ?DateTimeImmutable $postedat = null         
                
    )
    {
        $this->id = $id;
        $this->title = $title;
        $this->description = $description;
        $this->location = $location;
        $this->zip_code = $zip_code;
        $this->type = $type;
        $this->image = $image;
        $this->date_start = $date_start;  
        $this->postedat = $postedat;      
    }

    // GETTERS & SETTERS

    public function getId(): ?int
    {
        return $this->id;
    }
    public function getTitle(): string
    {
        return $this->title;
    }
    public function getDescription(): string
    {
        return $this->description;
    }
    public function getLocation(): string
    {
        return $this->location;
    }
    public function getZipCode(): string
    {
        return $this->zip_code;
    }
    public function getType(): string
    {
        return $this->type;
    }
    public function getImage(): string
    {
        return $this->image;
    }
    public function getDateStart(): DateTimeImmutable
    {
        return $this->date_start;
    }
    public function getPostedat(): ?DateTimeImmutable
    {
        return $this->postedat;
    }

    public function setId(int $id): void
    {
        $this->id = $id;
    }
    public function setTitle(string $title): void
    {
        $this->title = $title;
    }
    public function setDescription(string $description): void
    {
        $this->description = $description;
    }
    public function setLocation(string $location): void
    {
        $this->location = $location;
    }
    public function setZipCode(string $zip_code): void
    {
        $this->zip_code = $zip_code;
    }
    public function setType(string $type): void
    {
        $this->type = $type;
    }
    public function setImage(string $image): void
    {
        $this->image = $image;
    }
    public function setDateStart(DateTimeImmutable $date_start): void
    {
        $this->date_start = $date_start;
    }
    public function setPostedAt(?DateTimeImmutable $postedat): static
        {
            $this->postedat = $postedat;

            return $this;
        }




}



