<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\InternauteRepository")
 */
class Internaute
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
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $newsLetter;

    /**
     * @ORM\Column(type="string", length=10, nullable=true)
     */
    private $nom;

    /**
     * @ORM\Column(type="string", length=10, nullable=true)
     */
    private $prenom;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Utilisateur", mappedBy="internauteId")
     */
    private $utilisateurs;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Position", mappedBy="internaute")
     */
    private $positions;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Images", mappedBy="internaute")
     */
    private $images;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Favori", inversedBy="internaute")
     */
    private $favori;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Commentaire", mappedBy="internaute")
     */
    private $commentaires;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Abus", mappedBy="internaute")
     */
    private $abuses;

    public function __construct()
    {
        $this->utilisateurs = new ArrayCollection();
        $this->positions = new ArrayCollection();
        $this->images = new ArrayCollection();
        $this->commentaires = new ArrayCollection();
        $this->abuses = new ArrayCollection();
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

    public function getNewsLetter(): ?bool
    {
        return $this->newsLetter;
    }

    public function setNewsLetter(?bool $newsLetter): self
    {
        $this->newsLetter = $newsLetter;

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

    public function getPrenom(): ?string
    {
        return $this->prenom;
    }

    public function setPrenom(?string $prenom): self
    {
        $this->prenom = $prenom;

        return $this;
    }

    /**
     * @return Collection|Utilisateur[]
     */
    public function getUtilisateurs(): Collection
    {
        return $this->utilisateurs;
    }

    public function addUtilisateur(Utilisateur $utilisateur): self
    {
        if (!$this->utilisateurs->contains($utilisateur)) {
            $this->utilisateurs[] = $utilisateur;
            $utilisateur->setInternauteId($this);
        }

        return $this;
    }

    public function removeUtilisateur(Utilisateur $utilisateur): self
    {
        if ($this->utilisateurs->contains($utilisateur)) {
            $this->utilisateurs->removeElement($utilisateur);
            // set the owning side to null (unless already changed)
            if ($utilisateur->getInternauteId() === $this) {
                $utilisateur->setInternauteId(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Position[]
     */
    public function getPositions(): Collection
    {
        return $this->positions;
    }

    public function addPosition(Position $position): self
    {
        if (!$this->positions->contains($position)) {
            $this->positions[] = $position;
            $position->addInternaute($this);
        }

        return $this;
    }

    public function removePosition(Position $position): self
    {
        if ($this->positions->contains($position)) {
            $this->positions->removeElement($position);
            $position->removeInternaute($this);
        }

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
            $image->addInternaute($this);
        }

        return $this;
    }

    public function removeImage(Images $image): self
    {
        if ($this->images->contains($image)) {
            $this->images->removeElement($image);
            $image->removeInternaute($this);
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
            $commentaire->addInternaute($this);
        }

        return $this;
    }

    public function removeCommentaire(Commentaire $commentaire): self
    {
        if ($this->commentaires->contains($commentaire)) {
            $this->commentaires->removeElement($commentaire);
            $commentaire->removeInternaute($this);
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
            $abuse->setInternaute($this);
        }

        return $this;
    }

    public function removeAbuse(Abus $abuse): self
    {
        if ($this->abuses->contains($abuse)) {
            $this->abuses->removeElement($abuse);
            // set the owning side to null (unless already changed)
            if ($abuse->getInternaute() === $this) {
                $abuse->setInternaute(null);
            }
        }

        return $this;
    }
}
