<?php

namespace App\Entity;

use App\Repository\EquipmentsRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: EquipmentsRepository::class)]
class Equipments
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $equipment = null;

    #[ORM\ManyToMany(targetEntity: SecondHandCar::class, inversedBy: 'equipments')]
    private Collection $vehicle;

    public function __construct()
    {
        $this->vehicle = new ArrayCollection();
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
    public function getVehicle(): Collection
    {
        return $this->vehicle;
    }

    public function addVehicle(SecondHandCar $vehicle): static
    {
        if (!$this->vehicle->contains($vehicle)) {
            $this->vehicle->add($vehicle);
        }

        return $this;
    }

    public function removeVehicle(SecondHandCar $vehicle): static
    {
        $this->vehicle->removeElement($vehicle);

        return $this;
    }
}
