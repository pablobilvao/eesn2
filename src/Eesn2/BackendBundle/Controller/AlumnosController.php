<?php

namespace Eesn2\BackendBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class AlumnosController extends Controller
{
	/**
	 * @Route("/alumnos")
	 * @Template("Eesn2BackendBundle:Alumnos:alumnos.html.twig")
	 */

	public function alumnosAction(){
		$login = $this->verificarLogin();
		$settingsOk = $this->verificarSettings();
		if($login->getAutorizado()){
			if($settingsOk){
				return array('nameUser'=>$login->getUser(), 'sectionTitle'=>'Alumnos');
			}else{
				return $this->redirect('settings');
			}
		}else{
			return $this->redirect('login');
		}		
	}
}
