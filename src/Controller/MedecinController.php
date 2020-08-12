<?php

namespace App\Controller;
use App\Entity\Medecin;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;

class MedecinController
{
    
    protected $em; 
    public $medecin ;
 
    public function __construct(EntityManagerInterface $em)
    {
        $this->em=$em;
        $this->medecin=new Medecin();
    }
   
    
    public function class(Request $req) : Medecin
    {
        $user_id = $req->attributes->get('user_id');
        $this->medecin = $this->em->getRepository(Medecin :: class)
        ->findOneByUserId($user_id);
        return $this->medecin;   
    }
    

}
