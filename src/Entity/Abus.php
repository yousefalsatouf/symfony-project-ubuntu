<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\AbusRepository")
 */
class Abus
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=10, nullable=true)
     */
    private $description;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $enCodage;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $identifiant;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Internaute", inversedBy="abuses")
     */
    private $internaute;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Commentaire", inversedBy="abuses")
     */
    private $commentaire;

    public function getId(): ?int
    {
        return $this->id;
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

    public function getEnCodage(): ?\DateTimeInterface
    {
        return $this->enCodage;
    }

    public function setEnCodage(?\DateTimeInterface $enCodage): self
    {
        $this->enCodage = $enCodage;

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

    public function getInternaute(): ?Internaute
    {
        return $this->internaute;
    }

    public function setInternaute(?Internaute $internaute): self
    {
        $this->internaute = $internaute;

        return $this;
    }

    public function getCommentaire(): ?Commentaire
    {
        return $this->commentaire;
    }

    public function setCommentaire(?Commentaire $commentaire): self
    {
        $this->commentaire = $commentaire;

        return $this;
    }
}
