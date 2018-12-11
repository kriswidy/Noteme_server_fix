<?php
    
    defined('BASEPATH') OR exit('No direct script access allowed');
    
    require APPPATH . '/libraries/REST_Controller.php';
    use Restserver\Libraries\REST_Controller;
    
    class Register extends REST_Controller {
    
        
        public function __construct()
        {
            parent::__construct();
            $this->load->database();
        }
        
        public function index_post()
        {
            $data = array(
                'email'     => $this->post('email'),
                'username'  => $this->post('username'),
                'password'  => $this->post('password'));
                $insert = $this->db->insert('user_noteme', $data);
                if($insert){
                    $this->response(array('status' => 'sukses', 'result' => $data ,'message' => 'Berhasil'), 200); 
                }else{
                    $this->response(array('status' => 'fail', 502));
                }
            
        }
    
    }
    

?>