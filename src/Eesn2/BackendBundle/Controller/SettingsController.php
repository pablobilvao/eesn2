<?php

namespace Eesn2\BackendBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Eesn2\BackendBundle\Entity\Asignaturas;
use Eesn2\BackendBundle\Entity\Cursos;
use Eesn2\BackendBundle\Entity\Cargos;
use Eesn2\BackendBundle\Entity\Divisiones;
use Eesn2\BackendBundle\Entity\Normas;
use Eesn2\BackendBundle\Entity\TiposEstudiantes;
use Eesn2\BackendBundle\Entity\TiposExamenes;
use Eesn2\BackendBundle\Entity\Turnos;

class SettingsController extends Controller
{
	/**
	 * @Route("/settings")
	 * @Method("GET")
	 * @Template("Eesn2BackendBundle:Settings:settings.new.html.twig")
	 */

	public function settingsAction(){
		$login = $this->verificarLogin();
		$settingsOK = $this->verificarSettings();
		if($login->getAutorizado()){
			$retornar = array("sectionTitle"=>"Settings", "nameUser"=>$login->getUser());
			if(!$settingsOK){
				return $retornar;
			}else{
				return $this->render('Eesn2BackendBundle:Settings:showSettings.html.twig', $retornar);
			}
		}else{
			return $this->redirect('login');
		}
	}

	/**
	 * @Route("/guardarSettings")
	 * @Method("POST")
	 */

	public function guardarSettingsAction(){
		
		$request = Request::createFromGlobals();
    	$method = $request->getMethod(); 
    	$response = new Response();
	    $response->headers->set('Content-Type', 'json');
	    $doctrine = $this->getDoctrine()->getManager();
	    
	    $asignaturas = $this->limpiarEspaciosEnBlanco($request->request->get('asignaturas'));
		$cargos = $this->limpiarEspaciosEnBlanco($request->request->get('cargos'));
		$cursos = $this->limpiarEspaciosEnBlanco($request->request->get('cursos'));
		$divisiones = $this->limpiarEspaciosEnBlanco($request->request->get('divisiones'));
		$normas = $this->limpiarEspaciosEnBlanco($request->request->get('normas'));
		$tipo_estudiantes = $this->limpiarEspaciosEnBlanco($request->request->get('tipoEstudiantes'));
		$tipo_examenes = $this->limpiarEspaciosEnBlanco($request->request->get('tipoExamenes'));
		$turnos = $this->limpiarEspaciosEnBlanco($request->request->get('turnos'));

		$asigOK = $this->crearRegistros($doctrine, $asignaturas, 'asignaturas');
		$cargoOK = $this->crearRegistros($doctrine, $cargos, 'cargos');
		$cursoOK = $this->crearRegistros($doctrine, $cursos, 'cursos');
		$divisionOK = $this->crearRegistros($doctrine, $divisiones, 'divisiones');
		$normaOK = $this->crearRegistros($doctrine, $normas, 'normas');
		$t_esOK = $this->crearRegistros($doctrine, $tipo_estudiantes, 'tipoEstudiantes');
		$t_exOK = $this->crearRegistros($doctrine, $tipo_examenes, 'tipoExamenes');
		$turnoOK = $this->crearRegistros($doctrine, $turnos, 'turnos');

		if($asigOK && $cargoOK && $cursoOK && $divisionOK && $normaOK && $t_esOK && $t_exOK && $turnoOK){
			$response->setContent(json_encode(array('guardado' => true)));
		}else{
			$response->setContent(json_encode(array('guardado' => false)));
		}

		return $response;

	}

	public function crearRegistros($doctrine, $registrosArray, $referencedTable){
		if(!empty($registrosArray)){
			foreach($registrosArray as $registro){
				$object = $this->instanciarObjecto($referencedTable, $registro);
				$doctrine->persist($object);
				$doctrine->flush();
			}
			
			return true;
		}

		return false;
	}
	public function instanciarObjecto($referencia,$registro){
		switch ($referencia) {
			case 'asignaturas':
				$object = new Asignaturas();
				$object->setAsignatura($registro);
				break;
			case 'cargos':
				$object = new Cargos();
				$object->setCargo($registro);
				break;
			case 'cursos':
				$object = new Cursos();
				$object->setCurso($registro);
				break;
			case 'divisiones':
				$object = new Divisiones();
				$object->setDivision($registro);
				break;
			case 'normas':
				$object = new Normas();
				$object->setNormaLegal($registro);
				break;
			case 'tipoEstudiantes':
				$object = new TiposEstudiantes();
				$object->setTipo($registro);
				break;
			case 'tipoExamenes':
				$object = new TiposExamenes();
				$object->setTipo($registro);
				break;
			case 'turnos':
				$object = new Turnos();
				$object->setTurno($registro);

		}

		return $object;
	}
	public function limpiarEspaciosEnBlanco($array){
		$arrayNew = Array();
		foreach($array as $item){
			$arrayNew[] = trim($item);
		}

		return $arrayNew;
	}
}
