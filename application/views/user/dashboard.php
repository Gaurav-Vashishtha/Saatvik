

    <style>
            .cards {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
        }

        .card {
            background: #0097A7;
            color: #fff;
            padding: 20px;
            border-radius: 8px;
            width: 300px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            transition: transform 0.2s;
        }

        .card:hover {
            transform: translateY(-5px);
        }

        .card h3 {
            font-size: 2em;
            margin-bottom: 10px;
        }

        .card a {
            color: #fff;
            text-decoration: none;
            display: inline-block;
            margin-top: 10px;
        }

        .card a i {
            margin-left: 5px;
        }

        

/* .bannerblock {
    height: 240px;
    overflow: hidden;
    margin-bottom: 30px;
    border-radius: 20px;
}
.bannerblock img{max-width: 100%;} */
    </style>

<!-- <div class="dashboard">
    <h2>Dashboard</h2>

<div class="bannerblock">
<img src="/admin/uploads/banners/7f15a68968fdadca815ab54dd2686484.jpg" alt=""></div> -->

    <div class="cards">
        
        <div class="card">
            <h3><?= 0; ?></h3>
            <a href="<?//= base_url('admin/locations'); ?>">Users</a>
        </div>

        <div class="card">
            <h3><?= 0; ?></h3>
            <a href="<?//= base_url('admin/package'); ?>">Current Job</a>
        </div>

        <!-- <div class="card">
            <h3><?= $activity_count; ?></h3>
            <a href="<?= base_url('admin/activities'); ?>">Activities</a>
        </div>

        <div class="card">
            <h3><?= $cruise_count; ?></h3>
            <a href="<?= base_url('admin/cruise'); ?>">Cruises</a>
        </div>

        <div class="card">
            <h3><?= $blog_count; ?></h3>
            <a href="<?= base_url('admin/blog'); ?>">Blogs</a>
        </div>
        
        <div class="card">
            <h3><?= $visa_count; ?></h3>
            <a href="<?= base_url('admin/visadetails'); ?>">Visas</a>
        </div> -->

    </div>
</div>
