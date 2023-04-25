<?php

namespace App\Entity;

use App\Repository\SongsRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: SongsRepository::class)]
class Songs
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;
    

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\Column(length: 255)]
    private ?string $url_song = null;

    #[ORM\Column(length: 255)]
    private ?string $url_image = null;

    #[ORM\Column(length: 255)]
    private ?string $type_song = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getUrlSong(): ?string
    {
        return $this->url_song;
    }

    public function setUrlSong(string $url_song): self
    {
        $this->url_song = $url_song;

        return $this;
    }

    public function getUrlImage(): ?string
    {
        return $this->url_image;
    }

    public function setUrlImage(string $url_image): self
    {
        $this->url_image = $url_image;

        return $this;
    }

    public function getTypeSong(): ?string
    {
        return $this->type_song;
    }

    public function setTypeSong(string $type_song): self
    {
        $this->type_song = $type_song;

        return $this;
    }
}
