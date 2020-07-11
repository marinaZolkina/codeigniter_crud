<?php

class Form extends CI_Controller {

	
	function __construct(){
        //����������� ������ � �������������� ����������� ����������
        parent::__construct();

        // �������� ��������� 
        $this->load->library('table');

        // �������� helper
        $this->load->helper('url');
        $this->load->helper('form');
        
        //�������� ������ ���������
        $this->load->library('form_validation');
        //�������� ������ ������ 
        $this->load->library('session');

        // �������� ������� ������� 
        $this->load->model('user_model','',TRUE);
		$this->load->model('product_model','',TRUE);
        
    }

	function index()
	{
		//$this->load->helper(array('form', 'url'));

		//$this->load->library('form_validation');//is_unique[users.email] - ��� ������� ������ ����� ������!!!
		
		$this->form_validation->set_rules('username', 'Username', 'trim|strip_tags|required|min_length[5]|max_length[12]|xss_clean');
		$this->form_validation->set_rules('password', 'Password', 'trim|strip_tags|required|matches[passconf]|md5');
		$this->form_validation->set_rules('passconf', 'Password Confirmation', 'trim|strip_tags|required');
		$this->form_validation->set_rules('email', 'Email', 'trim|strip_tags|required|valid_email');

		if ($this->form_validation->run() == FALSE)
		{
			$this->load->view('myform');
		}
		else
		{
			//����� ������ ���� ������������� ������������ 
			$this->load->view('formsuccess');
		}
	}
}
?>