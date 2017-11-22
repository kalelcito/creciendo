<?php
/**
 * Created by PhpStorm.
 * User: victor
 * Date: 24/09/16
 * Time: 9:32 PM
 */

namespace FrontendBundle\Component\Authentication\Handler;


use Symfony\Component\Security\Http\Logout\LogoutSuccessHandlerInterface;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Bundle\FrameworkBundle\Routing\Router;

class LogoutSuccessHandler implements LogoutSuccessHandlerInterface
{

    protected $router;

    public function __construct(Router $router)
    {
        $this->router = $router;
    }

    public function onLogoutSuccess(Request $request)
    {
        // redirect the user to where they were before the login process begun.
        //$referer_url = $request->headers->get('referer');
        //$response = new RedirectResponse($referer_url);

        //$session = $request->getSession();
        //$session->set('compra',array());
        //$session->set('total',0);
        //$session->set('cantidad',0);


        $response = new RedirectResponse($this->router->generate('homepage'));

        return $response;
    }

}

