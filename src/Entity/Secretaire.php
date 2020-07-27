<?php

namespace App\Entity;
use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\ORM\Mapping as ORM;


/**
 * Secretaire
 * @ApiResource()
 * @ORM\Table(name="secretaire",indexes={@ORM\Index(name="fk_sec_med_idx", columns={"medecin_id"})})
 * @ORM\Entity
 */
class Secretaire
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
    * @ORM\OneToOne(targetEntity="App\Entity\User",cascade={"persist", "remove"})
     * @ORM\JoinColumns({
     * @ORM\JoinColumn(name="user_id", referencedColumnName="id",onDelete="CASCADE")
     * })
    */
    protected $user;

    /**
     * @var int
     * @ORM\Column(name="medecin_id", type="integer", nullable=false)
     */
    private $medecinId;

    public function getId(): ?int
    {
        return $this->id;
    }
    public function getMedecinId(): ?int
    {
        return $this->medecinId;
    }

    public function setMedecinId(int $medecinId): self
    {
        $this->medecinId = $medecinId;

        return $this;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): self
    {
        $this->user = $user;

        return $this;
    }
 

}
