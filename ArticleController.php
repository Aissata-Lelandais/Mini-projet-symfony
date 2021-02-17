<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class ArticleController extends AbstractController
{
    private $age;
     private $name; 
     private $sportsman; 
     private $createdAt;
    /**
     * @Route("/articles", name="article_create")
     * @
     */
    public function getName()
    {
        return $this->name;
    }
    // Issers
public function isSportsman() 
{
    return $this->sportsman; 
}
   
}
