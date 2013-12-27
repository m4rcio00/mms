<?php

$installer = $this;

$installer->startSetup();
$installer->run("

DROP TABLE IF EXISTS {$this->getTable('bgsetting')};
CREATE TABLE {$this->getTable('bgsetting')} (
  `bgsetting_id` int(11) unsigned NOT NULL auto_increment,
  `bg_color` varchar(255) NOT NULL default '',
  `bg_image` varchar(255) NOT NULL default '',
  `bg_repeat` varchar(255) NOT NULL default '',
  `bg_attachment` varchar(255) NOT NULL default '',
  `bg_positionx` varchar(255) NOT NULL default '',
  `bg_positiony` varchar(255) NOT NULL default '',
  `del_image` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`bgsetting_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO {$this->getTable('bgsetting')} (
`bgsetting_id` ,
`bg_color` ,
`bg_image` ,
`bg_repeat` ,
`bg_attachment` ,
`bg_positionx` ,
`bg_positiony` ,
`del_image` 
)
VALUES (
NULL , '', '', '', '', '', '', '1'
);
");
$installer->endSetup(); 