<?php
/**
 * Created by Joseph Daigle.
 * Date: 2019-06-01
 * Time: 23:40
 */

namespace CleanGutter\Http\Model;


use Symfony\Component\HttpFoundation\Request;


/**
 * Interface TemplateDataProviderInterface.
 *
 * Describe a class that provides data to the request object, under 'template_data' key.
 *
 * @package CleanGutter\Http\Model
 */
interface TemplateDataProviderInterface
{
	/**
	 * @param Request $request
	 *
	 * @return void
	 */
	public function getTemplateData(Request $request);
}