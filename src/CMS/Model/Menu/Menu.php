<?php
/**
 * Created by Joseph Daigle.
 * Date: 2019-04-26
 * Time: 16:09
 */

namespace CleanGutter\CMS\Model\Menu;


/**
 * Menu.
 *
 * Define a navigation menu.
 *
 * @package CleanGutter\CMS\Model\Menu
 */
class Menu
{
	/**
	 * @var array
	 */
	private $items = [];


	public function __construct(...$items)
	{
		$this->items = $items;
	}

	/**
	 * @return array
	 */
	public function fetchAll()
	{
		return $this->items;
	}

}