<?php
class Application_Model_Db_Sections extends Zend_Db_Table_Abstract
{
	protected $_name = "sections";
	protected $_primary = "idSection";
	protected $_dependentTables = array("Content");
}

