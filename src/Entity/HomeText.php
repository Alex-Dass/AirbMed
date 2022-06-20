<?php

namespace App\Entity;

use App\Repository\HomeTextRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=HomeTextRepository::class)
 */
class HomeText
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="text")
     */
    private $hometexte;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getHometexte(): ?string
    {
        return $this->hometexte;
    }

    public function setHometexte(string $hometexte): self
    {
        $this->hometexte = $hometexte;

        return $this;
    }
}
