<?php
/**
 * Created by Joseph Daigle.
 * Date: 4/21/19
 * Time: 12:37 PM
 */

namespace CleanGutter\Services\QuickBooks;


use Symfony\Component\HttpKernel\Bundle\Bundle;


/**
 * QuickBooks.
 *
 * Provides access to
 *
 * @package CleanGutter\Services\QuickBooks
 */
class QuickBooks extends Bundle
{
	/**
	 * @inheritdoc
	 */
	public function getContainerExtension()
	{
		return new QuickBooksExtension();
	}
}