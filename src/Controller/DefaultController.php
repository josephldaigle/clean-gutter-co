<?php

namespace CleanGutter\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Routing\RouterInterface;

/**
 * DefaultController.
 *
 * Provides the home page.
 *
 * @package App\Controller
 */
class DefaultController extends AbstractController
{
	/**
	 * @param Request $request
	 *
	 * @return \Symfony\Component\HttpFoundation\Response
	 */
	public function getHome(Request $request, RouterInterface $router)
	{
        return $this->render('default/landing-page-v1.html.twig', [
            'controller_name' => 'DefaultController'
        ]);

//        return $this->render('pages/landing/default.html.twig', [
//            'controller_name' => 'DefaultController'
//        ]);
	}

//	/**
//	 * @param Request $request
//	 *
//	 * @return \Symfony\Component\HttpFoundation\Response
//	 */
//    public function city(Request $request, RouterInterface $router)
//    {
//        return $this->render('pages/city.html.twig', [
//            'controller_name' => 'DefaultController',
//	        'data' => ['customers' => ['count' => rand(1, 25)], 'city' => $request->getUri()]
//        ]);
//    }
}
