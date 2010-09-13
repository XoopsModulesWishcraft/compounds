<?php
if (!defined('XOOPS_ROOT_PATH')) { exit(); }

global $adminmenu;

$adminmenu = array();

$adminmenu[]= array("link"    	=> "admin/index.php",
                    "title"    	=> _CMP_AM_MAININDEX,
					"icon"		=> "images/mainindex.png");
$adminmenu[]= array("link"    	=> "admin/index.php?op=list",
                    "title"    	=> _CMP_AM_COMPOUNDLIST,
					"icon"		=> "images/compoundlist.png");
$adminmenu[]= array("link"    	=> "admin/index.php?op=new",
                    "title"    	=> _CMP_AM_COMPOUNDNEW,
					"icon"		=> "images/compoundnew.png");
$adminmenu[]= array("link"    	=> "admin/index.php?op=periodical",
                    "title"    	=> _CMP_AM_PERIODICAL,
					"icon"		=> "images/periodical.png");					
$adminmenu[]= array("link"    	=> "admin/index.php?op=numberof",
                    "title"    	=> _CMP_AM_NUMBEROF,
					"icon"		=> "images/numberof.png");					
$adminmenu[]= array("link"    	=> "admin/index.php?op=composites",
                    "title"    	=> _CMP_AM_COMPOSITE,
					"icon"		=> "images/composite.png");					

?>