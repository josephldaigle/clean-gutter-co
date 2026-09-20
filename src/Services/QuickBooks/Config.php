<?php

namespace CleanGutter\Services\QuickBooks;

use Symfony\Component\Config\Definition\ConfigurationInterface;
use Symfony\Component\Config\Definition\Builder\TreeBuilder;

class Config implements ConfigurationInterface
{
	public function getConfigTreeBuilder(): TreeBuilder
	{
		$treeBuilder = new TreeBuilder('quickbooks');
		$treeBuilder->getRootNode()
			->children()
				->scalarNode('quickbooks_auth_url')
					->isRequired()
					->cannotBeEmpty()
					->end()
				->scalarNode('quickbooks_token_url')
					->isRequired()
					->cannotBeEmpty()
					->end()
				->scalarNode('quickbooks_oauth_scope')
					->isRequired()
					->cannotBeEmpty()
					->end()
				->scalarNode('quickbooks_oauth_redirect_url')
					->isRequired()
					->cannotBeEmpty()
					->end()
				->scalarNode('quickbooks_client_id')
					->isRequired()
					->cannotBeEmpty()
					->end()
				->scalarNode('quickbooks_secret')
					->isRequired()
					->cannotBeEmpty()
					->end()
			->end();

		return $treeBuilder;
	}
}
