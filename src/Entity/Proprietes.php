<?php

namespace App\Entity;

use App\Repository\ProprietesRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: ProprietesRepository::class)]
#[ORM\HasLifecycleCallbacks]
class Proprietes
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $nom = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $description = null;

    #[ORM\Column]
    private ?float $prix = null;

    #[ORM\Column(length: 255)]
    private ?string $adresse = null;

    #[ORM\Column]
    private ?float $surface = null;

    #[ORM\Column]
    private ?\DateTimeImmutable $createdAt = null;

    #[ORM\Column]
    private ?\DateTimeImmutable $updatedAt = null;

    #[ORM\ManyToOne(inversedBy: 'proprietes')]
    private ?TypesProprietes $typesProprietes = null;

    /**
     * @var Collection<int, CandidaturesLocations>
     */
    #[ORM\ManyToMany(targetEntity: CandidaturesLocations::class, mappedBy: 'proprietes')]
    private Collection $candidaturesLocations;

    /**
     * @var Collection<int, Photo>
     */
    #[ORM\OneToMany(targetEntity: Photo::class, mappedBy: 'proprietes')]
    private Collection $photos;

    public function __construct()
    {
        $this->candidaturesLocations = new ArrayCollection();
        $this->photos = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): static
    {
        $this->nom = $nom;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): static
    {
        $this->description = $description;

        return $this;
    }

    public function getPrix(): ?float
    {
        return $this->prix;
    }

    public function setPrix(float $prix): static
    {
        $this->prix = $prix;

        return $this;
    }

    public function getAdresse(): ?string
    {
        return $this->adresse;
    }

    public function setAdresse(string $adresse): static
    {
        $this->adresse = $adresse;

        return $this;
    }

    public function getSurface(): ?float
    {
        return $this->surface;
    }

    public function setSurface(float $surface): static
    {
        $this->surface = $surface;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeImmutable
    {
        return $this->createdAt;
    }

    public function setCreatedAt(\DateTimeImmutable $createdAt): static
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    public function getUpdatedAt(): ?\DateTimeImmutable
    {
        return $this->updatedAt;
    }

    public function setUpdatedAt(\DateTimeImmutable $updatedAt): static
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }

    #[ORM\PrePersist]
    public function setCreatedAtValue(): void
    {
        $this->createdAt = new \DateTimeImmutable();
        $this->updatedAt = new \DateTimeImmutable();
    }

    #[ORM\PreUpdate]
    public function setUpdatedAtValue(): void
    {
        $this->updatedAt = new \DateTimeImmutable();
    }

    public function getTypesProprietes(): ?TypesProprietes
    {
        return $this->typesProprietes;
    }

    public function setTypesProprietes(?TypesProprietes $typesProprietes): static
    {
        $this->typesProprietes = $typesProprietes;

        return $this;
    }

    /**
     * @return Collection<int, CandidaturesLocations>
     */
    public function getCandidaturesLocations(): Collection
    {
        return $this->candidaturesLocations;
    }

    public function addCandidaturesLocation(CandidaturesLocations $candidaturesLocation): static
    {
        if (!$this->candidaturesLocations->contains($candidaturesLocation)) {
            $this->candidaturesLocations->add($candidaturesLocation);
            $candidaturesLocation->addPropriete($this);
        }

        return $this;
    }

    public function removeCandidaturesLocation(CandidaturesLocations $candidaturesLocation): static
    {
        if ($this->candidaturesLocations->removeElement($candidaturesLocation)) {
            $candidaturesLocation->removePropriete($this);
        }

        return $this;
    }

    /**
     * @return Collection<int, Photo>
     */
    public function getPhotos(): Collection
    {
        return $this->photos;
    }

    public function addPhoto(Photo $photo): static
    {
        if (!$this->photos->contains($photo)) {
            $this->photos->add($photo);
            $photo->setProprietes($this);
        }

        return $this;
    }

    public function removePhoto(Photo $photo): static
    {
        if ($this->photos->removeElement($photo)) {
            // set the owning side to null (unless already changed)
            if ($photo->getProprietes() === $this) {
                $photo->setProprietes(null);
            }
        }

        return $this;
    }
}
