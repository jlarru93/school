<?php

include('httpful.phar');

class ClassRoomModel extends CI_Model {



	
	public function getclassrooms(){
			$codmaster= json_decode($_COOKIE["user_data_cookie"],true)['codProfesor'];			
			//var_dump($_COOKIE["user_data_cookie"]) ;
            $ur=web_service_uri.'/profesor/listarSecciones?codProfesor='.$codmaster;
            $response = \Httpful\Request::get($ur)->send();
            $response=json_decode($response,true);
            return $response;
        
	}

 

}
