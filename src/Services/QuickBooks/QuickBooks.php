<?php
/**
 * Created by Joseph Daigle.
 * Date: 4/21/19
 * Time: 12:37 PM
 */

namespace CleanGutter\Services\QuickBooks;


use Symfony\Component\DependencyInjection\Extension\ExtensionInterface;
use Symfony\Component\HttpKernel\Bundle\Bundle;

class QuickBooks extends Bundle
{
	public function getContainerExtension(): ?ExtensionInterface
	{
		return new QuickBooksExtension();
	}
}