<?php

namespace App\Entity;
use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
/**
 * Patient
 * @ApiResource(
 *      collectionOperations={
 *      "get"={},
 *      "post"={},
 *      "get_by_user"={
 *          "method"="GET",
 *          "path"="/patients/getByUserId/{user}",
 *          "controller"="App\Controller\PatientController::class"
 *      },
 *   },
 * )
 * @ORM\Table(name="patient")
 *  @ORM\Entity(repositoryClass="App\Repository\PatientRepository")
 */
class Patient 
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
     * @var \DateTime|null
     *
     * @ORM\Column(name="date_naiss", type="date", nullable=true)
     */
    private $dateNaiss;


    /**
     * @var string|null
     *
     * @ORM\Column(name="profession", type="string", length=255, nullable=true)
     */
    private $profession;

    /**
     * @ORM\OneToMany(targetEntity=Rdv::class, mappedBy="patient")
     */
    private $rdvs;

    public function __construct()
    {        
        $this->rdvs = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDateNaiss(): ?\DateTimeInterface
    {
        return $this->dateNaiss;
    }

    public function setDateNaiss(?\DateTimeInterface $dateNaiss): self
    {
        $this->dateNaiss = $dateNaiss;

        return $this;
    }

    public function getProfession(): ?string
    {
        return $this->profession;
    }

    public function setProfession(?string $profession): self
    {
        $this->profession = $profession;

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

    /**
     * @return Collection|Rdv[]
     */
    public function getRdvs(): Collection
    {
        return $this->rdvs;
    }

    public function addRdv(Rdv $rdv): self
    {
        if (!$this->rdvs->contains($rdv)) {
            $this->rdvs[] = $rdv;
            $rdv->setPatient($this);
        }

        return $this;
    }

    public function removeRdv(Rdv $rdv): self
    {
        if ($this->rdvs->contains($rdv)) {
            $this->rdvs->removeElement($rdv);
            // set the owning side to null (unless already changed)
            if ($rdv->getPatient() === $this) {
                $rdv->setPatient(null);
            }
        }

        return $this;
    }



}
