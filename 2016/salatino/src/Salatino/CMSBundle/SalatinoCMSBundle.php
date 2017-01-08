<?php

namespace Salatino\CMSBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;

class SalatinoCMSBundle extends Bundle
{
	public function getParent()
    {
        return 'FOSUserBundle';
    }
}
