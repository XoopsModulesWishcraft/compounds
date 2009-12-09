<?php
	
	include_once( 'form.objects.php' );
	
	function formDonation(){
		$cform = new XoopsThemeForm(_CMP_FRM_DONATION_FORM, 'donation');

		$module_handler =& xoops_gethandler('module');
		$xoModule = $module_handler->getByDirname('compounds');
		$config_handler =& xoops_gethandler('config');
		$xoConfigs = $config_handler->getConfigList($xoModule->getVar('mid'));			

		$cform->addElement(new XoopsFormLabel(_CMP_FRM_DONATION_DISLCAIMER, $xoConfigs['paypalDisclaimer']));
		$cform->addElement(new PaypalButtonFormCompound(_CMP_FRM_DONATION_PAYPAL, ''));
		
		return $cform->render();
	}
	
	function formCompound($compound_id) {
		$cform = new XoopsThemeForm(_CMP_FRM_COMPOUND_FORM, 'compoundmodel');
		
		$compoundHandler =& xoops_getmodulehandler('compound', 'compounds');
		
		if (intval($_REQUEST['id'])<>0)
			$compound =& $compoundHandler->get(intval($_REQUEST['id']));
		else
			$compound =& $compoundHandler->create();
		
		$hyposise_editor = !isset($_REQUEST['hyposise_editor'])?'ckeditor':$_REQUEST['hyposise_editor'];
		$process_editor = !isset($_REQUEST['process_editor'])?'ckeditor':$_REQUEST['process_editor'];
		$synopisise_editor = !isset($_REQUEST['synopisise_editor'])?'ckeditor':$_REQUEST['synopisise_editor'];
		
		$cmodeller = new CompoundsFormCompound(_CMP_FRM_COMPOUND, 'compound', $compound_id);
		$cmodeller->setDescription(_CMP_FRM_COMPOUND_DESC);
		$cform->addElement($cmodeller);
		$cform->addElement(new XoopsFormSelectEditor($cform, 'hyposise_editor', $hyposise_editor));
		$hyposise_config['name'] = 'hyposise';
		$hyposise_config['editor'] = $hyposise_editor;
		$hyposise_config['value'] = !isset($_REQUEST['hyposise'])?$compound->getVar('hyposise'):$_REQUEST['hyposise'];
		$hyposise_config['width'] = 379;
		$hyposise_config['height'] = 479;
		$ele_hyposise = new XoopsFormEditor(_CMP_FRM_COMPOUND_HYPOSISE, 'hyposise', $hyposise_config);
		$ele_hyposise->setDescription(_CMP_FRM_COMPOUND_HYPOSISE_DESC);
		$cform->addElement($ele_hyposise);
		$cform->addElement(new XoopsFormSelectEditor($cform, 'process_editor', $process_editor));
		$process_config['name'] = 'process';
		$process_config['editor'] = $process_editor;
		$process_config['value'] = !isset($_REQUEST['process'])?$compound->getVar('process'):$_REQUEST['process'];
		$process_config['width'] = 379;
		$process_config['height'] = 479;
		$ele_process = new XoopsFormEditor(_CMP_FRM_COMPOUND_PROCESS, 'process', $process_config);
		$ele_process->setDescription(_CMP_FRM_COMPOUND_PROCESS_DESC);
		$cform->addElement($ele_process);
		$cform->addElement(new XoopsFormSelectEditor($cform, 'synopisise_editor', $synopisise_editor));
		$synopisise_config['name'] = 'synopisise';
		$synopisise_config['editor'] = $synopisise_editor;
		$synopisise_config['width'] = 379;
		$synopisise_config['height'] = 479;
		$synopisise_config['value'] = !isset($_REQUEST['synopisise'])?$compound->getVar('synopisise'):$_REQUEST['synopisise'];
		$ele_synopisise = new XoopsFormEditor(_CMP_FRM_COMPOUND_SYNOPISISE, 'synopisise', $synopisise_config);
		$ele_synopisise->setDescription(_CMP_FRM_COMPOUND_SYNOPISISE_DESC);
		$cform->addElement($ele_synopisise);

		$cform->addElement(new XoopsFormHidden('hyposise_editor_current', $hyposise_editor));
		$cform->addElement(new XoopsFormHidden('process_editor_current', $process_editor));
		$cform->addElement(new XoopsFormHidden('synopisise_editor_current', $synopisise_editor));

		if (class_exists('XoopsFormTag'))
			$cform->addElement(new XoopsFormTag('chem_tags', 70, 255, $_REQUEST['id']));
			
		$cform->addElement(new XoopsFormHidden('compound_id', $_REQUEST['id']));
		$cform->addElement(new XoopsFormHidden('op', 'save'));
		$cform->addElement(new XoopsFormHidden('fct', $_GET['op']));
		
		$cform->addElement(new XoopsFormButton('', 'contents_submit', _SUBMIT, "submit"));
		return $cform->render();
	}	
	
	function formList($compound_objects, $compoundHandler)
	{
		$lform = new XoopsThemeForm(_CMP_FRM_COMPOUND_LIST, 'compoundlist');
		foreach($compound_objects as $key => $compound) {
			$lele[$key] = new XoopsFormElementTray(sprintf(_CMP_ELE_COMPOUND_LIST, $compound->getVar('id')));
			$lele[$key]->setDescription($compoundHandler->renderSymbolisation($compound->getVar('symbol')));
			$lele[$key]->addElement(new XoopsFormLabel('', '<a href="'.XOOPS_URL.'/modules/compounds/admin/admin.php?op=edit&id='.$compound->getVar('id').'">'._EDIT.'</a>'));
			$lele[$key]->addElement(new XoopsFormLabel('', '<a href="'.XOOPS_URL.'/modules/compounds/admin/admin.php?op=delete&id='.$compound->getVar('id').'">'._DELETE.'</a>'));
			if (class_exists('XoopsFormTag'))
				$lele[$key]->addElement(new XoopsFormTag('chem_tags', 35, 255, $compound->getVar('id')));
				
			$lform->addElement($lele[$key]);
			
		}
		return $lform->render();
	}
	
	function formVote($session)
	{
		$cform = new XoopsThemeForm(_CMP_FRM_VOTE_FORM, 'vote');
		$votesel = new XoopsFormSelect(_CMP_FRM_VOTE_STARS, 'stars',0 , 10);
		$votesel->addOption('10', '10 Stars');
		$votesel->addOption('9', '9 Stars');
		$votesel->addOption('8', '8 Stars');
		$votesel->addOption('7', '7 Stars');
		$votesel->addOption('6', '6 Stars');
		$votesel->addOption('5', '5 Stars');
		$votesel->addOption('4', '4 Stars');
		$votesel->addOption('3', '3 Stars');
		$votesel->addOption('2', '2 Stars');
		$votesel->addOption('1', '1 Stars');
		$cform->addElement($votesel);
		$cform->addElement(new XoopsFormHidden('op', 'vote'));
		$cform->addElement(new XoopsFormHidden('id', $session['id']));
		$cform->addElement(new XoopsFormHidden('ip', $session['ip']));
		$cform->addElement(new XoopsFormHidden('addy', $session['addy']));
		$cform->addElement(new XoopsFormButton('', 'contents_submit', _SUBMIT, "submit"));
		return $cform->render();
	}

?>
