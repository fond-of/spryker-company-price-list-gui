<?php

namespace FondOfSpryker\Zed\CompanyPriceListGui\Communication;

use FondOfSpryker\Zed\CompanyPriceListGui\Communication\Form\CompanyPriceListForm;
use FondOfSpryker\Zed\CompanyPriceListGui\Communication\Form\DataProvider\CompanyPriceListFormDataProvider;
use FondOfSpryker\Zed\CompanyPriceListGui\CompanyPriceListGuiDependencyProvider;
use FondOfSpryker\Zed\CompanyPriceListGui\Dependency\Facade\CompanyPriceListGuiToPriceListFacadeInterface;
use Spryker\Zed\Kernel\Communication\AbstractCommunicationFactory;

class CompanyPriceListGuiCommunicationFactory extends AbstractCommunicationFactory
{
    /**
     * @throws
     *
     * @return \FondOfSpryker\Zed\CompanyPriceListGui\Dependency\Facade\CompanyPriceListGuiToPriceListFacadeInterface
     */
    protected function getPriceListFacade(): CompanyPriceListGuiToPriceListFacadeInterface
    {
        return $this->getProvidedDependency(CompanyPriceListGuiDependencyProvider::FACADE_PRICE_LIST);
    }

    /**
     * @return \FondOfSpryker\Zed\CompanyPriceListGui\Communication\Form\DataProvider\CompanyPriceListFormDataProvider
     */
    public function createCompanyPriceListFormDataProvider(): CompanyPriceListFormDataProvider
    {
        return new CompanyPriceListFormDataProvider($this->getPriceListFacade());
    }

    /**
     * @return \FondOfSpryker\Zed\CompanyPriceListGui\Communication\Form\CompanyPriceListForm
     */
    public function createCompanyPriceListForm(): CompanyPriceListForm
    {
        return new CompanyPriceListForm();
    }
}
