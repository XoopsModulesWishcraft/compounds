<?php
if (!defined('XOOPS_ROOT_PATH')) { exit(); }

global $adminmenu;

$adminmenu = array();

$adminmenu[]= array("link"    	=> "admin/admin.php",
                    "title"    	=> _CMP_AM_MAININDEX,
					"icon"		=> "images/mainindex.png");
$adminmenu[]= array("link"    	=> "admin/admin.php?op=list",
                    "title"    	=> _CMP_AM_COMPOUNDLIST,
					"icon"		=> "images/compoundlist.png");
$adminmenu[]= array("link"    	=> "admin/admin.php?op=new",
                    "title"    	=> _CMP_AM_COMPOUNDNEW,
					"icon"		=> "images/compoundnew.png");
?>