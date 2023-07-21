<?php

namespace App\Entity;

use App\Repository\LaneRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: LaneRepository::class)]
class Lane
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 55)]
    private ?string $Nom = null;

    #[ORM\OneToMany(mappedBy: 'lane', targetEntity: ChoiceSynergy::class)]
    private Collection $choiceSynergies;

    public function __construct()
    {
        $this->choiceSynergies = new ArrayCollection();
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->Nom;
    }

    public function setNom(string $Nom): static
    {
        $this->Nom = $Nom;

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
            $choiceSynergy->setLane($this);
        }

        return $this;
    }

    public function removeChoiceSynergy(ChoiceSynergy $choiceSynergy): static
    {
        if ($this->choiceSynergies->removeElement($choiceSynergy)) {
            // set the owning side to null (unless already changed)
            if ($choiceSynergy->getLane() === $this) {
                $choiceSynergy->setLane(null);
            }
        }

        return $this;
    }
}
