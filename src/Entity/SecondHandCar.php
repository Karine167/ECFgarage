<?php

namespace App\Entity;

use App\Repository\SecondHandCarRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\File;
use Vich\UploaderBundle\Mapping\Annotation as Vich;

#[Vich\Uploadable]
#[ORM\Entity(repositoryClass: SecondHandCarRepository::class)]
class SecondHandCar
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $reference = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 12, scale: 2)]
    private ?string $price = null;

    #[ORM\Column]
    private ?int $kilometers = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $circulation_year = null;

    #[ORM\Column(type: Types::SMALLINT, nullable: true)]
    private ?int $fiscal_power = null;

    #[ORM\Column(type: Types::SMALLINT, nullable: true)]
    private ?int $din_power = null;

    #[ORM\Column(type: Types::SMALLINT)]
    private ?int $doors = null;

    #[ORM\Column(type: Types::SMALLINT)]
    private ?int $seats = null;

    #[ORM\Column]
    private ?bool $auto_gear_box = null;

    #[ORM\Column(type: Types::SMALLINT, nullable: true)]
    private ?int $critair_nb = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $create_date = null;

    #[ORM\ManyToOne(inversedBy: 'secondHandCars')]
    private ?User $user = null;

    #[ORM\ManyToOne(inversedBy: 'vehicle')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Type $type = null;

    #[ORM\ManyToMany(targetEntity: Color::class, mappedBy: 'vehicle')]
    private Collection $colors;

    #[ORM\ManyToMany(targetEntity: Equipments::class, mappedBy: 'vehicle')]
    private Collection $equipments;

    #[ORM\ManyToMany(targetEntity: Options::class, mappedBy: 'vehicle')]
    private Collection $options;

    #[ORM\ManyToMany(targetEntity: Energy::class, mappedBy: 'vehicle')]
    private Collection $energies;

    #[ORM\ManyToOne(inversedBy: 'vehicle')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Model $model = null;

    #[ORM\OneToMany(mappedBy: 'vehicle', targetEntity: Galery::class)]
    private Collection $galeries;

    public function __construct()
    {
        $this->colors = new ArrayCollection();
        $this->equipments = new ArrayCollection();
        $this->options = new ArrayCollection();
        $this->energies = new ArrayCollection();
        $this->galeries = new ArrayCollection();
    }

    public function __toString()
    {
        return $this->getId();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getReference(): ?string
    {
        return $this->reference;
    }

    public function setReference(?string $reference): static
    {
        $this->reference = $reference;

        return $this;
    }

    public function getPrice(): ?string
    {
        return $this->price;
    }

    public function setPrice(string $price): static
    {
        $this->price = $price;

        return $this;
    }

    public function getKilometers(): ?int
    {
        return $this->kilometers;
    }

    public function setKilometers(int $kilometers): static
    {
        $this->kilometers = $kilometers;

        return $this;
    }

    public function getCirculationYear(): ?\DateTimeInterface
    {
        return $this->circulation_year;
    }

    public function setCirculationYear(\DateTimeInterface $circulation_year): static
    {
        $this->circulation_year = $circulation_year;

        return $this;
    }

    public function getFiscalPower(): ?int
    {
        return $this->fiscal_power;
    }

    public function setFiscalPower(?int $fiscal_power): static
    {
        $this->fiscal_power = $fiscal_power;

        return $this;
    }

    public function getDinPower(): ?int
    {
        return $this->din_power;
    }

    public function setDinPower(?int $din_power): static
    {
        $this->din_power = $din_power;

        return $this;
    }

    public function getDoors(): ?int
    {
        return $this->doors;
    }

    public function setDoors(int $doors): static
    {
        $this->doors = $doors;

        return $this;
    }

    public function getSeats(): ?int
    {
        return $this->seats;
    }

    public function setSeats(int $seats): static
    {
        $this->seats = $seats;

        return $this;
    }

    public function isAutoGearBox(): ?bool
    {
        return $this->auto_gear_box;
    }

    public function setAutoGearBox(bool $auto_gear_box): static
    {
        $this->auto_gear_box = $auto_gear_box;

        return $this;
    }

    public function getCritairNb(): ?int
    {
        return $this->critair_nb;
    }

    public function setCritairNb(?int $critair_nb): static
    {
        $this->critair_nb = $critair_nb;

        return $this;
    }

    public function getCreateDate(): ?\DateTimeInterface
    {
        return $this->create_date;
    }

    public function setCreateDate(\DateTimeInterface $create_date): static
    {
        $this->create_date = $create_date;

        return $this;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): static
    {
        $this->user = $user;

        return $this;
    }

    public function getType(): ?Type
    {
        return $this->type;
    }

    public function setType(?Type $type): static
    {
        $this->type = $type;

        return $this;
    }

    /**
     * @return Collection<int, Color>
     */
    public function getColors(): Collection
    {
        return $this->colors;
    }

    public function addColor(Color $color): static
    {
        if (!$this->colors->contains($color)) {
            $this->colors->add($color);
            $color->addVehicle($this);
        }

        return $this;
    }

    public function removeColor(Color $color): static
    {
        if ($this->colors->removeElement($color)) {
            $color->removeVehicle($this);
        }

        return $this;
    }

    /**
     * @return Collection<int, Equipments>
     */
    public function getEquipments(): Collection
    {
        return $this->equipments;
    }

    public function addEquipment(Equipments $equipment): static
    {
        if (!$this->equipments->contains($equipment)) {
            $this->equipments->add($equipment);
            $equipment->addVehicle($this);
        }

        return $this;
    }

    public function removeEquipment(Equipments $equipment): static
    {
        if ($this->equipments->removeElement($equipment)) {
            $equipment->removeVehicle($this);
        }

        return $this;
    }

    /**
     * @return Collection<int, Options>
     */
    public function getOptions(): Collection
    {
        return $this->options;
    }

    public function addOption(Options $option): static
    {
        if (!$this->options->contains($option)) {
            $this->options->add($option);
            $option->addVehicle($this);
        }

        return $this;
    }

    public function removeOption(Options $option): static
    {
        if ($this->options->removeElement($option)) {
            $option->removeVehicle($this);
        }

        return $this;
    }

    /**
     * @return Collection<int, Energy>
     */
    public function getEnergies(): Collection
    {
        return $this->energies;
    }

    public function addEnergy(Energy $energy): static
    {
        if (!$this->energies->contains($energy)) {
            $this->energies->add($energy);
            $energy->addVehicle($this);
        }

        return $this;
    }

    public function removeEnergy(Energy $energy): static
    {
        if ($this->energies->removeElement($energy)) {
            $energy->removeVehicle($this);
        }

        return $this;
    }

    public function getModel(): ?Model
    {
        return $this->model;
    }

    public function setModel(?Model $model): static
    {
        $this->model = $model;

        return $this;
    }

    /**
     * @return Collection<int, Galery>
     */
    public function getGaleries(): Collection
    {
        return $this->galeries;
    }

    public function addGalery(Galery $galery): static
    {
        if (!$this->galeries->contains($galery)) {
            $this->galeries->add($galery);
            $galery->setVehicle($this);
        }

        return $this;
    }

    public function removeGalery(Galery $galery): static
    {
        if ($this->galeries->removeElement($galery)) {
            // set the owning side to null (unless already changed)
            if ($galery->getVehicle() === $this) {
                $galery->setVehicle(null);
            }
        }

        return $this;
    }

}
