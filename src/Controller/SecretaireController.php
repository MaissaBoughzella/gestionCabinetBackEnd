<?php

namespace App\Controller;
use App\Entity\Secretaire;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;

class SecretaireController
{
    
    protected $em; 
    public $secretaire ;
 
    public function __construct(EntityManagerInterface $em)
    {
        $this->em=$em;
        $this->secretaire=new Secretaire();
    }
   
    
    public function class(Request $req) : Secretaire
    {
        $user_id = $req->attributes->get('user_id');
        $this->secretaire = $this->em->getRepository(Secretaire :: class)
        ->findOneByUserId($user_id);
        return $this->secretaire;   
    }
    

}
