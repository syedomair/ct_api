<?php
namespace SyedOmair\Bundle\MyAppBundle;

use SyedOmair\Bundle\MyAppBundle\DependencyInjection\Security\Factory\CustomAuthFactory;
use Symfony\Component\HttpKernel\Bundle\Bundle;
use Symfony\Component\DependencyInjection\ContainerBuilder;

class MyAppBundle extends Bundle
{
    public function build(ContainerBuilder $container)
    {
        parent::build($container);

        $extension = $container->getExtension('security');
        $extension->addSecurityListenerFactory(new CustomAuthFactory());
    }
}
