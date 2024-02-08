<?php

namespace App\Entity;

use App\Repository\GaleryRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: GaleryRepository::class)]
class Galery
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $picture = null;

    #[ORM\ManyToOne(inversedBy: 'galeries')]
    #[ORM\JoinColumn(nullable: false)]
    private ?SecondHandCar $vehicle = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPicture(): ?string
    {
        return $this->picture;
    }

    public function setPicture(string $picture): static
    {
        $this->picture = $picture;

        return $this;
    }

    public function getVehicle(): ?SecondHandCar
    {
        return $this->vehicle;
    }

    public function setVehicle(?SecondHandCar $vehicle): static
    {
        $this->vehicle = $vehicle;

        return $this;
    }
}
