<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Upload extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper(array('form', 'url'));
    }

    public function upload_image()
    {
        if (isset($_FILES['upload']['name'])) {
            $config['upload_path'] = './uploads/';
            $config['allowed_types'] = 'gif|jpg|png|jpeg';
            $config['max_size'] = 2048; // 2MB
            $config['encrypt_name'] = TRUE;

            $this->load->library('upload', $config);

            if (!$this->upload->do_upload('upload')) {
                $error = $this->upload->display_errors();
                echo json_encode(array('error' => $error));
            } else {
                $data = $this->upload->data();
                $file_url = base_url('uploads/' . $data['file_name']);
                $func_num = $_GET['CKEditorFuncNum'];
                $message = 'Image uploaded successfully';

                echo "<script type='text/javascript'>window.parent.CKEDITOR.tools.callFunction($func_num, '$file_url', '$message');</script>";
            }
        }
    }
}
