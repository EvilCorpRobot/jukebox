<?php

namespace App\Entity;

use App\Repository\LikesRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: LikesRepository::class)]
class Likes
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToMany(targetEntity: users::class, inversedBy: 'likes')]
    private Collection $id_user;

    #[ORM\ManyToMany(targetEntity: songs::class, inversedBy: 'likes')]
    private Collection $id_song;

    public function __construct()
    {
        $this->id_user = new ArrayCollection();
        $this->id_song = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return Collection<int, users>
     */
    public function getIdUser(): Collection
    {
        return $this->id_user;
    }

    public function addIdUser(users $idUser): self
    {
        if (!$this->id_user->contains($idUser)) {
            $this->id_user->add($idUser);
        }

        return $this;
    }

    public function removeIdUser(users $idUser): self
    {
        $this->id_user->removeElement($idUser);

        return $this;
    }

    /**
     * @return Collection<int, songs>
     */
    public function getIdSong(): Collection
    {
        return $this->id_song;
    }

    public function addIdSong(songs $idSong): self
    {
        if (!$this->id_song->contains($idSong)) {
            $this->id_song->add($idSong);
        }

        return $this;
    }

    public function removeIdSong(songs $idSong): self
    {
        $this->id_song->removeElement($idSong);

        return $this;
    }
}
