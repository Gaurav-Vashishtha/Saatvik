<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title><?php echo isset($title) ? $title . ' - Admin' : 'Admin Dashboard'; ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="icon" href="/assets/img/site-logo.PNG">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: "Poppins", sans-serif;
        }

        body {
            display: flex;
            background: #f5f7fa;
            min-height: 100vh;
        }

        .sidebar.active {
            width: 60px;
        }

        .sidebar.active .logo img {
            width: 40px;
        }

        .sidebar.active .nav li a span {
            display: none;
        }

        .sidebar.active .nav li a i:last-child {
            display: none;
        }

        .sidebar.active .submenu {
            display: none !important;
        }

        .main-content.active {
            margin-left: 60px;
            width: calc(100% - 60px);
        }


        .sidebar {
            width: 220px;
            background: #2c3e50;
            color: #fff;
            position: fixed;
            height: 100%;
            overflow-y: auto;
            transition: 0.3s;
        }

        .sidebar .logo {
            text-align: center;
            padding: 20px;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
        }

        .sidebar .logo img {
            width: 170px;
       
        }

        .sidebar .nav {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .sidebar .nav li {
            width: 100%;
        }


        .sidebar .nav li a {
            padding: 12px 18px;
            display: flex;
            align-items: center;
            color: #fff;
            text-decoration: none;
            gap: 10px;
        }

        .sidebar .nav li a:hover,
        .sidebar .nav li.active>a {
            background: #1abc9c;
        }

        .sidebar .nav li a i:last-child {
            margin-left: 0px;
        }

        .submenu {
            background: #34495e;
        }

        .submenu a {
            padding: 10px 19px !important;
            font-size: 14px;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .submenu.collapse.show {
            background: #34495e;
            padding: 0px;
        }
        .submenu li {
    list-style-type: none;
}.submenu {
    padding: 0;
}

        .main-content {
            margin-left: 220px;
            width: calc(100% - 220px);
            transition: 0.3s;
        }

        .topbar {
            height: 60px;
            background: #fff;
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 0 20px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        .content-area {
            padding: 20px;
        }

        .breadcrumb {
          background: transparent;
        }

        .breadcrumb-item a {
            text-decoration: none;
            color: #6c757d;
        }

        .breadcrumb-item a:hover {
            color: #1abc9c;
        }

        .note-btn-group.btn-group.show a.dropdown-item i {
            color: #000;
            visibility: visible;
        }
        .note-btn-group.btn-group.show .note-icon-menu-check:before {
            content: "\f11e";
            visibility: hidden;
        }
    </style>
</head>

<body>


    

    <div class="sidebar">
        <div class="logo">
            <img src="<?php echo base_url('assets/images/saatvik.png'); ?>" alt="Logo">
        </div>

        <?php $role_id = $this->session->userdata('role_id'); ?>

        <ul class="nav">

            <li class="<?php echo (isset($title) && strpos($title, 'Dashboard') !== false) ? 'active' : ''; ?>">
                <a href="<?php echo site_url('admin/dashboard'); ?>">
                    <i class="fas fa-tachometer-alt"></i>
                    <span>Dashboard</span>
                </a>
            </li>
    
            <?php if ($role_id == 1): ?>
            <li class="<?= ($this->uri->segment(2) == 'manage-hr') ? 'active' : ''; ?>">
                <a href="<?= site_url('admin/manage-hr'); ?>">
                    <i class="fas fa-users"></i>
                    <span>Manage Admin User</span>
                </a>
            </li>
            <?php endif; ?>
            <li class="<?php echo (isset($title) && strpos($title, 'Manage Employee') !== false) ? 'active' : ''; ?>">
                <a href="<?php echo site_url('admin/employee'); ?>">
                    <i class="fa fa-user-tie"></i>
                    <span>Manage Employee</span>
                </a>
            </li>

            <li class="<?php echo (isset($title) && strpos($title, 'Manage Policy Procedures') !== false) ? 'active' : ''; ?>">
                <a href="<?php echo site_url('admin/policy-procedures'); ?>">
                    <i class="fas fa-file-alt"></i>
                    <span>Manage Policy & Procedures</span>
                </a>
            </li>

            <li class="<?= ($this->uri->segment(2) == 'manage-quiz') ? 'active' : ''; ?>">
                <a href="<?= site_url('admin/manage-quiz'); ?>">
                    <i class="fas fa-question-circle"></i>
                    <span>Manage Quiz</span>
                </a>
            </li>

            <li class="<?= ($this->uri->segment(2) == 'manage-learning-material') ? 'active' : ''; ?>">
                <a href="<?= site_url('admin/manage-learning-material'); ?>">
                    <i class="fas fa-book"></i>
                    <span>Manage Learning Material</span>
                </a>
            </li>

            <li class="<?= ($this->uri->segment(2) == 'manage-news-events') ? 'active' : ''; ?>">
                <a href="<?= site_url('admin/manage-news-events'); ?>">
                    <i class="fas fa-newspaper"></i>
                    <span>Manage News & Events</span>
                </a>
            </li>

            <li class="<?= ($this->uri->segment(2) == 'manage-moments') ? 'active' : ''; ?>">
                <a href="<?= site_url('admin/manage-moments'); ?>">
                    <i class="fas fa-camera"></i>
                    <span>Manage Moments</span>
                </a>
            </li>

            <li class="<?= ($this->uri->segment(2) == 'manage-leadership-desk') ? 'active' : ''; ?>">
                <a href="<?= site_url('admin/manage-leadership-desk'); ?>">
                    <i class="fas fa-user-tie"></i>
                    <span>Manage Leadership Desk</span>
                </a>
            </li>

            <li class="<?= ($this->uri->segment(2) == 'manage-departmental-information') ? 'active' : ''; ?>">
                <a href="<?= site_url('admin/manage-departmental-information'); ?>">
                    <i class="fas fa-file-alt"></i>
                    <span>Manage Departmental Information</span>
                </a>
            </li>
            <li class="<?= ($this->uri->segment(2) == 'manage-apps') ? 'active' : ''; ?>">
                <a href="<?= site_url('admin/manage-apps'); ?>">
                    <i class="fas fa-file-alt"></i>
                    <span>Manage Apps</span>
                </a>
            </li>

            <li class="<?= ($this->uri->segment(2) == 'manage-leadership') ? 'active' : ''; ?>">
                <a href="<?= site_url('admin/manage-leadership'); ?>">
                    <i class="fas fa-file-alt"></i>
                    <span>Manage Leader</span>
                </a>
            </li>

            <li>
                <a href="<?php echo site_url('admin/change_password'); ?>">
                    <i class="fas fa-key"></i>
                    <span>Change Password</span>
                </a>
            </li>

            <li>
                <a href="<?php echo site_url('admin/logout'); ?>">
                    <i class="fas fa-sign-out-alt"></i>
                    <span>Logout</span>
                </a>
            </li>

        </ul>

    </div>

    <div class="main-content">
        <div class="topbar">
            <button class="btn btn-sm btn-outline-secondary toggle"
                onclick="document.querySelector('.sidebar').classList.toggle('active');
                     document.querySelector('.main-content').classList.toggle('active');">
                ☰
            </button>

            <div>
                <?php 
                    $role_id = $this->session->userdata('role_id');

                    if ($role_id == 1) {
                        $welcome_text = 'Superadmin';
                    } else {
                        $ci =& get_instance();
                        $ci->load->database();

                        $role = $ci->db->select('name')->from('roles')->where('id', $role_id)->get()->row();
                        $welcome_text = $role->name ?? ($ci->session->userdata('admin_name') ?? 'Admin');
                    }
                    ?>
                    Welcome, <strong><?php echo $welcome_text; ?></strong>
            </div>
        </div>

        <div class="content-area container-fluid">
            <?php if (isset($breadcrumb) && is_array($breadcrumb)): ?>
            <div class="mb-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb small mb-0">
                        <?php foreach ($breadcrumb as $key => $crumb): ?>
                            <?php if ($key === array_key_last($breadcrumb)): ?>
                                <li class="breadcrumb-item active" aria-current="page">
                                    <?php echo $crumb['name']; ?>
                                </li>
                            <?php else: ?>
                                <li class="breadcrumb-item">
                                    <a href="<?php echo $crumb['url']; ?>">
                                        <?php echo $crumb['name']; ?>
                                    </a>
                                </li>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </ol>
                </nav>
            </div>
        <?php endif; ?>

            <?php if ($this->session->flashdata('success')): ?>
                <div class="alert alert-success"><?php echo $this->session->flashdata('success'); ?></div>
            <?php endif; ?>

            <?php if ($this->session->flashdata('error')): ?>
                <div class="alert alert-danger"><?php echo $this->session->flashdata('error'); ?></div>
            <?php endif; ?>
            <script>
                document.querySelectorAll('.submenu a').forEach(function(link) {
                    link.addEventListener('click', function(e) {
                        e.stopPropagation();
                    });
                });
            </script>




<script>
document.addEventListener("DOMContentLoaded", function () {

    document.addEventListener("change", function (e) {

        if (e.target.type === "file") {

            const file = e.target.files[0];
            if (!file) return;

            const maxSize = 2 * 1024 * 1024; 

            if (file.size > maxSize) {
                alert("File must be less than 2MB");
                e.target.value = "";
            }
        }

    });

});
</script>