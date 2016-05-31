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
	
}
