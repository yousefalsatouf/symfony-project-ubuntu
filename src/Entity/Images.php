<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ImagesRepository")
 */
class Images
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $identifiant;

    /**
     * @ORM\Column(type="blob", nullable=true)
     */
    private $image;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\CategorieDeServices", cascade={"persist", "remove"})
     */
    private $categorieDeServices;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Internaute", inversedBy="images")
     */
    private $internaute;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Prestataire", inversedBy="images")
     */
    private $prestataire;

    public function __construct()
    {
        $this->internaute = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIdentifiant(): ?int
    {
        return $this->identifiant;
    }

    public function setIdentifiant(?int $identifiant): self
    {
        $this->identifiant = $identifiant;

        return $this;
    }

    public function getImage()
    {
        return $this->image;
    }

    public function setImage($image): self
    {
        $this->image = $image;

        return $this;
    }

    public function getCategorieDeServices(): ?CategorieDeServices
    {
        return $this->categorieDeServices;
    }

    public function setCategorieDeServices(?CategorieDeServices $categorieDeServices): self
    {
        $this->categorieDeServices = $categorieDeServices;

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
        }

        return $this;
    }

    public function removeInternaute(Internaute $internaute): self
    {
        if ($this->internaute->contains($internaute)) {
            $this->internaute->removeElement($internaute);
        }

        return $this;
    }

    public function getPrestataire(): ?Prestataire
    {
        return $this->prestataire;
    }

    public function setPrestataire(?Prestataire $prestataire): self
    {
        $this->prestataire = $prestataire;

        return $this;
    }
}
