<?php
	
	namespace Symfony\Component\Eesn2Class;

	class Login{
		private $user;
		private $autorizado;

		public function setUser($user){
			$this->user = $user;
		}

		public function getUser(){
			return $this->user;
		}

		public function setAutorizado($bool){
			$this->autorizado = $bool;
		}

		public function getAutorizado(){
			return $this->autorizado;
		}
	}

?>