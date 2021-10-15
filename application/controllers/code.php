<?php
defined('BASEPATH') or exit('No direct script access allowed');

class code extends MY_Controller
{

    public function index()
    {
        $this->front_layout('index');
        // $this->load->view('layout/frontend/header');
        // $this->load->view('layout/index');
        // $this->load->view('layout/frontend/footer');
    }

    public function test()
    {
        $this->test_layout('test');
        // $this->load->view('layout/frontend/theader');
        // $this->load->view('layout/test');
        //  $this->load->view('layout/frontend/tfooter');
    }

    function new () {
        $this->load->view('new');

    }
    public function t()
    {
        $this->t_layout('t');

    }
}
