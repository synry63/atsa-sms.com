<?php
/**
 * Created by PhpStorm.
 * User: patrici-star
 * Date: 10/9/2016
 * Time: 2:50 PM
 */
namespace AppBundle\Form\EventListener;

use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\PropertyAccess\PropertyAccess;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Doctrine\ORM\EntityRepository;
use Symfony\Component\Validator\Constraints\NotBlank;

class AddModeloFieldSubscriber implements EventSubscriberInterface
{
    private $propertyPathToCity;

    public function __construct($propertyPathToCity)
    {
        $this->propertyPathToCity = $propertyPathToCity;
    }

    public static function getSubscribedEvents()
    {
        return array(
            FormEvents::PRE_SET_DATA => 'preSetData',
            FormEvents::PRE_SUBMIT   => 'preSubmit'
        );
    }

    private function addCountryForm($form, $modelo = null)
    {
        $formOptions = array(
            'class'         => 'AppBundle:Modelo',
            'mapped'        => true,
            'choice_label' => 'nombre',
            //'label'         => 'Departamento',
            //'empty_value'   => 'Departamento',
            'placeholder' => '',
            'attr'          => array(
                'class' => 'country_selector',
            ),
            'constraints' => array(
                new NotBlank(),

            ),
            'query_builder' => function (EntityRepository $repository){
                $qb = $repository->createQueryBuilder('m')
                    ->orderBy('m.nombre','ASC')

                ;

                return $qb;
            }
        );

        if ($modelo) {
            $formOptions['data'] = $modelo;
        }

        $form->add('modelo', 'entity', $formOptions);
    }

    public function preSetData(FormEvent $event)
    {
        $data = $event->getData();
        $form = $event->getForm();

        if (null === $data) {
            return;
        }

        $accessor = PropertyAccess::getPropertyAccessor();

        $aeronave    = $accessor->getValue($data, $this->propertyPathToCity);
        $modelo = ($aeronave) ? $aeronave->getModelo() : null;

        $this->addCountryForm($form, $modelo);
    }

    public function preSubmit(FormEvent $event)
    {
        $form = $event->getForm();

        $this->addCountryForm($form);
    }
}