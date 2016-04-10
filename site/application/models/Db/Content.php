<?php
class Application_Model_Db_Content extends Zend_Db_Table_Abstract
{
	protected $_name = "content";
	protected $_primary = "idContent";
	protected $_referenceMap = array(
	 		"Section" => array(
				"columns" => array("idSection"),
				"refTableClass" => "Application_Model_Db_Sections",
				"refColumns" => array("idSection"),
			),
			"Subsection" => array(
				"columns" => array("idSubsection"),
				"refTableClass" => "Application_Model_Db_Subsections",
				"refColumns" => array("idSubsection"),
			),
			"Pedigree" => array(
				"columns" => array("idContent"),
				"refTableClass" => "Application_Model_Db_Pedigree",
				"refColumns" => array("idContent"),
			)
		);
	
}

