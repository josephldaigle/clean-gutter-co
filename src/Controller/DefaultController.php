<?php

namespace CleanGutter\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;

/**
 * DefaultController.
 *
 * @package CleanGutter\Controller
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
		return $this->render(
		    'page/marketing/city-landing-page.html.twig',
            [
			'controller_name' => 'DefaultController'
            ]
        );
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
        'question' => 'How much does it cost?',
        'answer' => 'Every home is different, so we provide free quotes rather than one-size-fits-all pricing. We\'ll inspect your gutters and provide a straightforward quote before any work begins.'
      ],
      [
        'question' => 'Is the vacuum really powerful enough?',
        'answer' => 'Yes. Our commercial-grade vacuum system is powerful enough to remove leaves, pine needles, mud, and even small root systems from neglected gutters. <a class="text-link" href="" data-toggle="modal" data-target="#vacuum-vid-modal">See it in action.</a>'
      ],
      [
        'question' => 'How do I know my gutters are clean?',
        'answer' => 'Our equipment includes a high-definition camera that allows us to inspect your gutters as we clean them. We can even record the process so you can see the results for yourself.'
      ],
      [
        'question' => 'Do you clean second and third-story gutters?',
        'answer' => 'Yes. Our equipment can safely reach gutters up to three stories high, allowing us to clean many multi-story homes without walking on the roof.'
      ],
      [
        'question' => 'Are you insured?',
        'answer' => 'Yes. We carry general liability insurance through <a class="text-link" href="https://www.hiscox.com/" target="_blank" rel="noopener">Hiscox Insurance Company, Inc.</a>. You can also <a class="text-link" data-toggle="modal" data-target="#insuranceCertModal" href="#insuranceCertModal">view our certificate of insurance.</a>'
      ],
      [
        'question' => 'Do I need to be home during the service?',
        'answer' => 'Not usually. As long as we have access to your gutters and there are no loose pets in the work area, we can complete most jobs while you\'re away. We\'ll email your invoice when the work is complete.'
      ],
      [
        'question' => 'How often should my gutters be cleaned?',
        'answer' => 'Most homes benefit from gutter cleaning once a year, although properties with heavy tree coverage may need more frequent service. We\'ll recommend a cleaning schedule after inspecting your home.'
      ],
      [
        'question' => 'What happens to the debris?',
        'answer' => 'We remove the debris from your property and dispose of it properly. We won\'t leave it in your yard or by the curb.'
      ]
    ];

		return $this->render('page/faq.html.twig', [
			'questions' => $questions,
			'controller_name' => 'DefaultController'
		]);
	}

	/**
	 * @Route("/our-work", name="our-work", methods={"GET"})
	 *
	 * @param Request $request
	 *
	 * @return \Symfony\Component\HttpFoundation\Response
	 */
	public function getOurWork(Request $request)
	{
		return $this->render('page/our-work.html.twig', [
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
