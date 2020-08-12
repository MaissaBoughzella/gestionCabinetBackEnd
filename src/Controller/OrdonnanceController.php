<?php

namespace App\Controller;
use App\Entity\Ordonnance;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;

class OrdonnanceController
{
    
    protected $em; 
    public $ord ;
 
    public function __construct(EntityManagerInterface $em)
    {
        $this->em=$em;
        $this->ord=new Ordonnance();
    }
   
    
    public function class(Request $req) : Ordonnance
    {
        $cons_id = $req->attributes->get('cons');
        $this->ord = $this->em->getRepository(Ordonnance :: class)
        ->findByConsId($cons_id);
        return $this->ord;   
    }
    

}
