<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Father extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		if ($this->input->server('REQUEST_METHOD') == 'GET')
		{
			
		//cargar modelo
			$this->load->model('director/FatherModel');
				//metodo del modelo para obtener la lista de todos los profesores
			$fathers=$this->FatherModel->GetAll();
			
			$fathers['fathers']=$fathers;


			$this->load->view('director/header_view');
			$this->load->view('director/navigation_view');
			$this->load->view('director/wrapper_view');
			$this->load->view('director/father/father_view',$fathers);
			$this->load->view('director/footer_view');
		}
		//post
		else if ($this->input->server('REQUEST_METHOD') == 'POST')
		{

		}
	}


	public function add()
	{


		if ($this->input->server('REQUEST_METHOD') == 'GET')
		{
			
			$this->load->view('director/header_view');
			$this->load->view('director/navigation_view');
			$this->load->view('director/wrapper_view');
			$this->load->view('director/father/add_father_view');
			$this->load->view('director/footer_view');
		}
		//post
		else if ($this->input->server('REQUEST_METHOD') == 'POST')
		{


			//cargar modelo
			$this->load->model('director/FatherModel');
			$today = getdate();
			$photoName=hash('ripemd160', $today['seconds'].$today['minutes'].$today['hours'].$today['mday'].$today['mon'].$today['year']);

			$father['dniApoderado']=$this->input->post('dni');
			$father['nomApoderado']=$this->input->post('names');
			$father['apePaternoApoderado']=$this->input->post('father_last_name');
			$father['apeMaternoApoderado']=$this->input->post('mother_last_name');//FM
			$father['dirApoderado']=$this->input->post('address_street');
			$father['telfApoderado']=$this->input->post('cellphone');//*
			$father['sexoApoderado']=$this->input->post('sex');//*
			$father['fechaNacApoderado']=$this->input->post('date');
			$father['fotoApoderado']=$photoName;

			$archivo= $_FILES['photo']['name'];
			$explode= explode('.', $archivo);
			$extension=array_pop($explode);
			$father['fotoApoderado']=$photoName.'.'.$extension;

			$ftp_server = ftp_service_uri;
			$ftp_user_name = "web";
			$ftp_user_pass = "titulacion";
			$destination_file = "/imagenes/apoderado/";
			$source_file = $_FILES['photo']['tmp_name'];


			$conn_id = ftp_connect($ftp_server);
			ftp_pasv($conn_id, true);
			$login_result = ftp_login($conn_id, $ftp_user_name, $ftp_user_pass);

			if ((!$conn_id) || (!$login_result)) 
			{ 
				//echo "La conexion a fallado";
				//echo "Intentando conectar a $ftp_server con el usuario $ftp_user_name"; 
				exit; 
			}
			else 
			{
				//echo "Conectado a $ftp_server, para el usuario $ftp_user_name <br>";
			}


			$upload = ftp_put($conn_id, $destination_file . $father['fotoApoderado'], 

				$source_file, FTP_BINARY);


			if (!$upload) 
			{ 
				//echo "Error al subir la imagen <br>";
			} else 
			{
				//echo "Subido $source_file a $ftp_server como $destination_file <br>";
			}

			ftp_close($conn_id);
			
			//agregar apoderado
			$response=$this->FatherModel->add(json_encode($father,true));
			//var_dump($response);
			//cargar WEb
			$this->load->view('director/header_view');
			$this->load->view('director/navigation_view');
			$this->load->view('director/wrapper_view');
			$this->load->view('director/father/add_father_view');
			$this->load->view('director/footer_view');

		}
	}





	public function edit()
	{	
		if ($this->input->server('REQUEST_METHOD') == 'POST')
		{	
			if (is_null($data=$this->input->post('edit'))) 
			{
				//envio recepcion de datos.
				$data=$this->input->post('data');

				print_r(json_decode($data,true));
				$var['data']=json_decode($data,true);
				$this->load->view('director/header_view');
				$this->load->view('director/navigation_view');
				$this->load->view('director/wrapper_view');
				$this->load->view('director/father/edit_father_view',$var);
				$this->load->view('director/footer_view');
			}else{

				//respuesta proceso de edicion de datos
				//cargar modelo
				$this->load->model('director/FatherModel');

				$father['CodApoderado']=$this->input->post('CodApoderado');
				$father['DniApoderado']=$this->input->post('dni');
				$father['NomApoderado']=$this->input->post('names');
				$father['ApePaternoApoderado']=$this->input->post('father_last_name');
				$father['ApeMaternoApoderado']=$this->input->post('mother_last_name');//FM
				$father['DirApoderado']=$this->input->post('address_street');
				$father['TelfApoderado']=$this->input->post('cellphone');//*
				$father['SexoApoderado']=$this->input->post('sex');//*
				$father['FechaNacApoderado']=$this->input->post('date');
				$father['FotoApoderado']="";

				$archivo= $_FILES['photo']['name'];
			if ($archivo=="") {
				
			}else{
				$today = getdate();
				$photoName=hash('ripemd160', $today['seconds'].$today['minutes'].$today['hours'].$today['mday'].$today['mon'].$today['year']);

				$father['FotoApoderado']=$photoName;

				$explode= explode('.', $archivo);
				$extension=array_pop($explode);
				$father['FotoApoderado']=$photoName.'.'.$extension;

				$ftp_server = ftp_service_uri;
				$ftp_user_name = "web";
				$ftp_user_pass = "titulacion";
				$destination_file = "/imagenes/apoderado/";
				$source_file = $_FILES['photo']['tmp_name'];


				$conn_id = ftp_connect($ftp_server);
				ftp_pasv($conn_id, true);
				$login_result = ftp_login($conn_id, $ftp_user_name, $ftp_user_pass);

				if ((!$conn_id) || (!$login_result)) 
				{ 
				//echo "La conexion a fallado";
				//echo "Intentando conectar a $ftp_server con el usuario $ftp_user_name"; 
					exit; 
				}
				else 
				{
				//echo "Conectado a $ftp_server, para el usuario $ftp_user_name <br>";
				}


				$upload = ftp_put($conn_id, $destination_file . $father['FotoApoderado'], 

					$source_file, FTP_BINARY);


				if (!$upload) 
				{ 
				//echo "Error al subir la imagen <br>";
				} else 
				{
				//echo "Subido $source_file a $ftp_server como $destination_file <br>";
				}

				ftp_close($conn_id);
			}
			
			
			
			
			$jsonFather=json_encode($father,true);
			
			//agregar apoderado

			$response=$this->FatherModel->edit($jsonFather);

			//print_r($response);
			//cargar WEb
			//var_dump($father);
			$father['codApoderado']=$father['CodApoderado'];
			$father['nomApoderado']=$father['NomApoderado'];
			$father['apePaternoApoderado']=$father['ApePaternoApoderado'];
			$father['apeMaternoApoderado']=$father['ApeMaternoApoderado'];
			$var['data']=$father;
			$this->load->view('director/header_view');
			$this->load->view('director/navigation_view');
			$this->load->view('director/wrapper_view');
			$this->load->view('director/father/edit_father_view',$var);
			$this->load->view('director/footer_view');




		}





	}else{
		redirect('/Director/father/index');
	}

}


}
