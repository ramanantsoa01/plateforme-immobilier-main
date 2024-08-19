<?php

namespace App\Entity;

use App\Repository\CandidaturesLocationsRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CandidaturesLocationsRepository::class)]
class CandidaturesLocations
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $nom_complet = null;

    #[ORM\Column(length: 255)]
    private ?string $email = null;

    #[ORM\Column(length: 255)]
    private ?string $telephone = null;

    #[ORM\Column(length: 255)]
    private ?string $statut = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $date_location = null;

    #[ORM\Column(length: 255)]
    private ?string $duree_location = null;

    /**
     * @var Collection<int, Proprietes>
     */
    #[ORM\ManyToMany(targetEntity: Proprietes::class, inversedBy: 'candidaturesLocations')]
    private Collection $proprietes;

    public function __construct()
    {
        $this->proprietes = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomComplet(): ?string
    {
        return $this->nom_complet;
    }

    public function setNomComplet(string $nom_complet): static
    {
        $this->nom_complet = $nom_complet;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): static
    {
        $this->email = $email;

        return $this;
    }

    public function getTelephone(): ?string
    {
        return $this->telephone;
    }

    public function setTelephone(string $telephone): static
    {
        $this->telephone = $telephone;

        return $this;
    }

    public function getStatut(): ?string
    {
        return $this->statut;
    }

    public function setStatut(string $statut): static
    {
        $this->statut = $statut;

        return $this;
    }

    public function getDateLocation(): ?\DateTimeInterface
    {
        return $this->date_location;
    }

    public function setDateLocation(\DateTimeInterface $date_location): static
    {
        $this->date_location = $date_location;

        return $this;
    }

    public function getDureeLocation(): ?string
    {
        return $this->duree_location;
    }

    public function setDureeLocation(string $duree_location): static
    {
        $this->duree_location = $duree_location;

        return $this;
    }

    /**
     * @return Collection<int, Proprietes>
     */
    public function getProprietes(): Collection
    {
        return $this->proprietes;
    }

    public function addPropriete(Proprietes $propriete): static
    {
        if (!$this->proprietes->contains($propriete)) {
            $this->proprietes->add($propriete);
        }

        return $this;
    }

    public function removePropriete(Proprietes $propriete): static
    {
        $this->proprietes->removeElement($propriete);

        return $this;
    }
}
