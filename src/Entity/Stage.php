<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\StageRepository")
 */
class Stage
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
    private $infoComplementaire;

    /**
     * @ORM\Column(type="string", length=100, nullable=true)
     */
    private $nom;

    /**
     * @ORM\Column(type="string", length=100, nullable=true)
     */
    private $tarif;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Prestataire", inversedBy="stages")
     */
    private $prestataire;

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

    public function getInfoComplementaire(): ?string
    {
        return $this->infoComplementaire;
    }

    public function setInfoComplementaire(?string $infoComplementaire): self
    {
        $this->infoComplementaire = $infoComplementaire;

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

    public function getTarif(): ?string
    {
        return $this->tarif;
    }

    public function setTarif(?string $tarif): self
    {
        $this->tarif = $tarif;

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
