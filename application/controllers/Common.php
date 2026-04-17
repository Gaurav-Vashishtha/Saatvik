<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Common extends CI_Controller
{
   public function upload_editor_image()
{
    $path = FCPATH . 'uploads/editor/';

    if (!is_dir($path)) {
        mkdir($path, 0755, TRUE);
    }

    // Upload config
    $config['upload_path']   = $path;
    $config['allowed_types'] = 'jpg|jpeg|png|gif|webp';
    $config['max_size']      = 2048;

    $this->load->library('upload', $config);

    if (!$this->upload->do_upload('file')) {
        echo json_encode([
            'status' => false,
            'message' => strip_tags($this->upload->display_errors())
        ]);
        exit;
    }

    $data = $this->upload->data();

    echo json_encode([
        'status' => true,
        'url' => base_url('uploads/editor/' . $data['file_name'])
    ]);
    exit;
}
}