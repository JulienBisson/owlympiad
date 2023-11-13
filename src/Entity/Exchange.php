<?php

namespace App\Entity;

use App\Repository\ExchangeRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ExchangeRepository::class)]
class Exchange
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(nullable: true)]
    private ?bool $status = null;

    #[ORM\ManyToMany(targetEntity: User::class, inversedBy: 'exchanges')]
    private Collection $userId;

    #[ORM\ManyToMany(targetEntity: Game::class, inversedBy: 'exchanges')]
    private Collection $gameId;

    public function __construct()
    {
        $this->userId = new ArrayCollection();
        $this->gameId = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function isStatus(): ?bool
    {
        return $this->status;
    }

    public function setStatus(?bool $status): static
    {
        $this->status = $status;

        return $this;
    }

    /**
     * @return Collection<int, User>
     */
    public function getUserId(): Collection
    {
        return $this->userId;
    }

    public function addUserId(User $userId): static
    {
        if (!$this->userId->contains($userId)) {
            $this->userId->add($userId);
        }

        return $this;
    }

    public function removeUserId(User $userId): static
    {
        $this->userId->removeElement($userId);

        return $this;
    }

    /**
     * @return Collection<int, Game>
     */
    public function getGameId(): Collection
    {
        return $this->gameId;
    }

    public function addGameId(Game $gameId): static
    {
        if (!$this->gameId->contains($gameId)) {
            $this->gameId->add($gameId);
        }

        return $this;
    }

    public function removeGameId(Game $gameId): static
    {
        $this->gameId->removeElement($gameId);

        return $this;
    }
}
