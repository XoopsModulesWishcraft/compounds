<?php

	define('_CMP_FRM_COMPOUND_FORM','Compound Modeller');
	define('_CMP_FRM_COMPOUND','Compound');
	define('_CMP_RH_COMPOUND_EXISTS','Compound %s Already Exists in Database');
	define('_CMP_RH_COMPOUND_CREATED','Compound %s in database is now created!');
	define('_CMP_RH_CHAINLINK_NOCREATION','Creating a chain sequence for %s for some reason didn\'t happen!');
	define('_CMP_RH_CHAINLINK_NOUPDATE','Updating a chain sequence for %s for some reason didn\'t happen!');	
	define('_CMP_RH_COMPOUND_NOCREATION','Updating a compound after chain sequencing for %s for some reason didn\'t happen!');		
	define('_CMP_RH_COMPOUND_DONOTOWN','You do not own the compound %s to edit it!');
	define('_CMP_RH_COMPOUND_EDITED','Chemical %s has been edited in the database!');
	define('_CMP_FRM_COMPOUND_HYPOSISE','Hyposise of Process');
	define('_CMP_FRM_COMPOUND_PROCESS','Process of Compound Deduction');
	define('_CMP_FRM_COMPOUND_SYNOPISISE','Synopise of Process');
	define('_CMP_FRM_COMPOUND_PROCESS_DESC','<em>(Required)</em> - This is the process of which you used to build the compound in the register.');
	define('_CMP_FRM_COMPOUND_HYPOSISE_DESC','<em>(Not Required)</em> - This is the quick summary of your concept of building the process of the compound in the register.');
	define('_CMP_FRM_COMPOUND_SYNOPISISE_DESC','<em>(Not Required)</em> - This is the quick summary of your conclusion of building the process of the compound in the register.');
	define('_CMP_FRM_COMPOUND_DESC','<strong>Compound Modeller</strong> - This is the compound modeller, it list\'s component item from the periodical chart of items 1 - 16.<br/><br/><strong>Instructions:</strong><ul><li>The select box on the left of each compound component item is the enumerator of particle combinations, it ranges numerical to a cyclon chain of 32 items.</li><li>The second select box is the periodical item from the periodical chart in the database.</li><li>The last two select boxes are as follows first the superscript particle bond and the subscript particle combinations in the last of the select boxes on one component of a compound.</li></ul>');	

	define('_CMP_FRM_DONATION_FORM','To donate to continue use!');
	define('_CMP_FRM_DONATION_DISLCAIMER','Dislcaimer');
	define('_CMP_FRM_DONATION_PAYPAL','Click to donate');
	define('_CMP_INFO_NOID','No Compound Object with the ID of %s');
	
	define('_CMP_VOTE_ALREADYTAKEN','A vote has already been taken for %s on the network address of %s');
	define('_CMP_VOTE_TAKEN','The vote for %s on the network address of %s just taken!');
	define('_CMP_VOTE_UNMATCHED','The vote for %s on the network address of %s creditials didn\'t match, vote not taken!');
	
	define('_CMP_FRM_VOTE_FORM','Select the number of stars to vote');
	define('_CMP_FRM_VOTE_STARS','Stars');
	define('_CMP_RH_COMPOUND_NOTLOGGEDIN','You are not logged in to save %s');
	
	define('_CMP_TEMPLATE_INDEX_INTRODUCTION','<p><font size="+4"><strong>W</strong></font>elcome to Chemical Reactions - This is the compound modeller from here you can define compounds for people to use in their soups. Your compound when you model it here and set and alias will allow for you and others to use it in defining soups that is a system of write-ups on chemical reactions you and others have done.</p>');
	define('_CMP_TEMPLATE_INDEX_ONLYGUEST','<p style="font:\'Courier New\', Courier, monospace; font-size:17px; color:#FF0000;">
<em>YOU HAVE TO BE LOGGED IN TO USE THIS SERVICE - YOU MUST <a href="'.XOOPS_URL.'/register.php">REGISTER</a> OR <a href="'.XOOPS_URL.'/user.php">SIGN ON</a> TO THE <strong>CHEMICAL REACTION</strong></em></p>');
	define('_CMP_TEMPLATE_INDEX_H1','Notice');	
	define('_CMP_TEMPLATE_INDEX_POINTA','This uses a scored donation system');
	define('_CMP_TEMPLATE_INDEX_POINTB','The score is set to ');	
	define('_CMP_TEMPLATE_INDEX_POINTC','The donation amount is set to <em>(USD)</em>');
	define('_CMP_TEMPLATE_INDEX_POINTD','Donation email for chargeback and payback of the reaction is via ipn and paypal');	
	
	define('_CMP_TEMPLATE_MATRIX_STATEMENTA','<font size="+4"><strong>D</strong></font>onation is required to continuing adding Chemicals to the register for soups. You have already made');
	define('_CMP_TEMPLATE_MATRIX_STATEMENTB','compounds which means to add any-more you will have to donate to continue. So far you have made');	
	define('_CMP_TEMPLATE_MATRIX_STATEMENTC','of (USD)<strong>$ ');
	define('_CMP_TEMPLATE_MATRIX_STATEMENTD','</strong> donations to the chemical register.');	
	
	define('_CMP_TEMPLATE_VOTE_INTRODUCTION','<strong><em>Please select 1 - 10 to vote for this compound.</em></strong> 10 is the highest, that is the most valued vote. 1 is the lowest that is the lowest value of vote, you can only vote for one compound at a time and your vote is final. The compound being voted for is');
	
	define('_CMP_TEMPLATE_INFO_DETAILS','Details');	
	define('_CMP_TEMPLATE_INFO_VIEWS','Views:&nbsp;');
	define('_CMP_TEMPLATE_INFO_VIEWRUNNERS','View Runners:&nbsp;');	
	define('_CMP_TEMPLATE_INFO_VOTEPERCENTILE','Vote Percentile:&nbsp;');
	define('_CMP_TEMPLATE_INFO_HYPOSISE','Hyposise');	
	define('_CMP_TEMPLATE_INFO_PROCESS','Process');
	define('_CMP_TEMPLATE_INFO_SYNOPSISE','Synopise');	
	define('_CMP_TEMPLATE_INFO_DEFINEBY','Defined By::&nbsp;');	
	define('_CMP_TEMPLATE_INFO_VOTE','Vote:&nbsp;');
	define('_CMP_TEMPLATE_INFO_NAME','Name:&nbsp;');
	define('_CMP_TEMPLATE_INFO_URL','URL:&nbsp;');	
	
	define('_CMP_RH_VOTE_10STARS','10 Stars');
	define('_CMP_RH_VOTE_9STARS','9 Stars');
	define('_CMP_RH_VOTE_8STARS','8 Stars');
	define('_CMP_RH_VOTE_7STARS','7 Stars');
	define('_CMP_RH_VOTE_6STARS','6 Stars');
	define('_CMP_RH_VOTE_5STARS','5 Stars');
	define('_CMP_RH_VOTE_4STARS','4 Stars');				
	define('_CMP_RH_VOTE_3STARS','3 Stars');
	define('_CMP_RH_VOTE_2STARS','2 Stars');
	define('_CMP_RH_VOTE_1STARS','1 Stars');			
	
?>