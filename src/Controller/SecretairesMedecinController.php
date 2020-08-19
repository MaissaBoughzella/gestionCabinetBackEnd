<?php

namespace App\Controller;
use App\Entity\Secretaire;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;

class SecretairesMedecinController
{
    
    protected $em; 
    public $secretaire ;
 
    public function __construct(EntityManagerInterface $em)
    {
        $this->em=$em;
        $this->secretaire=new Secretaire();
    }
   
    
    public function class(Request $req)
    {
        $user_id = $req->attributes->get('medId');
        $this->secretaire = $this->em->getRepository(Secretaire :: class)
        ->findByMedId($user_id);
        return $this->secretaire;   
    }
    

}
