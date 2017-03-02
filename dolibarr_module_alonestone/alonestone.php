<?php

	require 'config.php';
	
	dol_include_once('/contact/class/contact.class.php');
	dol_include_once('/alonestone/class/alonestone.class.php');
	global $db;

	$langs->load('alonestone@alonestone');
		
	//var_dump($db);
	
	$object = new Contact($db);
	$object->fetch(GETPOST('fk_contact'));


	//var_dump($object);
	$action = GETPOST('action');
	
	$PDOdb = new TPDOdb;
	
	$alonestone = new alonestone;
	$alonestone->loadBy($PDOdb, $object->id, 'fk_contact');
	
	//var_dump($object);
	
	
	switch ($action) {
		case 'save':
			
			$alonestone->set_values($_POST);
			$alonestone->save($PDOdb);
			
			setEventMessage('Element alonestone sauvegardé');
			
			_card($object,$alonestone);
			break;
			
		default:
			_card($object,$alonestone);
			break;
	}
	
	
	
function _card(&$object,&$alonestone) {
	
	dol_include_once('/core/lib/contact.lib.php');
	
	dol_include_once('/alonestone/class/formulaire.class.php');
	
	global $langs ;
	
	llxHeader();
	
	$head = contact_prepare_head($object);
	dol_fiche_head($head, 'tab104125', '', 0, '');
	
	//var_dump($object);
	
	
	echo Formulaire::get($object);
	
	//echo 'bonjour';

	$formCore=new TFormCore('alonestone.php', 'formalonestone');
	echo $formCore->hidden('fk_contact', $object->id);
	echo $formCore->hidden('action', 'save');
	
	echo '<h2>'.  $langs->trans('Savenote') .'</h2>';
	
	echo $formCore->texte('Note','note',$alonestone->note,80,255).'<br />';
	
	echo $formCore->btsubmit('Sauvegarder', 'bt_save');
	
	
			


	
	
	
	$formCore->end();
	
	dol_fiche_end();
	llxFooter();	  
		 	
}

