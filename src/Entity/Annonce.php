<?php

namespace App\Entity;

use App\Repository\AnnonceRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
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

    #[ORM\ManyToOne(targetEntity: Entreprise::class, inversedBy: 'annonce')]
    #[ORM\JoinColumn(nullable: false)]
    private $entreprise;

    #[ORM\ManyToMany(targetEntity: Localisation::class, mappedBy: 'annonces')]
    private $localisations;

    #[ORM\ManyToOne(targetEntity: TypeDeMatiere::class, inversedBy: 'annonce')]
    private $typeDeMatiere;

    #[ORM\ManyToMany(targetEntity: MotCles::class, mappedBy: 'annonces')]
    private $motCles;

    #[ORM\ManyToMany(targetEntity: Categorie::class, mappedBy: 'annonces')]
    private $categories;

    public function __construct()
    {
        $this->localisations = new ArrayCollection();
        $this->motCles = new ArrayCollection();
        $this->categories = new ArrayCollection();
    }

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

    public function getEntreprise(): ?Entreprise
    {
        return $this->entreprise;
    }

    public function setEntreprise(?Entreprise $entreprise): self
    {
        $this->entreprise = $entreprise;

        return $this;
    }

    /**
     * @return Collection<int, Localisation>
     */
    public function getLocalisations(): Collection
    {
        return $this->localisations;
    }

    public function addLocalisation(Localisation $localisation): self
    {
        if (!$this->localisations->contains($localisation)) {
            $this->localisations[] = $localisation;
            $localisation->addAnnonce($this);
        }

        return $this;
    }

    public function removeLocalisation(Localisation $localisation): self
    {
        if ($this->localisations->removeElement($localisation)) {
            $localisation->removeAnnonce($this);
        }

        return $this;
    }

    public function getTypeDeMatiere(): ?TypeDeMatiere
    {
        return $this->typeDeMatiere;
    }

    public function setTypeDeMatiere(?TypeDeMatiere $typeDeMatiere): self
    {
        $this->typeDeMatiere = $typeDeMatiere;

        return $this;
    }

    /**
     * @return Collection<int, MotCles>
     */
    public function getMotCles(): Collection
    {
        return $this->motCles;
    }

    public function addMotCle(MotCles $motCle): self
    {
        if (!$this->motCles->contains($motCle)) {
            $this->motCles[] = $motCle;
            $motCle->addAnnonce($this);
        }

        return $this;
    }

    public function removeMotCle(MotCles $motCle): self
    {
        if ($this->motCles->removeElement($motCle)) {
            $motCle->removeAnnonce($this);
        }

        return $this;
    }

    /**
     * @return Collection<int, Categorie>
     */
    public function getCategories(): Collection
    {
        return $this->categories;
    }

    public function addCategory(Categorie $category): self
    {
        if (!$this->categories->contains($category)) {
            $this->categories[] = $category;
            $category->addAnnonce($this);
        }

        return $this;
    }

    public function removeCategory(Categorie $category): self
    {
        if ($this->categories->removeElement($category)) {
            $category->removeAnnonce($this);
        }

        return $this;
    }
}
