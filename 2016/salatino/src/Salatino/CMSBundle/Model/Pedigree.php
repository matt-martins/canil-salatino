<?php
namespace Salatino\CMSBundle\Model;

use Salatino\CMSBundle\Model\Component\ModelComponent;

class Pedigree extends ModelComponent
{
	public $grid = 'SalatinoCMSBundle:CrudCustomLists:title-image.html.twig';
	
	public function listAll()
	{
		$repo   = $this->doctrine->getRepository( 'SalatinoEntityBundle:Content' );
		$rows   = $repo->findBy(
							array( 'isActive' => 1, 'section' => $this->getCategory() ),
							array( 'sequence' => 'ASC', 'id' => 'ASC' )
						);

		return $rows;
	}

	public function generateForm( $id )
	{
		$content = $this->doctrine->getEntityManager()
				        ->createQueryBuilder()
				        ->select('n, o')
				        ->from('SalatinoEntityBundle:Content', 'n')
				        ->innerJoin('SalatinoEntityBundle:Pedigree','o')
				        ->where('n.id = :id AND o.id = :id')
				        ->setParameter('id', $id)
				        ->getQuery()
				        ->getArrayResult();

		$content = array_merge((array) $content[0], (array) $content[1]);
		$form    = $this->formFactory->create( 'Salatino\CMSBundle\Form\Pedigree', $content );

		return $form;
	}
	
	public function save( $id )
	{
		$section = $this->getEntity( 'SalatinoEntityBundle:Section', $this->getCategory() );

		$content = $this->getEntity( 'SalatinoEntityBundle:Content', $id );
		$content->setTitle( $this->form['title']->getData() );
		$content->setBody( $this->form['body']->getData() );
		$content->setSection( $section );
		$content->setIsActive( '1' );

		if( $this->form['picture']->getData() != null )
			$content->setPicture( $this->uploadFile( $this->form['picture']->getData() ) );

		if( $this->form['smallPicture']->getData() != null )
			$content->setSmallPicture( $this->uploadFile( $this->form['smallPicture']->getData() ) );

		$em = $this->doctrine->getManager();
		$em->persist( $content );
		$em->flush();

		$pedigree = $this->getEntity( 'SalatinoEntityBundle:Pedigree', $id );
		$pedigree->setCp01( $this->form['cp01']->getData() );
		$pedigree->setCp02( $this->form['cp02']->getData() );
		$pedigree->setCp03( $this->form['cp03']->getData() );
		$pedigree->setCp04( $this->form['cp04']->getData() );
		$pedigree->setCp05( $this->form['cp05']->getData() );
		$pedigree->setCp06( $this->form['cp06']->getData() );
		$pedigree->setCp07( $this->form['cp07']->getData() );
		$pedigree->setCp08( $this->form['cp08']->getData() );
		$pedigree->setCp09( $this->form['cp09']->getData() );
		$pedigree->setCp10( $this->form['cp10']->getData() );
		$pedigree->setCp11( $this->form['cp11']->getData() );
		$pedigree->setCp12( $this->form['cp12']->getData() );
		$pedigree->setCp13( $this->form['cp13']->getData() );
		$pedigree->setCp14( $this->form['cp14']->getData() );

		$em = $this->doctrine->getManager();
		$em->persist( $pedigree );
		$em->flush();
	}

	public function delete( $id )
	{
		$content = $this->getEntity( 'SalatinoEntityBundle:Content', $id );

		$em = $this->doctrine->getManager();
		$em->remove( $content );
		$em->flush();

		$pedigree = $this->getEntity( 'SalatinoEntityBundle:Pedigree', $id );

		$em = $this->doctrine->getManager();
		$em->remove( $pedigree );
		$em->flush();
	}
}