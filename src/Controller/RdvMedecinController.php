<?php

namespace App\Controller;
use App\Entity\Rdv;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;

class RdvMedecinController
{
    
    protected $em; 
    public $rdv ;
 
    public function __construct(EntityManagerInterface $em)
    {
        $this->em=$em;
        $this->rdv=new Rdv();
    }
   
    
    public function class(Request $req)
    {
        $med = $req->attributes->get('medecin');
        $this->rdv = $this->em->getRepository(Rdv :: class)
        ->findByMedecin($med);
        return $this->rdv;
    }

}