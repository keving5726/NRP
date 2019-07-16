<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ProfileRepository")
 */
class Profile
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\User", inversedBy="profile", cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $UserIdentification;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $FirstName;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $LastName;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Sex")
     * @ORM\JoinColumn(nullable=false)
     */
    private $Sex;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\MaritalStatus")
     * @ORM\JoinColumn(nullable=false)
     */
    private $MaritalStatus;

    /**
     * @ORM\Column(type="date")
     */
    private $Birthdate;

    /**
     * @ORM\Column(type="datetime")
     */
    private $CreatedAt;

    /**
     * @ORM\Column(type="datetime")
     */
    private $UpdatedAt;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUserIdentification(): ?User
    {
        return $this->UserIdentification;
    }

    public function setUserIdentification(User $UserIdentification): self
    {
        $this->UserIdentification = $UserIdentification;

        return $this;
    }

    public function getFirstName(): ?string
    {
        return $this->FirstName;
    }

    public function setFirstName(string $FirstName): self
    {
        $this->FirstName = $FirstName;

        return $this;
    }

    public function getLastName(): ?string
    {
        return $this->LastName;
    }

    public function setLastName(string $LastName): self
    {
        $this->LastName = $LastName;

        return $this;
    }

    public function getSex(): ?Sex
    {
        return $this->Sex;
    }

    public function setSex(?Sex $Sex): self
    {
        $this->Sex = $Sex;

        return $this;
    }

    public function getMaritalStatus(): ?MaritalStatus
    {
        return $this->MaritalStatus;
    }

    public function setMaritalStatus(?MaritalStatus $MaritalStatus): self
    {
        $this->MaritalStatus = $MaritalStatus;

        return $this;
    }

    public function getBirthdate(): ?\DateTimeInterface
    {
        return $this->Birthdate;
    }

    public function setBirthdate(\DateTimeInterface $Birthdate): self
    {
        $this->Birthdate = $Birthdate;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeInterface
    {
        return $this->CreatedAt;
    }

    public function setCreatedAt(\DateTimeInterface $CreatedAt): self
    {
        $this->CreatedAt = $CreatedAt;

        return $this;
    }

    public function getUpdatedAt(): ?\DateTimeInterface
    {
        return $this->UpdatedAt;
    }

    public function setUpdatedAt(\DateTimeInterface $UpdatedAt): self
    {
        $this->UpdatedAt = $UpdatedAt;

        return $this;
    }
}
