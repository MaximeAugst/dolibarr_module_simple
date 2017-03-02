<?php
/*
 * Script créant et vérifiant que les champs requis s'ajoutent bien
 */

if(!defined('INC_FROM_DOLIBARR')) {
	define('INC_FROM_CRON_SCRIPT', true);

	require('../config.php');

}


dol_include_once('/alonestone/class/alonestone.class.php');

$PDOdb=new TPDOdb;

$o=new alonestone;
$o->init_db_by_vars($PDOdb);

dol_include_once('/alonestone/class/relation.class.php');
$o=new TRelation;
$o->init_db_by_vars($PDOdb);

global $db;
dol_include_once('/core/class/extrafields.class.php');
$extrafields=new ExtraFields($db);
$res = $extrafields->addExtraField('note', 'Note', 'double', 0, '10,2', 'contact');

