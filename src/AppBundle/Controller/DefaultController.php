<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {
        // replace this example code with whatever you need
        return $this->render('default/index.html.twig', array(
            'base_dir' => realpath($this->container->getParameter('kernel.root_dir').'/..').DIRECTORY_SEPARATOR,
        ));
    }

    /**
     * @Route("/aeronaves", name="select_aeronaves")
     */
    public function aeronavesAction(Request $request)
    {
        $modelo_id = $request->request->get('modelo_id');

        $em = $this->getDoctrine()->getManager();
        $aeronaves = $em->getRepository('AppBundle:Aeronave')->findBy(array('modelo'=>$modelo_id));
        $out = array();
        foreach ($aeronaves as $d){
            $obj = new \stdClass();
            $obj->id = $d->getId();
            $obj->nombre = $d->getNombre();
            $out[] =$obj;
        }
        return new JsonResponse($out);
    }
}
