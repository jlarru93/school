<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Report extends CI_Controller 
{

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
	public function index($search=null)
	{
		$data['Report']='Report';

		$this->load->view('master/header_view');
		$this->load->view('master/navigation_view');
		$this->load->view('master/wrapper_view');
		$this->load->view('master/Report/Report_view');
		$this->load->view('master/footer_view',$data);

	}

	public function aprobados_profesor() {
		if ($this->input->server('REQUEST_METHOD') == 'POST')
		{
			$this->load->model('master/ReportModel');
			$trimestre=$this->input->post('trimestre');
			$teacher=json_decode($_COOKIE["user_data_cookie"],true);
			//$teacherid=$teacher['codProfesor'];
			$teacherid='P00017';
			$response=json_encode($this->ReportModel->aprobados_profesor($trimestre,$teacherid),true);
			print_r($response);
			
		}else {
			$this->load->model('master/ReportModel');
			$teacher=json_decode($_COOKIE["user_data_cookie"],true);
			$teacherid=$teacher['codProfesor'];
			echo('<pre>');
			$data=$this->ReportModel->aprobados_profesor(2,'P00017');
			print_r($data);
			echo('</pre>');
		}
	}


}