<?php
// $Autho: wishcraft $

if (!defined('XOOPS_ROOT_PATH')) {
	exit();
}
/**
 * Class for compounds
 * @author Simon Roberts <simon@xoops.org>
 * @copyright copyright (c) 2009-2003 XOOPS.org
 * @package kernel
 */
class CompoundsCompound extends XoopsObject
{

    function CompoundsCompound($id = null)
    {
        $this->initVar('id', XOBJ_DTYPE_INT, null, false);
        $this->initVar('chain_id', XOBJ_DTYPE_INT, null, true);
		$this->initVar('alias', XOBJ_DTYPE_TXTBOX, null, false, 255);
		$this->initVar('symbol', XOBJ_DTYPE_TXTBOX, null, true, 255);
		$this->initVar('hyposise', XOBJ_DTYPE_TXTAREA, null, false);
		$this->initVar('process', XOBJ_DTYPE_TXTAREA, null, true);
		$this->initVar('synopisise', XOBJ_DTYPE_TXTAREA, null, false);
		$this->initVar('uid', XOBJ_DTYPE_INT, null, true);
		$this->initVar('created', XOBJ_DTYPE_INT, null, true);
		$this->initVar('chem_tags', XOBJ_DTYPE_TXTBOX, null, false, 255);
		$this->initVar('comments', XOBJ_DTYPE_INT, null, false);
		$this->initVar('votes', XOBJ_DTYPE_INT, null, false);
		$this->initVar('stars', XOBJ_DTYPE_DECIMAL, null, false);
		$this->initVar('hits', XOBJ_DTYPE_INT, null, false);
		$this->initVar('runners', XOBJ_DTYPE_INT, null, false);
    }

}


/**
* XOOPS compounds handler class.
* This class is responsible for providing data access mechanisms to the data source
* of XOOPS user class objects.
*
* @author  Simon Roberts <simon@chronolabs.org.au>
* @package kernel
*/
class CompoundsCompoundHandler extends XoopsPersistableObjectHandler
{

	var $_numberof = 	array(	0	=>	'--',
								1	=>	'1',
								2	=>	'2',
								3	=>	'3',
								4	=>	'4',
								5	=>	'5',
								6	=>	'6',
								7	=>	'7',
								8	=>	'8',
								9	=>	'9',
								10	=>	'10',
								11	=>	'11',
								12	=>	'12',
								13	=>	'13',
								14	=>	'14',
								15	=>	'15',
								16	=>	'16',
								17	=>	'17',
								18	=>	'18',
								19	=>	'19',
								20	=>	'20',
								21	=>	'21',
								22	=>	'22',
								23	=>	'24',
								24	=>	'25',
								25	=>	'25',
								26	=>	'26',
								27	=>	'27',
								28	=>	'28',
								29	=>	'29',
								30	=>	'30',
								31	=>	'31',
								32	=>	'cyl',
								33	=>	'iso',
								34	=>	'nux'
							);

	var $_composition = array(	0	=>	'--',
								1	=>	'1',
								2	=>	'2',
								3	=>	'3',
								4	=>	'4',
								5	=>	'5',
								6	=>	'6',
								7	=>	'7',
								8	=>	'8',
								9	=>	'9',
								10	=>	'10',
								11	=>	'11',
								12	=>	'12',
								13	=>	'13',
								14	=>	'14',
								15	=>	'15',
								16	=>	'16',
								17	=>	'17',
								18	=>	'18',
								19	=>	'19',
								20	=>	'20',
								21	=>	'21',
								22	=>	'22',
								23	=>	'24',
								24	=>	'25',
								25	=>	'25',
								26	=>	'26',
								27	=>	'27',
								28	=>	'28',
								29	=>	'29',
								30	=>	'30',
								31	=>	'31',
								32	=>	'32'
							);
							
    function __construct(&$db) 
    {
		$this->db = $db;
        parent::__construct($db, "compound", 'CompoundsCompound', "id", "alias");
    }
	
	function getSymbolisation($ret_CompoundForm)
	{
		$periodicalHandler =& xoops_getmodulehandler('periodical', 'compounds');
		$periodics =& $periodicalHandler->getObjects(NULL, true);
		extract($ret_CompoundForm);
		foreach ( $periodical as $yy => $value ) {
			if ($number[$yy]!=0||$periodical[$yy]!=0||$composition[$yy][1]!=0||$composition[$yy][2]!=0)
			{
				if ($number[$yy]!=0)
					$ret .= '%'.$number[$yy];
				if ($periodical[$yy]!=0)
					$ret .= '^'.$periodics[$periodical[$yy]]->getVar('symbol');
				if ($composition[$yy][1]!=0)
					$ret .= '#'.$composition[$yy][1];										
				if ($composition[$yy][2]!=0)
					$ret .= '*'.$composition[$yy][2];										

			}
		}
		return $ret;
	}

	function renderSymbolisation($symbolisism, $composition = NULL, $numberof = NULL)
    {
						
		if (!empty($composition)&&is_array($composition))
			$this->_composition = $composition;
		else {
			$compositionHandler =& xoops_getmodulehandler('composite', 'compounds');
			$compositions = $compositionHandler->getObjects(NULL, true);
			if (is_array($compositions)) {
				$this->_composition = array(0=>'---');
				foreach ($compositions as $id => $object)
					$this->_composition[$id] = $object->getVar('symbol');
			}
			
		}
		
		if (!empty($numberof)&&is_array($numberof))
			$this->_numberof = $numberof;
		else {
			$compositionHandler =& xoops_getmodulehandler('numberof', 'compounds');
			$numberofs = $compositionHandler->getObjects(NULL, true);
			if (is_array($numberofs)) {
				$this->_numberof = array(0=>'---');
				foreach ($numberofs as $id => $object)
					$this->_numberof[$id] = $object->getVar('symbol');
			}
		}
		
		$crawled = $this->crawlSymbolisation($symbolisism);
		$repo = array('%', '^', '#', '*');
		
		foreach($repo as $id => $key)
			foreach($crawled[$key] as $did => $value) {
				if (count($crawled[$key])>$total)
					$total = count($crawled[$key]);
					
				switch($key){
				case '%':
					$crawled[$key][$did] = '<font style="font-style:oblique;">'.$this->_numberof[$value].'</font>';
					break;
				case '^':
					$crawled[$key][$did] = '<font style="font-style:normal;">'.$value.'</font>';
					break;
				case '#':
					$crawled[$key][$did] = '<sup>'.$this->_composition[$value].'</sup>';
					break;
				case '*':
					$crawled[$key][$did] = '<sub>'.$this->_composition[$value].'</sub>';
					break;
				
				}
			}
		
		for($r=0; $r<$total; $r++)
			foreach($repo as $id => $key) {
				switch($key){
				default:
					if (isset($crawled[$key][$r]))
						$ret .= $crawled[$key][$r];
					break;
				case '*':
					if (isset($crawled[$key][$r+1]))
						$ret .= $crawled[$key][$r+1];
					break;
				
				}
			}
			
		return $ret;
	}	
	
	private function crawlSymbolisation($symbolisism)
	{
		$ii=0;
		$ret = array();
		$repo = array('%', '^', '#', '*');
		for($r=0; $r<=strlen($symbolisism); $r++) {
			$found=false;
			foreach($repo as $id => $key) {
				if (substr($symbolisism, $r, 1) === $key) {
					$found=true;
					$symbol = $key;
					if ($key == '*')
						$ii++;
				}
			}

			if ($found===false)			
			$ret[$symbol][$ii] .= substr($symbolisism, $r, 1);
				
		}
		return $ret;
	}
}

?>