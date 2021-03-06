<?php

namespace FondOfSpryker\Zed\CompanyPriceListGui;

use FondOfSpryker\Zed\CompanyPriceListGui\Dependency\Facade\CompanyPriceListGuiToPriceListFacadeBridge;
use Spryker\Zed\Kernel\AbstractBundleDependencyProvider;
use Spryker\Zed\Kernel\Container;

class CompanyPriceListGuiDependencyProvider extends AbstractBundleDependencyProvider
{
    public const FACADE_PRICE_LIST = 'FACADE_PRICE_LIST';

    /**
     * @param \Spryker\Zed\Kernel\Container $container
     *
     * @return \Spryker\Zed\Kernel\Container
     */
    public function provideCommunicationLayerDependencies(Container $container): Container
    {
        $container = parent::provideCommunicationLayerDependencies($container);

        $container = $this->addPriceListFacade($container);

        return $container;
    }

    /**
     * @param \Spryker\Zed\Kernel\Container $container
     *
     * @return \Spryker\Zed\Kernel\Container
     */
    protected function addPriceListFacade(Container $container): Container
    {
        $container[static::FACADE_PRICE_LIST] = function (Container $container) {
            return new CompanyPriceListGuiToPriceListFacadeBridge(
                $container->getLocator()->priceList()->facade()
            );
        };

        return $container;
    }
}
