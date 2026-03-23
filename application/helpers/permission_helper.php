<?php

function checkPermission($url_slug,$action='view')
{
    $CI =& get_instance();

    $role_id = $CI->session->userdata('role_id');

    if(!$role_id) return false;

    if($role_id == 1){
        return true;
    }

    $CI->db->select('p.*');
    $CI->db->from('admin_permission p');
    $CI->db->join('admin_sidebar s','s.id=p.sidebar_id');
    $CI->db->where('p.role_id',$role_id);
    $CI->db->where('s.url_slug',$url_slug);

    $perm = $CI->db->get()->row();

    if(!$perm) return false;

    if($action == 'view') return $perm->can_view;
    if($action == 'add') return $perm->can_add;
    if($action == 'edit') return $perm->can_edit;
    if($action == 'delete') return $perm->can_delete;

    return false;
}



function hasSidebarAccess($url_slug)
{
    $CI =& get_instance();

    $role_id = $CI->session->userdata('role_id');

    if ($role_id == 1) {
        return true;
    }

    $CI->db->select('p.can_view');
    $CI->db->from('admin_permission p');
    $CI->db->join('admin_sidebar s','s.id = p.sidebar_id');
    $CI->db->where('p.role_id',$role_id);
    $CI->db->where('s.url_slug',$url_slug);

    $perm = $CI->db->get()->row();

    return ($perm && $perm->can_view == 1);
} 