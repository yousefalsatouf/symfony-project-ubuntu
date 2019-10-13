<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\PrestataireRepository")
 */
class Prestataire
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=100, nullable=true)
     */
    private $emailContact;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $identifiant;

    /**
     * @ORM\Column(type="string", length=100, nullable=true)
     */
    private $nom;

    /**
     * @ORM\Column(type="string", length=100, nullable=true)
     */
    private $numTel;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $numTva;

    /**
     * @ORM\Column(type="string", length=100, nullable=true)
     */
    private $siteInternet;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Stage", mappedBy="prestataire")
     */
    private $stages;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Proposer", mappedBy="prestataire")
     */
    private $proposers;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Promotion", inversedBy="prestataire")
     */
    private $promotion;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\Utilisateur", cascade={"persist", "remove"})
     */
    private $utilisateur;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Images", mappedBy="prestataire")
     */
    private $images;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Favori", inversedBy="prestataire")
     */
    private $favori;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Commentaire", mappedBy="prestataire")
     */
    private $commentaires;

    public function __construct()
    {
        $this->stages = new ArrayCollection();
        $this->proposers = new ArrayCollection();
        $this->images = new ArrayCollection();
        $this->commentaires = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEmailContact(): ?string
    {
        return $this->emailContact;
    }

    public function setEmailContact(?string $emailContact): self
    {
        $this->emailContact = $emailContact;

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

    public function getNumTel(): ?string
    {
        return $this->numTel;
    }

    public function setNumTel(?string $numTel): self
    {
        $this->numTel = $numTel;

        return $this;
    }

    public function getNumTva(): ?string
    {
        return $this->numTva;
    }

    public function setNumTva(string $numTva): self
    {
        $this->numTva = $numTva;

        return $this;
    }

    public function getSiteInternet(): ?string
    {
        return $this->siteInternet;
    }

    public function setSiteInternet(?string $siteInternet): self
    {
        $this->siteInternet = $siteInternet;

        return $this;
    }

    /**
     * @return Collection|Stage[]
     */
    public function getStages(): Collection
    {
        return $this->stages;
    }

    public function addStage(Stage $stage): self
    {
        if (!$this->stages->contains($stage)) {
            $this->stages[] = $stage;
            $stage->setPrestataire($this);
        }

        return $this;
    }

    public function removeStage(Stage $stage): self
    {
        if ($this->stages->contains($stage)) {
            $this->stages->removeElement($stage);
            // set the owning side to null (unless already changed)
            if ($stage->getPrestataire() === $this) {
                $stage->setPrestataire(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Proposer[]
     */
    public function getProposers(): Collection
    {
        return $this->proposers;
    }

    public function addProposer(Proposer $proposer): self
    {
        if (!$this->proposers->contains($proposer)) {
            $this->proposers[] = $proposer;
            $proposer->addPrestataire($this);
        }

        return $this;
    }

    public function removeProposer(Proposer $proposer): self
    {
        if ($this->proposers->contains($proposer)) {
            $this->proposers->removeElement($proposer);
            $proposer->removePrestataire($this);
        }

        return $this;
    }

    public function getPromotion(): ?Promotion
    {
        return $this->promotion;
    }

    public function setPromotion(?Promotion $promotion): self
    {
        $this->promotion = $promotion;

        return $this;
    }

    public function getUtilisateur(): ?Utilisateur
    {
        return $this->utilisateur;
    }

    public function setUtilisateur(?Utilisateur $utilisateur): self
    {
        $this->utilisateur = $utilisateur;

        return $this;
    }

    /**
     * @return Collection|Images[]
     */
    public function getImages(): Collection
    {
        return $this->images;
    }

    public function addImage(Images $image): self
    {
        if (!$this->images->contains($image)) {
            $this->images[] = $image;
            $image->setPrestataire($this);
        }

        return $this;
    }

    public function removeImage(Images $image): self
    {
        if ($this->images->contains($image)) {
            $this->images->removeElement($image);
            // set the owning side to null (unless already changed)
            if ($image->getPrestataire() === $this) {
                $image->setPrestataire(null);
            }
        }

        return $this;
    }

    public function getFavori(): ?Favori
    {
        return $this->favori;
    }

    public function setFavori(?Favori $favori): self
    {
        $this->favori = $favori;

        return $this;
    }

    /**
     * @return Collection|Commentaire[]
     */
    public function getCommentaires(): Collection
    {
        return $this->commentaires;
    }

    public function addCommentaire(Commentaire $commentaire): self
    {
        if (!$this->commentaires->contains($commentaire)) {
            $this->commentaires[] = $commentaire;
            $commentaire->setPrestataire($this);
        }

        return $this;
    }

    public function removeCommentaire(Commentaire $commentaire): self
    {
        if ($this->commentaires->contains($commentaire)) {
            $this->commentaires->removeElement($commentaire);
            // set the owning side to null (unless already changed)
            if ($commentaire->getPrestataire() === $this) {
                $commentaire->setPrestataire(null);
            }
        }

        return $this;
    }
}
