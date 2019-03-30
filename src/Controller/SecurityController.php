<?php
/**
 * Created by Joseph Daigle.
 * Date: 3/13/19
 * Time: 11:22 PM
 */

namespace CleanGutter\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

/**
 * SecurityController.
 *
 * @package CleanGutter\Controller
 */
class SecurityController extends AbstractController
{
	public function getLogin()
	{
		return $this->render('pages/login.html.twig');
	}
}