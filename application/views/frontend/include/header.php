<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Saatvik Connect</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap/css/style.css?v=<?php echo time(); ?>" rel="stylesheet">
    <!-- Swiper CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"/>
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">

    <style>
        


        .birthday-card img {
            border-radius: 15px;
        }

      

        .swiper-slide {
            display: flex;
            justify-content: center;
            align-items: center;
        }
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
        
        .scroll-box {
        max-height: 150px;
        overflow-y: auto;
        }
        
        .procedures {
            min-height: 40px;
        }
        
        .modal-scroll {
        max-height: 70vh;   
        overflow-y: auto;   
        padding-right: 10px;
    }


      

       .employee-hidden{
            display:none;
        }

        .section-block {
        display: none;
        }

        .section-block.active {
            display: block;
        }
        .tab-scroll-wrapper {
            overflow-x: auto;
            scrollbar-width: none;
        }

        .tab-scroll-wrapper::-webkit-scrollbar {
            display: none;
        }

        .tab-scroll {
            display: flex;
            gap: 10px;
            flex-wrap: nowrap;
        }

        .tab-scroll .btn {
            flex: 0 0 auto;
            white-space: nowrap;
        }
        
        .calendar-grid {
        display: grid;
        grid-template-columns: repeat(7, 1fr);
        gap: 5px;
    }
    
    .day {
        padding: 8px;
        text-align: center;
        cursor: pointer;
        border-radius: 6px;
    }
    
    .day:hover {
        background: #eee;
    }
    
    .day.marked {
        background: #1abc9c;
        color: #fff;
        font-weight: bold;
        position: relative;
    }
    
    /* small dot indicator */
    .day.marked::after {
        content: '';
        width: 5px;
        height: 5px;
        background: #fff;
        display: block;
        margin: auto;
        border-radius: 50%;
    }
    </style>
  </head>
  <body>

    <div class="top-header d-flex align-items-center justify-content-between container">

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