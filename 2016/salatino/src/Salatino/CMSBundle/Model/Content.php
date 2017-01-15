<?php
namespace Salatino\CMSBundle\Model;

use Salatino\CMSBundle\Model\Component\ModelComponent;

class Content extends ModelComponent
{
	public $grid = 'SalatinoCMSBundle:CrudCustomLists:title-image.html.twig';

	public function listAll()
	{
		$repo   = $this->doctrine->getRepository( 'SalatinoEntityBundle:Content' );
		$rows   = $repo->findBy(
							array( 'isActive' => 1, 'section'  => $this->getCategory() ),
							array( 'sequence' => 'ASC', 'id' => 'ASC' )
						);

		return $rows;
	}

	public function generateForm( $id )
	{
		$content = $this->getEntity( 'SalatinoEntityBundle:Content', $id );
		$form    = $this->formFactory->create( 'Salatino\CMSBundle\Form\Content', $content );

		return $form;
	}
	
	public function save( $id )
	{
		$request = $this->getPost();
		
		$content = $this->getEntity( 'SalatinoEntityBundle:Content', $id );
		$content->setTitle( $this->form['title']->getData() );
		$content->setEnTitle( $this->form['enTitle']->getData() );
		$content->setEnBody( $this->form['enBody']->getData() );
		$content->setBody( $this->form['body']->getData() );
		$content->setSection( $this->getCategory() );
		$content->setIsActive( '1' );

		if( $this->form['image1']->getData() != null )
			$content->setImage1( $this->uploadFile( $this->form['image1']->getData() ) );

		$em = $this->doctrine->getManager();
		$em->persist( $content );
		$em->flush();
		
	}

	public function delete( $id )
	{
		$content = $this->getEntity( 'SalatinoEntityBundle:Content', $id );

		$em = $this->doctrine->getManager();
		$em->remove( $content );
		$em->flush();
	}
}