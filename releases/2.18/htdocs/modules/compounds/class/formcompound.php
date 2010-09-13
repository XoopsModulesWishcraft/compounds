<?php
/*
 You may not change or alter any portion of this comment or credits
 of supporting developers from this source code or any supporting source code 
 which is considered copyrighted (c) material of the original comment or credit authors.
 
 This program is distributed in the hope that it will be useful,
 but WITHOUT ANY WARRANTY; without even the implied warranty of
 MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.
*/

/**
 *  Compounds Form Class Elements
 *
 * @copyright       The Compounds Project http://sourceforge.net/projects/Compounds/  
 * @license         http://www.fsf.org/copyleft/gpl.html GNU public license
 * @package         kernel
 * @subpackage      form
 * @since           2.0.0
 * @author          Kazumi Ono <onokazu@Compounds.org>
 * @author          John Neill <catzwolf@Compounds.org>
 * @version         $Id: formCompound.php 3295 2009-07-01 02:26:05Z beckmi $
 */
defined('XOOPS_ROOT_PATH') or die('Restricted access');

/**
 * A text Compound
 *
 * @author 		Kazumi Ono <onokazu@Compounds.org>
 * @author 		John Neill <catzwolf@Compounds.org>
 * @copyright   The Compounds Project http://sourceforge.net/projects/Compounds/ 
 * @package 	kernel
 * @subpackage 	form
 * @access 		public
 */
class CompoundsFormCompound extends XoopsFormElement
{
    /**
     * Text
     *
     * @var string
     * @access private
     */
    var $_value;
	
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
								
    var $_size = 18;
	
	var $_compound_id = 0;
	
    /**
     * Constructor
     *
     * @param string $caption Caption
     * @param string $value Text
     */
    function CompoundsFormCompound($caption = '', $name = '', $compound_id = 0, $size = 0, $composition = NULL, $numberof = NULL)
    {
        $this->setCaption($caption);
        $this->setName($name);
		if (!empty($size)&&is_numeric($size))
			$this->_size = $size;
		else {
			$module_handler =& xoops_gethandler('module');
			$xoModule = $module_handler->getByDirname('compounds');
			$config_handler =& xoops_gethandler('config');
			$xoConfigs = $config_handler->getConfigList($xoModule->getVar('mid'));
			$this->_size = empty($xoConfigs['components'])?18:intval($xoConfigs['components']);
		}
		if (!empty($compound_id)&&is_numeric($compound_id))
			$this->_compound_id = $compound_id;
						
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
    }
    
    /**
     * Prepare HTML for output
     *
     * @return string
     */
    function render()
    {
	
		$periodicalHandler =& xoops_getmodulehandler('periodical', 'compounds');
		$periodical =& $periodicalHandler->getObjects(NULL);

		$compoundHandler =& xoops_getmodulehandler('compound', 'compounds');
		$compounds =& $compoundHandler->getObjects(new Criteria('id', $this->_compound_id));
		$ele_name = $this->getName();
		
		if (is_object($compounds))
			$compound = $compounds;
		elseif (is_array($compounds))
			$compound = $compounds[0];
		
		if (!$this->_compound_id||!is_object($compound)) {
		
			$ret  = "Alias:&nbsp;&nbsp;&nbsp;<input type='text' name='" . $this->getName() . "[alias]' id='" . $this->getName() . "[alias]' size='42' maxlength='255' value='' /><br/>Model:&nbsp;<br/><p style=\"position:relative; left: 29px; width:100%;\">";
			
			for ( $ii = 0; $ii < $this->_size; $ii++ ) {
				$iy++;
				$cipos = (string)($iy<10)?'0'.$iy:$iy;
				$ret .= 'CI-' . $cipos . ':&nbsp;';				
				$ret .= '<select size="1"';
				$ret .= ' name="' . $ele_name . "[number][$ii]\"" . ' id="' . $ele_name . '[number]" title="'. $ele_title. '">' ;
				foreach($this->_numberof as $value => $name) {
					$ret .= '<option value="' . htmlspecialchars($value, ENT_QUOTES) . '"';
					$ret .= '>' . $name . '</option>' ;
				}
				$ret .= '</select>';
		
				$ret .= '<select size="1"';
				$ret .= ' name="' . $ele_name . "[periodical][$ii]\"" . ' id="' . $ele_name . '[periodical]" title="'. $ele_title. '">' ;
				$ret .= '<option value="0"';
				$ret .= '>--</option>' ;
				foreach($periodical as $name => $value) {
					$ret .= '<option value="' . htmlspecialchars($value->getVar('id'), ENT_QUOTES) . '"';
					$ret .= '>' . $value->getVar('symbol') . '</option>' ;
				}
				$ret .= '</select>';
		
				$ret .= '<select size="1"';
				$ret .= ' name="' . $ele_name . "[composition][$ii][1]\"" . ' id="' . $ele_name . '[composition]" title="'. $ele_title. '">' ;
				foreach($this->_composition as $value => $name) {
					$ret .= '<option value="' . htmlspecialchars($value, ENT_QUOTES) . '"';
					$ret .= '>' . $name . '</option>' ;
				}
				$ret .= '</select>';
				
				$ret .= '<select size="1"';
				$ret .= ' name="' . $ele_name . "[composition][$ii][2]\"" . ' id="' . $ele_name . '[composition]" title="'. $ele_title. '">' ;
				foreach($this->_composition as $value => $name) {
					$ret .= '<option value="' . htmlspecialchars($value, ENT_QUOTES) . '"';
					$ret .= '>' . $name . '</option>' ;
				}
				$ret .= '</select><br/>';				
			}
			$ret .= '</p>';
		} else {

			$chainLinkHandler =& xoops_getmodulehandler('chain_link', 'compounds');
			$chainLinks =& $chainLinkHandler->getObjects(new Criteria('chain_id', $compound->getVar('chain_id')));

			if (is_object($chainLinks))
				$chainLink = $chainLinks;
			elseif (is_array($chainLinks))
				$chainLink = $chainLinks[0];			
							
			$criteria = new Criteria('chain_id', $compound->getVar('chain_id'));
			$criteria->setOrder('ASC');
			$criteria->setSort('weight');
			$chainComponentsHandler =& xoops_getmodulehandler('chain_components', 'compounds');		
			$chainComponents =& $chainComponentsHandler->getObjects($criteria);
			
			$ret  = "Alias:&nbsp;&nbsp;&nbsp;<input type='text' name='" . $this->getName() . "[alias]' id='" . $this->getName() . "[alias]' size='42' maxlength='255' value='" . $compound->language->getVar('alias') . "' /><br/>&nbsp;Model:<br/><p style=\"position:relative; left: 29px; width:390px;\">";

			foreach ( $chainComponents as $chainKey => $chainComponent ) {
				
				$numberof = $chainComponent->getVar('number');
				$periodic_id = $chainComponent->getVar('perodic_id');
				$sub_composition = $chainComponent->getVar('sub_composition');
				$super_composition = $chainComponent->getVar('super_composition');
				
				$ii = $chainComponent->getVar('id');
				$iy++;
				$cipos = (string)($iy<10)?'0'.$iy:$iy;
				$ret .= 'CI-' . $cipos . ':&nbsp;';				
				$ret .= '<select size="1"';
				$ret .= ' name="' . $ele_name . "[number][$ii]\"" . ' id="' . $ele_name . '[number]" title="'. $ele_title. '">' ;
				foreach($this->_numberof as $value => $name) {
					$ret .= '<option value="' . htmlspecialchars($value, ENT_QUOTES) . '"';
					if ($numberof == $value)
						$ret .= ' selected="selected"' ;
					$ret .= '>' . $name . '</option>' ;
				}
				$ret .= '</select>';
		
				$ret .= '<select size="1"';
				$ret .= ' name="' . $ele_name . "[periodical][$ii]\"" . ' id="' . $ele_name . '[periodical]" title="'. $ele_title. '">' ;
				$ret .= '<option value="0"';
				if ($periodic_id == 0)
					$ret .= ' selected="selected"' ;
				$ret .= '>--</option>' ;
				foreach($periodical as $name => $value) {
					$ret .= '<option value="' . htmlspecialchars($value->getVar('id'), ENT_QUOTES) . '"';
					if ($periodic_id == $value->getVar('id'))
						$ret .= ' selected="selected"' ;
					$ret .= '>' . $value->getVar('symbol') . '</option>' ;
				}
				$ret .= '</select>';
		
				$ret .= '<select size="1"';
				$ret .= ' name="' . $ele_name . "[composition][$ii][1]\"" . ' id="' . $ele_name . '[composition]" title="'. $ele_title. '">' ;
				foreach($this->_composition as $value => $name) {
					$ret .= '<option value="' . htmlspecialchars($value, ENT_QUOTES) . '"';
					if ($super_composition == $value)
						$ret .= ' selected="selected"' ;
					$ret .= '>' . $name . '</option>' ;
				}
				$ret .= '</select>';

				$ret .= '<select size="1"';
				$ret .= ' name="' . $ele_name . "[composition][$ii][2]\"" . ' id="' . $ele_name . '[composition]" title="'. $ele_title. '">' ;
				foreach($this->_composition as $value => $name) {
					$ret .= '<option value="' . htmlspecialchars($value, ENT_QUOTES) . '"';
					if ($sub_composition == $value)
						$ret .= ' selected="selected"' ;
					$ret .= '>' . $name . '</option>' ;
				}
				$ret .= '</select><br/>';

				$numberof = 0;
				$periodic_id = 0;
				$composition = 0;

			}
			$ret .= '</span>';
		}
		$ret .= '<input type="hidden" name="' . $ele_name . "[size]\" id='" . $ele_name . "['size']' value=\"" . $this->_size . '" />';
		$ret .= '<input type="hidden" name="XOOPS_TOKEN_REQUEST" value="' . $GLOBALS['xoopsSecurity']->createToken() .'" />';
        return $ret;
    }
}

?>