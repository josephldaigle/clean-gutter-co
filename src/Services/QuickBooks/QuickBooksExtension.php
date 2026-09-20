<?php
/**
 * Created by Joseph Daigle.
 * Date: 4/21/19
 * Time: 1:01 PM
 */

namespace CleanGutter\Services\QuickBooks;


use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Extension\Extension;

class QuickBooksExtension extends Extension
{
	public function load(array $configs, ContainerBuilder $container): void
	{
		// TODO: Implement load() method.
	}

	public function getAlias(): string
	{
		return 'quickbooks';
	}
}