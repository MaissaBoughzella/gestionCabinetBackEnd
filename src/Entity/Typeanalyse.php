<?php

namespace App\Entity;
use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\ORM\Mapping as ORM;

/**
 * Typeanalyse
 * @ApiResource()
 * @ORM\Table(name="typeanalyse")
 * @ORM\Entity
 */
class Typeanalyse
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
     * @ORM\Column(name="analyse", type="string", length=255, nullable=true)
     */
    private $analyse;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getAnalyse(): ?string
    {
        return $this->analyse;
    }

    public function setAnalyse(?string $analyse): self
    {
        $this->analyse = $analyse;

        return $this;
    }
    public function __toString() 
    {
        return (string) $this->analyse; 
    }
    

}
