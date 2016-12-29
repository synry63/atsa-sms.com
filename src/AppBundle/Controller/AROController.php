<?php
/**
 * Created by PhpStorm.
 * User: patrici-star
 * Date: 12/24/2016
 * Time: 10:17 AM
 */
namespace AppBundle\Controller;

use AppBundle\Entity\ARO;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Form\Type\AROType;
use Symfony\Component\Form\FormError;
use Symfony\Component\HttpFoundation\Response;

class AROController extends Controller
{
    /**
     * @Route("/aro", name="aro")
     */
    public function indexAction(Request $request)
    {
        $aro = new ARO();
        $form = $this->createForm(new AROType(), $aro);
        $form->handleRequest($request);


        if ($form->isSubmitted()) {
            //$key = $this->get('stringKey')->getKey($aro->getExperienciaTripulacionCoPiloto());
            //var_dump($aro->getMission()->getTitulo());
            if ($form->isValid()) {
                $user = $this->get('security.token_storage')->getToken()->getUser();
                $aro->setUser($user);

                $em = $this->getDoctrine()->getManager();
                $em->persist($aro);
                $em->flush();
                $request->getSession()->getFlashBag()->add('success', 'Formulario enviado correctamente !');
                return $this->redirectToRoute('aro');
            }
            else{
                $error = new FormError("El formulario contiene errores, verifique los campos e inténtelo de nuevo.");
                $form->addError($error);
            }
        }
        return $this->render(
            'user/aro.html.twig',array(
                'form' => $form->createView(),
            )
        );
    }
    /**
     * @Route("/admin/aro", name="admin_aro")
     */
    public function moduleIndexAction(Request $request)
    {
        return $this->render(
            'admin/aro_module.html.twig'
        );
    }
    /**
     * @Route("/admin/data/aro", name="admin_data_aro",condition="request.isXmlHttpRequest()")
     */
    public function moduleDataAction(Request $request)
    {
        $aros = $this->getDoctrine()->getRepository('AppBundle:ARO')
            ->findAll();
        //$serializer = SerializerBuilder::create();
        $serializer = $this->get('jms_serializer');
        $jsonContent = $serializer->serialize($aros, 'json');
        return new Response($jsonContent);
    }
}