<?php
class Application_Model_Db_Subsections extends Zend_Db_Table_Abstract
{
	protected $_name = "subsections";
	protected $_primary = "idSubsection";
	protected $_dependentTables = array("Content");
}

