<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

class SecurityController extends Controller
{
    /**
     * @Route("/Login", name="login")
     */
    public function LoginAction(Request $request, AuthenticationUtils $authenticationUtils)
    {
        $errors=$authenticationUtils->getLastAuthenticationError();
        $lastUserName=$authenticationUtils->getLastUsername();

        return $this->render('Security/login.html.twig', array(
            'errors'=>$errors,
            'username'=>$lastUserName,
        ));
    }

}
