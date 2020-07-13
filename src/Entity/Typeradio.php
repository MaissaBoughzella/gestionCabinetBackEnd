<?php

namespace App\Entity;
use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\ORM\Mapping as ORM;

/**
 * Typeradio
 * @ApiResource()
 * @ORM\Table(name="typeradio")
 * @ORM\Entity
 */
class Typeradio
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
     * @var string|null
     *
     * @ORM\Column(name="radio", type="string", length=255, nullable=true)
     */
    private $radio;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getRadio(): ?string
    {
        return $this->radio;
    }

    public function setRadio(?string $radio): self
    {
        $this->radio = $radio;

        return $this;
    }
    public function __toString() 
    {
        return (string) $this->radio; 
    }
    

}
