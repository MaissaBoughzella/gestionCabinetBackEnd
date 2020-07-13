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
class Secretaire extends User
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

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


}
