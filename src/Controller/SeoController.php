<?php
/**
 * Created by Joseph Daigle.
 * Date: 3/15/19
 * Time: 6:51 PM
 */

namespace CleanGutter\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\ResponseHeaderBag;

/**
 * SeoController.
 *
 * @package CleanGutter\Controller
 */
class SeoController extends AbstractController
{
	/**
	 * @param Request $request
	 *
	 * @return \Symfony\Component\HttpFoundation\BinaryFileResponse
	 */
	public function getSitemapXml( Request $request )
	{
		return $this->file('sitemap.xml', 'Sitemap - www.cleangutterco.com', ResponseHeaderBag::DISPOSITION_INLINE);
	}
}