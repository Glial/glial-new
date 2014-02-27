<?php

namespace Application\Model;
use \Glial\Synapse\Model;

class forum_post extends Model
{
var $schema = "CREATE TABLE `forum_post` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_forum_topic` int(11) DEFAULT NULL,
  `id_user_main` int(11) DEFAULT '1',
  `id_language` int(11) NOT NULL,
  `title` varchar(255) CHARACTER SET utf8 NOT NULL,
  `message` text CHARACTER SET utf8,
  `hide_smilies` tinyint(1) DEFAULT NULL,
  `posted` datetime DEFAULT NULL,
  `edited` datetime DEFAULT NULL,
  `edited_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1";

var $field = array("id","id_forum_topic","id_user_main","id_language","title","message","hide_smilies","posted","edited","edited_by");

var $validate = array(
	'id_forum_topic' => array(
		'reference_to' => array('The constraint to forum_topic.id isn\'t respected.','forum_topic', 'id')
	),
	'id_user_main' => array(
		'reference_to' => array('The constraint to user_main.id isn\'t respected.','user_main', 'id')
	),
	'id_language' => array(
		'reference_to' => array('The constraint to language.id isn\'t respected.','language', 'id')
	),
	'title' => array(
		'not_empty' => array('This field is requiered.')
	),
	'message' => array(
		'not_empty' => array('This field is requiered.')
	),
	'hide_smilies' => array(
		'numeric' => array('This must be an int.')
	),
	'posted' => array(
		'time' => array('This must be a time.')
	),
	'edited' => array(
		'time' => array('This must be a time.')
	),
	'edited_by' => array(
		'numeric' => array('This must be an int.')
	),
);

function get_validate()
{
return $this->validate;
}
}
