<?php 
include 'Xml/ElementXml.php';
include 'Select.php';
include 'InputText.php';
include 'TextArea.php';
include 'JSEditor.php';
include 'InputFile.php';
include 'RadioButton.php';
include 'Checkbox.php';
include 'InputHidden.php';
include 'InputPassword.php';

class DataForm
{
	private $dl;
	private $fieldset;
	private $element;
	private $title;
	private $data;

	public function __construct($name)
	{
		$this->dl = new ElementXml( 'dl' );
		$this->dl->class = 'dl-' . $name;
		
		$this->fieldset = new ElementXml( 'fieldset' );
		$this->fieldset->class = 'fieldset-' . $name;
		$this->fieldset->addElement( $this->dl );
		
		$this->element = new ElementXml( 'form' );
		$this->element->id = $name;
		$this->element->class = $name;
		$this->element->action = '#';
		$this->element->name = $name;
		$this->element->method = 'post';
		$this->element->enctype = 'multipart/form-data';
		$this->element->addElement( $this->fieldset );
	}
	
	public function setData($data)
	{
		$this->data = $data;
	}
	
	public function add(ViewComponent $element)
	{
		$this->dl->addElement( $this->crateDT(  $element ) );
		$this->dl->addElement( $this->crateDD(  $element ) );
	}
	
	public function title($text)
	{
		$this->title = new ElementXml( 'h2' );
		$this->title->class = 'session-title';
		$this->title->addElement( $text );
	}
	
	public function fieldset($name)
	{
		$this->dl = new ElementXml( 'dl' );
		$this->dl->class = 'dl-' . $name;
		
		$this->fieldset = new ElementXml( 'fieldset' );
		$this->fieldset->class = 'fieldset-' . $name;
		$this->fieldset->addElement( $this->dl );
		
		$this->element->addElement( $this->fieldset );
	}
	
	public function form()
	{
		return $this->element; 
	} 
	
	public function get()
	{
		return $this->title . $this->element;
	}
	
	private function crateDT(ViewComponent $element)
	{
		if( isset( $this->data[ $element->getName() ] ) ) $obj = $element->changeValue( $this->data[ $element->getName() ] );
		if( $element->getLabel() )
		{
			$dt = new ElementXml( 'dt' );
			$dt->id = $element->getName() . '-label';
			$dt->class = $element->getName() . '-label';
			$dt->addElement( $element->getLabel() );
		
			return $dt;
		}
		
		return false;
	}
	
	private function crateDD(ViewComponent $element)
	{
		if( isset( $this->data[ $element->getName() ] ) ) $obj = $element->changeValue( $this->data[ $element->getName() ] );
		if( $element->getElement() )
		{
			$dd = new ElementXml( 'dd' );
			$dd->id = $element->getName() . '-object';
			$dd->class = $element->getName() . '-object';
			$dd->addElement( $element->getElement() );
		
			return $dd;
		}
		
		return $element;
	}
}
