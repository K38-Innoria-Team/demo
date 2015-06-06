<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->helper('url');
	}
	public function index()
	{
		$this->load->view('home/step1');
	}

    public function step1()
    {
        if(isset($_SESSION['register'])) {
            unset($_SESSION['register']);
        }
        $this->load->model('district_model');
        $district = $this->district_model->selectDistrict();
        $service = $this->district_model->selectService($this->input->post('province'));
        $data = array(
            'title' => 'my page',
            'district' => $district,
            'service' => $service
        );

        $this->load->view('home/step1', $data);
    }

    public function step2()
    {
        if(isset($_POST['province']) && isset($_POST['district']) || isset($_SESSION['register'])) {
            $pro_id = $this->input->post('province');
            $dis_id = $this->input->post('district');
            $this->load->model('service_model');
            $service = $this->service_model->selectService($pro_id);
            $value = array(
                'title' => 'my page',
                'service' => $service,
                'dis_id' => $dis_id,
                'pro_id' => $pro_id
            );

            if (isset($_SESSION['register'])) {
                //var_dump($this->session->userdata('register'));
                $data = $this->session->userdata('register');
                $this->load->view('home/step2', $data);
            } else {
                $this->session->set_userdata('register', $value);
                $this->load->view('home/step2', $value);
            }
        }
        else{
            header("location:".base_url()."index.php/Home/step1");
        }

    }
    public function step3()
    {
        if(isset($_POST['ser_id']) && isset($_POST['dis_id'])) {
            $dis_id = $this->input->post('dis_id');
            $ser_id = $this->input->post('ser_id');
            $data = array(
                'dis_id' => $dis_id,
                'ser_id' => $ser_id
            );
            $this->load->view('home/step3', $data);
        }
        else{
            if(isset($_SESSION['register'])){
                header("location:".base_url()."index.php/Home/step2");
            }
            else{
                header("location:".base_url()."index.php/Home/step1");
            }
        }
    }

    public function step4(){
        $dis_id = $this->input->post('dis_id');
        $ser_id = $this->input->post('ser_id');
        $firstname = $this->input->post('txtFirstName');
        $lastname = $this->input->post('txtLastName');
        $phone = $this->input->post('txtPhone');
        $email = $this->input->post('txtEmail');
        $birthday = $this->input->post('txtBirthday');
        $password = $this->input->post('txtPassword');
        $create_date = date('y-m-d');
        $this->load->model('driver_model');
        $sql = $this->driver_model->insertDriver($password,$firstname,$lastname,$birthday,$phone,$email,$create_date,'1',$dis_id,$ser_id);
        $data = array('sql' => $sql);
        //$data = array('dis_id');
        $this->load->view('home/welcome', $data);
    }

    public function register1()
    {
        $this->load->model('district_model');
        $district = $this->district_model->selectDistrict();
        $service = $this->district_model->selectService($this->input->post('province'));
        $data = array(
            'title' => 'my page',
            'district' => $district,
            'service' => $service
        );

        $this->load->view('home/step1', $data);
        //$this->load->view('user/', $data);
    }

}