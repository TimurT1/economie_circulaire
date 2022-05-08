<?php

namespace App\Entity;

use App\Repository\AnnonceRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AnnonceRepository::class)]
class Annonce
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255)]
    private $titreAnnonce;

    #[ORM\Column(type: 'text', nullable: true)]
    private $descriptionAnnonce;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $photoAnnonce;

    #[ORM\Column(type: 'date')]
    private $dateDeCreation;

    #[ORM\Column(type: 'date', nullable: true)]
    private $dateDeModification;

    #[ORM\Column(type: 'boolean')]
    private $boolMasquer;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitreAnnonce(): ?string
    {
        return $this->titreAnnonce;
    }

    public function setTitreAnnonce(string $titreAnnonce): self
    {
        $this->titreAnnonce = $titreAnnonce;

        return $this;
    }

    public function getDescriptionAnnonce(): ?string
    {
        return $this->descriptionAnnonce;
    }

    public function setDescriptionAnnonce(?string $descriptionAnnonce): self
    {
        $this->descriptionAnnonce = $descriptionAnnonce;

        return $this;
    }

    public function getPhotoAnnonce(): ?string
    {
        return $this->photoAnnonce;
    }

    public function setPhotoAnnonce(?string $photoAnnonce): self
    {
        $this->photoAnnonce = $photoAnnonce;

        return $this;
    }

    public function getDateDeCreation(): ?\DateTimeInterface
    {
        return $this->dateDeCreation;
    }

    public function setDateDeCreation(\DateTimeInterface $dateDeCreation): self
    {
        $this->dateDeCreation = $dateDeCreation;

        return $this;
    }

    public function getDateDeModification(): ?\DateTimeInterface
    {
        return $this->dateDeModification;
    }

    public function setDateDeModification(?\DateTimeInterface $dateDeModification): self
    {
        $this->dateDeModification = $dateDeModification;

        return $this;
    }

    public function getBoolMasquer(): ?bool
    {
        return $this->boolMasquer;
    }

    public function setBoolMasquer(bool $boolMasquer): self
    {
        $this->boolMasquer = $boolMasquer;

        return $this;
    }
}
