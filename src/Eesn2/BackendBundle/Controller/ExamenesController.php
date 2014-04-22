<?php

namespace Eesn2\BackendBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class ExamenesController extends Controller
{
	/**
	 * @Route("/examenes")
	 * @Template("Eesn2BackendBundle:Examenes:examenes.html.twig")
	 */

	public function inscripcionAction(){
		$login = $this->verificarLogin();
		$settingsOk = $this->verificarSettings();
		if($login->getAutorizado()){
			if($settingsOk['validado']){
				return array('nameUser'=>$login->getUser(), 'sectionTitle'=>'Examenes');
			}else{
				return $this->redirect('settings');
			}
		}else{
			return $this->redirect('login');
		}
	}
}
