<?php

namespace App\Entity;

use App\Repository\CarBrandRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CarBrandRepository::class)]
class CarBrand
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id;

    #[ORM\Column(length: 40)]
    private ?string $brandname;

    #[ORM\Column]
    private ?int $year;

    public function __construct(
        string            $brandname,
        int               $year, 
    ) {
        $this->brandname = $brandname;
        $this->year = $year;
    }
    public function getId(): ?int
    {
        return $this->id;
    }

    public function getBrandName(): ?string
    {
        return $this->brandname;
    }

    public function setBrandName(string $brandname): self
    {
        $this->brandname = $brandname;

        return $this;
    }

    public function getYear(): ?int
    {
        return $this->year;
    }

    public function setYear(int $year): self
    {
        $this->year = $year;

        return $this;
    }
}
