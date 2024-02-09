<?php

namespace App\Entity;

use App\Repository\ColorRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ColorRepository::class)]
class Color
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $color = null;

    #[ORM\ManyToMany(targetEntity: SecondHandCar::class, mappedBy: 'color')]
    private Collection $secondHandCars;

    public function __construct()
    {
        $this->secondHandCars = new ArrayCollection();
    }

    public function __toString()
    {
        return $this->getColor();
    }
    
    public function getId(): ?int
    {
        return $this->id;
    }

    public function getColor(): ?string
    {
        return $this->color;
    }

    public function setColor(string $color): static
    {
        $this->color = $color;

        return $this;
    }

    /**
     * @return Collection<int, SecondHandCar>
     */
    public function getSecondHandCars(): Collection
    {
        return $this->secondHandCars;
    }

    public function addSecondHandCar(SecondHandCar $secondHandCar): static
    {
        if (!$this->secondHandCars->contains($secondHandCar)) {
            $this->secondHandCars->add($secondHandCar);
            $secondHandCar->addColor($this);
        }

        return $this;
    }

    public function removeSecondHandCar(SecondHandCar $secondHandCar): static
    {
        if ($this->secondHandCars->removeElement($secondHandCar)) {
            $secondHandCar->removeColor($this);
        }

        return $this;
    }
}
