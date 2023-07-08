<?php

namespace App\Entity;

use App\Repository\RoleRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: RoleRepository::class)]
class Role
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 55)]
    private ?string $nom = null;

    #[ORM\OneToMany(mappedBy: 'role', targetEntity: ChoiceSynergy::class)]
    private Collection $choiceSynergies;

    #[ORM\OneToMany(mappedBy: 'role', targetEntity: Champion::class)]
    private Collection $champions;


    public function __construct()
    {
        $this->Lane = new ArrayCollection();
        $this->choiceSynergies = new ArrayCollection();
        $this->champions = new ArrayCollection();
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
     * @return Collection<int, ChoiceSynergy>
     */
    public function getChoiceSynergies(): Collection
    {
        return $this->choiceSynergies;
    }

    public function addChoiceSynergy(ChoiceSynergy $choiceSynergy): static
    {
        if (!$this->choiceSynergies->contains($choiceSynergy)) {
            $this->choiceSynergies->add($choiceSynergy);
            $choiceSynergy->setRole($this);
        }

        return $this;
    }

    public function removeChoiceSynergy(ChoiceSynergy $choiceSynergy): static
    {
        if ($this->choiceSynergies->removeElement($choiceSynergy)) {
            // set the owning side to null (unless already changed)
            if ($choiceSynergy->getRole() === $this) {
                $choiceSynergy->setRole(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Champion>
     */
    public function getChampions(): Collection
    {
        return $this->champions;
    }

    public function addChampion(Champion $champion): static
    {
        if (!$this->champions->contains($champion)) {
            $this->champions->add($champion);
            $champion->setRole($this);
        }

        return $this;
    }

    public function removeChampion(Champion $champion): static
    {
        if ($this->champions->removeElement($champion)) {
            // set the owning side to null (unless already changed)
            if ($champion->getRole() === $this) {
                $champion->setRole(null);
            }
        }

        return $this;
    }

}
