<?php

namespace Eesn2\BackendBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;

class ProfileController extends Controller
{
	/**
	 * @Route("/profile")
	 * @Method("GET")
	 * @Template("Eesn2BackendBundle:Profile:profile.html.twig")
	 */

	public function profileAction(){
		$login = $this->verificarLogin();
		$settingsOk = $this->verificarSettings();
		if($login->getAutorizado()){
			if($settingsOk){
				return array('nameUser'=>$login->getUser(), 'sectionTitle'=>'Perfil');
			}else{
				return $this->redirect('settings');
			}
		}else{
			return $this->redirect('login');
		}
	}

	/**
	 * @Route("/cambiarDatos")
	 * @Method("POST")
	 */

	public function cambiarDatosAction(){
		$request = Request::createFromGlobals();
    	$method = $request->getMethod();
    	$response = new Response();
	    $response->headers->set('Content-Type', 'json');
	    if($method == "POST"){
	    	$user = base64_decode(($request->request->get('user')));
	    	$passVieja = $request->request->get('passVieja');
	    	$passNueva = base64_decode($request->request->get('passNueva'));
	    	$passConfirm = base64_decode($request->request->get('passConfirm'));
	    	$doctrine = $this->getDoctrine()->getManager();
	    	$repository = $doctrine->getRepository('Eesn2BackendBundle:Users');
	    	$my_user = $repository->findOneBy(array('user'=>$user,'pass'=>$passVieja));
	    	if(count($my_user) == 1){
	    		if($passNueva == $passConfirm){
	    			$my_user->setUser($user);
	    			$my_user->setPass(base64_encode($passNueva));
	    			$doctrine->flush();
	    			$response->setContent(json_encode(array("update" => "Actualizado")));
	    		}else{
	    			$response->setContent(json_encode(array('update'=> 'Contraseña Nueva y de Confirmacion No Son Iguales')));
	    		}
	    	}else{
	    		$response->setContent(json_encode(array('update' => 'Contraseña Vieja Incorrecta')));
	    	}	
	    	return $response;
	    } 
	}
}
