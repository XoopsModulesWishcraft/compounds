<?php

	define('_CMP_FRM_COMPOUND_FORM','Administration Compound Modeller');
	define('_CMP_FRM_COMPOUND','Compound');
	define('_CMP_RH_COMPOUND_EXISTS','Compound %s Already Exists in Database');
	define('_CMP_RH_COMPOUND_CREATED','Compound %s in database is now created!');
	define('_CMP_RH_CHAINLINK_NOCREATION','Creating a chain sequence for %s for some reason didn\'t happen!');
	define('_CMP_RH_CHAINLINK_NOUPDATE','Updating a chain sequence for %s for some reason didn\'t happen!');	
	define('_CMP_RH_COMPOUND_NOCREATION','Updating a compound after chain sequencing for %s for some reason didn\'t happen!');		
	define('_CMP_RH_COMPOUND_DONOTOWN','You do not own the compound %s to edit it!');
	define('_CMP_RH_COMPOUND_EDITED','Chemical %s has been edited in the database!');

	define('_CMP_AM_MAININDEX','Compounds Index');
	define('_CMP_AM_COMPOUNDLIST','Compounds List');	
	define('_CMP_AM_COMPOUNDNEW','New Compound');	
	define('_CMP_AM_COMPOUNDDELETE_SUCCESSFUL','Compound %s deleted successfully');	
	define('_CMP_AM_COMPOUNDDELETE_UNSUCCESSFUL','Compound %s was not deleted successfully');	
	
	define('_CMP_FRM_COMPOUND_LIST','Administration Compound List');
	define('_CMP_ELE_COMPOUND_LIST','Compound %s');

	define('_CMP_FRM_COMPOUND_HYPOSISE','Hyposise of Process');
	define('_CMP_FRM_COMPOUND_PROCESS','Process of Compound Deduction');
	define('_CMP_FRM_COMPOUND_SYNOPISISE','Synopise of Process');
	
	define('_CMP_FRM_COMPOUND_PROCESS_DESC','<em>(Required)</em> - This is the process of which you used to build the compound in the register.');
	define('_CMP_FRM_COMPOUND_HYPOSISE_DESC','<em>(Not Required)</em> - This is the quick summary of your concept of building the process of the compound in the register.');
	define('_CMP_FRM_COMPOUND_SYNOPISISE_DESC','<em>(Not Required)</em> - This is the quick summary of your conclusion of building the process of the compound in the register.');
	define('_CMP_FRM_COMPOUND_DESC','<strong>Compound Modeller</strong> - This is the compound modeller, it list\'s component item from the periodical chart of items 1 - 16.<br/><br/><strong>Instructions:</strong><ul><li>The select box on the left of each compound component item is the enumerator of particle combinations, it ranges numerical to a cyclon chain of 32 items.</li><li>The second select box is the periodical item from the periodical chart in the database.</li><li>The last two select boxes are as follows first the superscript particle bond and the subscript particle combinations in the last of the select boxes on one component of a compound.</li></ul>');	
	define('_CMP_RH_COMPOUND_NOTLOGGEDIN','You are not logged in to save %s');
	
	define('_CMP_AM_HEADER_USER_SUBMISSIONS','User Submissions:&nbsp;');
	define('_CMP_AM_HEADER_MOLECULAR_SUBMISSIONS','Molecular Submissions:&nbsp;');
	define('_CMP_AM_HEADER_7DAY_SUBMISSIONS','7 Day Submissions:&nbsp;');
	define('_CMP_AM_HEADER_DONATIONS_SOFAR','Donations so Far:&nbsp;');
	define('_CMP_AM_HEADER_TOTAL_CASH','Total Cash: (USD) $');
	
	define('_CMP_FRM_PERIODICAL_FORM_EDIT','Edit Periodical Symbol <strong>%s</strong>');
	define('_CMP_FRM_PERIODICAL_FORM_NEW','New Periodical Symbol');
	define('_CMP_FRM_SYMBOL','Periodicial Symbol');
	define('_CMP_FRM_ALIAS','Alias');
	define('_CMP_FRM_WEIGHT','Weight');
	define('_CMP_FRM_GROUP_NUMBER','Group Number');
	define('_CMP_FRM_TYPE','Type');
	define('_CMP_FRM_TYPE_BASE','Base');
	define('_CMP_FRM_TYPE_LANTHABOIDS','Lanthaboids');
	define('_CMP_FRM_TYPE_ACTINOIDS','Actinoids');

	define('_CMP_FRM_TITLE_PERIODIC_LIST','Your Current Periodical Chart');
	define('_CMP_FRM_PERIODICAL_LIST','Item : %s');
	define('_CMP_FRM_SYMBOL_DESC','Symbol: %s');
	define('_CMP_FRM_PERIODICAL_DELETE','Are you sure you wish to delete the periodidcal symbol %s?');
	define('_CMP_AM_PERIODICAL_DELETED','The periodical symbol %s was deleted!');	
	
	define('_CMP_AM_PERIODICAL_SAVE_OK','The periodicial symbol %s (%s) did save correctly!');
	define('_CMP_AM_PERIODICAL_SAVE_NOTOK','The periodicial symbol %s (%s) did not save correctly');
	define('_CMP_AM_PERIODICAL_LIST_SAVEOK','Periodical List Saved All Okey');
	
	define('_CMP_FRM_COMPOSITE_FORM_NEW','New Composite Particle Symbol');
	define('_CMP_FRM_COMPOSITE_FORM_EDIT','Edit Composite Particle Symbol %s');
	define('_CMP_FRM_COMPOSITE_SYMBOL','Composite Symbol');
	define('_CMP_FRM_COMPOSITE_LIST','Composite Item : %s');
	define('_CMP_FRM_POINT','Float');
	define('_CMP_FRM_TITLE_COMPOSITE_LIST','All Your Composite Particle Symbols are Below!');
	define('_CMP_FRM_COMPOSITE_DELETE','Are you sure you wish to delete the composite particle symbol %s?');
	define('_CMP_AM_COMPOSITE_DELETED','The composite particle symbol %s was deleted!');	
		
	define('_CMP_AM_COMPOSITE_SAVE_OK','The composite symbol %s (%s) did save correctly!');
	define('_CMP_AM_COMPOSITE_SAVE_NOTOK','The composite symbol %s (%s) did not save correctly');
	define('_CMP_AM_COMPOSITE_LIST_SAVEOK','Composite List Saved All Okey');
	
	define('_CMP_FRM_NUMBEROF_FORM_EDIT','Edit your Particle bond %s');
	define('_CMP_FRM_NUMBEROF_FORM_NEW','New Particle Bond Symbol');
	define('_CMP_FRM_NUMBEROF_LIST','Item : %s');
	define('_CMP_FRM_TITLE_NUMBEROF_LIST','This is the list of particle bonds you have on the system');
	define('_CMP_FRM_PARTICLES_SYMBOL','Particle Bond Symbol');
	define('_CMP_FRM_NUMBEROF_DELETE','Are you sure you wish to delete the particle bond symbol %s?');
	define('_CMP_AM_NUMBEROF_DELETED','The particle bond symbol %s was deleted!');	
	
	define('_CMP_AM_NUMBEROF_SAVE_OK','The particle bond symbol %s (%s) did save correctly!');
	define('_CMP_AM_NUMBEROF_SAVE_NOTOK','The particle bond symbol %s (%s) did not save correctly');
	define('_CMP_AM_NUMBEROF_LIST_SAVEOK','Particle Bond List Saved All Okey');
	
	define('_CMP_AM_ITEM_DOESNT_EXIST','Item doesn\'t exist!!');
		
?>