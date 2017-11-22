<?php
/**
 * Created by PhpStorm.
 * User: victor
 * Date: 17/08/17
 * Time: 18:10
 */


namespace CoreBundle\EventSubscriber;

//use AppBundle\Entity\User;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpKernel\Event\FilterControllerEvent;
use Symfony\Component\Routing\Router;
use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorageInterface;

class TokenSubscriber implements EventSubscriberInterface
{
    protected $twig;
    protected $tokenStorage;
    protected $router;

    function __construct(\Twig_Environment $twig, TokenStorageInterface $tokenStorage, Router $router)
    {
        $this->twig = $twig;
        $this->tokenStorage = $tokenStorage;
        $this->router=$router;
    }

    public static function getSubscribedEvents()
    {
        return [
            'kernel.controller' => 'onKernelController'
        ];
    }

    public function onKernelController(FilterControllerEvent $event)
    {
        $token = $this->tokenStorage->getToken();
        //$controller = $event->getController()
        $request = $event->getRequest();

        // Muestra la ruta
        //echo  $request->attributes->get('_route');
        // Muestra el controlador
        //echo $request->attributes->get('_controller');

        //print_r($controller);
        if ($token !== null) {
            $user = $token->getUser();
            if($user!="anon."){
                if( strpos($request->attributes->get('_controller'), 'FrontendBundle') !== false){
                if($user->getNiveles()->getId()==2){
                    if(strpos($request->attributes->get('_route'), 'boletin') !== false || strpos($request->attributes->get('_route'), 'membresias') !== false || strpos($request->attributes->get('_route'), 'frontend_programa') !== false || strpos($request->attributes->get('_controller'), 'UsuariosController') !== false || strpos($request->attributes->get('_controller'), 'DefaultController') !== false ){

                    }else{
                        $hoy= new \DateTime();
                        if($user->getFechaRenovacion()==null || $hoy> $user->getFechaRenovacion()){
                            $redirectUrl=$this->router->generate('frontend_pagos_membresia', array('id' => $user->getId()));
                                $event->setController(function() use ($redirectUrl) {
                                    return new RedirectResponse($redirectUrl);
                                });
                    }

                    }

                }
                }
            }


            /*if ($user instanceof User) {
                $timezone = $user->getTimezone();
                if ($timezone !== null) {
                    $this->twig->getExtension('core')->setTimezone($timezone);
                }
            }*/
        }
    }
}