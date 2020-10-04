<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller
{
    public $mcq = array();

    public $result = 0;

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Home_model');
    }


    public function index()
    {
        if(!empty($this->session->userdata('user_id'))){
             redirect('/home/exam');
        }
        $this->load->view('header');
        $this->load->view('home');
        $this->load->view('footer');
    }


    public function process()
    {
        $this->form_validation->set_rules('name', 'Name', 'trim|required');
        $this->form_validation->set_rules('email', 'Email', 'trim|required|is_unique[subscribers.email]',array(
                'is_unique'     => 'This %s already Submited Quiz.',
        ));
        $this->form_validation->set_rules('phone', 'Phone', 'trim|required|numeric|regex_match[/^[0-9]{10}$/]|is_unique[subscribers.phone]',array(
                'is_unique'     => 'This %s already Submited Quiz.',
        ));

        if ($this->form_validation->run() == FALSE) {
            $this->index();
        } else {
            $data = array(
                'name' => $this->input->post('name'),
                'email' => $this->input->post('email'),
                'phone' => $this->input->post('phone')
            );
            $insert = $this->Home_model->insert($data);
            $this->session->set_userdata('user_id', $insert);
            if ($insert) {
                redirect('home/exam');
            }
        }
    }


    public function exam()
    {
        if(empty($this->session->userdata('user_id'))){
             redirect('/');
        }
        $this->mcq=$this->curl_result();
        $this->session->set_userdata('mcq', $this->mcq);
        $data['mcq'] = $this->mcq;
        $this->load->view('header');
        $this->load->view('exam', $data);
        $this->load->view('footer');
    }


    public function result()
    {

        if(empty($this->session->userdata('user_id'))){
             redirect('/');
        }
        $q1 = $this->input->post('question1');
        $a1 = $this->input->post('answer1');

        $q2 = $this->input->post('question2');
        $a2 = $this->input->post('answer2');

        $q3 = $this->input->post('question3');
        $a3 = $this->input->post('answer3');
        $q4 = $this->input->post('question4');
        $a4 = $this->input->post('answer4');
        $q5 = $this->input->post('question5');
        $a5 = $this->input->post('answer5');
        $mcq=$this->session->userdata('mcq');
        foreach ($mcq['results'] as $item) {
            if ($q1 == $item->question) {
                if ($a1 == $item->correct_answer) {
                    $this->result += 1;
                } else {
                    $this->result += 0;
                }
            } elseif ($q2 == $item->question) {
                if ($a2 == $item->correct_answer) {
                    $this->result += 1;
                } else {
                    $this->result += 0;
                }
            } elseif ($q3 == $item->question) {
                if ($a3 == $item->correct_answer) {
                    $this->result += 1;
                } else {
                    $this->result += 0;
                }
            }elseif ($q4 == $item->question) {
                if ($a4 == $item->correct_answer) {
                    $this->result += 1;
                } else {
                    $this->result += 0;
                }
            }elseif ($q5 == $item->question) {
                if ($a5 == $item->correct_answer) {
                    $this->result += 1;
                } else {
                    $this->result += 0;
                }
            }
        }
        $fields = array ('marks' =>$this->result,
                      );
        $this->session->unset_userdata('mcq');
        $row=$this->Home_model->check_marks($this->session->userdata('user_id'));
        if ($row < 1) {
            $this->Home_model->marks($fields,$this->session->userdata('user_id'));
        }else{
           redirect('/home/logout');
        }
        
        $data['result'] = $this->result;
        $this->load->view('header');
        $this->load->view('result', $data);
        $this->load->view('footer');


    }

    public function curl_result()
    {
        if(empty($this->session->userdata('user_id'))){
             redirect('/');
        }
         /* API URL */
        $url = 'https://opentdb.com/api.php?amount=10';
          
        $ch = curl_init();
        curl_setopt($ch,CURLOPT_URL, $url);
        //curl_setopt($ch,CURLOPT_POST, count($fields));
        //curl_setopt($ch,CURLOPT_POSTFIELDS, $fields_string);
        curl_setopt($ch,CURLOPT_RETURNTRANSFER,TRUE);
        $result = curl_exec($ch);
        curl_close($ch);
        $result=json_decode($result);
        $response = (array) $result;
        //print_r($response);;exit;
        return $response;
    }
    public function logout()
    {
        $this->session->unset_userdata('user_id');
        redirect('/');
    }

}
