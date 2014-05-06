<?php

namespace Application\Model\IdentifierMysqlWrite;
use \Glial\Synapse\Model;
class history_main extends Model
{
var $schema = "CREATE TABLE `history_main` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_history_table` int(11) NOT NULL,
  `line` int(11) NOT NULL,
  `id_user_main` int(11) NOT NULL,
  `id_history_action` int(11) NOT NULL,
  `param` text NOT NULL,
  `date` datetime NOT NULL,
  `id_history_etat` int(11) NOT NULL,
  `type` char(10) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_history_etat` (`id_history_etat`),
  KEY `id_history_table` (`id_history_table`),
  KEY `id_user_main` (`id_user_main`),
  KEY `id_history_action` (`id_history_action`),
  KEY `line` (`line`),
  CONSTRAINT `history_main_ibfk_1` FOREIGN KEY (`id_history_etat`) REFERENCES `history_etat` (`id`),
  CONSTRAINT `history_main_ibfk_3` FOREIGN KEY (`id_history_action`) REFERENCES `history_action` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8";

var $field = array("id","id_history_table","line","id_user_main","id_history_action","param","date","id_history_etat","type");

var $validate = array(
	'id_history_table' => array(
		'reference_to' => array('The constraint to history_table.id isn\'t respected.','history_table', 'id')
	),
	'line' => array(
		'numeric' => array('This must be an int.')
	),
	'id_user_main' => array(
		'reference_to' => array('The constraint to user_main.id isn\'t respected.','user_main', 'id')
	),
	'id_history_action' => array(
		'reference_to' => array('The constraint to history_action.id isn\'t respected.','history_action', 'id')
	),
	'param' => array(
		'not_empty' => array('This field is requiered.')
	),
	'date' => array(
		'datetime' => array('This must be a date time.')
	),
	'id_history_etat' => array(
		'reference_to' => array('The constraint to history_etat.id isn\'t respected.','history_etat', 'id')
	),
	'type' => array(
		'not_empty' => array('This field is requiered.')
	),
);

function get_validate()
{
return $this->validate;
}
}
