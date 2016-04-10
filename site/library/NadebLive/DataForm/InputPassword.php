<?php 
include_once 'Component/ViewComponent.php';

class InputPassword extends ViewComponent
{
	protected function createElement($name, $value, $properties)
	{
		$element = new ElementXml( 'input' );
		$element->type = 'password';
		$element->id = $name;
		$element->class = $name;
		$element->name = $name;
		$element->value = $value;
		if($properties) foreach ($properties as $key => $val) $element->$key = $val;
	
		return $element;
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
