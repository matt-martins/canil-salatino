<?php 
include_once 'Component/ViewComponent.php';

class JSEditor extends ViewComponent
{
	protected function createElement($name, $value, $properties)
	{
		$this->properties = $properties;
		
		$header      = Nadeb_HeaderController::get_instance();
		$header->js  = "library/Nadeb/Components/Javascript/CLEditor/jquery.cleditor.min.js";
		$header->js  = "library/Nadeb/Components/Javascript/CLEditor/jquery.cleditor.xhtml.min.js";
		$header->css = "library/Nadeb/Components/Javascript/CLEditor/jquery.cleditor.css";
		
		$js             = Nadeb_JScontroller::get_instance();
		$js->JSInstance = "admin_JSEditor";
		
		$element = new ElementXml( 'textarea' );
		$element->id = $name;
		$element->class = $name . ' jsEditor';
		$element->name = $name;
		$element->rows = 4;
		$element->cols = 50;
		$element->addElement( $value );
		
		if($properties) foreach ($properties as $key => $val) $element->$key = $val;
	
		return $element;
	}
	
	public function changeValue($value)
	{
		$this->element = $this->createElement( $this->getName() , $value, $this->properties );
	}
	
	protected function createLabel($name, $label)
	{
		$lb = new ElementXml( 'label' );
		$lb->for = $name;
		$lb->class = 'label-' . $name;
		$lb->addElement( $label );
		
		return $lb;
	}
}

	
