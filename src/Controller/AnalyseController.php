<?php

namespace App\Controller;
use App\Entity\Analyse;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;

class AnalyseController
{
    
    protected $em; 
    public $analyse ;
 
    public function __construct(EntityManagerInterface $em)
    {
        $this->em=$em;
        $this->analyse=new Analyse();
    }
   
    
    public function class(Request $req)
    {
        $cons = $req->attributes->get('cons_id');
        $this->analyse = $this->em->getRepository(Analyse :: class)
        ->findByCons($cons);
        return $this->analyse;
    }

}