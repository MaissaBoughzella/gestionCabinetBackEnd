<?php

namespace App\Entity;
use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\ORM\Mapping as ORM;


/**
 * Secretaire
 * @ApiResource(
 *      collectionOperations={
 *      "get"={},
 *      "post"={},
 *      "get_by_userId"={
 *          "method"="GET",
 *          "path"="/secretaires/getByUserId/{user_id}",
 *          "controller"="App\Controller\SecretaireController::class"
 *      },
 *   },
 * )
 * @ORM\Table(name="secretaire")
 *  @ORM\Entity(repositoryClass="App\Repository\SecretaireRepository")
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
     * @var Medecin
     * @ORM\ManyToOne(targetEntity="App\Entity\Medecin",cascade={"persist", "remove"})
      * @ORM\JoinColumns({
     *  @ORM\JoinColumn(name="medecin_id", referencedColumnName="id",onDelete="CASCADE")
     * })
     */
    public $medecinId;


    public function getId(): ?int
    {
        return $this->id;
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

    public function getMedecinId(): ?Medecin
    {
        return $this->medecinId;
    }

    public function setMedecinId(?Medecin $medecinId): self
    {
        $this->medecinId = $medecinId;

        return $this;
    }
 

}
