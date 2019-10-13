<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ProposerRepository")
 */
class Proposer
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\CategorieDeServices", inversedBy="proposers")
     */
    private $catagorieDeServices;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Prestataire", inversedBy="proposers")
     */
    private $prestataire;

    public function __construct()
    {
        $this->catagorieDeServices = new ArrayCollection();
        $this->prestataire = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return Collection|CategorieDeServices[]
     */
    public function getCatagorieDeServices(): Collection
    {
        return $this->catagorieDeServices;
    }

    public function addCatagorieDeService(CategorieDeServices $catagorieDeService): self
    {
        if (!$this->catagorieDeServices->contains($catagorieDeService)) {
            $this->catagorieDeServices[] = $catagorieDeService;
        }

        return $this;
    }

    public function removeCatagorieDeService(CategorieDeServices $catagorieDeService): self
    {
        if ($this->catagorieDeServices->contains($catagorieDeService)) {
            $this->catagorieDeServices->removeElement($catagorieDeService);
        }

        return $this;
    }

    /**
     * @return Collection|Prestataire[]
     */
    public function getPrestataire(): Collection
    {
        return $this->prestataire;
    }

    public function addPrestataire(Prestataire $prestataire): self
    {
        if (!$this->prestataire->contains($prestataire)) {
            $this->prestataire[] = $prestataire;
        }

        return $this;
    }

    public function removePrestataire(Prestataire $prestataire): self
    {
        if ($this->prestataire->contains($prestataire)) {
            $this->prestataire->removeElement($prestataire);
        }

        return $this;
    }
}
