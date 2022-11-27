<?php 

namespace core\classes;

class Store{


	public static function Layout($structure, $dataweb = null){

		if(!is_array($structure)){
			throw new Exception("Coleção de estrutura inválida");
		}

		if(!empty($dataweb)&&is_array($dataweb)){
			extract($dataweb);
		}

		foreach($structure as $struct){
			include("../core/views/$struct.php");
		}

	}

	public static function CustomerLogged(){

		return isset($_SESSION['cliente']);

	}


}