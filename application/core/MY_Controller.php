<?php
class MY_Controller extends CI_Controller{

    protected $data = array();

    function __construct(){
        parent:: __construct();
    }

    public function front_layout($content = NULL){
        $this->data['content'] = $this->load->view('pages/frontend/'.$content,
        $this->data, TRUE);
        $this->load->view('layout/frontend/front_layout', $this->data);
    }
    
    public function backend_layout($content = NULL){
        $this->data['content'] = $this->load->view('pages/backend/'.$content, $this->data, TRUE );
        $this->load->view('layout/backend/backend_layout', $this->data);
    }
    

    
}