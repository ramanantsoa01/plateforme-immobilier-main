<?php

namespace App\Entity;

use App\Repository\TypesProprietesRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: TypesProprietesRepository::class)]
class TypesProprietes
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $nom = null;

    /**
     * @var Collection<int, Proprietes>
     */
    #[ORM\OneToMany(targetEntity: Proprietes::class, mappedBy: 'typesProprietes')]
    private Collection $proprietes;

    public function __construct()
    {
        $this->proprietes = new ArrayCollection();
    }

    public function __toString(): string
    {
        return $this->nom;
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
            $propriete->setTypesProprietes($this);
        }

        return $this;
    }

    public function removePropriete(Proprietes $propriete): static
    {
        if ($this->proprietes->removeElement($propriete)) {
            // set the owning side to null (unless already changed)
            if ($propriete->getTypesProprietes() === $this) {
                $propriete->setTypesProprietes(null);
            }
        }

        return $this;
    }
}
