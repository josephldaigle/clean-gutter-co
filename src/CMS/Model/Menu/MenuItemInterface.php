<?php
/**
 * Created by Joseph Daigle.
 * Date: 2019-04-27
 * Time: 12:20
 */

namespace CleanGutter\CMS\Model\Menu;


/**
 * Interface MenuItemInterface.
 *
 * Describe a menu item.
 *
 * @package CleanGutter\CMS\Model\Menu
 */
interface MenuItemInterface
{
	public function getRouteName(): string;

	public function getDisplayText(): string;
}