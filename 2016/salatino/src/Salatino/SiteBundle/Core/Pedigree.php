<?php
namespace Salatino\SiteBundle\Core;

use Salatino\EntityBundle\Entity\Pedigree as Table;

use Symfony\Component\Filesystem\Exception\IOException;
use Symfony\Component\Filesystem\Filesystem;
use Salatino\SiteBundle\Core\Component\CoreComponent;

class Pedigree extends CoreComponent
{

	public function getPedigreeById( $id )
	{
		$sql = 'SELECT n
				FROM
					SalatinoEntityBundle:Pedigree n
				WHERE
					n.isActive = 1 AND
					n.id = :id';
		
		$result = $this->dql( $sql )->setParameter('id', $id )->getOneOrNullResult();
		
		return $result;
	}
}
