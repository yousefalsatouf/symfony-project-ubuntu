<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\PromotionRepository")
 */
class Promotion
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $affichageDe;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $affichageA;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $debut;

    /**
     * @ORM\Column(type="string", length=100, nullable=true)
     */
    private $description;

    /**
     * @ORM\Column(type="blob", nullable=true)
     */
    private $documentPdf;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $fin;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $identifiant;

    /**
     * @ORM\Column(type="string", length=100, nullable=true)
     */
    private $nom;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\CategorieDeServices", inversedBy="promotions")
     */
    private $categorieDeServices;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Prestataire", mappedBy="promotion")
     */
    private $prestataire;

    public function __construct()
    {
        $this->prestataire = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getAffichageDe(): ?\DateTimeInterface
    {
        return $this->affichageDe;
    }

    public function setAffichageDe(?\DateTimeInterface $affichageDe): self
    {
        $this->affichageDe = $affichageDe;

        return $this;
    }

    public function getAffichageA(): ?\DateTimeInterface
    {
        return $this->affichageA;
    }

    public function setAffichageA(?\DateTimeInterface $affichageA): self
    {
        $this->affichageA = $affichageA;

        return $this;
    }

    public function getDebut(): ?\DateTimeInterface
    {
        return $this->debut;
    }

    public function setDebut(?\DateTimeInterface $debut): self
    {
        $this->debut = $debut;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getDocumentPdf()
    {
        return $this->documentPdf;
    }

    public function setDocumentPdf($documentPdf): self
    {
        $this->documentPdf = $documentPdf;

        return $this;
    }

    public function getFin(): ?\DateTimeInterface
    {
        return $this->fin;
    }

    public function setFin(?\DateTimeInterface $fin): self
    {
        $this->fin = $fin;

        return $this;
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

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(?string $nom): self
    {
        $this->nom = $nom;

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
            $prestataire->setPromotion($this);
        }

        return $this;
    }

    public function removePrestataire(Prestataire $prestataire): self
    {
        if ($this->prestataire->contains($prestataire)) {
            $this->prestataire->removeElement($prestataire);
            // set the owning side to null (unless already changed)
            if ($prestataire->getPromotion() === $this) {
                $prestataire->setPromotion(null);
            }
        }

        return $this;
    }
}
