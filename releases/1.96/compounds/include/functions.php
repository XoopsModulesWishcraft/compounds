<?php

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
			$uuid = intval($GLOBALS['xoopsUser']->getVar('uid'));
			$cuid = intval($compound->getVar('uid'));
			if ( $uuid != $cuid ) {
				redirect_header('info.php?id='.$compound->getVar('id'), 8, sprintf(_CMP_RH_COMPOUND_DONOTOWN, $compoundHandler->renderSymbolisation($chem_symbol, true)));
				exit(0);
			
			} elseif ($uuid == 0) {
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
		$compound->setVar('alias', $alias);
		$compound->setVar('symbol', $chem_symbol);
		if (is_object($GLOBALS['xoopsUser']))
			$compound->setVar('uid', $GLOBALS['xoopsUser']->getVar('uid'));
		$compound->setVar('created', time());			
		$compound->setVar('chem_tags', $_REQUEST["chem_tags"]);
		$compound->setVar('hyposise', $_REQUEST["hyposise"]);
		$compound->setVar('synopisise', $_REQUEST["synopisise"]);
		$compound->setVar('process', $_REQUEST["process"]);	
		
		if ($compoundHandler->insert($compound)) {
			$compound_id = $compound_id;
			$tag_handler = xoops_getmodulehandler('tag', 'tag');
			$tag_handler->updateByItem($_REQUEST["chem_tags"], $compound_id, $GLOBALS['xoopsModule']->getVar("dirname"), $catid = 0);
			
			$uidLinkHandler =& xoops_getmodulehandler('uid_link', 'compounds');
			$uidlink = $uidLinkHandler->get($GLOBALS['xoopsUser']->getVar('uid'));
			if (!is_object($uidlink)) {
				$uidlink = $uidLinkHandler->create();
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
				redirect_header('admin.php?op=list', 8, sprintf(	_CMP_RH_COMPOUND_EDITED, $compoundHandler->renderSymbolisation($chem_symbol, true)));
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

		$chainLink =& $chainLinkHandler->create();
		
		if (is_object($GLOBALS['xoopsUser']))
			$chainLink->setVar('uid', $GLOBALS['xoopsUser']->getVar('uid'));
			if (intval($GLOBALS['xoopsUser']->getVar('uid'))==0) {
				redirect_header('index.php', 8, sprintf(_CMP_RH_COMPOUND_NOTLOGGEDIN, $compoundHandler->renderSymbolisation($chem_symbol, true)));
				exit(0);			
			}
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
				$chainComponents =& $chainComponentsHandler->create();
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
			redirect_header('index.php', 4, sprintf(_CMP_RH_CHAINLINK_NOUPDATE, $compoundHandler->renderSymbolisation($chem_symbol, true)));
			exit(0);
		}	
		
		$compound =& $compoundHandler->create();
		
		$compound->setVar('chain_id', $chain_id);
		$compound->setVar('alias', $alias);
		$compound->setVar('symbol', $chem_symbol);
		if (is_object($GLOBALS['xoopsUser']))
			$compound->setVar('uid', $GLOBALS['xoopsUser']->getVar('uid'));
		$compound->setVar('created', time());			
		$compound->setVar('chem_tags', $_REQUEST["chem_tags"]);	
		$compound->setVar('hyposise', $_REQUEST["hyposise"]);
		$compound->setVar('synopisise', $_REQUEST["synopisise"]);
		$compound->setVar('process', $_REQUEST["process"]);	
				
		if ($compoundHandler->insert($compound)) {
			$compound_id = $GLOBALS['xoopsDB']->getInsertId();
			$tag_handler = xoops_getmodulehandler('tag', 'tag');
			$tag_handler->updateByItem($_REQUEST["chem_tags"], $compound_id, $GLOBALS['xoopsModule']->getVar("dirname"), $catid = 0);
			
			$uidLinkHandler =& xoops_getmodulehandler('uid_link', 'compounds');
			$uidlink = $uidLinkHandler->get($GLOBALS['xoopsUser']->getVar('uid'));
			if (!is_object($uidlink)) {
				$uidlink = $uidLinkHandler->create();
				$uidlink->setVar('uid', $GLOBALS['xoopsUser']->getVar('uid'));
			}
			$submission = intval($uidlink->getVar('submissions'));
			$score = floatval($uidlink->getVar('score'));
			$submission++;
			$score = $score + floatval('0.' . rand(4,8) . rand(3,9) . rand(0,9). rand(0,9));
			$uidlink->setVar('submissions', $submission);
			$uidlink->setVar('score', $score);
			@$uidLinkHandler->insert($uidlink);
			
			if (!strpos($_SERVER['REQUEST_URI'], 'compounds/admin/'))
				redirect_header('info.php?id='.$compound_id, 8, sprintf(	_CMP_RH_COMPOUND_CREATED, $compoundHandler->renderSymbolisation($chem_symbol, true)));
			else
				redirect_header('admin.php?op=list', 8, sprintf(	_CMP_RH_COMPOUND_CREATED, $compoundHandler->renderSymbolisation($chem_symbol, true)));
			exit(0);	
		} else {
			redirect_header('index.php', 4, sprintf(_CMP_RH_COMPOUND_NOCREATION, $compoundHandler->renderSymbolisation($chem_symbol, true)));
			exit(0);		
		}
	}
	
?>