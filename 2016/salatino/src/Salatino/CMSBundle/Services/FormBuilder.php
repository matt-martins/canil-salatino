<?php
namespace Salatino\CMSBundle\Services;

class FormBuilder
{
	private $router;
	private $doctrine;
	private $formFactory;
	
	public function __construct($router, $doctrine, $formFactory)
	{
		$this->router      = $router;
		$this->doctrine    = $doctrine;
		$this->formFactory = $formFactory;
	}
	
	public function get( $model, $id )
	{
		$model = new $model();
		$model->setRouter( $this->router );
		$model->setDoctrine( $this->doctrine );
		$model->setFormFactory( $this->formFactory );

		return $model->generateForm( $id );
	}
}