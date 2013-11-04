<?php


/**
 * Skeleton subclass for performing query and update operations on the 'file_related' table.
 *
 * 
 *
 * This class was autogenerated by Propel 1.4.2 on:
 *
 * lun. 16 janv. 2012 17:00:23 CET
 *
 * You should add additional methods to this class to meet the
 * application requirements.  This class will only be generated as
 * long as it does not already exist in the output directory.
 *
 * @package    lib.model
 */
class FileRelatedPeer extends BaseFileRelatedPeer 
{
	/*________________________________________________________________________________________________________________*/
	public static function retrieveByFileIdToAndFileIdFrom($file_id_to, $file_id_from)
	{
		$c = new Criteria();
		$c->add(self::FILE_ID_TO, $file_id_to);
		$c->add(self::FILE_ID_FROM, $file_id_from);

		return self::doSelectOne($c);
	}
}
