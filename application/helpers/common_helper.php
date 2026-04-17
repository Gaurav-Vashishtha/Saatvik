<?php
defined('BASEPATH') OR exit('No direct script access allowed');


if (!function_exists('_upload_file')) {

    function _upload_file($field, $path, $old_file = null, $types = 'jpg|jpeg|png|webp')
    {
        $CI =& get_instance();

        if (!is_dir($path)) {
            mkdir($path, 0755, TRUE);
        }

        if (!empty($_FILES[$field]['name'])) {

            $config = [
                'upload_path'   => $path,
                'allowed_types' => $types,
                'encrypt_name'  => TRUE,
                'max_size'      => 2048
            ];

            $CI->load->library('upload');
            $CI->upload->initialize($config);

            if ($CI->upload->do_upload($field)) {

                $file_name = $CI->upload->data('file_name');

                if (!empty($old_file) && file_exists($path.$old_file)) {
                    unlink($path.$old_file);
                }

                return $file_name;

            } else {

                $CI->session->set_flashdata('error', $CI->upload->display_errors());
redirect($_SERVER['HTTP_REFERER']);
exit;
            }
        }

        return $old_file;
    }
}

if (!function_exists('generate_employee_code')) {

    function generate_employee_code($table, $prefix)
    {
        $CI =& get_instance();

        $CI->db->select('employee_code');
        $CI->db->like('employee_code', $prefix, 'after');
        $CI->db->order_by('id', 'DESC');
        $CI->db->limit(1);
        $query = $CI->db->get($table);

        if ($query->num_rows() > 0) {

            $last_code = $query->row()->employee_code;

            $number = (int) substr($last_code, strlen($prefix));
            $number++;

        } else {

            $number = 1;
        }

        return $prefix . str_pad($number, 6, '0', STR_PAD_LEFT);
    }
}

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

    function upload_file($field_name, $upload_path, $allowed_types = '*', $max_size = 2048)
    {
        $CI =& get_instance();

        if (!is_dir($upload_path)) {
            mkdir($upload_path, 0777, true); // true = recursive
        }

        if(!empty($_FILES[$field_name]['name']))
        {
            $config['upload_path']   = $upload_path;
            $config['allowed_types'] = $allowed_types;
            $config['max_size']      = $max_size;
            $config['encrypt_name']  = TRUE;

            $CI->load->library('upload', $config);

            if($CI->upload->do_upload($field_name))
            {
                $data = $CI->upload->data();
                return $upload_path.$data['file_name'];
            }
            else
            {
                // Optional: debug error
                // echo $CI->upload->display_errors();
                return false;
            }
        }

        return '';
    }