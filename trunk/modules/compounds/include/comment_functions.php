<?php

function compounds_com_update($item_id, $total_num)
{
	$compoundHandler =& xoops_getmodulehandler('compound', 'compounds');
	$uidLinkHandler =& xoops_getmodulehandler('uid_link', 'compounds');
	$compound = $compoundHandler->get($item_id);
	$uidLink = $uidLinkHandler->get($compound->getVar('uid'));
	$compound->setVar('comments', $total_num)
	$ucomments = $uidLink->getVar('comments');
	$ucomments++;
	$uidLink->setVar('comments', $ucomments);
	@$compoundHandler->insert($compound);
	@$uidLinkHandler->insert($uidLink);
} 

function compounds_com_approve(&$comment)
{ 
    // notification mail here
} 


?>