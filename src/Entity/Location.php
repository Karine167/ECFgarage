<?php

namespace App\Entity;

use App\Repository\LocationRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: LocationRepository::class)]
class Location
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $position = null;

    #[ORM\OneToMany(mappedBy: 'location', targetEntity: Infos::class)]
    private Collection $infos;

    public function __construct()
    {
        $this->infos = new ArrayCollection();
    }

    public function __toString()
    {
        return $this->getPosition();
    }
    
    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPosition(): ?string
    {
        return $this->position;
    }

    public function setPosition(string $position): static
    {
        $this->position = $position;

        return $this;
    }

    /**
     * @return Collection<int, Infos>
     */
    public function getInfos(): Collection
    {
        return $this->infos;
    }

    public function addInfo(Infos $info): static
    {
        if (!$this->infos->contains($info)) {
            $this->infos->add($info);
            $info->setLocation($this);
        }

        return $this;
    }

    public function removeInfo(Infos $info): static
    {
        if ($this->infos->removeElement($info)) {
            // set the owning side to null (unless already changed)
            if ($info->getLocation() === $this) {
                $info->setLocation(null);
            }
        }

        return $this;
    }
}
