<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Intervencion;
use AppBundle\Entity\Pozo;
use AppBundle\Form\IntervencionType;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Form\FormError;
use Symfony\Component\HttpFoundation\Request;

class IntervencionController extends Controller
{
    /**
     *
     * Ejecuta un listado de intervenciones filtradas por pozo, más un formulario de nueva intervención.
     *
     * @param Request $request
     * @param Pozo $pozo
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function indexAction(Request $request, Pozo $pozo)
    {

        $intervencionRep = $this->getDoctrine()->getRepository('AppBundle:Intervencion');

        $intervencion = $this->inicializarIntervencion($pozo);

        $equiposActivos = $this->getDoctrine()->getRepository('AppBundle:Equipo')->findBy(array('activo' => true));

        $equiposElegibles = new ArrayCollection();

        foreach ($equiposActivos as $equipo){
            $ultimaIntervencion = $intervencionRep->getUltimaIntervencionByEquipo($equipo)->getQuery()->getOneOrNullResult();

            //si el equipo no tiene intervenciones o si la intervencion que tiene fue un cierre
            if(!$ultimaIntervencion || $ultimaIntervencion->getAccion() == 1){
                $equiposElegibles->add($equipo);
            }
        }

        $form = $this->createForm(IntervencionType::class, $intervencion, array(
            'equipos_elegibles' => $equiposElegibles,
            'action' => $this->generateUrl('intervencion_nueva', array('id' => $pozo->getId())),
            'method' => 'POST',
        ));

        $intervenciones = $this->getUltimasIntervenciones($pozo, $request->query->get('page', 1));

        return $this->render('AppBundle:intervencion:index.html.twig', array(
            'form' => $form->createView(),
            'intervenciones' => $intervenciones,
	        'pozo' => $pozo
        ));
    }



    public function nuevaAction(Request $request, Pozo $pozo)
    {
        $intervencion = new Intervencion();

        $intervencion->setPozo($pozo);

        $form = $this->createForm(IntervencionType::class, $intervencion, array(
            'action' => $this->generateUrl('intervencion_nueva', array('id' => $pozo->getId())),
            'method' => 'POST',
        ));

        $form->handleRequest($request);

        if ($form->isSubmitted()) {

            $fechaIntervencion = $intervencion->getFecha();

            $fechaHoy = new \DateTime('NOW');

            if ($fechaIntervencion > $fechaHoy) {
                $form->get('fecha')->addError(new FormError('La fecha ingresada no puede ser mayor a la fecha del dia de hoy'));
            } else {

                $ultimaIntervencion = $pozo->getUltimaIntervencion();

                if ($ultimaIntervencion) {

                    $fechaUltimaIntervencion = $ultimaIntervencion->getFecha();

                    //si estoy realizando una apertura
                    if ($intervencion->getAccion() == 0) {
                        $msgUltimaIntervencion = 'La fecha ingresada no puede ser menor a la fecha de cierre de la última intervención';
                    } else {
                        $msgUltimaIntervencion = 'La fecha ingresada no puede ser menor a la fecha de apertura de la última intervención';
                    }

                    if ($fechaIntervencion < $fechaUltimaIntervencion) {
                        $form->get('fecha')->addError(new FormError($msgUltimaIntervencion));
                    }

                }

            }

            if ($form->isValid()) {

                $em = $this->getDoctrine()->getManager();

                $em->persist($intervencion);
                $em->flush();

                $this->get('session')->getFlashBag()->add('success',
                    'La intervención se ha registrado satisfactoriamente.');


                return $this->redirectToRoute('intervencion_index', array('id' => $pozo->getid()));
            }
        }

        $intervenciones = $this->getUltimasIntervenciones($pozo, $request->query->get('page', 1));

        return $this->render('AppBundle:intervencion:index.html.twig', array(
            'form' => $form->createView(),
            'intervenciones' => $intervenciones,
	        'pozo'          => $pozo
        ));

    }

    /**
     * Obtiene las últimas intervenciones realizadas sobre el pozo.
     *
     * @param Pozo $pozo
     * @param $page
     * @return \Doctrine\ORM\QueryBuilder|\Knp\Component\Pager\Pagination\PaginationInterface
     */
    private function getUltimasIntervenciones(Pozo $pozo, $page)
    {
        $em = $this->getDoctrine()->getManager();

        $intervenciones = $em->getRepository('AppBundle:Intervencion')->getUltimasIntervencionesByPozo($pozo);

        $paginator = $this->get('knp_paginator');

        $intervenciones = $paginator->paginate(
            $intervenciones,
            $page  /* page number */,
            10/* limit per page */
        );

        return $intervenciones;
    }


    /**
     * Inicializa una intervencion para un determinado pozo.
     * Revisa la próxima intervencion a realizar.
     *
     * @param Pozo $pozo
     * @return Intervencion
     */
    private function inicializarIntervencion(Pozo $pozo)
    {
        $intervencion = new Intervencion();

        $fechaHoy = new \DateTime('NOW');

        $intervencion->setFecha($fechaHoy);

        $intervencion->setPozo($pozo);

        //por defecto se considera que la intervencion a realizar es una apertura de pozo
        $intervencion->setAccion(0);

        $ultimaIntervencion = $pozo->getUltimaIntervencion();

        if ($ultimaIntervencion) {
            $accion = $ultimaIntervencion->getAccion();

            //si la ultima intervencion efectuada fue una apertura, el formulario debe permitir solamente cerrar el pozo.
            if ($accion == 0) {
                $intervencion->setAccion(1);
            }
        }

        return $intervencion;
    }

}
