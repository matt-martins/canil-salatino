<?php
namespace Salatino\CMSBundle\Services;

class ModelFactory
{
	private $router;
	private $doctrine;
	private $request;
	
	public function __construct($router, $doctrine, $request, $rootPath)
	{
		$this->router    = $router;
		$this->doctrine  = $doctrine;
		$this->request   = $request;
		$this->rootPath  = $rootPath;
	}
	
	public function get( $model )
	{
		$model = new $model();
		$model->setRouter( $this->router );
		$model->setDoctrine( $this->doctrine );
		$model->setRequestStack( $this->request );
		$model->setRootPath( $this->rootPath );

		return $model;
	}
}