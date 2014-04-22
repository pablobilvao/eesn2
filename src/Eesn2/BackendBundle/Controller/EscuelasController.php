<?php

namespace Eesn2\BackendBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class EscuelasController extends Controller
{
	/**
	 * @Route("/escuelas")
	 * @Template("Eesn2BackendBundle:Escuelas:escuelas.html.twig")
	 */

	public function alumnosAction(){
		$login = $this->verificarLogin();
		$settingsOk = $this->verificarSettings();
		if($login->getAutorizado()){
			if($settingsOk['validado']){
				return array('nameUser'=>$login->getUser(), 'sectionTitle'=>'Escuelas');
			}else{
				return $this->redirect('settings');
			}
		}else{
			return $this->redirect('login');
		}
	}
}
