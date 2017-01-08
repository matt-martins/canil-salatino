<?php
namespace Salatino\SiteBundle\Core\Component;

use Salatino\SiteBundle\Core\SessionStorage;

use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\HttpFoundation\ParameterBag;
use Doctrine\Bundle\DoctrineBundle\Registry;
use Doctrine\ORM\Query\ResultSetMappingBuilder;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

abstract class CoreComponent
{
	private $session;
	private $rsm;
	protected $controler;
	protected $doctrine;
	protected $request;
	protected $delete;
	protected $uploadMap = array( 'default'  => array( 'path' => 'uploads' ) );

	protected function session()
	{
		return SessionStorage::getInstance();
	}
	
	public function setDoctrine( Registry $doctrine )
	{
	    $this->doctrine = $doctrine;
	}
	
	public function setPost( ParameterBag $post )
	{
	    $this->request = $post->all();
	}

	/**
	 *
	 * <code>
	 * $sql = 'SELECT n.coloumn, n.coloumn FROM AliasBundle:EntityName n WHERE n.column = :param';
	 * $result = $this->dql( $sql )->setParameter('param', $param)->getResult();
	 * </code>
	 *
	 * @param string   $sql Simple DQL for access the Result Set Mapping
	 */
	protected function dql( $sql )
	{
		$query = $this->doctrine->getManager()->createQuery( $sql );
		return $query;
	}
	
	/**
	 *
	 * <code>
	 * $this->persist( $table );
	 * </code>
	 * 
	 * <code>
	 * use this code for delete row
	 * $this->delete = true;
	 * $this->persist( $table );
	 * </code>
	 * @param string   $sql Simple DQL for access the Result Set Mapping
	 */
	protected function persist( $table )
	{
		$em = $this->doctrine->getManager();
		$em->persist( $table );
		if( $this->delete ) $em->remove( $table );
		$em->flush();
		
		return $table;
	}

}