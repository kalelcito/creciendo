<?php

namespace FrontendBundle\Component\Authentication\Handler;

use Symfony\Component\Security\Http\Authentication\AuthenticationSuccessHandlerInterface;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
//use Symfony\Component\Security\Core\SecurityContext;
use Symfony\Component\Security\Core\Authorization\AuthorizationChecker;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\Routing\Router;

class LoginSuccessHandler implements AuthenticationSuccessHandlerInterface
{

    protected $router;
    protected $security;

    public function __construct(Router $router, AuthorizationChecker $security)
    {
        $this->router = $router;
        $this->security = $security;
    }

    public function onAuthenticationSuccess(Request $request, TokenInterface $token)
    {

        if ($this->security->isGranted('ROLE_SUPER_ADMIN'))
        {
            $response = new RedirectResponse($this->router->generate('homepage'));
        }
        elseif ($this->security->isGranted('ROLE_ADMIN'))
        {
            $response = new RedirectResponse($this->router->generate('homepage'));
        }
        elseif ($this->security->isGranted('ROLE_USER'))
        {
            // redirect the user to where they were before the login process begun.
            //$referer_url = $request->headers->get('referer');
            //$response = new RedirectResponse($referer_url);
            $hoy= new \DateTime();
            if($token->getUser()->getNiveles()->getId()==2){
                if($token->getUser()->getFechaRenovacion()==null || $hoy> $token->getUser()->getFechaRenovacion()){
                    $response= new RedirectResponse($this->router->generate('frontend_pagos_membresia', array('id' => $token->getUser()->getId())));

                }else{
                    $response = new RedirectResponse($this->router->generate('homepage'));
                }
            }else{
                $response = new RedirectResponse($this->router->generate('homepage'));
            }

        }

        return $response;
    }

}