<?php
namespace Eesn2\BackendBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;

class LoginController extends Controller
{
	/**
	 * @Route("/login")
	 * @Template("Eesn2BackendBundle:Login:login.html.twig")
     * @Method("GET")
     */

    public function loginAction(){
        session_start();
        if(isset($_SESSION['autorizado'])){
            return $this->redirect("index");
        }else{
            return array();
        }  
    }

    /**
	 * @Route("/getLogin")
	 * @Method("POST")
	 */

    public function getLoginAction(){
    	$request = Request::createFromGlobals();
    	$method = $request->getMethod(); 
    	$response = new Response();
	    $response->headers->set('Content-Type', 'json');
    	
    	if($method == 'POST'){
    		$user = base64_decode(($request->request->get('user')));
	    	$pass = base64_decode($request->request->get('pass'));
	    	$repository = $this->getDoctrine()->getRepository('Eesn2BackendBundle:Users');
	    	$my_user = $repository->findOneBy(array('user'=>$user,'pass'=> base64_encode($pass)));
	    	if(count($my_user) == 1){
	    		$response->setContent(json_encode(array('logger' => 'ok')));
	    		session_start();
	    		$_SESSION['autorizado'] = true;
	    		$_SESSION['user'] = $user;
	    	}else{
	    		$response->setContent(json_encode(array('logger' => 'errorLOG')));
	    	}	    	
	
    	}
    	
    	return $response;
    }
    /**
	 * @Route("/getLogin")
	 * @Method("GET")
	 */

    public function redireccionamientoAction(){
    	
    	return $this->redirect('login');
    }

    /**
     * @Route("/logout")
     * @Method("GET")
     */

    public function logoutAction(){
    	session_start();

    	if(isset($_SESSION['autorizado'])){
    		@ session_destroy();
    		return $this->redirect('login');
    	}
    	
    }

}
