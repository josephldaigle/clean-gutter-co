<?php
/**
 * Created by Joseph Daigle.
 * Date: 3/10/19
 * Time: 9:37 AM
 */

namespace CleanGutter\Test;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

/**
 * EmailTest.
 *
 * @package CleanGutter\Test
 */
class EmailTest extends WebTestCase
{
	/**
	 * @var mixed the service being used by the app to send emails
	 */
	private $emailer;

	/**
	 * EmailTest constructor.
	 */
	public function __construct()
	{
		parent::__construct();

		// boot the kernel
		self::bootKernel();

		// fetch emailer service
		$this->emailer = self::$container->get('mailer');
	}

	public function testEmailService()
	{
		$this->assertInstanceOf(\Swift_Mailer::class, $this->emailer, 'Unexpected mailer type');
		$this->assertTrue(
			method_exists($this->emailer, 'send'),
			'Mailer service is missing a send function.'
		);
	}
}