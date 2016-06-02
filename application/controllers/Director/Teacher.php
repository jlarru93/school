<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Teacher extends CI_Controller {

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
			$this->load->model('director/TeacherModel');
				//metodo del modelo para obtener la lista de todos los profesores
			$teachers=$this->TeacherModel->GetAll();
			
			$teachers['teachers']=$teachers;
			$this->load->model('director/TeacherModel');
			$this->load->view('director/header_view');
			$this->load->view('director/navigation_view');
			$this->load->view('director/wrapper_view');
			$this->load->view('director/Teacher/teacher_view',$teachers);
			$this->load->view('director/footer_view');		
		}
		//post
		else if ($this->input->server('REQUEST_METHOD') == 'POST')
		{

		}

		
	}



		public function edit()
	{
		//get
		if ($this->input->server('REQUEST_METHOD') == 'GET'){
			redirect('/Director/teacher/index');
		}
		//post
		else if ($this->input->server('REQUEST_METHOD') == 'POST'){


			if (is_null($data=$this->input->post('edit'))) 
			{
				//recojer datos de la vista	
				$teacherdata=$this->input->post('data');
				$teacherdata=json_decode($teacherdata,true);
				echo "<pre>";
				print_r($teacherdata);
				echo "</pre>";
				
				$var['data']=$teacherdata;
				$this->load->view('director/header_view');
				$this->load->view('director/navigation_view');
				$this->load->view('director/wrapper_view');
				$this->load->view('director/teacher/edit_teacher_view',$var);
				$this->load->view('director/footer_view');
				
			}else{
				$teacher['codProfesor']=$this->input->post('cod_teacher');
				$teacher['dirProfesor']=$this->input->post('address_street');
				$teacher['nomProfesor']=$this->input->post('names');
				$teacher['emailProfesor']=$this->input->post('email');
				$teacher['telfProfesor']=$this->input->post('cellphone');
				$teacher['apePaternoProfesor']=$this->input->post('father_last_name');
				$teacher['apeMaternoProfesor']=$this->input->post('mother_last_name');//FM
				$teacher['fechaNacProfesor']=$this->input->post('Birthdate');
				$teacher['sexoProfesor']=$this->input->post('sex');//*
				$teacher['fotoProfesor']="";//*
				//echo "<pre>";
				//print_r($teacher);
				//echo "</pre>";
				
				$var['data']=$teacher;
				$this->load->model('director/TeacherModel');
				$teacher=json_encode($teacher,true);
				$this->TeacherModel->edit($teacher);
				
				$this->load->view('director/header_view');
				$this->load->view('director/navigation_view');
				$this->load->view('director/wrapper_view');
				$this->load->view('director/teacher/edit_teacher_view',$var);
				$this->load->view('director/footer_view');
				
			}

			
		}
	}
	public function add()
	{


		if ($this->input->server('REQUEST_METHOD') == 'GET')
		{
			$this->load->view('director/header_view');
			$this->load->view('director/navigation_view');
			$this->load->view('director/wrapper_view');
			$this->load->view('director/Teacher/add_teacher_view');
			$this->load->view('director/footer_view');
		}
		//post
		else if ($this->input->server('REQUEST_METHOD') == 'POST')
		{

			//cargar modelo
			$this->load->model('director/TeacherModel');


			$teacher['nomProfesor']=$this->input->post('names');
			$teacher['apePaternoProfesor']=$this->input->post('father_last_name');
			$teacher['apeMaternoProfesor']=$this->input->post('mother_last_name');
			$teacher['sexoProfesor']=$this->input->post('sex');//FM
			$teacher['dirProfesor']=$this->input->post('address_street');
			$teacher['emailProfesor']=$this->input->post('email');//*
			$teacher['telfProfesor']=$this->input->post('cellphone');//*
			$teacher['fechaNacProfesor']=$this->input->post('date');

			
			$this->TeacherModel->add(json_encode($teacher,true));
			//cargar WEb
			$this->load->view('director/header_view');
			$this->load->view('director/navigation_view');
			$this->load->view('director/wrapper_view');
			$this->load->view('director/Teacher/add_teacher_view');
			$this->load->view('director/footer_view');



			

		}
	}

private function validaar_cursos_primaria($couses_teacher_primary=null){
	$gradesprimary = array('0' =>array('grade' => '1P', 'teach'=>'FALSE') ,
									'1' =>array('grade' => '2P', 'teach'=>'FALSE'),
									'2' =>array('grade' => '3P', 'teach'=>'FALSE'),
									'3' =>array('grade' => '4P', 'teach'=>'FALSE'),
									'4' =>array('grade' => '5P', 'teach'=>'FALSE'),
									'5' =>array('grade' => '6P', 'teach'=>'FALSE'));

	foreach ($gradesprimary as $key =>  $value) {
				$f=false;
				foreach ($couses_teacher_primary as $key2 => $value2) {
					if ($value2['CodGrado']==$value['grade']) {
						$f=true;
						break;
					}
				}
				if ($f) {
					# code...
					$gradesprimary[$key]['teach']='TRUE';
				}
				

			}
	return $gradesprimary;}

private function all_courses_to_couseHigh($couses=null){
				$c=0;
			
				foreach ($couses as $couse) {
						if (substr($couse['CodGrado'], 1)=='S' ) {
						
							$couseHigh[$c]['CodCurso']=$couse['CodCurso'];
							$couseHigh[$c]['DescripCurso']=$couse['DescripCurso'];
							$couseHigh[$c]['CodGrado']=$couse['CodGrado'][0];
							$c++;
						}else{
						
						}

					}
					return $couseHigh;
}

private function validaar_cursos_secundaria($couseHigh=null,$couses_teacher=null){
	$couseHigh2 = array();
	$count=0;
			$count2=0;
			foreach ($couseHigh as  $key => $value) {
				if ($couseHigh2== array()){
					$teach=false;
						foreach ($couses_teacher as $key => $value3) {
							# code...
							if ($value3['CodCurso']==$value['CodCurso']) {
								# code..
								$teach=true;
								break;
							}
							
						}


					$couseHigh2[$count]['DescripCurso']=$value['DescripCurso'];
					if($teach){
					$couseHigh2[$count]['grades'][0]= array('CodCurso' => $value['CodCurso'],'CodGrado'=>$value['CodGrado'],'teach'=>'TRUE');	
				}else{
					$couseHigh2[$count]['grades'][0]= array('CodCurso' => $value['CodCurso'],'CodGrado'=>$value['CodGrado'],'teach'=>'FALSE');
				}
					
					
					$count++;
				}else{
					$llave=null;
					foreach ($couseHigh2 as $key2 => $value2) {
						if ($value2['DescripCurso']==$value['DescripCurso']) {
							$llave=$key2;
							break;
						}
					}
					if (!is_null($llave)) {
						//virifica si el profesor enseña el curso que se a agregado
						$teach=false;
						foreach ($couses_teacher as $key => $value3) {
							# code...
							if ($value3['CodCurso']==$value['CodCurso']) {
								# code..
								$teach=true;
								break;
							}
							
						}
						if ($teach) {
							# code...
							$couseHigh2[$llave]['grades'][count($couseHigh2[$llave]['grades'])]= array('CodCurso' => $value['CodCurso'],'CodGrado'=>$value['CodGrado'],'teach'=>'TRUE');
						}else{
							$couseHigh2[$llave]['grades'][count($couseHigh2[$llave]['grades'])]= array('CodCurso' => $value['CodCurso'],'CodGrado'=>$value['CodGrado'],'teach'=>'FALSE');
						}
						
						$teach=false;
					}else{

						$teach=false;
						foreach ($couses_teacher as $key => $value3) {
							# code...
							if ($value3['CodCurso']==$value['CodCurso']) {
								# code..
								$teach=true;
								break;
							}
							
						}
						$couseHigh2[$count]['DescripCurso']=$value['DescripCurso'];
						if($teach){
							$couseHigh2[$count]['grades'][$count2]= array('CodCurso' => $value['CodCurso'],'CodGrado'=>$value['CodGrado'],'teach'=>'TRUE');
						}else{
							$couseHigh2[$count]['grades'][$count2]= array('CodCurso' => $value['CodCurso'],'CodGrado'=>$value['CodGrado'],'teach'=>'FALSE');	
						}
						
						
						$count++;
					}
				}
			}
	return $couseHigh2;
}

	public function relation_course_teacher($idTeacher=null,$fullNameTeacher=null)
	{
			$this->load->model('director/CourseModel');
			$this->load->model('director/TeacherModel');
		if ($this->input->server('REQUEST_METHOD') == 'GET')
		{
			
			$couses=$this->CourseModel->GetAll();
			$couses_teacher=$this->TeacherModel->getCurses($idTeacher,'S');
			$couses_teacher_primary=$this->TeacherModel->getCurses($idTeacher,'P');
						
			$gradesprimary =$this->validaar_cursos_primaria($couses_teacher_primary);
			$couseHigh=$this->all_courses_to_couseHigh($couses);
			$couseHigh2=$this->validaar_cursos_secundaria($couseHigh,$couses_teacher);

			$couseHigh['cousesHigh']=$couseHigh2;
			$couseHigh['idTeacher']=$idTeacher;
			$couseHigh['fullNameTeacher']=str_replace('_', ' ', urldecode($fullNameTeacher));
			$couseHigh['gradesprimary']=$gradesprimary;
			$couseHigh['couses_teacher_primary']=$couses_teacher_primary;
			
			$this->load->view('director/header_view');
			$this->load->view('director/navigation_view');
			$this->load->view('director/wrapper_view');
			$this->load->view('director/Teacher/relation_course_teacher_view',$couseHigh);
			$this->load->view('director/footer_view');
		}
		else if ($this->input->server('REQUEST_METHOD') == 'POST')
		{
			$idTeacher=$this->input->post('idTeacher');
			$nivel=$this->input->post('level');
			if ($nivel=='S') {
				$count_CodCurso=$this->input->post('CodCurso');

				for ($i=0,$indice=0; $i < $count_CodCurso; $i++) { 
					if (!is_null($this->input->post($i))) {
						$teacher_courses[$indice]['codProfesor']=$idTeacher;
						$teacher_courses[$indice]['codCurso']=$this->input->post($i);
						$teacher_courses[$indice]['estadoProfesorCurso']='0';
						$indice++;
					}
				}
							$respuesta=$this->TeacherModel->relacionar_curso_profesor(json_encode($teacher_courses));
			}
			else if ($nivel=='P') {
				$idTeacher=$this->input->post('idTeacher');
				for ($i=0,$indice=0; $i <6 ; $i++) { 
					if (!is_null($this->input->post($i))) {
					$teacher_grades[$indice]['codProfesor']=$idTeacher;
					$teacher_grades[$indice]['codGrado']=$this->input->post($i);
					$teacher_grades[$indice]['estadoProfesorCurso']='0';
					$indice++;
					 }
				}
				//echo "".json_encode($teacher_grades);
				$this->TeacherModel->relacionar_curso_profesor(json_encode($teacher_grades));
			}

			redirect('/director/Teacher/relation_course_teacher/'.$idTeacher.'/'.$fullNameTeacher, 'refresh');
		}
	}



	public function course_teacher()
	{



		$this->load->view('director/header_view');
		$this->load->view('director/navigation_view');
		$this->load->view('director/wrapper_view');
		$this->load->view('director/Teacher/course_teacher_view');
		$this->load->view('director/footer_view');
		
	}
		public  function enabled()
	{
			if ($this->input->server('REQUEST_METHOD') == 'GET')
		{

			//echo  ;
		}
		else if ($this->input->server('REQUEST_METHOD') == 'POST')
		{

			$codProfesor=$this->input->post('codProfesor');
			
			$this->load->model('director/TeacherModel');

			$response=$this->TeacherModel->enabled($codProfesor);	

			echo $response['resultado'];
		}
		
	}
	public  function disabled()
	{
		if ($this->input->server('REQUEST_METHOD') == 'GET')
		{

			//echo  ;
		}
		else if ($this->input->server('REQUEST_METHOD') == 'POST')
		{

			$codProfesor=$this->input->post('codProfesor');
			
			$this->load->model('director/TeacherModel');

			$response=$this->TeacherModel->disabled($codProfesor);	
			//$response=json_decode($response,true);

			echo $response['resultado'];
		}
		
	}
	
}
