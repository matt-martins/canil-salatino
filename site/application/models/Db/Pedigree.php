<?php
class Application_Model_Db_Pedigree extends Zend_Db_Table_Abstract
{
	protected $_name = "pedigree";
	protected $_primary = "idContent";
	protected $_dependentTables = array("Content");
}

