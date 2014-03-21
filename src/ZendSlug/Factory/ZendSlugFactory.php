<?php
namespace ZendSlug\Factory;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;
use ZendSlug\Controller\Plugin\ZendSlug;

class ZendSlugFactory implements FactoryInterface
{
    public function createService(ServiceLocatorInterface $servicelocator)
    {
        $allServices = $servicelocator->getServiceLocator();
        $config = $allServices->get('ServiceManager')->get('Configuration');

        $zs = new ZendSlug(array(
            'separator' => $config['zendslug']['separator']
        ));
        $zs->setServiceLocator($servicelocator);

        return $zs;
    }
}