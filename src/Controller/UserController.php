<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;
use App\Entity\User;


class UserController extends AbstractController
{
    /**
     * @Route("/login", name="login")
     */
    public function login(): Response
    {
        return $this->render('login.html.twig');
    }

      /**
     * @Route("/validate_login", name="validate_login")
     */
    public function validate_login(Request $request)
    {
        $email=$request->request->get("email");
        $password=$request->request->get("password");

        $em = $this->getDoctrine()->getManager();

        $emailsearch = $em->getRepository(User::class)->findByEmail($email);
        $passwordsearch= $em->getRepository(User::class)->findByPassword($password);
        
        if (count($emailsearch) > 0  && count($passwordsearch) > 0 ){
            return $this->render('vistausuariologueado.html.twig', [
                'email' => $email]);
        } 
        else {
            return $this->redirectToRoute('login',['mensaje' =>"datos erroneos"]);
        }
      
    }
}