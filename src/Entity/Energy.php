<?php

namespace App\Entity;

use App\Repository\EnergyRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: EnergyRepository::class)]
class Energy
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    #[Assert\Length(min: 2, max: 255)]
    #[Assert\NotBlank()]
    private ?string $energy = null;

    #[ORM\ManyToMany(targetEntity: SecondHandCar::class, mappedBy: 'energies')]
    private Collection $secondHandCars;

    public function __construct()
    {
        $this->secondHandCars = new ArrayCollection();
    }
    
    public function __toString()
    {
        return $this->getEnergy();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEnergy(): ?string
    {
        return $this->energy;
    }

    public function setEnergy(string $energy): static
    {
        $this->energy = $energy;

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
            $secondHandCar->addEnergy($this);
        }

        return $this;
    }

    public function removeSecondHandCar(SecondHandCar $secondHandCar): static
    {
        if ($this->secondHandCars->removeElement($secondHandCar)) {
            $secondHandCar->removeEnergy($this);
        }

        return $this;
    }

    
}
