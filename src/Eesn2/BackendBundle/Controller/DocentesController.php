<?php

namespace Eesn2\BackendBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class DocentesController extends Controller
{
	/**
	 * @Route("/docentes")
	 * @Template("Eesn2BackendBundle:Docentes:docentes.html.twig")
	 */

	public function alumnosAction(){
		$login = $this->verificarLogin();
		$settingsOk = $this->verificarSettings();
		if($login->getAutorizado()){
			if($settingsOk['validado']){
				return array('nameUser'=>$login->getUser(), 'sectionTitle'=>'Docentes');
			}else{
				return $this->redirect('settings');
			}
		}else{
			return $this->redirect('login');
		}
	}
}
