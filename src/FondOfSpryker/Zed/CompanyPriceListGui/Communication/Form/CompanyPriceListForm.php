<?php

namespace FondOfSpryker\Zed\CompanyPriceListGui\Communication\Form;

use Spryker\Zed\Gui\Communication\Form\Type\SelectType;
use Spryker\Zed\Kernel\Communication\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

/**
 * @method \FondOfSpryker\Zed\CompanyPriceListGui\Communication\CompanyPriceListGuiCommunicationFactory getFactory()
 */
class CompanyPriceListForm extends AbstractType
{
    public const FIELD_FK_PRICE_LIST = 'fk_price_list';
    public const OPTIONS_PRICE_LIST = 'OPTIONS_PRICE_LIST';

    /**
     * @param \Symfony\Component\Form\FormBuilderInterface $builder
     * @param array $options
     *
     * @return void
     */
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $this->addPriceListCollectionField($builder, $options);
    }

    /**
     * @param \Symfony\Component\Form\FormBuilderInterface $builder
     * @param array $options
     *
     * @return $this
     */
    protected function addPriceListCollectionField(FormBuilderInterface $builder, array $options)
    {
        $builder->add(static::FIELD_FK_PRICE_LIST, SelectType::class, [
            'label' => 'Price list',
            'choices' => $options[static::OPTIONS_PRICE_LIST],
            'required' => true,
        ]);

        return $this;
    }
}
