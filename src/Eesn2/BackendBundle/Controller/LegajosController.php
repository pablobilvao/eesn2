<?php

namespace Eesn2\BackendBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class LegajosController extends Controller
{
	/**
	 * @Route("/legajos")
	 * @Template("Eesn2BackendBundle:Legajos:legajos.html.twig")
	 */

	public function inscripcionAction(){
		$login = $this->verificarLogin();
		$settingsOk = $this->verificarSettings();
		if($login->getAutorizado()){
			if($settingsOk){
				return array('nameUser'=>$login->getUser(), 'sectionTitle'=>'Legajos');
			}else{
				return $this->redirect('settings');
			}
		}else{
			return $this->redirect('login');
		}
	}
}
