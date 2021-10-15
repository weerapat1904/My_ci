<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends MY_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('user_model');

    }

    public function read()
    {
        if ($this->session->userdata('admin_user') == '') {
            redirect('home');

        }
        $this->data['user'] = $this->user_model->read_user();
        $this->backend_layout('index', $this->data);
        // $this->load->view('layout/backend/header');
        // $this->load->view('pages/backend/index', $data);
        // $this->load->view('layout/backend/footer');
    }

    public function create()
    {
        if ($this->session->userdata('admin_user') == '') {
            redirect('home');

        }
        $this->backend_layout('insert_form');
        // $this->load->view('layout/backend/header');
        // $this->load->view('pages/backend/insert_form');
        // $this->load->view('layout/backend/footer');
    }

    public function insert()
    {

        $data = $this->user_model->insert_user($_POST);
    }

    public function update_form()
    {
        if ($this->session->userdata('admin_user') == '') {
            redirect('home');

        }
        $this->data['user'] = $this->user_model->get_user($_GET['id']);
        $this->backend_layout('edit_form', $this->data);
        // $this->load->view('layout/backend/header');
        // $this->load->view('pages/backend/edit_form' ,$data);
        // $this->load->view('layout/backend/footer');
    }

    public function home()
    {
        $this->backend_layout('home');
        // $this->load->view('layout/backend/header');
        // $this->load->view('pages/backend/home' );
        // $this->load->view('layout/backend/footer');
    }

    public function update_data()
    {
        $data = $this->user_model->update_user($_POST);
    }

    public function delete_user()
    {
        $this->user_model->delete_user($_GET['del']);
    }

    public function delete_account()
    {
        $this->user_model->delete_account($_GET['del']);
    }

    public function login()
    {

        $username = $_POST['username'];
        $password = $_POST['password'];
        $data = $this->user_model->login($username, $password);
        if ($data > 0 && $this->session->userdata('admin_status') == 2) {
            redirect('admin');
        } elseif ($data > 0 && $this->session->userdata('status') == 1) {
            redirect('home');
        } else {
            redirect('error');
        }
    }
    public function logout()
    {
        // session_destroy();
        $this->session->sess_destroy();
        redirect('home');
    }

    public function error()
    {

        $this->backend_layout('error');
        // $this->load->view('layout/backend/header');
        // $this->load->view('pages/backend/error');
        // $this->load->view('layout/backend/footer');
    }

    public function success()
    {
        if ($this->session->userdata('admin_user') == '') {
            redirect('home');

        }
        $this->backend_layout('success');
        // $this->load->view('layout/backend/header');
        // $this->load->view('pages/backend/success');
        // $this->load->view('layout/backend/footer');
    }
    public function profile_user()
    {
        if ($this->session->userdata('username') == '') {
            redirect('home');

        } else {
            //echo $this->session->userdata('user_id');
            $this->data['user1'] = $this->user_model->profile_user1($this->session->userdata('user_id'));
            //$data['user1'] = $this->db->where('m_id',$this->session->userdata('user_id'))->get('member')->result();
            $this->backend_layout('profile', $this->data);
            // $this->load->view('layout/backend/header');
            // $this->load->view('pages/backend/profile',$data);
            // $this->load->view('layout/backend/footer');
        }
    }
    //register
    public function register()
    {

        $data = $this->user_model->register($_POST);
    }

    public function edit_member()
    {

        $this->user_model->edit_member($_POST);
    }

    public function chk_user()
    {
        $data = $this->user_model->chk_user($_POST['user']);
        echo json_encode($data);
    }

    public function chk_email()
    {
        $data = $this->user_model->chk_email($_POST['email']);
        echo json_encode($data);

    }

    public function check_fname()
    {
        $data = $this->user_model->check_fname($_POST['fname']);
        echo json_encode($data);

    }

    public function check_lname()
    {
        $data = $this->user_model->check_lname($_POST['lname']);
        echo json_encode($data);

    }

    public function chke_email()
    {
        $data = $this->user_model->chke_email($_POST['e_email']);
        echo json_encode($data);

    }

    public function alert_login()
    {
        $data = $this->user_model->alert_login($_POST['user'], $_POST['pass']);
        echo json_encode($data);

    }

    public function upload_img()
    {
        $data = $this->user_model->upload_img($_POST);

    }

    public function serch_data()
    {
        $this->data['user'] = $this->user_model->serch_data();
        $this->backend_layout('serch', $this->data);
    }

}
