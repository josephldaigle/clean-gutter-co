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
            'controller_name' => 'DefaultController',
        ]);
	}

	/**
	 * @param Request $request
	 *
	 * @return \Symfony\Component\HttpFoundation\Response
	 * @throws \LogicException
	 */
	public function getLandingPage(Request $request)
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
				'question' => 'Is the vacuum really powerful enough?',
				'answer' => 'YES! We wouldn\'t waste your time. Our vacuum uses those big plugs (240v) like your dryer, and has three motors. It can lift 12\'\' saplings out of your gutters, and shreds through leaves like butter. You can see it in action here or check out the manufacturers product page to learn more.'
			],
			[
				'question' => 'What kind of insurance do we have?',
				'answer' => 'We carry a general liability policy from <a class="text-link"" href="https://www.hiscox.com/">Hiscox Insurance Company, Inc.</a> It covers any accidental damages to your home, and some bodily injury. You can <a class="text-link" data-toggle="modal" data-target="#insuranceCertModal" href="#insuranceCertModal">view our Coverage Certification here.</a>'
			],
			[
				'question' => 'Do you have to be home when we clean your gutters?',
				'answer' => 'Not necessarily. As long as we can access all of your gutters, and you don\'t have any free-roaming animals, we should be able to complete the job without you being home. We\'ll email you the invoice, and you can pay online.'
			],
			[
				'question' => 'How often should you clean your gutters?',
				'answer' => 'Generally, twice a year - in early autumn and before the spring rains. You may need more or less frequent cleanings depending on how many trees there are around your home. We\'ll provide you with a recommendation once we\'ve had a chance to view your property first-hand, and help you establish a regular cleaning schedule.'
			]
		];

		return $this->render('page/faq.html.twig', [
			'questions' => $questions,
			'controller_name' => 'DefaultController'
		]);
	}

	/**
	 * @param Request $request
	 *
	 * @return \Symfony\Component\HttpFoundation\Response
	 * @throws \LogicException
	 */
	public function getAbout(Request $request)
	{
		return $this->render('page/about.html.twig', [
			'controller_name' => 'DefaultController'
		]);
	}


	/**
	 * @param Request $request
	 *
	 * @return \Symfony\Component\HttpFoundation\Response
	 * @throws \LogicException
	 */
	public function getContact(Request $request)
	{
		return $this->render('page/contact.html.twig', [
			'controller_name' => 'DefaultController'
		]);
	}

	/**
	 * @param Request $request
	 *
	 * @return \Symfony\Component\HttpFoundation\Response
	 * @throws \LogicException
	 */
	public function getTermsOfService( Request $request )
	{
		return $this->render('page/terms-of-service.html.twig', [
			'controller_name' => 'DefaultController'
		]);
	}

	public function getPrivacyPolicy( Request $request )
	{
		return $this->render('page/privacy-policy.html.twig', [
			'controller_name' => 'DefaultController'
		]);
	}
}
