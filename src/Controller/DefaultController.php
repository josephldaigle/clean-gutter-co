<?php

namespace CleanGutter\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;

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
	 * @throws \LogicException
	 */
	public function getHome(Request $request)
	{
        return $this->render('page/home.html.twig', [
            'controller_name' => 'DefaultController'
        ]);
	}

	/**
	 * @return \Symfony\Component\HttpFoundation\Response
	 * @throws \LogicException
	 */
	public function getLandingPage()
	{
		return $this->render('default/landing-page-v1.html.twig', [
			'controller_name' => 'DefaultController'
		]);
	}

	/**
	 * @param Request $request
	 *
	 * @return \Symfony\Component\HttpFoundation\Response
	 * @throws \LogicException
	 */
	public function getFaq(Request $request)
	{
		$questions = [
			[
				'question' => 'Is the vacuum really powerful enough to clean my gutters?',
				'answer' => 'YES! We wouldn\'t waste your time. Our vacuum uses those big plugs (240v) like your dryer, and has three motors. It can lift 12\'\' saplings out of your gutters, and shreds through leaves like butter. You can see it in action here or check out the manufacturers product page to learn more.'
			],
			[
				'question' => 'What kind of insurance do you have?',
				'answer' => 'We carry a general liability policy from Hiscox Insurance Company, Inc. It covers any accidental damages to your home, and some bodily injury.'
			],
			[
				'question' => 'Do I have to be home when you clean my gutters?',
				'answer' => 'Not necessarily. As long as we can access all of your gutters, and you don\'t have any free-roaming animals, we should be able to complete the job without you being home. We\'ll email you the invoice, and you can pay online.'
			],
			[
				'question' => 'How often should I have my gutters cleaned?',
				'answer' => 'Generally, twice a year - in late autumn and early spring. You may need more or less frequent cleanings depending on how many trees there are around your home. We\'ll let you know once we\'ve had a chance to view your property first-hand, help you establish a regular cleaning schedule, so your gutters are able to do their job year-round.'
			]
		];

		return $this->render('page/faq.html.twig', [
			'questions' => $questions,
			'controller_name' => 'DefaultController'
		]);
	}
}
