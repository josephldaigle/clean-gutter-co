<?php

namespace CleanGutter\Controller;

use CleanGutter\Entity\FormLead;
use Doctrine\ORM\EntityManagerInterface;
use Psr\Log\LoggerInterface;
use Symfony\Bridge\Twig\Mime\TemplatedEmail;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Email;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Validator\Validator\ValidatorInterface;

class QuotesController extends AbstractController
{
	private const FROM_ADDRESS = 'joe@cleangutterco.com';
	private const ADMIN_ADDRESS = 'joe@cleangutterco.com';

	#[Route('/api/quotes', name: 'quotes', methods: ['POST'])]
	public function postFormLead(Request $request, ValidatorInterface $validator, EntityManagerInterface $entityManager, MailerInterface $mailer, LoggerInterface $logger)
	{
		// validate form input

		// create a lead object
		$lead = new FormLead();
		$lead->setName($request->request->get('name'));
		$lead->setEmail($request->request->get('email'));
		$lead->setAddress($request->request->get('address'));
		$lead->setPhoneNumber($request->request->get('phone_number'));

		// persist lead — must succeed before we attempt any email so a mail
		// outage never causes a submission to be lost.
		$entityManager->persist($lead);
		$entityManager->flush();

		$this->sendAdminNotification($mailer, $logger, $lead);
		$this->sendCustomerConfirmation($mailer, $logger, $lead);

		return new JsonResponse(['message' => 'You\'ve made a great choice! We will contact you soon to schedule your free quote.'], 200);
	}

	private function sendAdminNotification(MailerInterface $mailer, LoggerInterface $logger, FormLead $lead): void
	{
		try {
			$message = (new Email())
				->from(self::FROM_ADDRESS)
				->to(self::ADMIN_ADDRESS)
				->subject('New Gutter Quote Request')
				->html($this->renderView('email/admin/notify-quote-requested.html.twig', ['formLead' => $lead]));

			$mailer->send($message);
		} catch (\Throwable $exception) {
			$logger->error('Admin notification email failed for quote request', [
				'notification' => 'admin',
				'form_lead_id' => $lead->getId(),
				'exception' => $exception,
			]);
		}
	}

	private function sendCustomerConfirmation(MailerInterface $mailer, LoggerInterface $logger, FormLead $lead): void
	{
		$customerEmail = $lead->getEmail();

		if (empty($customerEmail)) {
			$logger->warning('Customer confirmation email skipped: no customer email on submission', [
				'notification' => 'customer',
				'form_lead_id' => $lead->getId(),
			]);
			return;
		}

		try {
			// TemplatedEmail + both html/text templates -> multipart/alternative.
			// Single-part text/html was arriving empty in some external inboxes
			// because clients sanitizing HTML had no text/plain fallback to fall
			// back to.
			$message = (new TemplatedEmail())
				->from(self::FROM_ADDRESS)
				->to($customerEmail)
				->subject('We received your request | Clean Gutter Co')
				->htmlTemplate('email/customer/quote-received.html.twig')
				->textTemplate('email/customer/quote-received.txt.twig')
				->context(['formLead' => $lead]);

			$mailer->send($message);
		} catch (\Throwable $exception) {
			$logger->error('Customer confirmation email failed for quote request', [
				'notification' => 'customer',
				'form_lead_id' => $lead->getId(),
				'customer_email' => $customerEmail,
				'exception' => $exception,
			]);
		}
	}
}
