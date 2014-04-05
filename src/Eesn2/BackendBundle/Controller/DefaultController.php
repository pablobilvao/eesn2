<?php

namespace Eesn2\BackendBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{
    /**
     * @Route("/")
     */
    public function indexAction()
    {
        return $this->redirect('login');
    }

    /**
     * @Route("/getCursos")
     * @method("POST")
     */

    public function getCursosAction(){
    	$cursos = $this->getDoctrine()->getRepository('Eesn2BackendBundle:Cursos')->findAll();
    	$json = new Response();
    	$json->headers->set('Content-Type','json');
    	$array = array();
    	foreach($cursos as $curso){
    		$array[$curso->getId()] = $curso->getCurso();
    	}

    	$json->setContent(json_encode($array));
    	
    	return $json;
    }

    /**
     * @Route("/getDivisiones")
     * @method("POST")
     */

    public function getDivisionesAction(){
    	$divisiones = $this->getDoctrine()->getRepository('Eesn2BackendBundle:Divisiones')->findAll();
    	$json = new Response();
    	$json->headers->set('Content-Type','json');
    	$array = array();
    	foreach($divisiones as $division){
    		$array[$division->getId()] = $division->getDivision();
    	}

    	$json->setContent(json_encode($array));
    	
    	return $json;
    }

    /**
     * @Route("/getDatosTable")
     * @Method("POST")
     */

    public function getDatosTable(){
        $request = Request::createFromGlobals();
        $entorno = (string) $request->request->get('entorno');
        $em = $this->getDoctrine()->getManager();
        $query = $this->crearQuery($em, $entorno);
        $cantRegistros = count($query->getResult());        
        $registros = $query->getResult();
        $json = new Response();
        $json->headers->set('Content-Type','json');
        $array = array();
        foreach($registros as $registro){
            $array[$registro->getId()] = $this->devolverValue($registro,$entorno);
        }
        $array['cantRegistros'] = $cantRegistros;
        $json->setContent(json_encode($array));
        
        return $json;
    }

    public function crearQuery($doctrine, $entorno){
        switch ($entorno) {
            case 'Asignaturas':
                return $doctrine->createQuery('SELECT a FROM Eesn2BackendBundle:Asignaturas a');
            case 'Cargos':
                return $doctrine->createQuery('SELECT c FROM Eesn2BackendBundle:Cargos c');
            case 'Cursos':
                return $doctrine->createQuery('SELECT c FROM Eesn2BackendBundle:Cursos c');
            case 'Divisiones':
                return $doctrine->createQuery('SELECT d FROM Eesn2BackendBundle:Divisiones d');
            case 'Normas':
                return $doctrine->createQuery('SELECT n FROM Eesn2BackendBundle:Normas n');
            case 'Estudiantes':
                return $doctrine->createQuery('SELECT e FROM Eesn2BackendBundle:TiposEstudiantes e');
            case 'Examenes':
                return $doctrine->createQuery('SELECT e FROM Eesn2BackendBundle:TiposExamenes e');
            case 'Turnos':
                return $doctrine->createQuery('SELECT t FROM Eesn2BackendBundle:Turnos t');
        }
    }

    public function devolverValue($object, $entorno){
        switch ($entorno) {
            case 'Asignaturas':
                return $object->getAsignatura();
            case 'Cargos':
                return $object->getCargo();
            case 'Cursos':
                return $object->getCurso();
            case 'Divisiones':
                return $object->getDivision();
            case 'Normas':
                return $object->getNormaLegal();
            case 'Estudiantes':
                return $object->getTipo();
            case 'Examenes':
                return $object->getTipo();
            case 'Turnos':
                return $object->getTurno(); 
        }
    }
    /**
     * @Route("/borrarRegistro")
     * @Method("POST")
     */

    public function borrarRegistroAction(){
        $request = Request::createFromGlobals();
        $response = new Response();
        $response->headers->set('Content-Type','json');
        $id = $request->request->get('id');
        $entorno = $request->request->get('entorno');
        $em = $this->getDoctrine()->getManager();
        $registro = $this->devolverRepository($em, $entorno)->find($id);
        if(count($registro) == 1){
            $em->remove($registro);
            $em->flush();
            $response->setContent(json_encode(array('mensaje'=>true)));
        }else{
            $response->setContent(json_encode(array('mensaje'=>false)));
        }

        return $response;
    }

    public function devolverRepository($doctrine, $entorno){
        switch ($entorno) {
            case 'Asignaturas':
                $repositorio = $doctrine->getRepository('Eesn2BackendBundle:Asignaturas');
                break;
            case 'Cargos':
                $repositorio = $doctrine->getRepository('Eesn2BackendBundle:Cargos');
                break;
            case 'Cursos':
                $repositorio = $doctrine->getRepository('Eesn2BackendBundle:Cursos');
                break;
            case 'Divisiones':
                $repositorio = $doctrine->getRepository('Eesn2BackendBundle:Divisiones');
                break;
            case 'Normas':
                $repositorio = $doctrine->getRepository('Eesn2BackendBundle:Normas');
                break;
            case 'Estudiantes':
                $repositorio = $doctrine->getRepository('Eesn2BackendBundle:TiposEstudiantes');
                break;
            case 'Examenes':
                $repositorio = $doctrine->getRepository('Eesn2BackendBundle:TiposExamenes');
                break;
            case 'Turnos':
                $repositorio = $doctrine->getRepository('Eesn2BackendBundle:Turnos');
                break;
        }
        
        return $repositorio;
    }
}
