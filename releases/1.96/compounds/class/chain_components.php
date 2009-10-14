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
class CompoundsChain_components extends XoopsObject
{

    function CompoundsChain_components($id = null)
    {
        $this->initVar('id', XOBJ_DTYPE_INT, null, false);
        $this->initVar('chain_id', XOBJ_DTYPE_INT, null, true);
		$this->initVar('perodic_id', XOBJ_DTYPE_INT, null, true);
		$this->initVar('number', XOBJ_DTYPE_INT, null, false);
		$this->initVar('super_composition', XOBJ_DTYPE_INT, null, false);
		$this->initVar('sub_composition', XOBJ_DTYPE_INT, null, false);		
		$this->initVar('weight', XOBJ_DTYPE_INT, null, true);
		$this->initVar('uid', XOBJ_DTYPE_INT, null, true);
	
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
class CompoundsChain_componentsHandler extends XoopsPersistableObjectHandler
{
    function __construct(&$db) 
    {
		$this->db = $db;
        parent::__construct($db, "chain_components", 'CompoundsChain_components', "id", "uid");
    }
}

?>