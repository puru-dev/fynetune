<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller
{
    
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Admin_model');
    }


    public function index()
    {
        if(!empty($this->session->userdata('admin_id'))){
             redirect('/dashboard');
        }
        $this->load->view('header');
        $this->load->view('admin/login');
        $this->load->view('footer');
    }


    public function check()

   {

        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'required');

        if ($this->form_validation->run() == FALSE){

            $errors = validation_errors();

            echo json_encode(['error'=>$errors,'code'=>'201']);

        }else{
            /* API URL */
        $url = 'https://softonauts.com/clients/Android/users-login';
        /* Array Parameter Data */
        $fields_string='';
        $fields = array ('username' =>urlencode($this->input->post('email')),
                          'password' => urlencode($this->input->post('password')));
         foreach($fields as $key=>$value) { $fields_string .= $key.'='.$value.'&'; }
         rtrim($fields_string, '&');
          
        $ch = curl_init();
        curl_setopt($ch,CURLOPT_URL, $url);
        curl_setopt($ch,CURLOPT_POST, count($fields));
        curl_setopt($ch,CURLOPT_POSTFIELDS, $fields_string);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Authorization:eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpZCI6MX0.By2r2BwheJsbrEGrHOaMQwrrmlY7wHVFzWtuEmv39fM'));
        curl_setopt($ch,CURLOPT_RETURNTRANSFER,TRUE);
        $result = curl_exec($ch);
        curl_close($ch);
        $result=json_decode($result);
        $response = (array) $result;
        if(isset($response['data']->id)){
        $user_id=$response['data']->id;
        $name=$response['data']->first_name." ".$response['data']->last_name;
        $email=$response['data']->email;
        $this->session->set_userdata('admin_id', $user_id);
        $this->session->set_userdata('name', $name);
        $this->session->set_userdata('email', $email);
         }
        echo json_encode($response);
        }

    }

    public function dashboard()
    {
        if(empty($this->session->userdata('admin_id'))){
             redirect('/admin');
        }
        $data['list']= $this->Admin_model->List();
        $this->load->view('admin/header');
        $this->load->view('admin/dashboard',$data);
        $this->load->view('admin/footer');
    }

    public function logout()
    {
        $this->session->unset_userdata('admin_id');
        redirect('/admin');
    }

}
