<?php

namespace Eesn2\BackendBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class InscripcionController extends Controller
{
	/**
	 * @Route("/inscripcion")
	 * @Template("Eesn2BackendBundle:Inscripcion:inscripcion.html.twig")
	 */

	public function inscripcionAction(){
		$login = $this->verificarLogin();
		$settingsOk = $this->verificarSettings();
		if($login->getAutorizado()){
			if($settingsOk['validado']){
				return array('nameUser'=>$login->getUser(), 'sectionTitle'=>'Inscripcion');
			}else{
				return $this->redirect('settings');
			}
		}else{
			return $this->redirect('login');
		}
	}
}
