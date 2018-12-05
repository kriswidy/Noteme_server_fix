<?php
    
    defined('BASEPATH') OR exit('No direct script access allowed');
    
    require APPPATH . '/libraries/REST_Controller.php';
    use Restserver\Libraries\REST_Controller;
    
    class Note extends REST_Controller {
    
        
        public function __construct()
        {
            parent::__construct();
            $this->load->database();
        }
        
        public function index_get()
        {
            $this->db->select('*');
            $this->db->from('isi_note');
            $query = $this->db->get()->result();
            $this->response($query, 200);
            
        }

        public function index_post()
        {
            $data = array(
                'id_user' => $this->post('id_user'),
                'judul' => $this->post('judul'),
                'note' => $this->post('note'),
                'tanggal' => $this->post('tanggal'));
            $insert = $this->db->insert('isi_note', $data);
            if($insert){
                $this->response($data, 200);
            }else{
                $this->response(array('status' => 'fail', 502));
            }
        }
        
        public function kategori_post()
        {
            $id_user = $this->input->post('id_user');
            $this->db->select('*');
            $this->db->from('isi_note as i');
            $this->db->join('user_noteme as u', 'i.id_user = u.id_user');
            $this->db->where('i.id_user', $id_user);
            $query = $this->db->get()->result();
            $this->response($query, 200);
        }
    }
    
    /* End of file Controllername.php */
    
?>