<?php

namespace App\Entity;

use App\Repository\EquipmentsRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: EquipmentsRepository::class)]
class Equipments
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    #[Assert\Length(min: 2, max: 255)]
    #[Assert\NotBlank()]
    private ?string $equipment = null;

    #[ORM\ManyToMany(targetEntity: SecondHandCar::class, mappedBy: 'equipments')]
    private Collection $secondHandCars;

    public function __construct()
    {
        $this->secondHandCars = new ArrayCollection();
    }

    public function __toString()
    {
        return $this->getEquipment();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEquipment(): ?string
    {
        return $this->equipment;
    }

    public function setEquipment(string $equipment): static
    {
        $this->equipment = $equipment;

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
            $secondHandCar->addEquipment($this);
        }

        return $this;
    }

    public function removeSecondHandCar(SecondHandCar $secondHandCar): static
    {
        if ($this->secondHandCars->removeElement($secondHandCar)) {
            $secondHandCar->removeEquipment($this);
        }

        return $this;
    }

    
}

