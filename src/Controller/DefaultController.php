<?php

namespace CleanGutter\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

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
	public function getHome(Request $request)
	{
        return $this->render('pages/home.html.twig', [
            'controller_name' => 'DefaultController'
        ]);
	}

	/**
	 * @return \Symfony\Component\HttpFoundation\Response
	 */
	public function getLandingPage()
	{
		return $this->render('default/landing-page-v1.html.twig', [
			'controller_name' => 'DefaultController'
		]);
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
