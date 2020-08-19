<?php

namespace App\Controller;
use App\Entity\User;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;


class EmailsController
{
    
    protected $em; 
    public $user ;
    public $message ;
 
    public function __construct(EntityManagerInterface $em)
    {
        $this->em=$em;
        $this->user=new User();
        $this->message = 'Email ou mot de passe incorrect';
    }
   
    
    public function class(Request $req) : User
    {
        $email = $req->attributes->get('email');
        $this->user = $this->em->getRepository(User :: class)
        ->findOneByEmail($email);
        if ($this->user) {
            if (password_verify ( $req->attributes->get('pwd') , $this->user->getPassword() )) {
                return $this->user;
            }
            throw new \Exception("Email ou mot de passe incorrect");
        }
        throw new \Exception("Email ou mot de passe incorrect. ");
        
    }
    

}
