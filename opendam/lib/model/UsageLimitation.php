<?php


/**
 * Skeleton subclass for representing a row from the 'usage_limitation' table.
 *
 * 
 *
 * This class was autogenerated by Propel 1.4.2 on:
 *
 * jeu. 26 janv. 2012 16:31:12 CET
 *
 * You should add additional methods to this class to meet the
 * application requirements.  This class will only be generated as
 * long as it does not already exist in the output directory.
 *
 * @package    lib.model
 */
class UsageLimitation extends BaseUsageLimitation
{
	/*________________________________________________________________________________________________________________*/
	public function __toString()
	{
		return $this->getTitle();
	}
}
