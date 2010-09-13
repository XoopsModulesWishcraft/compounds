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
			$compound =& $compoundHandler->get(0);
		
		$hyposise_editor = !isset($_REQUEST['hyposise_editor'])?'ckeditor':$_REQUEST['hyposise_editor'];
		$process_editor = !isset($_REQUEST['process_editor'])?'ckeditor':$_REQUEST['process_editor'];
		$synopsise_editor = !isset($_REQUEST['synopsise_editor'])?'ckeditor':$_REQUEST['synopsise_editor'];
		
		$cmodeller = new CompoundsFormCompound(_CMP_FRM_COMPOUND, 'compound', $compound_id);
		$cmodeller->setDescription(_CMP_FRM_COMPOUND_DESC);
		$cform->addElement($cmodeller);
		$cform->addElement(new XoopsFormSelectEditor($cform, 'hyposise_editor', $hyposise_editor));
		$hyposise_config['name'] = 'hyposise';
		$hyposise_config['editor'] = $hyposise_editor;
		$hyposise_config['value'] = !isset($_REQUEST['hyposise'])?$compound->language->getVar('hyposise'):$_REQUEST['hyposise'];
		$hyposise_config['width'] = 379;
		$hyposise_config['height'] = 479;
		$ele_hyposise = new XoopsFormEditor(_CMP_FRM_COMPOUND_HYPOSISE, 'hyposise', $hyposise_config);
		$ele_hyposise->setDescription(_CMP_FRM_COMPOUND_HYPOSISE_DESC);
		$cform->addElement($ele_hyposise);
		$cform->addElement(new XoopsFormSelectEditor($cform, 'process_editor', $process_editor));
		$process_config['name'] = 'process';
		$process_config['editor'] = $process_editor;
		$process_config['value'] = !isset($_REQUEST['process'])?$compound->language->getVar('process'):$_REQUEST['process'];
		$process_config['width'] = 379;
		$process_config['height'] = 479;
		$ele_process = new XoopsFormEditor(_CMP_FRM_COMPOUND_PROCESS, 'process', $process_config);
		$ele_process->setDescription(_CMP_FRM_COMPOUND_PROCESS_DESC);
		$cform->addElement($ele_process);
		$cform->addElement(new XoopsFormSelectEditor($cform, 'synopsise_editor', $synopsise_editor));
		$synopsise_config['name'] = 'synopsise';
		$synopsise_config['editor'] = $synopsise_editor;
		$synopsise_config['width'] = 379;
		$synopsise_config['height'] = 479;
		$synopsise_config['value'] = !isset($_REQUEST['synopsise'])?$compound->language->getVar('process'):$_REQUEST['synopsise'];
		$ele_synopsise = new XoopsFormEditor(_CMP_FRM_COMPOUND_SYNOPISISE, 'synopsise', $synopsise_config);
		$ele_synopsise->setDescription(_CMP_FRM_COMPOUND_SYNOPISISE_DESC);
		$cform->addElement($ele_synopsise);

		$cform->addElement(new XoopsFormHidden('hyposise_editor_current', $hyposise_editor));
		$cform->addElement(new XoopsFormHidden('process_editor_current', $process_editor));
		$cform->addElement(new XoopsFormHidden('synopsise_editor_current', $synopsise_editor));

		if (class_exists('XoopsFormTag'))
			$cform->addElement(new XoopsFormTag('chem_tags', 70, 255, $_REQUEST['id']));
			
		$cform->addElement(new XoopsFormHidden('compound_id', $_REQUEST['id']));
		$cform->addElement(new XoopsFormHidden('op', 'save'));
		$cform->addElement(new XoopsFormHidden('fct', 'compounds'));
		
		$cform->addElement(new XoopsFormButton('', 'contents_submit', _SUBMIT, "submit"));
		return $cform->render();
	}	
	
	function formList($compound_objects, $compoundHandler)
	{
		$lform = new XoopsThemeForm(_CMP_FRM_COMPOUND_LIST, 'compoundlist');
		foreach($compound_objects as $key => $compound) {
			$lele[$key] = new XoopsFormElementTray(sprintf(_CMP_ELE_COMPOUND_LIST, $compound->getVar('id')));
			$lele[$key]->setDescription($compoundHandler->renderSymbolisation($compound->getVar('symbol')));
			$lele[$key]->addElement(new XoopsFormLabel('', '<a href="'.XOOPS_URL.'/modules/compounds/admin/index.php?op=edit&id='.$compound->getVar('id').'">'._EDIT.'</a>'));
			$lele[$key]->addElement(new XoopsFormLabel('', '<a href="'.XOOPS_URL.'/modules/compounds/admin/index.php?op=delete&id='.$compound->getVar('id').'">'._DELETE.'</a>'));
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
		$votesel->addOption('10', _CMP_RH_VOTE_10STARS);
		$votesel->addOption('9', _CMP_RH_VOTE_9STARS);
		$votesel->addOption('8', _CMP_RH_VOTE_8STARS);
		$votesel->addOption('7', _CMP_RH_VOTE_7STARS);
		$votesel->addOption('6', _CMP_RH_VOTE_6STARS);
		$votesel->addOption('5', _CMP_RH_VOTE_5STARS);
		$votesel->addOption('4', _CMP_RH_VOTE_4STARS);
		$votesel->addOption('3', _CMP_RH_VOTE_3STARS);
		$votesel->addOption('2', _CMP_RH_VOTE_2STARS);
		$votesel->addOption('1', _CMP_RH_VOTE_1STARS);
		$cform->addElement($votesel);
		$cform->addElement(new XoopsFormHidden('op', 'vote'));
		$cform->addElement(new XoopsFormHidden('id', $session['id']));
		$cform->addElement(new XoopsFormHidden('ip', $session['ip']));
		$cform->addElement(new XoopsFormHidden('addy', $session['addy']));
		$cform->addElement(new XoopsFormButton('', 'contents_submit', _SUBMIT, "submit"));
		return $cform->render();
	}

	function formNewPeriodical() {
		
		$periodicalHandler =& xoops_getmodulehandler('periodical', 'compounds');
		
		if (intval($_REQUEST['id'])<>0) {
			$periodical =& $periodicalHandler->get(intval($_REQUEST['id']));
			$cform = new XoopsThemeForm(sprintf(_CMP_FRM_PERIODICAL_FORM_EDIT, $periodical->getVar('symbol')), 'periodical');
		} else {
			$periodical =& $periodicalHandler->get(0);
			$cform = new XoopsThemeForm(_CMP_FRM_PERIODICAL_FORM_NEW, 'periodical');			
		}
		
		$cform->addElement(new XoopsFormText(_CMP_FRM_SYMBOL, 'symbol', 5, 4, $periodical->getVar('symbol')));
		
		$cform->addElement(new XoopsFormText(_CMP_FRM_ALIAS, 'alias', 40, 255, $periodical->language->getVar('alias')));
		
		$cform->addElement(new XoopsFormText(_CMP_FRM_WEIGHT, 'weight', 5, 4, $periodical->getVar('weight')));
		
		$cform->addElement(new XoopsFormText(_CMP_FRM_GROUP_NUMBER, 'group', 5, 4, $periodical->getVar('group')));
		
		$type_sel = new XoopsFormSelect(_CMP_FRM_TYPE, 'type', $periodical->getVar('type'));
		$type_sel->addOption('base', _CMP_FRM_TYPE_BASE);
		$type_sel->addOption('lanthanoids', _CMP_FRM_TYPE_LANTHABOIDS);
		$type_sel->addOption('actinoids', _CMP_FRM_TYPE_ACTINOIDS);
		
		$cform->addElement($type_sel);		
			
		$cform->addElement(new XoopsFormHidden('id', $_REQUEST['id']));
		$cform->addElement(new XoopsFormHidden('op', 'save'));
		$cform->addElement(new XoopsFormHidden('fct', 'periodical'));
		
		$cform->addElement(new XoopsFormButton('', 'submit', _SUBMIT, "submit"));
		return $cform->render();
	}	
	
	function formPeriodical()
	{
		$periodicalHandler =& xoops_getmodulehandler('periodical', 'compounds');

		$criteria = new CriteriaCompo(new Criteria('weight', '0', '<>'));
		$criteria->setOrder('ASC');
		$criteria->setSort('`group`, `weight`, `type`');

		$periodicials = $periodicalHandler->getObjects($criteria, true);
		
		$lform = new XoopsThemeForm(_CMP_FRM_TITLE_PERIODIC_LIST, 'periodicallist');
		
		foreach($periodicials as $key => $periodical) {
			$lele[$key] = new XoopsFormElementTray(sprintf(_CMP_FRM_PERIODICAL_LIST, $periodical->language->getVar('alias')));
			$lele[$key]->setDescription(sprintf(_CMP_FRM_SYMBOL_DESC,$periodical->getVar('symbol')));
			$lele[$key]->addElement(new XoopsFormLabel('', '<a href="'.XOOPS_URL.'/modules/compounds/admin/index.php?op=edit&fct=periodical&id='.$periodical->getVar('id').'">'._EDIT.'</a>'));
			$lele[$key]->addElement(new XoopsFormLabel('', '<a href="'.XOOPS_URL.'/modules/compounds/admin/index.php?op=delete&fct=periodical&id='.$periodical->getVar('id').'">'._DELETE.'</a>'));
			$lele[$key]->addElement(new XoopsFormText(_CMP_FRM_SYMBOL, 'symbol['.$periodical->getVar('id').']', 5, 4, $periodical->getVar('symbol')));
			
			$lele[$key]->addElement(new XoopsFormText(_CMP_FRM_ALIAS, 'alias['.$periodical->getVar('id').']', 40, 255, $periodical->language->getVar('alias')));
			
			$lele[$key]->addElement(new XoopsFormText(_CMP_FRM_WEIGHT, 'weight['.$periodical->getVar('id').']', 5, 4, $periodical->getVar('weight')));
			
			$lele[$key]->addElement(new XoopsFormText(_CMP_FRM_GROUP_NUMBER, 'group['.$periodical->getVar('id').']', 5, 4, $periodical->getVar('group')));
			
			$type_sel[$key] = new XoopsFormSelect(_CMP_FRM_TYPE, 'type['.$periodical->getVar('id').']', $periodical->getVar('type'));
			$type_sel[$key]->addOption('base', _CMP_FRM_TYPE_BASE);
			$type_sel[$key]->addOption('lanthanoids', _CMP_FRM_TYPE_LANTHABOIDS);
			$type_sel[$key]->addOption('actinoids', _CMP_FRM_TYPE_ACTINOIDS);
			
			$lele[$key]->addElement($type_sel[$key]);		
				
			$lele[$key]->addElement(new XoopsFormHidden('id['.$periodical->getVar('id').']', $periodical->getVar('id')));
				
			$lform->addElement($lele[$key]);
			
		}
		$lform->addElement(new XoopsFormHidden('op', 'save'));
		$lform->addElement(new XoopsFormHidden('fct', 'periodical'));
		$lform->addElement(new XoopsFormButton('', 'submit', _SUBMIT, "submit"));
		return $lform->render();
	}

	function formNewComposite() {
		
		$compositeHandler =& xoops_getmodulehandler('composite', 'compounds');
		
		if (intval($_REQUEST['id'])<>0) {
			$composite =& $compositeHandler->get(intval($_REQUEST['id']));
			$cform = new XoopsThemeForm(sprintf(_CMP_FRM_COMPOSITE_FORM_EDIT, $composite->getVar('symbol')), 'composite');
		} else {
			$composite =& $compositeHandler->get(0);
			$cform = new XoopsThemeForm(_CMP_FRM_COMPOSITE_FORM_NEW, 'composite');			
		}
		
		$cform->addElement(new XoopsFormText(_CMP_FRM_COMPOSITE_SYMBOL, 'symbol', 5, 4, $composite->getVar('symbol')));
		
		$cform->addElement(new XoopsFormText(_CMP_FRM_ALIAS, 'alias', 40, 255, $composite->language->getVar('alias')));
		
		$cform->addElement(new XoopsFormText(_CMP_FRM_WEIGHT, 'weight', 5, 4, $composite->getVar('weight')));
		
		$cform->addElement(new XoopsFormText(_CMP_FRM_POINT, 'point', 5, 4, $composite->getVar('point')));
		
		$cform->addElement(new XoopsFormHidden('id', $_REQUEST['id']));
		$cform->addElement(new XoopsFormHidden('op', 'save'));
		$cform->addElement(new XoopsFormHidden('fct', 'composites'));
		
		$cform->addElement(new XoopsFormButton('', 'submit', _SUBMIT, "submit"));
		return $cform->render();
	}	
	
	function formComposite()
	{
		$compositeHandler =& xoops_getmodulehandler('composite', 'compounds');

		$criteria = new CriteriaCompo(new Criteria('weight', '0', '<>'));
		$criteria->setOrder('ASC');
		$criteria->setSort('`weight`');

		$composites = $compositeHandler->getObjects($criteria, true);
		
		$lform = new XoopsThemeForm(_CMP_FRM_TITLE_COMPOSITE_LIST, 'compositelist');
		
		foreach($composites as $key => $composite) {
			$lele[$key] = new XoopsFormElementTray(sprintf(_CMP_FRM_COMPOSITE_LIST, $composite->language->getVar('alias')));
			$lele[$key]->setDescription(sprintf(_CMP_FRM_SYMBOL_DESC,$composite->getVar('symbol')));
			$lele[$key]->addElement(new XoopsFormLabel('', '<a href="'.XOOPS_URL.'/modules/compounds/admin/index.php?op=edit&fct=composites&id='.$composite->getVar('id').'">'._EDIT.'</a>'));
			$lele[$key]->addElement(new XoopsFormLabel('', '<a href="'.XOOPS_URL.'/modules/compounds/admin/index.php?op=delete&fct=composites&id='.$composite->getVar('id').'">'._DELETE.'</a>'));
			$lele[$key]->addElement(new XoopsFormText(_CMP_FRM_COMPOSITE_SYMBOL, 'symbol['.$composite->getVar('id').']', 5, 4, $composite->getVar('symbol')));
			
			$lele[$key]->addElement(new XoopsFormText(_CMP_FRM_ALIAS, 'alias['.$composite->getVar('id').']', 40, 255, $composite->language->getVar('alias')));
			
			$lele[$key]->addElement(new XoopsFormText(_CMP_FRM_WEIGHT, 'weight['.$composite->getVar('id').']', 5, 4, $composite->getVar('weight')));
			
			$lele[$key]->addElement(new XoopsFormText(_CMP_FRM_POINT, 'point['.$composite->getVar('id').']', 8, 10, $composite->getVar('point')));
						
			$lele[$key]->addElement(new XoopsFormHidden('id['.$composite->getVar('id').']', $composite->getVar('id')));
				
			$lform->addElement($lele[$key]);
			
		}
		$lform->addElement(new XoopsFormHidden('op', 'save'));
		$lform->addElement(new XoopsFormHidden('fct', 'composites'));
		$lform->addElement(new XoopsFormButton('', 'submit', _SUBMIT, "submit"));
		return $lform->render();
	}
	
	
	function formNewNumberof() {
		
		$numberofHandler =& xoops_getmodulehandler('numberof', 'compounds');
		
		if (intval($_REQUEST['id'])<>0) {
			$numberof =& $numberofHandler->get(intval($_REQUEST['id']));
			$cform = new XoopsThemeForm(sprintf(_CMP_FRM_NUMBEROF_FORM_EDIT, $numberof->getVar('symbol')), 'numberof');
		} else {
			$numberof =& $numberofHandler->get(0);
			$cform = new XoopsThemeForm(_CMP_FRM_NUMBEROF_FORM_NEW, 'numberof');			
		}
		
		$cform->addElement(new XoopsFormText(_CMP_FRM_PARTICLES_SYMBOL, 'symbol', 5, 4, $numberof->getVar('symbol')));
		
		$cform->addElement(new XoopsFormText(_CMP_FRM_ALIAS, 'alias', 40, 255, $numberof->language->getVar('alias')));
		
		$cform->addElement(new XoopsFormText(_CMP_FRM_WEIGHT, 'weight', 5, 4, $numberof->getVar('weight')));
		
		$cform->addElement(new XoopsFormText(_CMP_FRM_POINT, 'point', 5, 4, $numberof->getVar('point')));
		
		$cform->addElement(new XoopsFormHidden('id', $_REQUEST['id']));
		$cform->addElement(new XoopsFormHidden('op', 'save'));
		$cform->addElement(new XoopsFormHidden('fct', 'numberof'));
		
		$cform->addElement(new XoopsFormButton('', 'submit', _SUBMIT, "submit"));
		return $cform->render();
	}	
	
	function formNumberof()
	{
		$numberofHandler =& xoops_getmodulehandler('numberof', 'compounds');

		$criteria = new CriteriaCompo(new Criteria('weight', '0', '<>'));
		$criteria->setOrder('ASC');
		$criteria->setSort('`weight`');

		$numberofs = $numberofHandler->getObjects($criteria, true);
		
		$lform = new XoopsThemeForm(_CMP_FRM_TITLE_NUMBEROF_LIST, 'numberoflist');
		
		foreach($numberofs as $key => $numberof) {
			$lele[$key] = new XoopsFormElementTray(sprintf(_CMP_FRM_NUMBEROF_LIST, $numberof->language->getVar('alias')));
			$lele[$key]->setDescription(sprintf(_CMP_FRM_SYMBOL_DESC,$numberof->getVar('symbol')));
			$lele[$key]->addElement(new XoopsFormLabel('', '<a href="'.XOOPS_URL.'/modules/compounds/admin/index.php?op=edit&fct=numberof&id='.$numberof->getVar('id').'">'._EDIT.'</a>'));
			$lele[$key]->addElement(new XoopsFormLabel('', '<a href="'.XOOPS_URL.'/modules/compounds/admin/index.php?op=delete&fct=numberof&id='.$numberof->getVar('id').'">'._DELETE.'</a>'));
			$lele[$key]->addElement(new XoopsFormText(_CMP_FRM_PARTICLES_SYMBOL, 'symbol['.$numberof->getVar('id').']', 5, 4, $numberof->getVar('symbol')));
			
			$lele[$key]->addElement(new XoopsFormText(_CMP_FRM_ALIAS, 'alias['.$numberof->getVar('id').']', 40, 255, $numberof->language->getVar('alias')));
			
			$lele[$key]->addElement(new XoopsFormText(_CMP_FRM_WEIGHT, 'weight['.$numberof->getVar('id').']', 5, 4, $numberof->getVar('weight')));
			
			$lele[$key]->addElement(new XoopsFormText(_CMP_FRM_POINT, 'point['.$numberof->getVar('id').']', 8, 10, $numberof->getVar('point')));
						
			$lele[$key]->addElement(new XoopsFormHidden('id['.$numberof->getVar('id').']', $numberof->getVar('id')));
				
			$lform->addElement($lele[$key]);
			
		}
		$lform->addElement(new XoopsFormHidden('op', 'save'));
		$lform->addElement(new XoopsFormHidden('fct', 'numberof'));
		$lform->addElement(new XoopsFormButton('', 'submit', _SUBMIT, "submit"));
		return $lform->render();
	}
	
?>
