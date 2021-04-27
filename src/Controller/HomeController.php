<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    /**
     * @Route("/home", name="home")
     */
    public function index(): Response
    {
        $arreglo= array();
        for ($x = 1; $x <= 20; $x++){
            array_push($arreglo, "titulo");
        }
        
        return $this->render('home/index.html.twig', [
            'arreglo' => $arreglo
        ]);
    }
}
