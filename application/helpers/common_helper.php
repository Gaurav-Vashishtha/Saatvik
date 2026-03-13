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

                return ['error' => $CI->upload->display_errors()];
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