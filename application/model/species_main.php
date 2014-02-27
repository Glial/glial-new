<?php

namespace Application\Model;
use \Glial\Synapse\Model;

class species_main extends Model
{
var $schema = "CREATE TABLE `species_main` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_species_genus` int(11) NOT NULL,
  `id_species_iucn` int(11) NOT NULL,
  `id_species_taxon_author` int(11) NOT NULL,
  `id_history_etat` int(11) NOT NULL,
  `id_species_picture_main` int(11) NOT NULL,
  `date_author` char(4) NOT NULL,
  `is_valid` int(11) NOT NULL,
  `scientific_name` varchar(50) NOT NULL,
  `date_created` datetime NOT NULL,
  `date_updated` datetime NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `scientific_name` (`scientific_name`),
  KEY `id_genus` (`id_species_genus`),
  KEY `id_species_taxon_author` (`id_species_taxon_author`),
  CONSTRAINT `FK_id_species_genus` FOREIGN KEY (`id_species_genus`) REFERENCES `species_genus` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=275457 DEFAULT CHARSET=utf8";

var $field = array("id","id_species_genus","id_species_iucn","id_species_taxon_author","id_history_etat","id_species_picture_main","date_author","is_valid","scientific_name","date_created","date_updated");

var $validate = array(
	'id_species_genus' => array(
		'reference_to' => array('The constraint to species_genus.id isn\'t respected.','species_genus', 'id')
	),
	'id_species_iucn' => array(
		'reference_to' => array('The constraint to species_iucn.id isn\'t respected.','species_iucn', 'id')
	),
	'id_species_taxon_author' => array(
		'reference_to' => array('The constraint to species_taxon_author.id isn\'t respected.','species_taxon_author', 'id')
	),
	'id_history_etat' => array(
		'reference_to' => array('The constraint to history_etat.id isn\'t respected.','history_etat', 'id')
	),
	'id_species_picture_main' => array(
		'reference_to' => array('The constraint to species_picture_main.id isn\'t respected.','species_picture_main', 'id')
	),
	'date_author' => array(
		'not_empty' => array('This field is requiered.')
	),
	'is_valid' => array(
		'numeric' => array('This must be an int.')
	),
	'scientific_name' => array(
		'not_empty' => array('This field is requiered.')
	),
	'date_created' => array(
		'time' => array('This must be a time.')
	),
	'date_updated' => array(
		'time' => array('This must be a time.')
	),
);

function get_validate()
{
return $this->validate;
}
}
