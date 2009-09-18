<?php
	
	include 'header.php';
	include_once '../include/form.compound.php';
	include_once '../include/functions.php';
	include_once '../../../class/pagenav.php';
	
	$compoundHandler =& xoops_getmodulehandler('compound', 'compounds');
	$periodicalHandler =& xoops_getmodulehandler('periodical', 'compounds');
	$chainLinkHandler =& xoops_getmodulehandler('chain_link', 'compounds');
	$chainComponentsHandler =& xoops_getmodulehandler('chain_components', 'compounds');
	$uidLinkHandler =& xoops_getmodulehandler('uid_link', 'compounds');
	
	$sql = "SELECT SUM(`donations`) as ttlDonations FROM " . $GLOBALS['xoopsDB']->prefix('uid_link');
	
	list($donation) = $GLOBALS['xoopsDB']->fetchRow($GLOBALS['xoopsDB']->queryF($sql));
	
		$sql = "SELECT SUM(`amount`) as ttlAmount FROM " . $GLOBALS['xoopsDB']->prefix('uid_link');
	
	list($amount) = $GLOBALS['xoopsDB']->fetchRow($GLOBALS['xoopsDB']->queryF($sql));
	
	$donations['total_done'] = empty($donation)?'0':$donation;
	$donations['total_cash'] = empty($amount)?'0.0000':$amount;
	
	$userSubmissions['count'] = $compoundHandler->getCount(new Criteria('uid', '0', '>'));
	$molecularSubmissions['count'] = $compoundHandler->getCount(NULL);
	$sevendaySubmissions['count'] = $compoundHandler->getCount(new Criteria('created', time() - (((60*60)*24)*7), '>'));
	$forteendaySubmissions['count'] = $compoundHandler->getCount(new Criteria('created', time() - (((60*60)*24)*14), '>'));
	
	$userSubmissions['url']  = '<a href="'.XOOPS_URL.'/modules/compounds/admin/admin.php?op=list&fct=users">'.$userSubmissions['count'].'</a>';
	
	$molecularSubmissions['url']  = '<a href="'.XOOPS_URL.'/modules/compounds/admin/admin.php?op=list&fct=molecular">'.$molecularSubmissions['count'].'</a>';
	
	$sevendaySubmissions['url']  = '<a href="'.XOOPS_URL.'/modules/compounds/admin/admin.php?op=list&fct=sevenday">'.$sevendaySubmissions['count'].'</a>';
	
	$forteendaySubmissions['url']  = '<a href="'.XOOPS_URL.'/modules/compounds/admin/admin.php?op=list&fct=forteenday">'.$forteendaySubmissions['count'].'</a>';
	
	$op = !empty($_REQUEST['op'])?strtolower($_REQUEST['op']):'default';
	$id = !empty($_REQUEST['id']) ?(int)($_REQUEST['id']):0;
	$itmppg = !empty($_REQUEST['itmppg']) ?(int)($_REQUEST['itmppg']):30;
	$start = !empty($_REQUEST['start']) ?(int)($_REQUEST['start']):0;
	
	xoops_cp_header();
	
	switch ($op) {
	case 'delete':
		$compound = $compoundHandler->getObjects(new Criteria('id', $id));
		$sql[0] = "DELETE FROM ".$GLOBALS['xoopsDB']->prefix('chain_link') . ' WHERE chain_id = '.$compound[0]->getVar('chain_id');
		$sql[1] = "DELETE FROM ".$GLOBALS['xoopsDB']->prefix('chain_components') . ' WHERE chain_id = '.$compound[0]->getVar('chain_id');
		$sql[2] = "DELETE FROM ".$GLOBALS['xoopsDB']->prefix('compound') . ' WHERE id = '.$id;		
		if ($GLOBALS['xoopsDB']->queryF($sql[0]))
			if ($GLOBALS['xoopsDB']->queryF($sql[1]))
				if ($GLOBALS['xoopsDB']->queryF($sql[2])) {
				
					$uidLinkHandler =& xoops_getmodulehandler('uid_link', 'compounds');
					$uidlink = $uidLinkHandler->get($compound[0]->getVar('uid'));
					if (!is_object($uidlink)) {
						$uidlink = $uidLinkHandler->create();
						$uidlink->setVar('uid', $GLOBALS['xoopsUser']->getVar('uid'));
					}
					$submission = intval($uidlink->getVar('submissions'));
					$submission--;
					$uidlink->setVar('submissions', $submission);
					@$uidLinkHandler->insert($uidlink);

					redirect_header(XOOPS_URL.'/modules/compounds/admin/admin.php?op=list', 4, sprintf(_CMP_AM_COMPOUNDDELETE_SUCCESSFUL, $compoundHandler->renderSymbolisation($compound[0]->getVar('symbol'))));
				} else
					redirect_header(XOOPS_URL.'/modules/compounds/admin/admin.php?op=list', 4, sprintf(_CMP_AM_COMPOUNDDELETE_UNSUCCESSFUL, $compoundHandler->renderSymbolisation($compound[0]->getVar('symbol'))));
			else
				redirect_header(XOOPS_URL.'/modules/compounds/admin/admin.php?op=list', 4, sprintf(_CMP_AM_COMPOUNDDELETE_UNSUCCESSFUL, $compoundHandler->renderSymbolisation($compound->getVar('symbol'))));
		else
			redirect_header(XOOPS_URL.'/modules/compounds/admin/admin.php?op=list', 4, sprintf(_CMP_AM_COMPOUNDDELETE_UNSUCCESSFUL, $compoundHandler->renderSymbolisation($compound->getVar('symbol'))));					
		exit(0);
		
	case 'save':
	
		if ($_REQUEST['hyposise_editor_current'] != $_REQUEST['hyposise_editor'] || $_REQUEST['process_editor_current'] != $_REQUEST['process_editor'] || $_REQUEST['synopisise_editor_current'] != $_REQUEST['synopisise_editor'] ) {
			echo function_exists("loadModuleAdminMenu") ? loadModuleAdminMenu(2) : "";
			echo '<div style="border:dotted; height: 1.5em; clear:both; margin-bottom:8px; padding-top: 3px; padding-bottom: 3px; padding-right: 4px;">
			<div style="float:left; border-right:dotted; padding-left:10px; padding-right:10px;">User Submissions: '.$userSubmissions['url'].'</div>
			<div style="float:left; border-right: dotted; padding-left:10px; padding-right:10px;">Molecular Submissions: '.$molecularSubmissions['url'].'</div>
			<div style="float:left; border-right: dotted; padding-left:10px; padding-right:10px;">7 Day Submissions: '.$sevendaySubmissions['url'].'</div>
			<div style="float:left; border-right: dotted; padding-left:10px; padding-right:10px;">Donations so Far: '.$donations['total_done'].'</div>
			<div style="float:left; border-right: dotted; padding-left:10px; padding-right:10px;">Total Cash: (USD) $'.$donations['total_cash'].'</div>
		</div>';
			echo formCompound($id);
			exit(0);
		}
		
		switch ($_REQUEST['fct']) {
		case "edit":
			saveEditCompound(intval($_REQUEST['compound_id']));
			break;
		case "new":
		default:
			saveNewCompound();
		break;
		}
	case 'list':
		echo function_exists("loadModuleAdminMenu") ? loadModuleAdminMenu(2) : "";
		echo '<div style="border:dotted; height: 1.5em; clear:both; margin-bottom:8px; padding-top: 3px; padding-bottom: 3px; padding-right: 4px;">
		<div style="float:left; border-right:dotted; padding-left:10px; padding-right:10px;">User Submissions: '.$userSubmissions['url'].'</div>
		<div style="float:left; border-right: dotted; padding-left:10px; padding-right:10px;">Molecular Submissions: '.$molecularSubmissions['url'].'</div>
		<div style="float:left; border-right: dotted; padding-left:10px; padding-right:10px;">7 Day Submissions: '.$sevendaySubmissions['url'].'</div>
		<div style="float:left; border-right: dotted; padding-left:10px; padding-right:10px;">14 Day Submissions: '.$forteendaySubmissions['url'].'</div>
		<div style="float:left; border-right: dotted; padding-left:10px; padding-right:10px;">Donations so Far: '.$donations['total_done'].'</div>
		<div style="float:left; border-right: dotted; padding-left:10px; padding-right:10px;">Total Cash: (USD) $'.$donations['total_cash'].'</div>	
	</div>';

		switch ($_REQUEST['fct']) {
		case 'molecular':
			$pgnav = new XoopsPageNav($molecularSubmissions['count'], $itmppg, $start);
			$criteria = new Criteria('id', '0', '<>');
			break;
		case 'sevenday':
			$pgnav = new XoopsPageNav($sevendaySubmissions['count'], $itmppg, $start);
			$criteria = new Criteria('created', time() - (((60*60)*24)*7), '>');
			break;
		case 'forteenday':	
			$pgnav = new XoopsPageNav($forteendaySubmissions['count'], $itmppg, $start);
			$criteria = new Criteria('created', time() - (((60*60)*24)*14), '>');
			break;
		default:
		case 'users':
			$pgnav = new XoopsPageNav($userSubmissions['count'], $itmppg, $start);
			$criteria = new Criteria('uid', '0', '>');
			break;
		}
		$criteria->setOrder('created');
		$criteria->setStart($start);
		$criteria->setLimit($itmppg);
		
		echo '<div style="clear:both; float:right;">' . $pgnav->renderNav() . '</div>';
		
		echo formList($compoundHandler->getObjects($criteria, true), $compoundHandler);
		break;
		
	default:
	case 'edit':
		echo function_exists("loadModuleAdminMenu") ? loadModuleAdminMenu(1) : "";
		echo '<div style="border:dotted; height: 1.5em; clear:both; margin-bottom:8px; padding-top: 3px; padding-bottom: 3px; padding-right: 4px;">
		<div style="float:left; border-right:dotted; padding-left:10px; padding-right:10px;">User Submissions: '.$userSubmissions['url'].'</div>
		<div style="float:left; border-right: dotted; padding-left:10px; padding-right:10px;">Molecular Submissions: '.$molecularSubmissions['url'].'</div>
		<div style="float:left; border-right: dotted; padding-left:10px; padding-right:10px;">7 Day Submissions: '.$sevendaySubmissions['url'].'</div>
		<div style="float:left; border-right: dotted; padding-left:10px; padding-right:10px;">14 Day Submissions: '.$forteendaySubmissions['url'].'</div>
		<div style="float:left; border-right: dotted; padding-left:10px; padding-right:10px;">Donations so Far: '.$donations['total_done'].'</div>
		<div style="float:left; border-right: dotted; padding-left:10px; padding-right:10px;">Total Cash: (USD) $'.$donations['total_cash'].'</div>	
	</div>';
		echo formCompound($id);
		break;

	case 'new':
		echo function_exists("loadModuleAdminMenu") ? loadModuleAdminMenu(2) : "";
		echo '<div style="border:dotted; height: 1.5em; clear:both; margin-bottom:8px; padding-top: 3px; padding-bottom: 3px; padding-right: 4px;">
		<div style="float:left; border-right:dotted; padding-left:10px; padding-right:10px;">User Submissions: '.$userSubmissions['url'].'</div>
		<div style="float:left; border-right: dotted; padding-left:10px; padding-right:10px;">Molecular Submissions: '.$molecularSubmissions['url'].'</div>
		<div style="float:left; border-right: dotted; padding-left:10px; padding-right:10px;">7 Day Submissions: '.$sevendaySubmissions['url'].'</div>
		<div style="float:left; border-right: dotted; padding-left:10px; padding-right:10px;">Donations so Far: '.$donations['total_done'].'</div>
		<div style="float:left; border-right: dotted; padding-left:10px; padding-right:10px;">Total Cash: (USD) $'.$donations['total_cash'].'</div>
	</div>';
		echo formCompound($id);
		break;
		
	}
	
	xoops_cp_footer();
?>

