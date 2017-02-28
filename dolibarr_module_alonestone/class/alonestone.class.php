<?php

class alonestone extends TObjetStd {

	function __construct() {
		
		parent::set_table(MAIN_DB_PREFIX.'alonestone');

		parent::add_champs('note',array('type'=>'float'));
		parent::_init_vars();

		parent::start();
	

	}

}

