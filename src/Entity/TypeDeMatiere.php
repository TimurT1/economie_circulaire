<?php

namespace App\Entity;

use App\Repository\TypeDeMatiereRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: TypeDeMatiereRepository::class)]
class TypeDeMatiere
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255)]
    private $nomTypeDeMatiere;

    #[ORM\OneToMany(mappedBy: 'typeDeMatiere', targetEntity: Annonce::class)]
    private $annonce;

    public function __construct()
    {
        $this->annonce = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomTypeDeMatiere(): ?string
    {
        return $this->nomTypeDeMatiere;
    }

    public function setNomTypeDeMatiere(string $nomTypeDeMatiere): self
    {
        $this->nomTypeDeMatiere = $nomTypeDeMatiere;

        return $this;
    }

    /**
     * @return Collection<int, Annonce>
     */
    public function getAnnonce(): Collection
    {
        return $this->annonce;
    }

    public function addAnnonce(Annonce $annonce): self
    {
        if (!$this->annonce->contains($annonce)) {
            $this->annonce[] = $annonce;
            $annonce->setTypeDeMatiere($this);
        }

        return $this;
    }

    public function removeAnnonce(Annonce $annonce): self
    {
        if ($this->annonce->removeElement($annonce)) {
            // set the owning side to null (unless already changed)
            if ($annonce->getTypeDeMatiere() === $this) {
                $annonce->setTypeDeMatiere(null);
            }
        }

        return $this;
    }
}
