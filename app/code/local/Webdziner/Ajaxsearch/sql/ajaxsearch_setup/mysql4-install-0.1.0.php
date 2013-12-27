<?php

$installer = $this;

$installer->startSetup();

$installer->run("


DROP TABLE IF EXISTS {$this->getTable('ajaxsearch')};
CREATE TABLE {$this->getTable('ajaxsearch')} (
  `ajaxsearch_id` int(11) NOT NULL AUTO_INCREMENT,
  `short_description` tinyint(1) NOT NULL DEFAULT '1',
  `no_of_product` int(11) NOT NULL DEFAULT '4',
  `no_short_description_char` int(11) NOT NULL DEFAULT '64',
  `show_thumbnail` tinyint(1) NOT NULL DEFAULT '1',
  `enabled` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`ajaxsearch_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ajaxsearch`
--

INSERT INTO {$this->getTable('ajaxsearch')} (`ajaxsearch_id`, `short_description`, `no_of_product`, `no_short_description_char`, `show_thumbnail`, `enabled`) VALUES
(1, 1, 8, 64, 1, 1);

    ");
$installer->endSetup(); 