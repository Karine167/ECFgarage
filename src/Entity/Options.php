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

    #[ORM\ManyToMany(targetEntity: SecondHandCar::class, mappedBy: 'options')]
    private Collection $secondHandCars;

    public function __construct()
    {
        $this->secondHandCars = new ArrayCollection();
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
    public function getSecondHandCars(): Collection
    {
        return $this->secondHandCars;
    }

    public function addSecondHandCar(SecondHandCar $secondHandCar): static
    {
        if (!$this->secondHandCars->contains($secondHandCar)) {
            $this->secondHandCars->add($secondHandCar);
            $secondHandCar->addOption($this);
        }

        return $this;
    }

    public function removeSecondHandCar(SecondHandCar $secondHandCar): static
    {
        if ($this->secondHandCars->removeElement($secondHandCar)) {
            $secondHandCar->removeOption($this);
        }

        return $this;
    }

}
