<?php

namespace App\Entity;

use App\Repository\MaterieluserRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=MaterieluserRepository::class)
 */
class Materieluser
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="materielusers")
     */
    private $iduser;

    /**
     * @ORM\ManyToOne(targetEntity=Materiel::class, inversedBy="materielusers")
     */
    private $idmateriel;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $statut;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIduser(): ?User
    {
        return $this->iduser;
    }

    public function setIduser(?User $iduser): self
    {
        $this->iduser = $iduser;

        return $this;
    }

    public function getIdmateriel(): ?Materiel
    {
        return $this->idmateriel;
    }

    public function setIdmateriel(?Materiel $idmateriel): self
    {
        $this->idmateriel = $idmateriel;

        return $this;
    }

    public function getStatut(): ?string
    {
        return $this->statut;
    }

    public function setStatut(?string $statut): self
    {
        $this->statut = $statut;

        return $this;
    }
}
