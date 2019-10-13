<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\CommentaireRepository")
 */
class Commentaire
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
    private $contenu;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $cote;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $identifiant;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $encodage;

    /**
     * @ORM\Column(type="string", length=10, nullable=true)
     */
    private $titre;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Prestataire", inversedBy="commentaires")
     */
    private $prestataire;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Internaute", inversedBy="commentaires")
     */
    private $internaute;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Abus", mappedBy="commentaire")
     */
    private $abuses;

    public function __construct()
    {
        $this->internaute = new ArrayCollection();
        $this->abuses = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getContenu(): ?string
    {
        return $this->contenu;
    }

    public function setContenu(?string $contenu): self
    {
        $this->contenu = $contenu;

        return $this;
    }

    public function getCote(): ?int
    {
        return $this->cote;
    }

    public function setCote(?int $cote): self
    {
        $this->cote = $cote;

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

    public function getEncodage(): ?\DateTimeInterface
    {
        return $this->encodage;
    }

    public function setEncodage(?\DateTimeInterface $encodage): self
    {
        $this->encodage = $encodage;

        return $this;
    }

    public function getTitre(): ?string
    {
        return $this->titre;
    }

    public function setTitre(?string $titre): self
    {
        $this->titre = $titre;

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

    /**
     * @return Collection|Abus[]
     */
    public function getAbuses(): Collection
    {
        return $this->abuses;
    }

    public function addAbuse(Abus $abuse): self
    {
        if (!$this->abuses->contains($abuse)) {
            $this->abuses[] = $abuse;
            $abuse->setCommentaire($this);
        }

        return $this;
    }

    public function removeAbuse(Abus $abuse): self
    {
        if ($this->abuses->contains($abuse)) {
            $this->abuses->removeElement($abuse);
            // set the owning side to null (unless already changed)
            if ($abuse->getCommentaire() === $this) {
                $abuse->setCommentaire(null);
            }
        }

        return $this;
    }
}
