<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\PositionRepository")
 */
class Position
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
    private $ordre;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Internaute", inversedBy="positions")
     */
    private $internaute;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Bloc", inversedBy="positions")
     */
    private $block;

    public function __construct()
    {
        $this->internaute = new ArrayCollection();
        $this->block = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getOrdre(): ?int
    {
        return $this->ordre;
    }

    public function setOrdre(?int $ordre): self
    {
        $this->ordre = $ordre;

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
     * @return Collection|Bloc[]
     */
    public function getBlock(): Collection
    {
        return $this->block;
    }

    public function addBlock(Bloc $block): self
    {
        if (!$this->block->contains($block)) {
            $this->block[] = $block;
        }

        return $this;
    }

    public function removeBlock(Bloc $block): self
    {
        if ($this->block->contains($block)) {
            $this->block->removeElement($block);
        }

        return $this;
    }
}
