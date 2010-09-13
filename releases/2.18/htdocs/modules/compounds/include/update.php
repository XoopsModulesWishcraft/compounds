<?php
function xoops_module_update_compounds(&$module) {

	ini_set("max_execution_time", "600");  

	$sql[0] = "CREATE TABLE ".$GLOBALS['xoopsDB']->prefix("compounds_language")." (   
					  `id` INT(12) UNSIGNED NOT NULL AUTO_INCREMENT,     
					  `language` VARCHAR(255) DEFAULT NULL,                  
					  `periodic_id` INT(12) UNSIGNED NOT NULL DEFAULT '0',  
					  `composite_id` INT(12) UNSIGNED NOT NULL DEFAULT '0',  
					  `numberof_id` INT(12) UNSIGNED NOT NULL DEFAULT '0',  					  
					  `compound_id` INT(12) UNSIGNED NOT NULL DEFAULT '0',  
					  `symbol` VARCHAR(4) DEFAULT NULL,                  
					  `alias` VARCHAR(255) DEFAULT NULL,                  
					  `hyposise` MEDIUMTEXT,                             
					  `process` MEDIUMTEXT,                              
					  `synopsise` MEDIUMTEXT,                            
					  `uid` INT(12) UNSIGNED DEFAULT '0',                
					  `created` INT(13) UNSIGNED DEFAULT '0',            
					  `updated` INT(13) UNSIGNED DEFAULT '0',            
					  PRIMARY KEY (`id`)                                                
			) ENGINE=MYISAM DEFAULT CHARSET=utf8";	

	$sql[1] = "INSERT INTO ".$GLOBALS['xoopsDB']->prefix("compounds_language").' (`language`, `compound_id`, `symbol`, `hyposise`, `process`, `synopsise`, `uid`, `created`, `update`) SELECT \''.$GLOBALS['xoopsConfig']['language'].'\', `id`, `symbol`, `hyposise`, `process`, `synopisise`, `uid`, `created`, \''.time().'\' FROM `'.$GLOBALS['xoopsDB']->prefix("compound").'`';	

	$sql[2] = "ALTER TABLE ".$GLOBALS['xoopsDB']->prefix("compound").' DROP COLUMN `hyposise`';
	$sql[3] = "ALTER TABLE ".$GLOBALS['xoopsDB']->prefix("compound").' DROP COLUMN `process`';
	$sql[4] = "ALTER TABLE ".$GLOBALS['xoopsDB']->prefix("compound").' DROP COLUMN `synopisise`';
	$sql[5] = "ALTER TABLE ".$GLOBALS['xoopsDB']->prefix("numberof").' ADD COLUMN `weight` tinyint(5) DEFAULT \'1\'';
	$sql[6] = "ALTER TABLE ".$GLOBALS['xoopsDB']->prefix("composite").' ADD COLUMN `weight` tinyint(5) DEFAULT \'1\'';
	
	if ($GLOBALS['xoopsDB']->queryF($sql[0])) {
		echo '<pre>'.$sql[0].'</pre>';
		@$GLOBALS['xoopsDB']->queryF($sql[1]);
		@$GLOBALS['xoopsDB']->queryF($sql[2]);
		@$GLOBALS['xoopsDB']->queryF($sql[3]);
		@$GLOBALS['xoopsDB']->queryF($sql[4]);
		@$GLOBALS['xoopsDB']->queryF($sql[5]);
		@$GLOBALS['xoopsDB']->queryF($sql[6]);		
		echo '<pre>'.$sql[1].'</pre>';
		echo '<pre>'.$sql[2].'</pre>';
		echo '<pre>'.$sql[3].'</pre>';
		echo '<pre>'.$sql[4].'</pre>';
		echo '<pre>'.$sql[5].'</pre>';
		echo '<pre>'.$sql[6].'</pre>';
	} 
	
	$sql[7] = "ALTER TABLE ".$GLOBALS['xoopsDB']->prefix("compounds_language").' CHANGE COLUMN `synopise` `synopsise` MEDIUMTEXT';
	if ($GLOBALS['xoopsDB']->queryF($sql[7])) {
		echo '<pre>'.$sql[7].'</pre>';
	}
	$sql[8] = "ALTER TABLE ".$GLOBALS['xoopsDB']->prefix("comp_votedata").' CHANGE COLUMN `ip` `ip` TINYTEXT';
	if ($GLOBALS['xoopsDB']->queryF($sql[8])) {
		echo '<pre>'.$sql[8].'</pre>';
	}		

	return true;
	
}

?>