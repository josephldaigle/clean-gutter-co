<?php

namespace CleanGutter\Test;

use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;
use Symfony\Component\Mailer\MailerInterface;

class EmailTest extends KernelTestCase
{
	public function testMailerServiceIsAvailable()
	{
		self::bootKernel();
		$mailer = self::getContainer()->get('mailer');

		$this->assertInstanceOf(MailerInterface::class, $mailer, 'Unexpected mailer type');
		$this->assertTrue(
			method_exists($mailer, 'send'),
			'Mailer service is missing a send function.'
		);
	}
}
