<?php
require_once('httpful.phar');
class ReportModel extends CI_Model 
{

	public function  aprobados_profesor($trimestre=null,$codProfesor=null)
    {
        $response=null;
        $ur=web_service_uri.'/reporte/aprobadosPorSeccion?trimestre='.$trimestre.'&codProfesor='.$codProfesor;
        try {                 
            $response = \Httpful\Request::get($ur)->send();
            $response=json_decode($response,true);
            return $response;

        } catch (Exception $e) {
            return $response;
        }
    }


}