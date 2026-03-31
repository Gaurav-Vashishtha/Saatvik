<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Saatvik Connect</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap/css/style.css" rel="stylesheet">
    <!-- Swiper CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"/>
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">

    <style>
        .accordion-button{
        font-size:14px;
        }

        .accordion-button:not(.collapsed){
            background:#f8f9fa;
            color:#000;
        }

        .accordion-item{
            transition:all .2s ease;
        }

        .accordion-item:hover{
            transform:translateY(-2px);
            box-shadow:0 4px 12px rgba(0,0,0,0.05);
        }

        .today-swiper {
    width: 100%;
}
.card {
    border-radius: 0px;
    overflow: hidden;
}

.today-swiper .swiper-slide img {
    width: 100%;
    height: 200px;
    object-fit: cover;
}
    </style>
  </head>
  <body>

<div class="top-header d-flex align-items-center justify-content-between">

    <div class="logo">
        <span>         
            <img src="assets/images/logo.png">
       </span>
    </div>

    <div class="search-box">
        <i class="bi bi-search"></i>
        <input type="text" class="form-control" placeholder="Type in to search ..">
    </div>
    <!-- Icons -->
    <div class="header-icons">
        <div class="icon-badge">
            <i class="bi bi-envelope"></i>
            <span>11</span>
        </div>
        <div class="icon-badge">
            <i class="bi bi-bell"></i>
            <span>7</span>
        </div>
    </div>

</div>