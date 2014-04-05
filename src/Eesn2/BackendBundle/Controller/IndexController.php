<?php

namespace Eesn2\BackendBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Response;


class IndexController extends Controller
{
	/**
	 * @Route("/index")
	 * @Template("Eesn2BackendBundle:Index:index.html.twig")
	 */

	public function indexAction(){
		$login = $this->verificarLogin();
		$settingsOk = $this->verificarSettings();
		if($login->getAutorizado()){
			if($settingsOk){
				return array('nameUser'=>$login->getUser(), 'sectionTitle'=>'Index');
			}else{
				return $this->redirect('settings');
			}
		}else{
			return $this->redirect('login');
		}
	}
}
