<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * Class UserAccount
 * @ORM\Entity(repositoryClass="App\Repository\UserAccountRepository")
 * @ORM\Table(name="users")
 */
class UserAccount implements UserInterface
{
    /**
     * @ORM\Column(type="string")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\Column(name="email")
     */
    private $email;

    /**
     * @ORM\Column(name="password")
     */
    private $password;

    /**
     * @ORM\Column(name="facebook_id")
     */
    private $facebookId;
    /**
     * @var \DateTime
     */
    private $lastLoginAt;

    /**
     * @var \DateTime
     */
    private $createdAt;

    /**
     * @var \DateTime
     */
    private $deletedAt;

    /**
     * @param Role[] $roles
     */
    public function setRoles(array $roles): void
    {
        $this->roles = $roles;
    }

    /**
     * @return Role[]
     */
    public function getRoles()
    {
        return $this->roles;
    }

    /**
     * @param string $id
     */
    public function setId(string $id): void
    {
        $this->id = $id;
    }

    public function getId(): string
    {
        return $this->id;
    }

    /**
     * @return \DateTime
     */
    public function getLastLoginAt(): \DateTime
    {
        return $this->lastLoginAt;
    }

    /**
     * @param \DateTime $lastLoginAt
     */
    public function setLastLoginAt(\DateTime $lastLoginAt): void
    {
        $this->lastLoginAt = $lastLoginAt;
    }

    /**
     * @return \DateTime
     */
    public function getCreatedAt(): \DateTime
    {
        return $this->createdAt;
    }

    /**
     * @param \DateTime $createdAt
     */
    public function setCreatedAt(\DateTime $createdAt): void
    {
        $this->createdAt = $createdAt;
    }

    /**
     * @return \DateTime
     */
    public function getDeletedAt(): \DateTime
    {
        return $this->deletedAt;
    }

    /**
     * @param \DateTime $deletedAt
     */
    public function setDeletedAt(\DateTime $deletedAt): void
    {
        $this->deletedAt = $deletedAt;
    }

    /**
     * Returns the password used to authenticate the user.
     *
     * This should be the encoded password. On authentication, a plain-text
     * password will be salted, encoded, and then compared to this value.
     *
     * @return string The password
     */
    public function getPassword()
    {
        // TODO: Implement getPassword() method.
    }

    /**
     * Returns the salt that was originally used to encode the password.
     *
     * This can return null if the password was not encoded using a salt.
     *
     * @return string|null The salt
     */
    public function getSalt()
    {
        // TODO: Implement getSalt() method.
    }

    /**
     * Returns the username used to authenticate the user.
     *
     * @return string The username
     */
    public function getUsername()
    {
        // TODO: Implement getUsername() method.
    }

    /**
     * Removes sensitive data from the user.
     *
     * This is important if, at any given point, sensitive information like
     * the plain-text password is stored on this object.
     */
    public function eraseCredentials()
    {
        // TODO: Implement eraseCredentials() method.
    }
}