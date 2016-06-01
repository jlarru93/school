<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Course extends CI_Controller {

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

		$this->load->model('director/CourseModel');
		$Courses=$this->CourseModel->GetAll();	
		$Courses['Courses']=$Courses;
		$this->load->view('director/header_view');
		$this->load->view('director/navigation_view');
		$this->load->view('director/wrapper_view');
		$this->load->view('director/Course/course_view',$Courses);
		$this->load->view('director/footer_view');
	}
	public function add()
	{
		$this->load->model('director/CourseModel');

		if ($this->input->server('REQUEST_METHOD') == 'GET')
		{
			$this->load->view('director/header_view');
			$this->load->view('director/navigation_view');
			$this->load->view('director/wrapper_view');
			$this->load->view('director/course/add_course_view');
			$this->load->view('director/footer_view');
		 }elseif ($this->input->server('REQUEST_METHOD') == 'POST') {

		 	$grade=$this->input->post('grade');
		 	$nivel=$this->input->post('nivel');
		 	$json['descripCurso']=$this->input->post('descripCurso');
		 	$json['codGrado']=$grade.$nivel;
		 	$data=json_encode($json);
			$response=$this->CourseModel->add($data);	
			 	
			$this->load->view('director/header_view');
			$this->load->view('director/navigation_view');
			$this->load->view('director/wrapper_view');
			$this->load->view('director/course/add_course_view');
			$this->load->view('director/footer_view');

		 }
	}


		public function edit()
	{
		$this->load->model('director/CourseModel');

		if ($this->input->server('REQUEST_METHOD') == 'GET')
		{
			redirect('/Director/course/index');
		 }elseif ($this->input->server('REQUEST_METHOD') == 'POST') {
		 	$varedit=$this->input->post('edit');


		 	if ($varedit=="") 
		 	{
		 		$data=$this->input->post('data');
			 	$data=json_decode($data,true);
				 echo('<pre>');
				 print_r($data);
				 echo('</pre>');
				 $var['data']=$data;
				$this->load->view('director/header_view');
				$this->load->view('director/navigation_view');
				$this->load->view('director/wrapper_view');
				$this->load->view('director/course/edit_course_view',$var);
				$this->load->view('director/footer_view');
		 	}else
		 	{
		 		$this->load->model('director/CourseModel');
		 		$course['CodCurso']=$this->input->post('CodCourse');
		 		$course['DescripCurso']=$this->input->post('descripCurso');
		 		$course['CodGrado']=$this->input->post('grade').$this->input->post('nivel');
		 		$course['ImagenCurso']="";
		 		$course['codCurso']=$this->input->post('CodCourse');
		 		$course['descripCurso']=$this->input->post('descripCurso');
		 		$course['codGrado']=$this->input->post('grade').$this->input->post('nivel');
		 		$course['imagenCurso']="";

		 		$var['data']=$course;
		 		$datas=json_encode($course,true);
		 		//print_r($datas);
		 		$response=$this->CourseModel->edit($datas);	
		 		var_dump($response);
		 		$this->load->view('director/header_view');
				$this->load->view('director/navigation_view');
				$this->load->view('director/wrapper_view');
				$this->load->view('director/course/edit_course_view',$var);
				$this->load->view('director/footer_view');

		 		
		 	}
		 

		 }
	}
	
	public  function enabled()
	{
			if ($this->input->server('REQUEST_METHOD') == 'GET')
		{

			//echo  ;
		}
		else if ($this->input->server('REQUEST_METHOD') == 'POST')
		{

			$codCurso=$this->input->post('codCurso');
			
			$this->load->model('director/CourseModel');

			$response=$this->CourseModel->enabled($codCurso);	

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

			$codCurso=$this->input->post('codCurso');
			
			$this->load->model('director/CourseModel');

			$response=$this->CourseModel->disabled($codCurso);	
			//$response=json_decode($response,true);

			echo $response['resultado'];
		}
		
	}

}
