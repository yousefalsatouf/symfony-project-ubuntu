<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\UtilisateurRepository")
 */
class Utilisateur
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
    private $adresseN°;

    /**
     * @ORM\Column(type="string", length=100, nullable=true)
     */
    private $adresseRue;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $banni;

    /**
     * @ORM\Column(type="string", length=100, nullable=true)
     */
    private $email;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $identifiant;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $inscriptionConf;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $inscription;

    /**
     * @ORM\Column(type="string", length=100, nullable=true)
     */
    private $motDePass;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $nbEssaisInfr;

    /**
     * @ORM\Column(type="string", length=100, nullable=true)
     */
    private $typeUtilisateur;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\CodePostal", inversedBy="utilisateurs")
     */
    private $codePostalId;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Commune", inversedBy="utilisateurs")
     */
    private $communeId;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Internaute", inversedBy="utilisateurs")
     */
    private $internauteId;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Localite", inversedBy="utilisateurs")
     */
    private $localiteId;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getAdresseN°(): ?int
    {
        return $this->adresseN°;
    }

    public function setAdresseN°(?int $adresseN°): self
    {
        $this->adresseN° = $adresseN°;

        return $this;
    }

    public function getAdresseRue(): ?string
    {
        return $this->adresseRue;
    }

    public function setAdresseRue(?string $adresseRue): self
    {
        $this->adresseRue = $adresseRue;

        return $this;
    }

    public function getBanni(): ?bool
    {
        return $this->banni;
    }

    public function setBanni(?bool $banni): self
    {
        $this->banni = $banni;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(?string $email): self
    {
        $this->email = $email;

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

    public function getInscriptionConf(): ?bool
    {
        return $this->inscriptionConf;
    }

    public function setInscriptionConf(?bool $inscriptionConf): self
    {
        $this->inscriptionConf = $inscriptionConf;

        return $this;
    }

    public function getInscription(): ?\DateTimeInterface
    {
        return $this->inscription;
    }

    public function setInscription(?\DateTimeInterface $inscription): self
    {
        $this->inscription = $inscription;

        return $this;
    }

    public function getMotDePass(): ?string
    {
        return $this->motDePass;
    }

    public function setMotDePass(?string $motDePass): self
    {
        $this->motDePass = $motDePass;

        return $this;
    }

    public function getNbEssaisInfr(): ?int
    {
        return $this->nbEssaisInfr;
    }

    public function setNbEssaisInfr(?int $nbEssaisInfr): self
    {
        $this->nbEssaisInfr = $nbEssaisInfr;

        return $this;
    }

    public function getTypeUtilisateur(): ?string
    {
        return $this->typeUtilisateur;
    }

    public function setTypeUtilisateur(?string $typeUtilisateur): self
    {
        $this->typeUtilisateur = $typeUtilisateur;

        return $this;
    }

    public function getCodePostalId(): ?CodePostal
    {
        return $this->codePostalId;
    }

    public function setCodePostalId(?CodePostal $codePostalId): self
    {
        $this->codePostalId = $codePostalId;

        return $this;
    }

    public function getCommuneId(): ?Commune
    {
        return $this->communeId;
    }

    public function setCommuneId(?Commune $communeId): self
    {
        $this->communeId = $communeId;

        return $this;
    }

    public function getInternauteId(): ?Internaute
    {
        return $this->internauteId;
    }

    public function setInternauteId(?Internaute $internauteId): self
    {
        $this->internauteId = $internauteId;

        return $this;
    }

    public function getLocaliteId(): ?Localite
    {
        return $this->localiteId;
    }

    public function setLocaliteId(?Localite $localiteId): self
    {
        $this->localiteId = $localiteId;

        return $this;
    }

}
