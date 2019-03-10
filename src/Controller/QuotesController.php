<?php
/**
 * Created by Joseph Daigle.
 * Date: 3/8/19
 * Time: 9:28 PM
 */

namespace CleanGutter\Controller;

use CleanGutter\Entity\FormLead;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Validator\Validator\ValidatorInterface;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;

/**
 * QuotesController.
 *
 * @package CleanGutter\Controller
 */
class QuotesController
{
	/**
	 * @Route("/api/quotes", name="quotes", methods={"POST"})
	 *
	 * @param Request            $request
	 * @param ValidatorInterface $validator
	 *
	 * @return JsonResponse
	 */
	public function postFormLead(Request $request, ValidatorInterface $validator, EntityManagerInterface $entityManager)
	{
//		dump($request, $validator, $lead);

		// validate _csrf_token

		// validate form input

		// persist lead
		$lead = new FormLead();
		$lead->setName($request->request->get('name'));
		$lead->setEmail($request->request->get('email'));
		$lead->setAddress($request->request->get('address'));
		$lead->setPhoneNumber($request->request->get('phone_number'));
		$lead->setReason(
			($request->request->get('reason') === '1') ? '' : ''
		);

		// tell Doctrine you want to (eventually) save the Product (no queries yet)
		$entityManager->persist($lead);

		// actually executes the queries (i.e. the INSERT query)
		$entityManager->flush();

		return new JsonResponse(['message' => 'Success! We will contact you soon to schedule your free quote.'], 200);
	}
}