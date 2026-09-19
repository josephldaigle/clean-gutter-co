<?php

namespace CleanGutter\Entity;

use CleanGutter\Repository\TenantRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface;
use Symfony\Component\Security\Core\User\UserInterface;

#[ORM\Entity(repositoryClass: TenantRepository::class)]
class Tenant implements UserInterface, PasswordAuthenticatedUserInterface
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 180, unique: true)]
    private $uuid;

    #[ORM\Column(type: 'json')]
    private $devices = [];

    #[ORM\Column(type: 'json')]
    private $roles = [];

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUuid(): ?string
    {
        return $this->uuid;
    }

    public function setUuid(string $uuid): self
    {
        $this->uuid = $uuid;

        return $this;
    }

    public function getDevices()
    {
        return $this->devices;
    }

    public function setDevices($devices)
    {
        $this->devices = $devices;
    }

    public function getUserIdentifier(): string
    {
        return (string) $this->uuid;
    }

    /**
     * @deprecated since Symfony 5.3, use getUserIdentifier() instead. Kept
     * to satisfy the SF 5.4 UserInterface contract; removed at the SF 6 bump.
     */
    public function getUsername(): string
    {
        return $this->getUserIdentifier();
    }

    /**
     * @deprecated since Symfony 5.3. Kept to satisfy the SF 5.4 UserInterface
     * contract; removed at the SF 6 bump.
     */
    public function getSalt(): ?string
    {
        return null;
    }

    public function getRoles(): array
    {
        $roles = $this->roles;
        $roles[] = 'ROLE_USER';

        return array_unique($roles);
    }

    public function setRoles(array $roles): self
    {
        $this->roles = $roles;

        return $this;
    }

    public function getPassword(): ?string
    {
        return null;
    }

    public function eraseCredentials(): void
    {
    }
}
