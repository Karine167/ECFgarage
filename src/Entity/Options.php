<?php

namespace App\Entity;

use App\Repository\OptionsRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: OptionsRepository::class)]
class Options
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $optionName = null;

    #[ORM\ManyToMany(targetEntity: SecondHandCar::class, inversedBy: 'options')]
    private Collection $vehicle;

    public function __construct()
    {
        $this->vehicle = new ArrayCollection();
    }

    public function __toString()
    {
        return $this->getOptionName();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getOptionName(): ?string
    {
        return $this->optionName;
    }

    public function setOptionName(string $optionName): static
    {
        $this->optionName = $optionName;

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
