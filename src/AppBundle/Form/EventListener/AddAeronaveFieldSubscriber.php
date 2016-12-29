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
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\PropertyAccess\PropertyAccess;
use Doctrine\ORM\EntityRepository;
use Symfony\Component\Validator\Constraints\NotBlank;

class AddAeronaveFieldSubscriber implements EventSubscriberInterface
{
    private $propertyPathToCity;

    public function __construct($propertyPathToCity)
    {
        $this->propertyPathToCity = $propertyPathToCity;
    }

    public static function getSubscribedEvents()
    {
        return array(
            FormEvents::PRE_SET_DATA  => 'preSetData',
            FormEvents::PRE_SUBMIT    => 'preSubmit'
        );
    }

    private function addCityForm($form, $modelo_id)
    {
        $formOptions = array(
            'class'         => 'AppBundle:Aeronave',
            //'empty_value'   => 'Distrito',
            //'label'         => 'Distrito',
            'placeholder' => '',
            'mapped'        => true,
            'choice_label' => 'nombre',
            'attr'          => array(
                'class' => 'city_selector',
            ),
            'constraints' => array(
                new NotBlank(),

            ),
            'query_builder' => function (EntityRepository $repository) use ($modelo_id) {
                $qb = $repository->createQueryBuilder('a')
                    ->innerJoin('a.modelo', 'modelo')
                    ->orderBy('a.nombre','ASC')
                    ->where('modelo.id = :modelo')
                    ->setParameter('modelo', $modelo_id)
                ;

                return $qb;
            }
        );

        $form->add($this->propertyPathToCity, 'entity', $formOptions);
    }

    public function preSetData(FormEvent $event)
    {

        $data = $event->getData();
        $form = $event->getForm();

        if (null === $data) {
            return;
        }

        $accessor    = PropertyAccess::createPropertyAccessor();

        $distrito        = $accessor->getValue($data, $this->propertyPathToCity);
        $provincia_id = ($distrito) ? $distrito->getModelo()->getId() : null;


        $this->addCityForm($form, $provincia_id);
    }

    public function preSubmit(FormEvent $event)
    {
        $data = $event->getData();
        $form = $event->getForm();

        $provincia_id = array_key_exists('modelo', $data) ? $data['modelo'] : null;



        $this->addCityForm($form, $provincia_id);
    }
}