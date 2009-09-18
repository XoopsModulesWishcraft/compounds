<?php
// $Autho: wishcraft $

if (!defined('XOOPS_ROOT_PATH')) {
	exit();
}
/**
 * Class for compunds
 * @author Simon Roberts <simon@xoops.org>
 * @copyright copyright (c) 2009-2003 XOOPS.org
 * @package kernel
 */
class CompoundsPeriodical extends XoopsObject
{

    function CompoundsPeriodical($id = null)
    {
        $this->initVar('id', XOBJ_DTYPE_INT, null, false);
        $this->initVar('symbol', XOBJ_DTYPE_TXTBOX, null, true, 4);
        $this->initVar('weight', XOBJ_DTYPE_INT, null, true);
		$this->initVar('period', XOBJ_DTYPE_INT, null, true);
		$this->initVar('group', XOBJ_DTYPE_INT, null, true);
        $this->initVar('type', XOBJ_DTYPE_ENUM, null, true, false, false, array('base','lanthanoids','actinoids'));
    }

}


/**
* XOOPS policies handler class.
* This class is responsible for providing data access mechanisms to the data source
* of XOOPS user class objects.
*
* @author  Simon Roberts <simon@chronolabs.org.au>
* @package kernel
*/
class CompoundsPeriodicalHandler extends XoopsPersistableObjectHandler
{
    function __construct(&$db) 
    {
		$this->db = $db;
        parent::__construct($db, "periodical", 'CompoundsPeriodical', "id", "symbol");
    }
}

?>