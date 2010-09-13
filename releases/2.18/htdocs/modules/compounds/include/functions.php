<?php


	function savePeriodicalList($values) {
		$periodicalHandler =& xoops_getmodulehandler('periodical', 'compounds');
		
		foreach (array_keys($values['id']) as $id) {
			$periodical = $periodicalHandler->get($id);
			$periodical->setVar('updated', time());
			$periodical->language->setVar('updated', time());
			$periodical->language->setVar('uid', $GLOBALS['xoopsUser']->getVar('uid'));
		
			$periodical->setVar('symbol', $values['symbol'][$id]);
			$periodical->setVar('weight', $values['weight'][$id]);			
			$periodical->setVar('type', $values['type'][$id]);
			$periodical->setVar('group', $values['group'][$id]);			
			$periodical->language->setVar('alias', $values['alias'][$id]);
		
			$periodicalHandler->insert($periodical, true, $GLOBALS['xoopsConfig']['language']);
		}
		redirect_header('index.php?op=periodical', 4, _CMP_AM_PERIODICAL_LIST_SAVEOK);
		exit(0);
	}
	
	function savePeriodical($values) {
	
		$periodicalHandler =& xoops_getmodulehandler('periodical', 'compounds');
		
		if ($values['id']<>0) {
			$periodical = $periodicalHandler->get($values['id']);
			$periodical->setVar('updated', time());
			$periodical->language->setVar('updated', time());
		} else {
			$periodical = $periodicalHandler->get(0);
			$periodical->setVar('created', time());
			$periodical->language->setVar('created', time());	
		}
		
		$periodical->setVars($values);
		$periodical->language->setVar('alias', $values['alias']);
		
		if ($id = $periodicalHandler->insert($periodical, true, $GLOBALS['xoopsConfig']['language'])) {
			redirect_header('index.php?op=edit&fct=periodical&id='.$id, 4, sprintf(_CMP_AM_PERIODICAL_SAVE_OK, $periodical->getVar('symbol'), $periodical->language->getVar('alias')));
		} else {
			redirect_header('index.php?op=periodical', 4, sprintf(_CMP_AM_PERIODICAL_SAVE_NOTOK, $periodical->getVar('symbol'), $periodical->language->getVar('alias')));
		}
	}

	function saveNumberofList($values) {
		$numberofHandler =& xoops_getmodulehandler('numberof', 'compounds');
		
		foreach (array_keys($values['id']) as $id) {
			$numberof = $numberofHandler->get($id);
			$numberof->setVar('updated', time());
			$numberof->language->setVar('updated', time());
			$numberof->language->setVar('uid', $GLOBALS['xoopsUser']->getVar('uid'));
		
			$numberof->setVar('symbol', $values['symbol'][$id]);
			$numberof->setVar('weight', $values['weight'][$id]);			
			$numberof->setVar('point', $values['point'][$id]);
			$numberof->language->setVar('alias', $values['alias'][$id]);
		
			$numberofHandler->insert($numberof, true, $GLOBALS['xoopsConfig']['language']);
		}
		redirect_header('index.php?op=numberof', 4, _CMP_AM_NUMBEROF_LIST_SAVEOK);
		exit(0);
	}
	
	function saveNumberof($values) {
	
		$numberofHandler =& xoops_getmodulehandler('numberof', 'compounds');
		
		if ($values['id']<>0) {
			$numberof = $numberofHandler->get($values['id']);
			$numberof->setVar('updated', time());
			$numberof->language->setVar('updated', time());
		} else {
			$numberof = $numberofHandler->get(0);
			$numberof->setVar('created', time());
			$numberof->language->setVar('created', time());	
		}
		
		$numberof->setVars($values);
		$numberof->language->setVar('alias', $values['alias']);
		
		if ($id = $numberofHandler->insert($numberof, true, $GLOBALS['xoopsConfig']['language'])) {
			redirect_header('index.php?op=edit&fct=numberof&id='.$id, 4, sprintf(_CMP_AM_NUMBEROF_SAVE_OK, $numberof->getVar('symbol'), $numberof->language->getVar('alias')));
		} else {
			redirect_header('index.php?op=numberof', 4, sprintf(_CMP_AM_NUMBEROF_SAVE_NOTOK, $numberof->getVar('symbol'), $numberof->language->getVar('alias')));
		}
	}

	function saveCompositeList($values) {
		$compositeHandler =& xoops_getmodulehandler('composite', 'compounds');
		
		foreach (array_keys($values['id']) as $id) {
			$composite = $compositeHandler->get($id);
			$composite->setVar('updated', time());
			$composite->language->setVar('updated', time());
			$composite->language->setVar('uid', $GLOBALS['xoopsUser']->getVar('uid'));
		
			$composite->setVar('symbol', $values['symbol'][$id]);
			$composite->setVar('weight', $values['weight'][$id]);			
			$composite->setVar('point', $values['point'][$id]);
			$composite->language->setVar('alias', $values['alias'][$id]);
		
			$compositeHandler->insert($composite, true, $GLOBALS['xoopsConfig']['language']);
		}
		redirect_header('index.php?op=composite', 4, _CMP_AM_COMPOSITE_LIST_SAVEOK);
		exit(0);
	}
	
	function saveComposite($values) {
	
		$compositeHandler =& xoops_getmodulehandler('composite', 'compounds');
		
		if ($values['id']<>0) {
			$composite = $compositeHandler->get($values['id']);
			$composite->setVar('updated', time());
			$composite->language->setVar('updated', time());
		} else {
			$composite = $compositeHandler->get(0);
			$composite->setVar('created', time());
			$composite->language->setVar('created', time());	
		}
		
		$composite->setVars($values);
		$composite->language->setVar('alias', $values['alias']);
		
		if ($id = $compositeHandler->insert($composite, true, $GLOBALS['xoopsConfig']['language'])) {
			redirect_header('index.php?op=edit&fct=composite&id='.$id, 4, sprintf(_CMP_AM_COMPOSITE_SAVE_OK, $composite->getVar('symbol'), $composite->language->getVar('alias')));
		} else {
			redirect_header('index.php?op=composite', 4, sprintf(_CMP_AM_COMPOSITE_SAVE_NOTOK, $composite->getVar('symbol'), $composite->language->getVar('alias')));
		}
	}
	
	function saveEditCompound($compound_id)
	{
		$compoundHandler =& xoops_getmodulehandler('compound', 'compounds');
		$chem_symbol = $compoundHandler->getSymbolisation($_REQUEST['compound']);
		$chemicals = $compoundHandler->getObjects(new Criteria('symbol', $chem_symbol));

		$compounds = $compoundHandler->getObjects(new Criteria('id', $compound_id));
		
		if (is_object($compounds))
			$compound = $compounds;
		elseif (is_array($compounds))
			$compound = $compounds[0];
			
		if (is_object($GLOBALS['xoopsUser'])) {
			$uuid = $GLOBALS['xoopsUser']->getVar('uid');
			$cuid = $compound->getVar('uid');
			if ( $uuid != $cuid ) {
				redirect_header('info.php?id='.$compound->getVar('id'), 8, sprintf(_CMP_RH_COMPOUND_DONOTOWN, $compoundHandler->renderSymbolisation($chem_symbol, true)));
				exit(0);
			
			} 
			if ($uuid == 0) {
				redirect_header('info.php?id='.$compound->getVar('id'), 8, sprintf(_CMP_RH_COMPOUND_NOTLOGGEDIN, $compoundHandler->renderSymbolisation($chem_symbol, true)));
				exit(0);	
			}
		} else {
			redirect_header('info.php?id='.$compound->getVar('id'), 8, sprintf(_CMP_RH_COMPOUND_DONOTOWN, $compoundHandler->renderSymbolisation($chem_symbol, true)));
			exit(0);
		}
			
			
		$chainLinkHandler =& xoops_getmodulehandler('chain_link', 'compounds');
		$chainComponentsHandler =& xoops_getmodulehandler('chain_components', 'compounds');
	
		$chainLinks =& $chainLinkHandler->getObjects(new Criteria('chain_id',$compound->getVar('chain_id')));
		
		if (is_object($chainLinks))
			$chainLink = $chainLinks;
		elseif (is_array($chainLinks))
			$chainLink = $chainLinks[0];
								
		extract($_REQUEST['compound']);
		$chain_id = $compound->getVar('chain_id');
		
		$weight++;
		foreach ( $periodical as $yy => $value ) {
			if ($number[$yy]!=0||$periodical[$yy]!=0||$composition[$yy][1]!=0||$composition[$yy][2]!=0)
			{
				$chainComponents =& $chainComponentsHandler->getObjects(new Criteria('id',$yy));
				if (is_object($chainComponents))
					$chainComponent = $chainComponents;
				elseif (is_array($chainComponents))
					$chainComponent = $chainComponents[0];
	
				$chainComponent->setVar('weight', $weight);
	
				if ($number[$yy]!=0)
					$chainComponent->setVar('number', $number[$yy]);
				else
					$chainComponent->setVar('number', 0);
					
				if ($periodical[$yy]!=0)
					$chainComponent->setVar('perodic_id', $periodical[$yy]);
				else
					$chainComponent->setVar('perodic_id', 0);
					
				if ($composition[$yy][1]!=0)
					$chainComponent->setVar('super_composition', $composition[$yy][1]);										
				else
					$chainComponent->setVar('super_composition', 0);
															
				if ($composition[$yy][2]!=0)
					$chainComponent->setVar('sub_composition', $composition[$yy][2]);
				else
					$chainComponent->setVar('sub_composition', 0);										
				if ($chainComponentsHandler->insert($chainComponent)) { 
					$weight++;
				}					
			} else {
				$chainComponents =& $chainComponentsHandler->getObjects(new Criteria('id',$yy));
				if (is_object($chainComponents))
					$chainComponent = $chainComponents;
				elseif (is_array($chainComponents))
					$chainComponent = $chainComponents[0];
				if ($chainComponentsHandler->delete($chainComponent)) { }					
			}
		}
	
		$weight--;
		$chainLink->setVar('components', $weight);
		
		if ($chainLinkHandler->insert($chainLink)) {
			redirect_header('index.php', 4, sprintf(_CMP_RH_CHAINLINK_NOUPDATE, $compoundHandler->renderSymbolisation($chem_symbol, true)));
			exit(0);
		}	
		
		$compound->setVar('chain_id', $chain_id);
		$compound->setVar('symbol', $chem_symbol);
		if (is_object($GLOBALS['xoopsUser']))
			$compound->setVar('uid', $GLOBALS['xoopsUser']->getVar('uid'));
		$compound->setVar('updated', time());			
		$compound->setVar('chem_tags', $_REQUEST["chem_tags"]);
		$compound->language->setVar('updated', time());
		$compound->language->setVar('alias', $alias);
		$compound->language->setVar('hyposise', $_REQUEST["hyposise"]);
		$compound->language->setVar('synopsise', $_REQUEST["synopsise"]);
		$compound->language->setVar('process', $_REQUEST["process"]);	
		
		if ($compound_id = $compoundHandler->insert($compound)) {
			if (file_exists(XOOPS_ROOT_PATH.'/modules/tag/class/tag.php')) {
				$tag_handler = xoops_getmodulehandler('tag', 'tag');
				$tag_handler->updateByItem($_REQUEST["chem_tags"], $compound_id, $GLOBALS['xoopsModule']->getVar("dirname"), $catid = 0);
			}			
			$uidLinkHandler =& xoops_getmodulehandler('uid_link', 'compounds');
			$uidlink = $uidLinkHandler->get($GLOBALS['xoopsUser']->getVar('uid'));
			if (!is_object($uidlink)) {
				$uidlink = $uidLinkHandler->get(0);
				$uidlink->setVar('uid', $GLOBALS['xoopsUser']->getVar('uid'));
			}
			$submission = intval($uidlink->getVar('submissions'));
			$score = floatval($uidlink->getVar('score'));
			$submission++;
			$score = $score + floatval('0.0' . rand(0,9) . rand(0,9) . rand(0,9). rand(0,9));
			$uidlink->setVar('submissions', $submission);
			$uidlink->setVar('score', $score);
			@$uidLinkHandler->insert($uidlink);
			
			if (!strpos($_SERVER['REQUEST_URI'], 'compounds/admin/'))
				redirect_header('info.php?id='.$compound_id, 8, sprintf(	_CMP_RH_COMPOUND_EDITED, $compoundHandler->renderSymbolisation($chem_symbol, true)));
			else
				redirect_header('index.php?op=list', 8, sprintf(	_CMP_RH_COMPOUND_EDITED, $compoundHandler->renderSymbolisation($chem_symbol, true)));
			exit(0);	
		} else {
			redirect_header('index.php', 4, sprintf(_CMP_RH_COMPOUND_NOCREATION, $compoundHandler->renderSymbolisation($chem_symbol, true)));
			exit(0);		
		}
	}
	
	function saveNewCompound() {

		$compoundHandler =& xoops_getmodulehandler('compound', 'compounds');
		$chem_symbol = $compoundHandler->getSymbolisation($_REQUEST['compound']);
		$chemicals = $compoundHandler->getObjects(new Criteria('symbol', $chem_symbol));
		if (count($chemicals)>0) {
			redirect_header('info.php?id='.$chemicals[0]->getVar('id'), 8, sprintf(_CMP_RH_COMPOUND_EXISTS, $compoundHandler->renderSymbolisation($chem_symbol, true)));
			exit(0);
		}
			
		$chainLinkHandler =& xoops_getmodulehandler('chain_link', 'compounds');
		$chainComponentsHandler =& xoops_getmodulehandler('chain_components', 'compounds');

		$chainLink =& $chainLinkHandler->get(0);
		
		if (is_object($GLOBALS['xoopsUser']))
			$chainLink->setVar('uid', $GLOBALS['xoopsUser']->getVar('uid'));
		else {
			redirect_header('index.php', 8, sprintf(_CMP_RH_COMPOUND_NOTLOGGEDIN, $compoundHandler->renderSymbolisation($chem_symbol, true)));
			exit(0);	
		}
		
		if ($chainLinkHandler->insert($chainLink)) {
			redirect_header('index.php', 4, sprintf(_CMP_RH_CHAINLINK_NOCREATION, $compoundHandler->renderSymbolisation($chem_symbol, true)));
			exit(0);
		}	
				
		extract($_REQUEST['compound']);
		$chain_id = $GLOBALS['xoopsDB']->getInsertId();
		
		$weight++;
		for ( $yy = 0; $yy < $size; $yy++ ) {
			if ($number[$yy]!=0||$periodical[$yy]!=0||$composition[$yy][1]!=0||$composition[$yy][2]!=0)
			{
				$chainComponents =& $chainComponentsHandler->get(0);
				$chainComponents->setVar('weight', $weight);
				$chainComponents->setVar('chain_id', $chain_id);
				if (is_object($GLOBALS['xoopsUser']))
					$chainComponents->setVar('uid', $GLOBALS['xoopsUser']->getVar('uid'));
				if ($number[$yy]!=0)
					$chainComponents->setVar('number', $number[$yy]);
				if ($periodical[$yy]!=0)
					$chainComponents->setVar('perodic_id', $periodical[$yy]);
				if ($composition[$yy][1]!=0)
					$chainComponents->setVar('super_composition', $composition[$yy][1]);										
				if ($composition[$yy][2]!=0)
					$chainComponents->setVar('sub_composition', $composition[$yy][2]);										
				if ($chainComponentsHandler->insert($chainComponents)) { 
					$weight++;
				}					
			}
		}

		$weight--;
		$chainLink->setVar('components', $weight);
		
		if ($chainLinkHandler->insert($chainLink)) {
			if (!strpos($_SERVER['PHP_SELF'], 'admin/index.php'))
				redirect_header('index.php', 4, sprintf(_CMP_RH_CHAINLINK_NOUPDATE, $compoundHandler->renderSymbolisation($chem_symbol, true)));
			else
				redirect_header('index.php', 4, sprintf(_CMP_RH_CHAINLINK_NOUPDATE, $compoundHandler->renderSymbolisation($chem_symbol, true)));
			exit(0);
		}	
		
		$compound =& $compoundHandler->get(0);
		
		$compound->setVar('chain_id', $chain_id);
		$compound->setVar('alias', $alias);
		$compound->setVar('symbol', $chem_symbol);
		if (is_object($GLOBALS['xoopsUser']))
			$compound->setVar('uid', $GLOBALS['xoopsUser']->getVar('uid'));
		$compound->setVar('created', time());			
		$compound->setVar('chem_tags', $_REQUEST["chem_tags"]);	
		$compound->language->setVar('created', time());
		$compound->language->setVar('alias', $alias);
		$compound->language->setVar('hyposise', $_REQUEST["hyposise"]);
		$compound->language->setVar('synopsise', $_REQUEST["synopsise"]);
		$compound->language->setVar('process', $_REQUEST["process"]);	
				
		if ($compound_id = $compoundHandler->insert($compound)) {
			if (file_exists(XOOPS_ROOT_PATH.'/modules/tag/class/tag.php')) {
				$tag_handler = xoops_getmodulehandler('tag', 'tag');
				$tag_handler->updateByItem($_REQUEST["chem_tags"], $compound_id, $GLOBALS['xoopsModule']->getVar("dirname"), $catid = 0);
			}
						
			$uidLinkHandler =& xoops_getmodulehandler('uid_link', 'compounds');
			$uidlink = $uidLinkHandler->get($GLOBALS['xoopsUser']->getVar('uid'));
			if (!is_object($uidlink)) {
				$uidlink = $uidLinkHandler->get(0);
				$uidlink->setVar('uid', $GLOBALS['xoopsUser']->getVar('uid'));
			}
			$submission = intval($uidlink->getVar('submissions'));
			$score = floatval($uidlink->getVar('score'));
			$submission++;
			$score = $score + floatval('0.' . rand(4,8) . rand(3,9) . rand(0,9). rand(0,9));
			$uidlink->setVar('submissions', $submission);
			$uidlink->setVar('score', $score);
			@$uidLinkHandler->insert($uidlink);
			
			if (!strpos($_SERVER['PHP_SELF'], 'admin/index.php'))
				redirect_header('info.php?id='.$compound_id, 8, sprintf(	_CMP_RH_COMPOUND_CREATED, $compoundHandler->renderSymbolisation($chem_symbol, true)));
			else
				redirect_header('index.php?op=list', 8, sprintf(	_CMP_RH_COMPOUND_CREATED, $compoundHandler->renderSymbolisation($chem_symbol, true)));
			exit(0);	
		} else {
			redirect_header('index.php', 4, sprintf(_CMP_RH_COMPOUND_NOCREATION, $compoundHandler->renderSymbolisation($chem_symbol, true)));
			exit(0);		
		}
	}
	
	function chronolabs_inline($flash = false)
	{
	
		$ret = '<div style="clear:both; height 10px;">&nbsp;</div>
<div style="clear:both; height 10px;"><center><img src="http://www.chronolabs.org.au/images/banners/loader/supportimage.php?flash=false" /></center></div>
<div style="clear:both;">Chronolabs offer limited free support should you want some development work done please contact us <a href="http://www.chronolabs.org.au/liaise/">on the question for a quote form.</a> We offer a wide range of XOOPS Professional Solution and have options for Basic SEO and marketing of your site as well as Search Engine Optimization for <a href="http://www.xoops.org/">XOOPS</a>. If you are looking for work done with this module/application or are looking for development on your site please contact us.</div>';
		return $ret;
	}
?>