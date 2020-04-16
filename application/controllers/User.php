<?php
class User extends CI_Controller{
    public function register(){
        $data['title'] = "Register";
        $this->form_validation->set_rules('nickname', 'Nickname', 'required');
        $this->form_validation->set_rules('fname', 'Forename', 'required');
        $this->form_validation->set_rules('lname', 'Surname', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');
        $this->form_validation->set_rules('password2', 'Password2', 'matches[password]');

        if($this->form_validation->run() === FALSE){
            $this->load->view("templates/header");
            $this->load->view("user/register", $data);
            $this->load->view("templates/footer");
        }else{
            $enc_password = md5($this->input->post('password'));
            $this->user_model->register($enc_password);
            redirect('posts');
        }
    } 
    public function check_username_exists(){

    }
    public function check_email_exists(){

    }
}