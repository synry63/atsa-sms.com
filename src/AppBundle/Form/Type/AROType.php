<?php
/**
 * Created by PhpStorm.
 * User: patrici-star
 * Date: 12/24/2016
 * Time: 9:25 AM
 */
namespace AppBundle\Form\Type;

use AppBundle\Form\EventListener\AddAeronaveFieldSubscriber;
use AppBundle\Form\EventListener\AddModeloFieldSubscriber;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\NotBlank;
class AROType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {

        $propertyPathToAeronave  = 'aeronave';

        $builder
            ->addEventSubscriber(new AddModeloFieldSubscriber($propertyPathToAeronave))
            ->addEventSubscriber(new AddAeronaveFieldSubscriber($propertyPathToAeronave))
        ;

        $builder->add('origen', 'Symfony\Component\Form\Extension\Core\Type\ChoiceType',array(
            'choices'  => array(
                'REGULAR' => 'REGULAR',
                'MANTTO.' => 'MANTTO.',
                'ENTRE.' => 'ENTRE.',
                'EVAC.AEROMED.' => 'EVAC.AEROMED.',
                'TRASLADO MERC. PEL.' => 'TRASLADO MERC. PEL.',
            ),
            'placeholder' => '',
            'multiple'      => false,
            'expanded'      => false,
            'constraints' => array(
                new NotBlank(),

            ),

        ));
        $builder->add('destino', 'Symfony\Component\Form\Extension\Core\Type\ChoiceType',array(
            'choices'  => array(
                'REGULAR' => 'REGULAR',
                'MANTTO.' => 'MANTTO.',
                'ENTRE.' => 'ENTRE.',
                'EVAC.AEROMED.' => 'EVAC.AEROMED.',
                'TRASLADO MERC. PEL.' => 'TRASLADO MERC. PEL.',
            ),
            'placeholder' => '',
            'multiple'      => false,
            'expanded'      => false,
            'constraints' => array(
                new NotBlank(),

            ),
        ));

        $builder->add('zona', 'entity',array(
            'class' => 'AppBundle:Respuesta',
            'choice_label' => 'titulo',
            'multiple'      => false,
            'expanded'      => true,
            'query_builder' => function ($er) {
                return $er->createQueryBuilder('r')
                    ->innerJoin('r.pregunta', 'p')
                    ->where('p.llave = :key')
                    ->setParameter('key', 'zona')
                    ->orderBy('r.sort');
            },
            'constraints' => array(
                new NotBlank(),

            ),

        ));

        $builder->add('mission', 'entity',array(
            'class' => 'AppBundle:Respuesta',
            'choice_label' => 'titulo',
            'multiple'      => false,
            'expanded'      => true,
            'query_builder' => function ($er) {
                return $er->createQueryBuilder('r')
                    ->innerJoin('r.pregunta', 'p')
                    ->where('p.llave = :key')
                    ->setParameter('key', 'mission')
                    ->orderBy('r.sort');
            },
            'constraints' => array(
                new NotBlank(),

            ),

        ));

        $builder->add('salud', 'entity',array(
            'class' => 'AppBundle:Respuesta',
            'choice_label' => 'titulo',
            'multiple'      => false,
            'expanded'      => true,
            'query_builder' => function ($er) {
                return $er->createQueryBuilder('r')
                    ->innerJoin('r.pregunta', 'p')
                    ->where('p.llave = :key')
                    ->setParameter('key', 'salud')
                    ->orderBy('r.sort');
            },
            'constraints' => array(
                new NotBlank(),

            ),

        ));

        $builder->add('situacion', 'entity',array(
            'class' => 'AppBundle:Respuesta',
            'choice_label' => 'titulo',
            'multiple'      => false,
            'expanded'      => true,
            'query_builder' => function ($er) {
                return $er->createQueryBuilder('r')
                    ->innerJoin('r.pregunta', 'p')
                    ->where('p.llave = :key')
                    ->setParameter('key', 'situacion')
                    ->orderBy('r.sort');
            },
            'constraints' => array(
                new NotBlank(),

            ),

        ));

        $builder->add('descanso', 'entity',array(
            'class' => 'AppBundle:Respuesta',
            'choice_label' => 'titulo',
            'multiple'      => false,
            'expanded'      => true,
            'query_builder' => function ($er) {
                return $er->createQueryBuilder('r')
                    ->innerJoin('r.pregunta', 'p')
                    ->where('p.llave = :key')
                    ->setParameter('key', 'descanso')
                    ->orderBy('r.sort');
            },
            'constraints' => array(
                new NotBlank(),

            ),

        ));

        $builder->add('tiempoPlanificar', 'entity',array(
            'class' => 'AppBundle:Respuesta',
            'choice_label' => 'titulo',
            'multiple'      => false,
            'expanded'      => true,
            'query_builder' => function ($er) {
                return $er->createQueryBuilder('r')
                    ->innerJoin('r.pregunta', 'p')
                    ->where('p.llave = :key')
                    ->setParameter('key', 'planificar')
                    ->orderBy('r.sort');
            },
            'constraints' => array(
                new NotBlank(),

            ),

        ));

        /*$builder->add('experienciaTripulacionPiloto', 'Symfony\Component\Form\Extension\Core\Type\ChoiceType',array(
            'choices'  => array(
                '> 3000 HRS.' => '> 3000 HRS.',
                '> [2999 - 1500 HRS]' => 'ADECUADO',
                '< 1499 HRS.' => 'ADECUADO',
            ),
            'multiple'      => false,
            'expanded'      => true,
            'constraints' => array(
                new NotBlank(),

            ),
        ));

        $builder->add('experienciaTripulacionCoPiloto', 'Symfony\Component\Form\Extension\Core\Type\ChoiceType',array(
            'choices'  => array(
                '> 1200 HRS.' => '> 1200 HRS.',
                '> [2999 - 1500 HRS]' => '> [2999 - 1500 HRS]',
                '< 1499 HRS.' => '< 1499 HRS.',
            ),
            'multiple'      => false,
            'expanded'      => true,
            'constraints' => array(
                new NotBlank(),

            ),
        ));

        $builder->add('experienciaTripulacionRutaPiloto', 'Symfony\Component\Form\Extension\Core\Type\ChoiceType',array(
            'choices'  => array(
                '> 700 HRS.' => '> 700 HRS.',
                '> [699 - 450 HRS]' => '> [699 - 450 HRS]',
                '< 449 HRS.' => '< 449 HRS.',
            ),
            'multiple'      => false,
            'expanded'      => true,
            'constraints' => array(
                new NotBlank(),

            ),
        ));

        $builder->add('experienciaTripulacionRutaCoPiloto', 'Symfony\Component\Form\Extension\Core\Type\ChoiceType',array(
            'choices'  => array(
                '> 500 HRS.' => '> 500 HRS.',
                '> [499 - 250 HRS]' => '> [499 - 250 HRS]',
                '< 249 HRS.' => '< 249 HRS.',
            ),
            'multiple'      => false,
            'expanded'      => true,
            'constraints' => array(
                new NotBlank(),

            ),
        ));

        $builder->add('aerodromoOrigen', 'Symfony\Component\Form\Extension\Core\Type\ChoiceType',array(
            'choices'  => array(
                'controlado' => 'controlado',
                'no controlado' => 'no controlado',
            ),
            'multiple'      => false,
            'expanded'      => true,
            'constraints' => array(
                new NotBlank(),

            ),
        ));

        $builder->add('aerodromoDestino', 'Symfony\Component\Form\Extension\Core\Type\ChoiceType',array(
            'choices'  => array(
                'controlado' => 'controlado',
                'no controlado' => 'no controlado',
            ),
            'multiple'      => false,
            'expanded'      => true,
            'constraints' => array(
                new NotBlank(),

            ),
        ));

        $builder->add('meteorologiaOrigen', 'Symfony\Component\Form\Extension\Core\Type\ChoiceType',array(
            'choices'  => array(
                'cavok' => 'cavok',
                '1500' => '1500',
            ),
            'multiple'      => false,
            'expanded'      => true,
            'constraints' => array(
                new NotBlank(),

            ),
        ));

        $builder->add('meteorologiaDestino', 'Symfony\Component\Form\Extension\Core\Type\ChoiceType',array(
            'choices'  => array(
                'cavok' => 'cavok',
                '1500' => '1500',
            ),
            'multiple'      => false,
            'expanded'      => true,
            'constraints' => array(
                new NotBlank(),

            ),
        ));

        $builder->add('diferidos', 'Symfony\Component\Form\Extension\Core\Type\ChoiceType',array(
            'choices'  => array(
                'sin dif' => 'sin dif',
                'D' => 'D',
            ),
            'multiple'      => false,
            'expanded'      => true,
            'constraints' => array(
                new NotBlank(),

            ),
        ));*/

        $builder->add('submit', 'Symfony\Component\Form\Extension\Core\Type\SubmitType');
    }
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\ARO',
        ));
    }
}