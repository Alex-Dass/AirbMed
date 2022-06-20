<?php

namespace App\Entity;

use App\Repository\SousPrestationsRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=SousPrestationsRepository::class)
 */
class SousPrestations
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=Prestations::class, inversedBy="sousTitre")
     */
    private $titre;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $sousTitre;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $texte;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitre(): ?Prestations
    {
        return $this->titre;
    }

    public function setTitre(?Prestations $titre): self
    {
        $this->titre = $titre;

        return $this;
    }

    public function getSousTitre(): ?string
    {
        return $this->sousTitre;
    }

    public function setSousTitre(?string $sousTitre): self
    {
        $this->sousTitre = $sousTitre;

        return $this;
    }

    public function getTexte(): ?string
    {
        return $this->texte;
    }

    public function setTexte(?string $texte): self
    {
        $this->texte = $texte;

        return $this;
    }
}
