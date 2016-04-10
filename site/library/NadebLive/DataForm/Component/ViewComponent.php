<?php 
include '/DataForm/Interfaces/FormElementInterface.php';

abstract class ViewComponent implements FormElementInterface
{
	protected $element;
	protected $label;
	protected $properties;
	
	public function __construct($name = '', $label = '', $value = '', array $properties = null)
	{
		$this->label = null;
		$this->element = null;
		$this->properties = $properties;

		$this->label = ($label) ? $this->createLabel( $name, $label ) : '';
		$this->element = ($name) ? $this->createElement( $name, $value, $properties ) : '';
	}
	
	public function getType()
	{
		return isset($this->element) ? $this->element->type : false;
	}
	
	public function getName()
	{
		return isset($this->element) ? $this->element->name : false;
	}
	
	public function getElement()
	{
		return isset($this->element) ? $this->element : false;
	}
	
	public function getLabel()
	{
		return isset($this->label) ? $this->label : false;
	}
	
	public function changeValue($value)
	{
		$this->element->value = $value;
	}
	
	abstract protected function createLabel($name, $value);
	abstract protected function createElement($name, $value, $properties);
}