<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\FavoriRepository")
 */
class Favori
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Prestataire", mappedBy="favori")
     */
    private $prestataire;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Internaute", mappedBy="favori")
     */
    private $internaute;

    public function __construct()
    {
        $this->prestataire = new ArrayCollection();
        $this->internaute = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
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
            $prestataire->setFavori($this);
        }

        return $this;
    }

    public function removePrestataire(Prestataire $prestataire): self
    {
        if ($this->prestataire->contains($prestataire)) {
            $this->prestataire->removeElement($prestataire);
            // set the owning side to null (unless already changed)
            if ($prestataire->getFavori() === $this) {
                $prestataire->setFavori(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Internaute[]
     */
    public function getInternaute(): Collection
    {
        return $this->internaute;
    }

    public function addInternaute(Internaute $internaute): self
    {
        if (!$this->internaute->contains($internaute)) {
            $this->internaute[] = $internaute;
            $internaute->setFavori($this);
        }

        return $this;
    }

    public function removeInternaute(Internaute $internaute): self
    {
        if ($this->internaute->contains($internaute)) {
            $this->internaute->removeElement($internaute);
            // set the owning side to null (unless already changed)
            if ($internaute->getFavori() === $this) {
                $internaute->setFavori(null);
            }
        }

        return $this;
    }
}
