<?php

namespace App\Controller;

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
    	dump($request);
        return $this->render('default/home.html.twig', [
            'controller_name' => 'DefaultController'
        ]);
    }

	/**
	 * @return \GraphAware\Neo4j\Client\Client
	 */
	private function getNeo4jClient()
	{
		return $this->get('neo4j.client');
	}
}
