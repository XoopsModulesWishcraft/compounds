<?php
defined('XOOPS_ROOT_PATH') or die('Restricted access');

class PaypalButtonFormCompound extends XoopsFormElement
{
    /**
     * Text
     *
     * @var string
     * @access private
     */
    var $_value;
		
	var $_email = '';
	
    /**
     * Constructor
     *
     * @param string $caption Caption
     * @param string $value Text
     */
    function PaypalButtonFormCompound($caption = '', $email = '')
    {
        $this->setCaption($caption);
		if (!empty( $email ) && is_string(  $email ))
			$this->_email = $email;
    }
    
    /**
     * Prepare HTML for output
     *
     * @return string
	 *
	 * Form Path:: https://www.paypal.com/cgi-bin/webscr" 
	 *		@ target:: paypal;
	 *		@ method:: post;
	 *			@ Button Name :: I1;
     */
    function render()
    {
			
			$module_handler =& xoops_gethandler('module');
			$xoModule = $module_handler->getByDirname('compounds');
			$config_handler =& xoops_gethandler('config');
			$xoConfigs = $config_handler->getConfigList($xoModule->getVar('mid'));
	
			$ret .= '<form action="https://www.paypal.com/cgi-bin/webscr" target="paypal" method="post">';
			$ret .= '<input type="hidden" name="amount" id="paypal" value="' . $xoConfigs['paypalAmount'] . '">';
			$ret .= '<select size="Yes" name="os0">';
			$ret .= '<option selected value="Yes">Donation Name Yes</option>';
			$ret .= '<option value="No">Donation Name No</option>';
			$ret .= '</select>';
			$ret .= '<input type="hidden" name="cmd" value="_xclick">';
			$ret .= '<input type="hidden" name="business" value="' . $xoConfigs['paypalEmail'] . '">';
			$ret .= ' <input type="hidden" name="item_name" value="Chemical Reaction Compound Register">';
			$ret .= '<input type="hidden" name="item_number" value="110">';
			$ret .= '<input type="hidden" name="rm" value="2">';
			$ret .= '<input type="hidden" name="notify_url" value="' . XOOPS_URL . '/modules/compounds/ipnppd.php">';
			$ret .= '<input type="hidden" name="on0" value="List your name? ">';
			$ret .= '<input type="hidden" name="no_shipping" value="0">';
			$ret .= '<input type="hidden" name="currency_code" value="USD">';
			$ret .= '<input type="hidden" name="cn" value="Comments">';
			$ret .= '<input type="hidden" name="custom" value="' . $GLOBALS['xoopsUser']->getVar('uname') . '">';
			$ret .= '<input type="hidden" name="cancel_return" value="' . XOOPS_URL . '/modules/compounds/index.php">';
			$ret .= '<input type="hidden" name="return" value="' . XOOPS_URL . '/modules/compounds/index.php">';
			$ret .= '<input type="hidden" name="image_url" value="' . XOOPS_URL . '/images/logo.png">"><br><br>';
			$ret .= '<input type="hidden" name="XOOPS_TOKEN_REQUEST" value="' . $GLOBALS['xoopsSecurity']->createToken() .'" />';
			$ret .= '<input type="submit" value="Submit Donation >>" border="0" name="I1"></form>';
			return $ret;
		}
}

?>