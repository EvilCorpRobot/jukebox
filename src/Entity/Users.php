<?php

namespace App\Entity;

use App\Repository\UsersRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: UsersRepository::class)]
class Users
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $email = null;

    #[ORM\Column(length: 255)]
    private ?string $password = null;

    #[ORM\Column]
    private ?bool $is_admin = null;

    #[ORM\ManyToMany(targetEntity: Playlists::class, mappedBy: 'id_user')]
    private Collection $playlists;

    #[ORM\ManyToMany(targetEntity: Likes::class, mappedBy: 'id_user')]
    private Collection $likes;

    public function __construct()
    {
        $this->playlists = new ArrayCollection();
        $this->likes = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    public function isIsAdmin(): ?bool
    {
        return $this->is_admin;
    }

    public function setIsAdmin(bool $is_admin): self
    {
        $this->is_admin = $is_admin;

        return $this;
    }

    /**
     * @return Collection<int, Playlists>
     */
    public function getPlaylists(): Collection
    {
        return $this->playlists;
    }

    public function addPlaylists(Playlists $playlist): self
    {
        if (!$this->playlists->contains($playlist)) {
            $this->playlists->add($playlist);
            $playlist->addIdUser($this);
        }

        return $this;
    }

    public function removePlaylist(Playlists $playlist): self
    {
        if ($this->playlists->removeElement($playlist)) {
            $playlist->removeIdUser($this);
        }

        return $this;
    }

    /**
     * @return Collection<int, Likes>
     */
    public function getLikes(): Collection
    {
        return $this->likes;
    }

    public function addLike(Likes $like): self
    {
        if (!$this->likes->contains($like)) {
            $this->likes->add($like);
            $like->addIdUser($this);
        }

        return $this;
    }

    public function removeLike(Likes $like): self
    {
        if ($this->likes->removeElement($like)) {
            $like->removeIdUser($this);
        }

        return $this;
    }
}
