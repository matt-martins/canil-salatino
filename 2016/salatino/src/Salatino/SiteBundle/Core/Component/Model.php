<?php
namespace Salatino\SiteBundle\Core\Component;

use Doctrine\Bundle\DoctrineBundle\Registry;
use Symfony\Component\HttpFoundation\RequestStack;


class Model
{
	private $doctrine;
	private $requestStack;

	public function setDoctrine( Registry $doctrine )
	{
		$this->doctrine = $doctrine;
	}

    public function setRequest(RequestStack $requestStack)
    {
        $this->requestStack = $requestStack->getCurrentRequest();
    }

	public function get( $modelName )
	{
		$model = new $modelName();
        $model->setDoctrine( $this->doctrine );

        $model->setPost( $this->requestStack->request );

        return $model;
	}
}