<?php
/**
 * Created by Joseph Daigle.
 * Date: 3/15/19
 * Time: 6:51 PM
 */

namespace CleanGutter\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;


class SeoController extends AbstractController
{
	public function getSitemapXml( Request $request )
	{
		return $this->file('/sitemap.xml');
	}
}