<?php

namespace App\Entity;

use App\Repository\PrestationsRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=PrestationsRepository::class)
 */
class Prestations
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $titre;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $texte;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $sousTitre1;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $sousTitre2;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $sousTitre3;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $sousTitre4;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $sousTitre5;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $body1;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $body2;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $body3;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $body4;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $body5;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitre(): ?string
    {
        return $this->titre;
    }

    public function setTitre(string $titre): self
    {
        $this->titre = $titre;

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

    public function getSousTitre1(): ?string
    {
        return $this->sousTitre1;
    }

    public function setSousTitre1(?string $sousTitre1): self
    {
        $this->sousTitre1 = $sousTitre1;

        return $this;
    }

    public function getSousTitre2(): ?string
    {
        return $this->sousTitre2;
    }

    public function setSousTitre2(?string $sousTitre2): self
    {
        $this->sousTitre2 = $sousTitre2;

        return $this;
    }

    public function getsousTitre3(): ?string
    {
        return $this->sousTitre3;
    }

    public function setsousTitre3(?string $sousTitre3): self
    {
        $this->sousTitre3 = $sousTitre3;

        return $this;
    }

    public function getSousTitre4(): ?string
    {
        return $this->sousTitre4;
    }

    public function setSousTitre4(?string $sousTitre4): self
    {
        $this->sousTitre4 = $sousTitre4;

        return $this;
    }

    public function getSousTitre5(): ?string
    {
        return $this->sousTitre5;
    }

    public function setSousTitre5(?string $sousTitre5): self
    {
        $this->sousTitre5 = $sousTitre5;

        return $this;
    }

    public function getBody1(): ?string
    {
        return $this->body1;
    }

    public function setBody1(?string $body1): self
    {
        $this->body1 = $body1;

        return $this;
    }

    public function getBody2(): ?string
    {
        return $this->body2;
    }

    public function setBody2(?string $body2): self
    {
        $this->body2 = $body2;

        return $this;
    }

    public function getBody3(): ?string
    {
        return $this->body3;
    }

    public function setBody3(?string $body3): self
    {
        $this->body3 = $body3;

        return $this;
    }

    public function getBody4(): ?string
    {
        return $this->body4;
    }

    public function setBody4(?string $body4): self
    {
        $this->body4 = $body4;

        return $this;
    }

    public function getBody5(): ?string
    {
        return $this->body5;
    }

    public function setBody5(?string $body5): self
    {
        $this->body5 = $body5;

        return $this;
    }
}
