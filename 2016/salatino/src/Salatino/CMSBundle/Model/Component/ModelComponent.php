<?php
namespace Salatino\CMSBundle\Model\Component;

use Symfony\Component\HttpFoundation\File\UploadedFile;

class ModelComponent
{
	protected $router;
	protected $formFactory;
	protected $doctrine;
	protected $request;
	protected $rootPath;
	protected $form;
	private $category;
	
	public function setRouter( $router )
	{
		$this->router = $router;
	}

	public function setFormFactory( $formFactory )
	{
		$this->formFactory = $formFactory;
	}

	public function setDoctrine( $doctrine )
	{
		$this->doctrine = $doctrine;
	}

	public function setRequestStack( $request )
	{
		$this->request = $request;
	}

	public function setRootPath( $rootPath )
	{
		$this->rootPath = $rootPath;
	}

	public function setForm( $form )
	{
		$this->form = $form;
	}

	public function setCategory( $category )
	{
		$this->category = $category;
	}

	public function getCategory()
	{
		return $this->category;
	}

	protected function getPost()
	{
		return $this->request->getCurrentRequest()->request->all();
	}

	protected function uploadFile( $file )
	{
		$ext      = $file->guessExtension() ? $file->guessExtension() : 'bin';
		$filePath = $this->rootPath . '/../web/upload/';
		$fileName = md5( rand( 1, 99999999999 ) ) . '.' . $ext;

		$file->move( $filePath, $fileName );

		return $fileName;
	}

	protected function getEntity( $entityName, $id )
	{
		$repo       = $this->doctrine->getRepository( $entityName );
		$className  = $repo->getClassName();
		$entity     = new $className;
		
		if( $id ) 
			$entity = $repo->find( $id );

		return $entity;
	}

}