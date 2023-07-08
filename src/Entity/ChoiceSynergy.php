<?php

namespace App\Entity;

use App\Repository\ChoiceSynergyRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ChoiceSynergyRepository::class)]
class ChoiceSynergy
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(inversedBy: 'choiceSynergies')]
    private ?Role $role = null;

    #[ORM\ManyToOne(inversedBy: 'choiceSynergies')]
    private ?Lane $lane = null;

    #[ORM\Column]
    private ?int $synergy = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getRole(): ?Role
    {
        return $this->role;
    }

    public function setRole(?Role $role): static
    {
        $this->role = $role;

        return $this;
    }

    public function getLane(): ?Lane
    {
        return $this->lane;
    }

    public function setLane(?Lane $lane): static
    {
        $this->lane = $lane;

        return $this;
    }

    public function getSynergy(): ?int
    {
        return $this->synergy;
    }

    public function setSynergy(int $synergy): static
    {
        $this->synergy = $synergy;

        return $this;
    }
}
