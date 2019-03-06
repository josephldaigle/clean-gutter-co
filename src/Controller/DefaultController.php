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
	 * @Route("/", name="home")
	 *
	 * @param Request $request
	 *
	 * @return \Symfony\Component\HttpFoundation\Response
	 */
    public function index(Request $request)
    {
        return $this->render('default/landing-page-v1.html.twig', [
            'controller_name' => 'DefaultController'
        ]);
    }
}
