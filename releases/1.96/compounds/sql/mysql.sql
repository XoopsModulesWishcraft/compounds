CREATE TABLE `comp_transactions` (
  `id` int(8) unsigned NOT NULL auto_increment,
  `business` varchar(50) NOT NULL default '',
  `txn_id` varchar(20) NOT NULL default '',
  `item_name` varchar(60) NOT NULL default '',
  `item_number` varchar(40) NOT NULL default '',
  `quantity` varchar(6) NOT NULL default '',
  `invoice` varchar(40) NOT NULL default '',
  `custom` varchar(127) NOT NULL default '',
  `tax` varchar(10) NOT NULL default '',
  `option_name1` varchar(60) NOT NULL default '',
  `option_selection1` varchar(127) NOT NULL default '',
  `option_name2` varchar(60) NOT NULL default '',
  `option_selection2` varchar(127) NOT NULL default '',
  `memo` text NOT NULL,
  `payment_status` varchar(15) NOT NULL default '',
  `payment_date` datetime NOT NULL default '0000-00-00 00:00:00',
  `txn_type` varchar(15) NOT NULL default '',
  `mc_gross` varchar(10) NOT NULL default '',
  `mc_fee` varchar(10) NOT NULL default '',
  `mc_currency` varchar(5) NOT NULL default '',
  `settle_amount` varchar(12) NOT NULL default '',
  `exchange_rate` varchar(10) NOT NULL default '',
  `first_name` varchar(127) NOT NULL default '',
  `last_name` varchar(127) NOT NULL default '',
  `address_street` varchar(127) NOT NULL default '',
  `address_city` varchar(127) NOT NULL default '',
  `address_state` varchar(127) NOT NULL default '',
  `address_zip` varchar(20) NOT NULL default '',
  `address_country` varchar(127) NOT NULL default '',
  `address_status` varchar(15) NOT NULL default '',
  `payer_email` varchar(127) NOT NULL default '',
  `payer_status` varchar(15) NOT NULL default '',
  PRIMARY KEY  (`id`)
) TYPE=MyISAM DEFAULT CHARSET=utf8;


CREATE TABLE `comp_translog` (
  `id` int(11) NOT NULL auto_increment,
  `log_date` datetime NOT NULL default '0000-00-00 00:00:00',
  `payment_date` datetime NOT NULL default '0000-00-00 00:00:00',
  `logentry` text NOT NULL,
  PRIMARY KEY  (`id`)
) TYPE=MyISAM DEFAULT CHARSET=utf8;

CREATE TABLE `composite` (
  `id` int(13) unsigned NOT NULL AUTO_INCREMENT,
  `symbol` varchar(5) DEFAULT '-----',
  `points` decimal(10,5) DEFAULT '1.00000',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

insert  into `composite` (`symbol`,`points`) values ('1','1.00000');
insert  into `composite` (`symbol`,`points`) values ('2','1.00000');
insert  into `composite` (`symbol`,`points`) values ('3','1.00000');
insert  into `composite` (`symbol`,`points`) values ('4','1.00000');
insert  into `composite` (`symbol`,`points`) values ('5','1.00000');
insert  into `composite` (`symbol`,`points`) values ('6','1.00000');
insert  into `composite` (`symbol`,`points`) values ('7','1.00000');
insert  into `composite` (`symbol`,`points`) values ('8','1.00000');
insert  into `composite` (`symbol`,`points`) values ('9','1.00000');
insert  into `composite` (`symbol`,`points`) values ('10','1.00000');
insert  into `composite` (`symbol`,`points`) values ('11','1.00000');
insert  into `composite` (`symbol`,`points`) values ('12','1.00000');
insert  into `composite` (`symbol`,`points`) values ('13','1.00000');
insert  into `composite` (`symbol`,`points`) values ('14','1.00000');
insert  into `composite` (`symbol`,`points`) values ('15','1.00000');
insert  into `composite` (`symbol`,`points`) values ('16','1.00000');
insert  into `composite` (`symbol`,`points`) values ('17','1.00000');
insert  into `composite` (`symbol`,`points`) values ('18','1.00000');
insert  into `composite` (`symbol`,`points`) values ('19','1.00000');
insert  into `composite` (`symbol`,`points`) values ('20','1.01010');
insert  into `composite` (`symbol`,`points`) values ('21','1.10100');
insert  into `composite` (`symbol`,`points`) values ('22','1.10101');
insert  into `composite` (`symbol`,`points`) values ('23','1.01010');
insert  into `composite` (`symbol`,`points`) values ('24','1.12121');
insert  into `composite` (`symbol`,`points`) values ('25','1.21211');
insert  into `composite` (`symbol`,`points`) values ('26','1.32121');
insert  into `composite` (`symbol`,`points`) values ('27','1.21340');
insert  into `composite` (`symbol`,`points`) values ('28','1.32232');
insert  into `composite` (`symbol`,`points`) values ('29','1.35432');
insert  into `composite` (`symbol`,`points`) values ('30','1.42346');
insert  into `composite` (`symbol`,`points`) values ('31','1.65440');

CREATE TABLE `numberof` (
  `id` int(13) unsigned NOT NULL AUTO_INCREMENT,
  `symbol` varchar(5) DEFAULT '-----',
  `points` decimal(10,5) DEFAULT '1.00000',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

insert  into `numberof` (`symbol`,`points`) values ('1','1.00000');
insert  into `numberof` (`symbol`,`points`) values ('2','1.00000');
insert  into `numberof` (`symbol`,`points`) values ('3','1.00000');
insert  into `numberof` (`symbol`,`points`) values ('4','1.00000');
insert  into `numberof` (`symbol`,`points`) values ('5','1.00000');
insert  into `numberof` (`symbol`,`points`) values ('6','1.00000');
insert  into `numberof` (`symbol`,`points`) values ('7','1.00000');
insert  into `numberof` (`symbol`,`points`) values ('8','1.00000');
insert  into `numberof` (`symbol`,`points`) values ('9','1.00000');
insert  into `numberof` (`symbol`,`points`) values ('10','1.00000');
insert  into `numberof` (`symbol`,`points`) values ('11','1.00000');
insert  into `numberof` (`symbol`,`points`) values ('12','1.00000');
insert  into `numberof` (`symbol`,`points`) values ('13','1.00000');
insert  into `numberof` (`symbol`,`points`) values ('14','1.00000');
insert  into `numberof` (`symbol`,`points`) values ('15','1.00000');
insert  into `numberof` (`symbol`,`points`) values ('16','1.00000');
insert  into `numberof` (`symbol`,`points`) values ('17','1.00000');
insert  into `numberof` (`symbol`,`points`) values ('18','1.00000');
insert  into `numberof` (`symbol`,`points`) values ('19','1.00000');
insert  into `numberof` (`symbol`,`points`) values ('20','1.00000');
insert  into `numberof` (`symbol`,`points`) values ('21','1.00000');
insert  into `numberof` (`symbol`,`points`) values ('22','1.00000');
insert  into `numberof` (`symbol`,`points`) values ('23','1.00000');
insert  into `numberof` (`symbol`,`points`) values ('24','1.00000');
insert  into `numberof` (`symbol`,`points`) values ('25','1.00000');
insert  into `numberof` (`symbol`,`points`) values ('26','1.00000');
insert  into `numberof` (`symbol`,`points`) values ('27','1.00000');
insert  into `numberof` (`symbol`,`points`) values ('28','1.00000');
insert  into `numberof` (`symbol`,`points`) values ('29','1.00000');
insert  into `numberof` (`symbol`,`points`) values ('30','1.00000');
insert  into `numberof` (`symbol`,`points`) values ('31','1.00000');
insert  into `numberof` (`symbol`,`points`) values ('cyl','1.00000');
insert  into `numberof` (`symbol`,`points`) values ('iso','1.00000');
insert  into `numberof` (`symbol`,`points`) values ('nux','1.00000');

CREATE TABLE `uid_link` (                                                   
	`uid` INT(12) UNSIGNED NOT NULL DEFAULT '0',                  
	`score` FLOAT(15,5) UNSIGNED ZEROFILL DEFAULT '000000000.00000', 
	`submissions` INT(16) UNSIGNED ZEROFILL DEFAULT '0000000000000000',       
	`donations` INT(6) UNSIGNED ZEROFILL DEFAULT '000000',                    
	`amount` DECIMAL(10,4) UNSIGNED ZEROFILL DEFAULT '000000.0000',           
	`hits` INT(13) UNSIGNED ZEROFILL DEFAULT '0000000000000',                 
	`runners` INT(13) UNSIGNED ZEROFILL DEFAULT '0000000000000',              
	`votes` INT(10) UNSIGNED ZEROFILL DEFAULT '0000000000',                   
	`stars` DECIMAL(20,9) UNSIGNED ZEROFILL DEFAULT '00000000000.000000000',  
	`comments` INT(5) UNSIGNED ZEROFILL DEFAULT '00000',                      
	`edits` INT(6) UNSIGNED ZEROFILL DEFAULT '000000',                        
	PRIMARY KEY (`uid`)                                                       
) ENGINE=MYISAM DEFAULT CHARSET=utf8;

CREATE TABLE `chain_components` (
	`id` int(32) unsigned NOT NULL AUTO_INCREMENT,
	`chain_id` int(15) unsigned DEFAULT NULL,
	`perodic_id` int(13) unsigned DEFAULT '0',
	`number` int(2) unsigned DEFAULT '0',
	`super_composition` int(3) unsigned DEFAULT '0',
	`sub_composition` int(3) unsigned DEFAULT '0',
	`weight` int(5) unsigned DEFAULT '0',
	`uid` int(12) unsigned DEFAULT '0',
	PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

CREATE TABLE `chain_link` (
	`chain_id` int(13) unsigned NOT NULL AUTO_INCREMENT,
	`components` int(5) unsigned DEFAULT '0',
	`uid` int(12) unsigned DEFAULT '0',
	PRIMARY KEY (`chain_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

CREATE TABLE `comp_votedata` (        
        `id` INT(13) DEFAULT '0',           
        `ip` VARCHAR(128) DEFAULT NULL,     
        `addy` VARCHAR(255) DEFAULT NULL,   
        `created` INT(13) DEFAULT '0'       
) ENGINE=MYISAM DEFAULT CHARSET=utf8;

CREATE TABLE `compound` (                         
	`id` INT(13) UNSIGNED NOT NULL AUTO_INCREMENT,  
	`chain_id` INT(13) UNSIGNED DEFAULT NULL,       
	`alias` VARCHAR(255) DEFAULT NULL,              
	`symbol` VARCHAR(255) DEFAULT NULL,             
	`hyposise` MEDIUMTEXT,                          
	`process` MEDIUMTEXT,                           
	`synopisise` MEDIUMTEXT,                        
	`uid` INT(12) DEFAULT NULL,                     
	`created` INT(12) DEFAULT NULL,                 
	`chem_tags` VARCHAR(255) DEFAULT NULL,          
	`comments` int(12) unsigned DEFAULT '0',
	`votes` INT(10) UNSIGNED DEFAULT '0',                   
	`stars` DECIMAL(20,9) UNSIGNED DEFAULT '0.000000000',  
	`hits` INT(13) UNSIGNED DEFAULT '0',                 
	`runners` INT(13) UNSIGNED DEFAULT '0', 
	PRIMARY KEY (`id`)                              
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

CREATE TABLE `periodical` (
	`id` int(12) unsigned NOT NULL AUTO_INCREMENT,
	`symbol` varchar(4) DEFAULT NULL,
	`weight` int(6) unsigned DEFAULT '0',
	`period` int(4) unsigned DEFAULT NULL,
	`group` int(4) unsigned DEFAULT NULL,
	`type` enum('base','lanthanoids','actinoids') DEFAULT 'base',
	PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

INSERT INTO `periodical` (`id`,`symbol`,`weight`,`period`,`group`,`type`) VALUES (1,'H',1,1,1,'base');
INSERT INTO `periodical` (`id`,`symbol`,`weight`,`period`,`group`,`type`) VALUES (2,'He',2,1,18,'base');
INSERT INTO `periodical` (`id`,`symbol`,`weight`,`period`,`group`,`type`) VALUES (3,'Li',3,1,2,'base');
INSERT INTO `periodical` (`id`,`symbol`,`weight`,`period`,`group`,`type`) VALUES (4,'Be',4,2,2,'base');
INSERT INTO `periodical` (`id`,`symbol`,`weight`,`period`,`group`,`type`) VALUES (5,'B',5,2,13,'base');
INSERT INTO `periodical` (`id`,`symbol`,`weight`,`period`,`group`,`type`) VALUES (6,'C',6,2,14,'base');
INSERT INTO `periodical` (`id`,`symbol`,`weight`,`period`,`group`,`type`) VALUES (7,'N',7,2,15,'base');
INSERT INTO `periodical` (`id`,`symbol`,`weight`,`period`,`group`,`type`) VALUES (8,'O',8,2,16,'base');
INSERT INTO `periodical` (`id`,`symbol`,`weight`,`period`,`group`,`type`) VALUES (9,'F',9,2,17,'base');
INSERT INTO `periodical` (`id`,`symbol`,`weight`,`period`,`group`,`type`) VALUES (10,'Ne',10,2,18,'base');
INSERT INTO `periodical` (`id`,`symbol`,`weight`,`period`,`group`,`type`) VALUES (11,'Na',11,3,1,'base');
INSERT INTO `periodical` (`id`,`symbol`,`weight`,`period`,`group`,`type`) VALUES (12,'Mg',12,3,2,'base');
INSERT INTO `periodical` (`id`,`symbol`,`weight`,`period`,`group`,`type`) VALUES (13,'Al',13,3,13,'base');
INSERT INTO `periodical` (`id`,`symbol`,`weight`,`period`,`group`,`type`) VALUES (14,'Si',14,3,14,'base');
INSERT INTO `periodical` (`id`,`symbol`,`weight`,`period`,`group`,`type`) VALUES (15,'P',15,3,15,'base');
INSERT INTO `periodical` (`id`,`symbol`,`weight`,`period`,`group`,`type`) VALUES (16,'S',16,3,16,'base');
INSERT INTO `periodical` (`id`,`symbol`,`weight`,`period`,`group`,`type`) VALUES (17,'Cl',17,3,17,'base');
INSERT INTO `periodical` (`id`,`symbol`,`weight`,`period`,`group`,`type`) VALUES (18,'Ar',18,3,18,'base');
INSERT INTO `periodical` (`id`,`symbol`,`weight`,`period`,`group`,`type`) VALUES (19,'K',19,4,1,'base');
INSERT INTO `periodical` (`id`,`symbol`,`weight`,`period`,`group`,`type`) VALUES (20,'Ca',20,4,2,'base');
INSERT INTO `periodical` (`id`,`symbol`,`weight`,`period`,`group`,`type`) VALUES (21,'Sc',21,4,3,'base');
INSERT INTO `periodical` (`id`,`symbol`,`weight`,`period`,`group`,`type`) VALUES (22,'Ti',22,4,4,'base');
INSERT INTO `periodical` (`id`,`symbol`,`weight`,`period`,`group`,`type`) VALUES (23,'V',23,4,5,'base');
INSERT INTO `periodical` (`id`,`symbol`,`weight`,`period`,`group`,`type`) VALUES (24,'Cr',24,4,6,'base');
INSERT INTO `periodical` (`id`,`symbol`,`weight`,`period`,`group`,`type`) VALUES (25,'Mn',25,4,7,'base');
INSERT INTO `periodical` (`id`,`symbol`,`weight`,`period`,`group`,`type`) VALUES (26,'Fe',26,4,8,'base');
INSERT INTO `periodical` (`id`,`symbol`,`weight`,`period`,`group`,`type`) VALUES (27,'Co',27,4,9,'base');
INSERT INTO `periodical` (`id`,`symbol`,`weight`,`period`,`group`,`type`) VALUES (28,'Ni',28,4,10,'base');
INSERT INTO `periodical` (`id`,`symbol`,`weight`,`period`,`group`,`type`) VALUES (29,'Cu',29,4,11,'base');
INSERT INTO `periodical` (`id`,`symbol`,`weight`,`period`,`group`,`type`) VALUES (30,'Zn',30,4,12,'base');
INSERT INTO `periodical` (`id`,`symbol`,`weight`,`period`,`group`,`type`) VALUES (31,'Ga',31,4,13,'base');
INSERT INTO `periodical` (`id`,`symbol`,`weight`,`period`,`group`,`type`) VALUES (32,'Ge',32,4,14,'base');
INSERT INTO `periodical` (`id`,`symbol`,`weight`,`period`,`group`,`type`) VALUES (33,'As',33,4,15,'base');
INSERT INTO `periodical` (`id`,`symbol`,`weight`,`period`,`group`,`type`) VALUES (34,'Se',34,4,16,'base');
INSERT INTO `periodical` (`id`,`symbol`,`weight`,`period`,`group`,`type`) VALUES (35,'Br',35,4,17,'base');
INSERT INTO `periodical` (`id`,`symbol`,`weight`,`period`,`group`,`type`) VALUES (36,'Kr',36,4,18,'base');
INSERT INTO `periodical` (`id`,`symbol`,`weight`,`period`,`group`,`type`) VALUES (37,'Rb',37,5,1,'base');
INSERT INTO `periodical` (`id`,`symbol`,`weight`,`period`,`group`,`type`) VALUES (38,'Sr',38,5,2,'base');
INSERT INTO `periodical` (`id`,`symbol`,`weight`,`period`,`group`,`type`) VALUES (39,'Y',39,5,3,'base');
INSERT INTO `periodical` (`id`,`symbol`,`weight`,`period`,`group`,`type`) VALUES (40,'Zr',40,5,4,'base');
INSERT INTO `periodical` (`id`,`symbol`,`weight`,`period`,`group`,`type`) VALUES (41,'Nb',41,5,5,'base');
INSERT INTO `periodical` (`id`,`symbol`,`weight`,`period`,`group`,`type`) VALUES (42,'Mo',42,5,6,'base');
INSERT INTO `periodical` (`id`,`symbol`,`weight`,`period`,`group`,`type`) VALUES (43,'Tc',43,5,7,'base');
INSERT INTO `periodical` (`id`,`symbol`,`weight`,`period`,`group`,`type`) VALUES (44,'Ru',44,5,8,'base');
INSERT INTO `periodical` (`id`,`symbol`,`weight`,`period`,`group`,`type`) VALUES (45,'Rh',45,5,9,'base');
INSERT INTO `periodical` (`id`,`symbol`,`weight`,`period`,`group`,`type`) VALUES (46,'Pd',46,5,10,'base');
INSERT INTO `periodical` (`id`,`symbol`,`weight`,`period`,`group`,`type`) VALUES (47,'Ag',47,5,11,'base');
INSERT INTO `periodical` (`id`,`symbol`,`weight`,`period`,`group`,`type`) VALUES (48,'Cd',48,5,12,'base');
INSERT INTO `periodical` (`id`,`symbol`,`weight`,`period`,`group`,`type`) VALUES (49,'In',49,5,13,'base');
INSERT INTO `periodical` (`id`,`symbol`,`weight`,`period`,`group`,`type`) VALUES (50,'Sn',50,5,14,'base');
INSERT INTO `periodical` (`id`,`symbol`,`weight`,`period`,`group`,`type`) VALUES (51,'Sb',51,5,15,'base');
INSERT INTO `periodical` (`id`,`symbol`,`weight`,`period`,`group`,`type`) VALUES (52,'Te',52,5,16,'base');
INSERT INTO `periodical` (`id`,`symbol`,`weight`,`period`,`group`,`type`) VALUES (53,'I',53,5,17,'base');
INSERT INTO `periodical` (`id`,`symbol`,`weight`,`period`,`group`,`type`) VALUES (54,'Xe',54,5,18,'base');
INSERT INTO `periodical` (`id`,`symbol`,`weight`,`period`,`group`,`type`) VALUES (55,'Cs',55,6,1,'base');
INSERT INTO `periodical` (`id`,`symbol`,`weight`,`period`,`group`,`type`) VALUES (56,'Ba',56,6,2,'base');
INSERT INTO `periodical` (`id`,`symbol`,`weight`,`period`,`group`,`type`) VALUES (57,'Hf',72,6,4,'base');
INSERT INTO `periodical` (`id`,`symbol`,`weight`,`period`,`group`,`type`) VALUES (58,'Ta',73,6,5,'base');
INSERT INTO `periodical` (`id`,`symbol`,`weight`,`period`,`group`,`type`) VALUES (59,'W',74,6,6,'base');
INSERT INTO `periodical` (`id`,`symbol`,`weight`,`period`,`group`,`type`) VALUES (60,'Re',75,6,7,'base');
INSERT INTO `periodical` (`id`,`symbol`,`weight`,`period`,`group`,`type`) VALUES (61,'Os',76,6,8,'base');
INSERT INTO `periodical` (`id`,`symbol`,`weight`,`period`,`group`,`type`) VALUES (62,'Ir',77,6,9,'base');
INSERT INTO `periodical` (`id`,`symbol`,`weight`,`period`,`group`,`type`) VALUES (63,'Pt',78,6,10,'base');
INSERT INTO `periodical` (`id`,`symbol`,`weight`,`period`,`group`,`type`) VALUES (64,'Au',79,6,11,'base');
INSERT INTO `periodical` (`id`,`symbol`,`weight`,`period`,`group`,`type`) VALUES (65,'Hg',80,6,12,'base');
INSERT INTO `periodical` (`id`,`symbol`,`weight`,`period`,`group`,`type`) VALUES (66,'Ti',81,6,13,'base');
INSERT INTO `periodical` (`id`,`symbol`,`weight`,`period`,`group`,`type`) VALUES (67,'Pb',82,6,14,'base');
INSERT INTO `periodical` (`id`,`symbol`,`weight`,`period`,`group`,`type`) VALUES (68,'Bi',83,6,15,'base');
INSERT INTO `periodical` (`id`,`symbol`,`weight`,`period`,`group`,`type`) VALUES (69,'Po',84,6,16,'base');
INSERT INTO `periodical` (`id`,`symbol`,`weight`,`period`,`group`,`type`) VALUES (70,'At',85,6,17,'base');
INSERT INTO `periodical` (`id`,`symbol`,`weight`,`period`,`group`,`type`) VALUES (71,'Rn',86,6,18,'base');
INSERT INTO `periodical` (`id`,`symbol`,`weight`,`period`,`group`,`type`) VALUES (72,'Fr',87,7,1,'base');
INSERT INTO `periodical` (`id`,`symbol`,`weight`,`period`,`group`,`type`) VALUES (73,'Ra',88,7,2,'base');
INSERT INTO `periodical` (`id`,`symbol`,`weight`,`period`,`group`,`type`) VALUES (74,'Rf',104,7,4,'base');
INSERT INTO `periodical` (`id`,`symbol`,`weight`,`period`,`group`,`type`) VALUES (75,'Db',105,7,5,'base');
INSERT INTO `periodical` (`id`,`symbol`,`weight`,`period`,`group`,`type`) VALUES (76,'Sg',106,7,6,'base');
INSERT INTO `periodical` (`id`,`symbol`,`weight`,`period`,`group`,`type`) VALUES (77,'Bh',107,7,7,'base');
INSERT INTO `periodical` (`id`,`symbol`,`weight`,`period`,`group`,`type`) VALUES (78,'Hs',108,7,8,'base');
INSERT INTO `periodical` (`id`,`symbol`,`weight`,`period`,`group`,`type`) VALUES (79,'Mt',109,7,9,'base');
INSERT INTO `periodical` (`id`,`symbol`,`weight`,`period`,`group`,`type`) VALUES (80,'Ds',110,7,10,'base');
INSERT INTO `periodical` (`id`,`symbol`,`weight`,`period`,`group`,`type`) VALUES (81,'Rg',111,7,11,'base');
INSERT INTO `periodical` (`id`,`symbol`,`weight`,`period`,`group`,`type`) VALUES (82,'Uub',112,7,12,'base');
INSERT INTO `periodical` (`id`,`symbol`,`weight`,`period`,`group`,`type`) VALUES (83,'Uut',113,7,13,'base');
INSERT INTO `periodical` (`id`,`symbol`,`weight`,`period`,`group`,`type`) VALUES (84,'Uuq',114,7,14,'base');
INSERT INTO `periodical` (`id`,`symbol`,`weight`,`period`,`group`,`type`) VALUES (85,'Uup',115,7,15,'base');
INSERT INTO `periodical` (`id`,`symbol`,`weight`,`period`,`group`,`type`) VALUES (86,'Uuh',116,7,16,'base');
INSERT INTO `periodical` (`id`,`symbol`,`weight`,`period`,`group`,`type`) VALUES (87,'Uus',115,7,17,'base');
INSERT INTO `periodical` (`id`,`symbol`,`weight`,`period`,`group`,`type`) VALUES (88,'Uuo',116,7,18,'base');
INSERT INTO `periodical` (`id`,`symbol`,`weight`,`period`,`group`,`type`) VALUES (89,'La',57,0,3,'lanthanoids');
INSERT INTO `periodical` (`id`,`symbol`,`weight`,`period`,`group`,`type`) VALUES (90,'Ce',58,0,4,'lanthanoids');
INSERT INTO `periodical` (`id`,`symbol`,`weight`,`period`,`group`,`type`) VALUES (91,'Pr',59,0,5,'lanthanoids');
INSERT INTO `periodical` (`id`,`symbol`,`weight`,`period`,`group`,`type`) VALUES (92,'Nd',60,0,6,'lanthanoids');
INSERT INTO `periodical` (`id`,`symbol`,`weight`,`period`,`group`,`type`) VALUES (93,'Pm',61,0,7,'lanthanoids');
INSERT INTO `periodical` (`id`,`symbol`,`weight`,`period`,`group`,`type`) VALUES (94,'Sm',62,0,8,'lanthanoids');
INSERT INTO `periodical` (`id`,`symbol`,`weight`,`period`,`group`,`type`) VALUES (95,'Eu',63,0,9,'lanthanoids');
INSERT INTO `periodical` (`id`,`symbol`,`weight`,`period`,`group`,`type`) VALUES (96,'Gd',64,0,10,'lanthanoids');
INSERT INTO `periodical` (`id`,`symbol`,`weight`,`period`,`group`,`type`) VALUES (97,'Tb',65,0,11,'lanthanoids');
INSERT INTO `periodical` (`id`,`symbol`,`weight`,`period`,`group`,`type`) VALUES (98,'Dy',66,0,12,'lanthanoids');
INSERT INTO `periodical` (`id`,`symbol`,`weight`,`period`,`group`,`type`) VALUES (99,'Ho',67,0,13,'lanthanoids');
INSERT INTO `periodical` (`id`,`symbol`,`weight`,`period`,`group`,`type`) VALUES (100,'Er',68,0,14,'lanthanoids');
INSERT INTO `periodical` (`id`,`symbol`,`weight`,`period`,`group`,`type`) VALUES (101,'Tm',69,0,15,'lanthanoids');
INSERT INTO `periodical` (`id`,`symbol`,`weight`,`period`,`group`,`type`) VALUES (102,'Yb',70,0,16,'lanthanoids');
INSERT INTO `periodical` (`id`,`symbol`,`weight`,`period`,`group`,`type`) VALUES (103,'Lu',71,0,17,'lanthanoids');
INSERT INTO `periodical` (`id`,`symbol`,`weight`,`period`,`group`,`type`) VALUES (104,'Ac',89,0,3,'actinoids');
INSERT INTO `periodical` (`id`,`symbol`,`weight`,`period`,`group`,`type`) VALUES (105,'Th',90,0,4,'actinoids');
INSERT INTO `periodical` (`id`,`symbol`,`weight`,`period`,`group`,`type`) VALUES (106,'Pa',91,0,5,'actinoids');
INSERT INTO `periodical` (`id`,`symbol`,`weight`,`period`,`group`,`type`) VALUES (107,'U',92,0,6,'actinoids');
INSERT INTO `periodical` (`id`,`symbol`,`weight`,`period`,`group`,`type`) VALUES (108,'Np',93,0,7,'actinoids');
INSERT INTO `periodical` (`id`,`symbol`,`weight`,`period`,`group`,`type`) VALUES (109,'Pu',94,0,8,'actinoids');
INSERT INTO `periodical` (`id`,`symbol`,`weight`,`period`,`group`,`type`) VALUES (110,'Am',95,0,9,'actinoids');
INSERT INTO `periodical` (`id`,`symbol`,`weight`,`period`,`group`,`type`) VALUES (111,'Cm',96,0,10,'actinoids');
INSERT INTO `periodical` (`id`,`symbol`,`weight`,`period`,`group`,`type`) VALUES (112,'Bk',97,0,11,'actinoids');
INSERT INTO `periodical` (`id`,`symbol`,`weight`,`period`,`group`,`type`) VALUES (113,'Cf',98,0,12,'actinoids');
INSERT INTO `periodical` (`id`,`symbol`,`weight`,`period`,`group`,`type`) VALUES (114,'Es',99,0,13,'actinoids');
INSERT INTO `periodical` (`id`,`symbol`,`weight`,`period`,`group`,`type`) VALUES (115,'Fm',100,0,14,'actinoids');
INSERT INTO `periodical` (`id`,`symbol`,`weight`,`period`,`group`,`type`) VALUES (116,'Md',101,0,15,'actinoids');
INSERT INTO `periodical` (`id`,`symbol`,`weight`,`period`,`group`,`type`) VALUES (117,'No',102,0,16,'actinoids');
INSERT INTO `periodical` (`id`,`symbol`,`weight`,`period`,`group`,`type`) VALUES (118,'Lr',103,0,17,'actinoids');