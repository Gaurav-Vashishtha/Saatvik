<!-- Hero Section -->
<div class="hero ">
    <h1>Your workplace. Your updates. Your access point.</h1>
    <p>
        Everything you need at Saatvik - people, information, tools and culture - in one place
    </p>
</div>

<div class="container">
<div class="greeting-banner">
    <h1>Hi Himanshu, Have an amazing day at work.</h1>
</div>
</div>

<div class="container my-5 cardctm">
    <div class="row g-4">
      <div class="col-lg-6 mt-0">
    
        <div class="d-flex justify-content-between align-items-center mb-3">
           <h5 class="fw-semibold mb-0" id="sectionTitle">Happy Birthday To You</h5>
        <div class="swiper-pagination birthday-pagination"></div>
    
        <!-- <div class="card border-0 shadow-sm rounded-3 p-3 cardctmbox"> -->
            <div class="card border-0 shadow-sm rounded-4 p-3 cardctmbox">

       <div class="swiper birthday-swiper">
        <div class="swiper-wrapper text-center brtnew">

            <div class="swiper-slide">
                <div class="row text-center">
                    <?php foreach ($birthdays as $item): ?>
                       <div class="col-3 birthday-card" 
                            data-bs-toggle="modal" 
                            data-bs-target="#birthdayModal"
                            data-name="<?= $item['name']; ?>"
                            data-image="<?= $item['image']; ?>"
                            data-date="<?= date('M d', strtotime($item['date'])); ?>">
                            <img src="<?= $item['image']; ?>" width="120">
                            <h6><?= $item['name']; ?></h6>
                            <h6><?= date('M d', strtotime($item['date'])); ?></h6>
                        </div>
                    <?php endforeach; ?>
                </div>
                <div class="d-flex justify-content-between align-items-center mt-3 px-2">
                    <small>Celebrating our people, every day.</small>

                    <div class="d-flex align-items-center">
                        <!-- Month Dropdown -->
                        <select class="form-select form-select-sm month-filter me-2" data-type="birthday" style="width: 120px;">
                            <?php for ($m = 1; $m <= 12; $m++): 
                                $val = str_pad($m, 2, '0', STR_PAD_LEFT);
                            ?>
                                <option value="<?= $val ?>" <?= ($val == date('m')) ? 'selected' : '' ?>>
                                    <?= date('M', mktime(0,0,0,$m,1)) ?>
                                </option>
                            <?php endfor; ?>
                        </select>

                        <button class="btn btn-primary btn-sm rounded-pill see-more-btn" data-type="birthday">
                            See more
                        </button>
                    </div>
                </div>
            </div>

            <!-- ANNIVERSARY -->
            <div class="swiper-slide">
                <div class="row text-center">
                    <?php foreach ($anniversaries as $item): ?>
                        <div class="col-4 birthday-card" 
                            data-bs-toggle="modal" 
                            data-bs-target="#anniversaryModal"
                            data-name="<?= $item['name']; ?>"
                            data-image="<?= $item['image']; ?>"
                            data-date="<?= date('M d', strtotime($item['date'])); ?>">
                            <img src="<?= $item['image']; ?>" width="120">
                            <h6><?= $item['name']; ?></h6>
                            <h6><?= date('M d', strtotime($item['date'])); ?></h6>
                        </div>
                    <?php endforeach; ?>
                </div>

                <div class="d-flex justify-content-between align-items-center mt-3 px-2">
                    <small>Celebrating together.</small>

                    <div class="d-flex align-items-center">
                        <select class="form-select form-select-sm month-filter me-2" data-type="anniversary" style="width: 120px;">
                            <?php for ($m = 1; $m <= 12; $m++): 
                                $val = str_pad($m, 2, '0', STR_PAD_LEFT);
                            ?>
                                <option value="<?= $val ?>" <?= ($val == date('m')) ? 'selected' : '' ?>>
                                    <?= date('M', mktime(0,0,0,$m,1)) ?>
                                </option>
                            <?php endfor; ?>
                        </select>

                        <button class="btn btn-primary btn-sm rounded-pill see-more-btn" data-type="anniversary">
                            See more
                        </button>
                    </div>
                </div>
            </div>

            <!-- JOINERS -->
            <div class="swiper-slide">
                <div class="row text-center">
                    <?php foreach ($joinings as $item): ?>
                        <div class="col-4 birthday-card" 
                            data-bs-toggle="modal" 
                            data-bs-target="#joiningModal"
                            data-name="<?= $item['name']; ?>"
                            data-image="<?= $item['image']; ?>"
                            data-date="<?= date('M d', strtotime($item['date'])); ?>">
                            <img src="<?= $item['image']; ?>" width="120">
                            <h6><?= $item['name']; ?></h6>
                            <h6><?= date('M d', strtotime($item['date'])); ?></h6>
                        </div>
                    <?php endforeach; ?>
                </div>
                    <div class="d-flex justify-content-between align-items-center mt-3 px-2">
                        <small>Welcome to the team!</small>

                        <div class="d-flex align-items-center">
                            <select class="form-select form-select-sm month-filter me-2" data-type="joining" style="width: 120px;">
                                <?php for ($m = 1; $m <= 12; $m++): 
                                    $val = str_pad($m, 2, '0', STR_PAD_LEFT);
                                ?>
                                    <option value="<?= $val ?>" <?= ($val == date('m')) ? 'selected' : '' ?>>
                                        <?= date('M', mktime(0,0,0,$m,1)) ?>
                                    </option>
                            <?php endfor; ?>
                            </select>

                            <button class="btn btn-primary btn-sm rounded-pill see-more-btn" data-type="joining">
                                See more
                            </button>
                        </div>
                    </div>
            </div>

        </div>
    </div>
            </div>
        </div>

        <!-- Today at Saatvik Slider -->
       <div class="col-lg-6">
        <?php
            $events = [];
            $awards = [];
            $workshops = [];

            if (!empty($moments)) {
                foreach ($moments as $m) {
                    if ($m->category == 'event') {
                        $events[] = $m;
                    } elseif ($m->category == 'award') {
                        $awards[] = $m;
                    } elseif ($m->category == 'workshop') {
                        $workshops[] = $m;
                    }
                }
            }
            ?>

    <!-- HEADER -->
    <div class="d-flex justify-content-between align-items-center mb-3">
      <h5 class="fw-semibold mb-0" id="todayTitle">
    Today's At Saatvik -
</h5>
        <div class="swiper-pagination today-pagination"></div>
    </div>

    <div class="card border-0 shadow-sm rounded-4 p-3">

        <div class="swiper today-swiper">
            <div class="swiper-wrapper">

                <!-- EVENT SLIDE -->
                <div class="swiper-slide">
                    <div class="row">
                        <?php if (!empty($events)): ?>
                            <?php foreach ($events as $moment): ?>
                                <div class="col-12 mb-2">
                                    <img src="<?= base_url('uploads/moments/' . $moment->image) ?>"
                                        class="img-fluid rounded-3 momentCard w-100"
                                        data-title="<?= $moment->title ?>"
                                        data-date="<?= date('d F Y', strtotime($moment->date)) ?>"
                                        data-description="<?= htmlspecialchars($moment->description) ?>"
                                        data-image="<?= base_url('uploads/moments/' . $moment->image) ?>">
                                </div>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <p>No Events</p>
                        <?php endif; ?>
                    </div>
                </div>

                <!-- AWARD SLIDE -->
                <div class="swiper-slide">
                    <div class="row">
                        <?php if (!empty($awards)): ?>
                            <?php foreach ($awards as $moment): ?>
                                <div class="col-12 mb-2">
                                    <img src="<?= base_url('uploads/moments/' . $moment->image) ?>"
                                        class="img-fluid rounded-3 momentCard w-100"
                                        data-title="<?= $moment->title ?>"
                                        data-date="<?= date('d F Y', strtotime($moment->date)) ?>"
                                        data-description="<?= htmlspecialchars($moment->description) ?>"
                                        data-image="<?= base_url('uploads/moments/' . $moment->image) ?>">
                                </div>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <p>No Awards</p>
                        <?php endif; ?>
                    </div>
                </div>

                <!-- WORKSHOP SLIDE -->
                <div class="swiper-slide">
                    <div class="row">
                        <?php if (!empty($workshops)): ?>
                            <?php foreach ($workshops as $moment): ?>
                                <div class="col-12 mb-2">
                                    <img src="<?= base_url('uploads/moments/' . $moment->image) ?>"
                                        class="img-fluid rounded-3 momentCard w-100"
                                        data-title="<?= $moment->title ?>"
                                        data-date="<?= date('d F Y', strtotime($moment->date)) ?>"
                                        data-description="<?= htmlspecialchars($moment->description) ?>"
                                        data-image="<?= base_url('uploads/moments/' . $moment->image) ?>">
                                </div>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <p>No Workshops</p>
                        <?php endif; ?>
                    </div>
                </div>

            </div>
        </div>

        <!-- FOOTER -->
        <div class="d-flex justify-content-between align-items-center mt-3">
            <small id="todayDesc">Company events and updates</small>

            <button class="btn btn-primary btn-sm rounded-pill" id="todaySeeMore" data-type="event">
                See more
            </button>
        </div>

    </div>

    </div>
</div>

<div class="container my-4">
    <div class="row g-4">

        <!-- LEFT COLUMN -->
        <div class="col-lg-8 mt-0">
            
            <div class="d-flex justify-content-between align-items-center mb-3">
                <h6 class="fw-semibold mb-0">From The Leadership Desk</h6>
                <div class="swiper-pagination today-leaderships-1"></div>
            </div>
 <div class="card border-0 shadow-sm rounded-3 p-4 mb-4">
            <div class="swiper today-leadership-1">
                <div class="swiper-wrapper">
                    
                    <?php if(!empty($leaders)): ?>
                    <?php foreach($leaders as $leader_profile): ?>

                    <div class="swiper-slide">
                        
                       

                            <!-- Leader Profile -->
                            <div class="d-flex align-items-center p-3 bg-light rounded-3 mb-4 leadership sldier">

                               <img src="<?= !empty($leader_profile['image']) ? base_url('uploads/leadership/' . $leader_profile['image']) : 'https://placehold.co/80' ?>"
                                    class="rounded-circle me-3" width="60" height="60">

                                <div>
                                    <h6 class="mb-0 fw-semibold">
                                    <?= $leader_profile['name'] ?? 'Leader Name' ?>
                                    <small class="text-muted">| <?= $leader_profile['designation'] ?? '' ?></small>
                                </h6>

                                   <p class="mb-0 text-muted small">
                                    <?= character_limiter(strip_tags($leader_profile['description'] ?? ''), 500); ?>
                                </p>
                                </div>


                            </div>

  </div>
                  <?php endforeach; ?>
                    <?php endif; ?>
                    </div>

                </div>
                            <!-- Tabs -->
                            <div class="d-flex gap-2 mb-3 leadership-tabs">

                                <button class="btn btn-dark btn-sm rounded-pill active" data-tab="corp">
                                    Corporate Communication
                                </button>

                                <button class="btn btn-light btn-sm rounded-pill" data-tab="notice">
                                    Notice & Circulars
                                </button>

                                <button class="btn btn-light btn-sm rounded-pill" data-tab="welcome">
                                    New Joinee Welcome
                                </button>

                            </div>


                            <!-- Tab Content -->
                            <div class="tab-content-area">

                                <!-- Corporate -->
                                <ul class="list-unstyled tab-content active startbox" id="corp">

                                    <?php if (!empty($corp)): ?>
                                        <?php foreach ($corp as $row): ?>

                                            <li class="d-flex justify-content-between align-items-center bg-light rounded-3 mb-2">

                                                <small class="text-muted">
                                                    <?= date('M, Y', strtotime($row['publish_date'])) ?>
                                                </small>

                                                <span class="small">
                                                    <?= html_escape($row['title']) ?>
                                                </span>

                                                <button 
                                                    class="btn btn-outline-primary btn-sm rounded-pill readMoreBtn"
                                                
                                                    data-title="<?= htmlspecialchars($row['title']) ?>"
                                                    data-type="<?= $row['content_type'] ?>"
                                                    data-content="<?= htmlspecialchars($row['description']) ?>"
                                                    data-pdf="<?= !empty($row['pdf_file']) ? base_url('uploads/leadershipdesk/'.$row['pdf_file']) : '' ?>"
                                                
                                                >
                                                    Read More
                                                </button>

                                            </li>

                                        <?php endforeach; ?>
                                    <?php else: ?>

                                        <li class="text-muted small">No Corporate Communication available</li>

                                    <?php endif; ?>

                                </ul>



                                <!-- Notice -->
                                <ul class="list-unstyled tab-content startbox" id="notice">

                                    <?php if (!empty($notice)): ?>
                                        <?php foreach ($notice as $row): ?>

                                            <li class="d-flex justify-content-between align-items-center bg-light rounded-3  mb-2">

                                                <small class="text-muted">
                                                    <?= date('M, Y', strtotime($row['publish_date'])) ?>
                                                </small>

                                                <span class="small">
                                                    <?= html_escape($row['title']) ?>
                                                </span>

                                                <button 
                                                    class="btn btn-outline-primary btn-sm rounded-pill readMoreBtn"
                                                
                                                    data-title="<?= htmlspecialchars($row['title']) ?>"
                                                    data-type="<?= $row['content_type'] ?>"
                                                    data-content="<?= htmlspecialchars($row['description']) ?>"
                                                    data-pdf="<?= !empty($row['pdf_file']) ? base_url('uploads/leadershipdesk/'.$row['pdf_file']) : '' ?>"
                                                
                                                >
                                                    Read More
                                                </button>

                                            </li>

                                        <?php endforeach; ?>
                                    <?php else: ?>

                                        <li class="text-muted small">No Notice available</li>

                                    <?php endif; ?>

                                </ul>



                                <!-- Welcome -->
                                <ul class="list-unstyled tab-content startbox" id="welcome">

                                    <?php if (!empty($welcome)): ?>
                                        <?php foreach ($welcome as $row): ?>

                                            <li class="d-flex justify-content-between align-items-center bg-light rounded-3 mb-2"> 

                                                <small class="text-muted">
                                                    <?= date('M, Y', strtotime($row['publish_date'])) ?>
                                                </small>

                                                <span class="small">
                                                    <?= html_escape($row['title']) ?>
                                                </span>

                                                <button 
                                                    class="btn btn-outline-primary btn-sm rounded-pill readMoreBtn"
                                                
                                                    data-title="<?= htmlspecialchars($row['title']) ?>"
                                                    data-type="<?= $row['content_type'] ?>"
                                                    data-content="<?= htmlspecialchars($row['description']) ?>"
                                                    data-pdf="<?= !empty($row['pdf_file']) ? base_url('uploads/leadershipdesk/'.$row['pdf_file']) : '' ?>"
                                                
                                                >
                                                    Read More
                                                </button>

                                            </li>

                                        <?php endforeach; ?>
                                    <?php else: ?>

                                        <li class="text-muted small">No Welcome posts available</li>

                                    <?php endif; ?>

                                </ul>

                            </div>

                            <div class="text-center mt-3">
                                <button class="btn btn-primary btn-sm rounded-pill px-4">
                                    View all announcements
                                </button>
                            </div>

                      
            </div>



       <div class="d-flex justify-content-between align-items-center mb-3">
        <h6 class="fw-semibold mb-0">Employee Directory</h6>
        </div>
      <div class="card border-0 shadow-sm rounded-3 p-4">
        <div class="swiper today-searcha">
            <div class="swiper-wrapper swiper-wrapper-slide1">

                <div class="swiper-slide">
              

                        <input type="text" id="employeeSearch" class="form-control rounded-pill mb-3" placeholder="Type in to search ..">

                        <div class="text-center">
                            <button onclick="searchEmployee()" class="btn btn-primary btn-sm rounded-pill px-4 mb-3">
                                Search colleagues
                            </button>
                        </div>

                        <div class="bg-light rounded-3 p-4 text-muted" id="searchResult" style="overflow-y:auto;">
                     

                            <?php if(!empty($employees)): ?>
                                <?php foreach($employees as $emp): ?>

                                    <div class="employee-item mb-2">

                                        <img src="<?= base_url('uploads/employee/' .$emp['employee_image']) ?>"
                                         class="rounded-circle me-2"
                                         width="40" height="40">
                                       <strong><?= $emp['salutation'] . ' ' . $emp['full_name']; ?></strong><br>
                                        <small><?= $emp['designation']; ?> | <?= $emp['department']; ?></small>
                                    </div>

                                <?php endforeach; ?>
                            <?php else: ?>

                                <div class="text-center">No Employees Found</div>

                            <?php endif; ?>

                        </div>

                    </div>
                </div>

            </div>
        </div>

            <!-- Header -->
            <div class="d-flex justify-content-between align-items-center mb-3 mt-4">
                <h6 class="fw-semibold mb-0">Departmental Information</h6>
            </div>

            <div class="card border-0 shadow-sm rounded-3 p-4 tasd">

                <div class="row g-4">

                    <!-- SOPs -->
                    <div class="col-md-12">
                        <ul class="nav nav-tabs mb-3  leadership-tabs" id="docTabs" role="tablist">
    <li class="nav-item" role="presentation">
        <button class="nav-link btn active rounded-3" id="sops-tab" data-bs-toggle="tab" data-bs-target="#sopsTab" type="button">
            SOPs
        </button>
    </li>
    <li class="nav-item" role="presentation">
        <button class="nav-link btn rounded-3" id="tech-tab" data-bs-toggle="tab" data-bs-target="#techTab" type="button">
            Technical Documents
        </button>
    </li>
</ul>
                        
                    <div class="tab-content d-block">

    <!-- SOPs TAB -->
    <div class="tab-pane fade show active" id="sopsTab">

        <div class="rounded-3 h-100">
            <div class="accordion" id="deptAccordion1">

                <?php if (!empty($sops)): ?>
                    <?php $i = 1; foreach ($sops as $sop): ?>

                        <div class="accordion-item border-0 mb-2">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed py-3"
                                    type="button"
                                    data-bs-toggle="collapse"
                                    data-bs-target="#sop<?= $i ?>">

                                    <?= html_escape($sop['title']) ?>
                                </button>
                            </h2>

                            <div id="sop<?= $i ?>" class="accordion-collapse collapse"
                                data-bs-parent="#deptAccordion1">

                                <div class="accordion-body pt-2">

                                    <?php if (!empty($sop['document_link'])): ?>
                                        <a href="<?= $sop['document_link'] ?>" target="_blank"
                                            class="btn btn-outline-primary btn-sm rounded-pill">
                                            View Document
                                        </a>
                                    <?php else: ?>
                                        <div class="text-muted small dept-desc">
                                            <?= $sop['description']; ?>
                                        </div>
                                    <?php endif; ?>

                                </div>
                            </div>
                        </div>

                    <?php $i++; endforeach; ?>
                <?php else: ?>
                    <p class="text-muted small">No SOPs available</p>
                <?php endif; ?>

            </div>

            <div class="text-center mt-3 bootmbtn">
                <button class="btn btn-dark btn-sm w-100">
                    Search SOPs
                </button>
                     <button class="btn btn-dark btn-sm w-100">
                  Access department resources
                </button>
            </div>
        </div>

    </div>

    <!-- TECHNICAL DOCS TAB -->
    <div class="tab-pane fade" id="techTab">

        <div class="rounded-3 h-100">
            <div class="accordion" id="deptAccordion2">

                <?php if (!empty($technical_docs)): ?>
                    <?php $j = 1; foreach ($technical_docs as $doc): ?>

                        <div class="accordion-item border-0 mb-2">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed py-3"
                                    type="button"
                                    data-bs-toggle="collapse"
                                    data-bs-target="#tech<?= $j ?>">

                                    <?= html_escape($doc['title']) ?>
                                </button>
                            </h2>

                            <div id="tech<?= $j ?>" class="accordion-collapse collapse"
                                data-bs-parent="#deptAccordion2">

                                <div class="accordion-body pt-2">

                                    <?php if (!empty($doc['document_link'])): ?>
                                        <a href="<?= $doc['document_link'] ?>" target="_blank"
                                            class="btn btn-outline-primary btn-sm rounded-pill">
                                            View Document
                                        </a>
                                    <?php else: ?>
                                        <div class="text-muted small dept-desc">
                                            <?= $doc['description']; ?>
                                        </div>
                                    <?php endif; ?>

                                </div>
                            </div>
                        </div>

                    <?php $j++; endforeach; ?>
                <?php else: ?>
                    <p class="text-muted small">No Technical Documents available</p>
                <?php endif; ?>

            </div>



            <div class="text-center mt-3 bootmbtn">
                     <button class="btn btn-dark btn-sm w-100">
                    Search SOPs
                </button>
                <button class="btn btn-dark btn-sm w-100">
                  Access department resources
                </button>
                
            </div>
           
        </div>

    </div>

</div>
                    </div>


                   

                </div>
            </div>
        </div>
        <!-- RIGHT SIDEBAR -->
         
        <div class="col-lg-4 mt-0">
         <div class="d-flex justify-content-between align-items-center mb-3">
                <h6 class="fw-semibold mb-0">My Apps</h6>
                <div class="swiper-pagination today-leaderships"></div>
            </div>

            <!-- My Apps -->
            <div class="card border-0 shadow-sm rounded-3 p-4 mb-4 mt-3">

                <div class="row g-3 text-center myapps">

                    <?php if (!empty($apps)): ?>
                        <?php foreach ($apps as $app): ?>

                            <div class="col-4">

                                <a href="<?= $app['document_link']; ?>" target="_blank">

                                    <img src="<?= !empty($app['image']) ? base_url('uploads/apps/' . $app['image']) : 'https://placehold.co/600x400' ?>">

                                    <small class="d-block mt-1">
                                        <?= $app['app_name']; ?>
                                    </small>

                                </a>

                            </div>

                        <?php endforeach; ?>
                    <?php else: ?>

                        <div class="col-12 text-muted">
                            No Apps Available
                        </div>

                    <?php endif; ?>

                </div>
                
                
               
            </div>
            
                  <div class="d-flex justify-content-between align-items-center mb-3">
               <h6 class="fw-semibold mb-0 mt-1">Policy & Procedures</h6>
                <div class="swiper-pagination today-leaderships"></div>
            </div>
                <div class="card border-0 shadow-sm rounded-3 p-4 mb-4 mt-3">

 
                
                
                    <?php if (!empty($policies)): ?>

                    <?php foreach ($policies as $policy): ?>

                    <div class="d-flex justify-content-between align-items-center mb-2 procedures">

                        <span class="small">
                            <?= $policy['title'] ?>
                        </span>

                            <button 
                                class="btn btn-outline-primary btn-sm rounded-pill readMoreBtn"

                                data-title="<?= htmlspecialchars($policy['title']) ?>"
                                data-type="<?= $policy['content_type'] ?>"
                                data-content="<?= htmlspecialchars($policy['description']) ?>"
                                data-pdf="<?= !empty($policy['pdf_file']) ? base_url('uploads/policy/'.$policy['pdf_file']) : '' ?>"

                            >
                                Read More
                            </button>

                    </div>

                    <?php endforeach; ?>

                    <?php endif; ?>
                <!-- policies dynamic data -->
 </div>
 
  <div class="d-flex justify-content-between align-items-center mb-3">
                   <h6 class="fw-semibold mb-0">Learning Never Stops At Saatvik</h6>
                <div class="swiper-pagination today-leaderships"></div>
            </div>
  <div class="card border-0 shadow-sm rounded-3 p-4 mb-4 mt-3">
       <div class="bg-lightc rounded-3  h-100">
                    <button class="btn btn-dark btn-sm w-100 bgbtn  mb-3">
                        Training Calendar
                    </button>
                    <div class="calendar-card">
                        <div class="calendar-nav">
                            <button class="nav-btn" id="prevMonth">&lt;</button>
                            <span class="month-year">
                                <span id="monthName"></span>
                                <span id="year"></span>
                            </span>
                            <button class="nav-btn" id="nextMonth">&gt;</button>
                        </div>

                        <div class="calendar-grid">
                            <div class="day-name">Sun</div>
                            <div class="day-name">Mon</div>
                            <div class="day-name">Tue</div>
                            <div class="day-name">Wed</div>
                            <div class="day-name">Thu</div>
                            <div class="day-name">Fri</div>
                            <div class="day-name">Sat</div>
                        </div>

                        <div id="calendarDays" class="calendar-grid"></div>
                    </div>
                </div>
                
                     <div class="bg-lightl rounded-3 h-100">

                    <button class="btn btn-dark btn-sm w-100 bgbtn mb-3">
                        Learning Material
                    </button>

                    <div class="accordion" id="learningAccordion">

                    <?php // print_r($learning); die;?>

                        <?php if (!empty($learning)): ?>

                            <?php foreach ($learning as $key => $item): ?>

                                <div class="accordion-item">

                                    <h2 class="accordion-header" id="heading<?= $item['id']; ?>">

                                        <button class="accordion-button <?= $key != 0 ? 'collapsed' : '' ?>"
                                            type="button"
                                            data-bs-toggle="collapse"
                                            data-bs-target="#collapse<?= $item['id']; ?>"
                                            aria-expanded="<?= $key == 0 ? 'true' : 'false'; ?>">

                                            <?= $item['question']; ?>

                                        </button>

                                    </h2>

                                    <div id="collapse<?= $item['id']; ?>"
                                        class="accordion-collapse collapse <?= $key == 0 ? 'shows' : ''; ?>"
                                        data-bs-parent="#learningAccordion">

                                        <div class="accordion-body">

                                            <?= $item['answer']; ?>

                                        </div>

                                    </div>

                                </div>

                            <?php endforeach; ?>

                        <?php else: ?>

                            <p class="text-muted">No learning material available</p>

                        <?php endif; ?>

                    </div>

                    <div class="text-center mt-3">
                        <button class="btn btn-primary btn-sm rounded-pill px-4">
                            Learn more
                        </button>
                    </div>

                </div>
                
                    <div class="bg-lightq rounded-3 h-100 ">
            <button class="btn btn-dark btn-sm w-100 bgbtn mb-3">
                Quiz of the Week
            </button>

            <?php if(!empty($quiz)): ?>
                <?php $q_index = 0; ?>
                <?php foreach($quiz as $q): ?>
                    <div class="quiz-card mb-4" data-index="<?= $q_index ?>">
                        <!-- Question -->
                        <p class="fw-semibold small mb-2 qubox"><?= $q['question'] ?></p>

                        <div class="asnbox">
                            <?php foreach($q['options'] as $key => $value): ?>
                                <?php if(!empty($value)): ?>
                                    <div class="form-check mb-2">
                                        <input class="form-check-input" type="radio"
                                            name="answer_<?= $q_index ?>"
                                            id="option_<?= $q_index ?>_<?= $key ?>"
                                            value="<?= strtoupper($key) ?>">
                                        <label class="form-check-label" for="option_<?= $q_index ?>_<?= $key ?>">
                                            <?= $value ?>
                                        </label>
                                    </div>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </div>

                        <div id="quizResult_<?= $q_index ?>" class="mt-2 fw-semibold"></div>

                        <div class="text-center mt-2">
                            <button class="btn btn-primary btn-sm rounded-pill px-4 submitQuizBtn"
                                    data-index="<?= $q_index ?>"
                                    data-correct="<?= strtoupper($q['correct_option']) ?>">
                                Submit
                            </button>
                        </div>
                    </div>
                    <?php $q_index++; ?>
                <?php endforeach; ?>
            <?php else: ?>
                <p class="text-muted small">No quiz available</p>
            <?php endif; ?>
        </div>
 
  </div>
  


        </div>

    </div>
</div>

<!-- Swiper JS -->
<!-- News & Events -->
<div class="container my-4">
   <div class="d-flex justify-content-between align-items-center mb-3">
    <h6 class="fw-semibold mb-0">News &amp; Events</h6>
    <div class="swiper-pagination today-news"></div>
</div>

<div class="card border-0 shadow-sm rounded-3 p-4">
    <div class="swiper news-swiper">
        <div class="swiper-wrapper">

            <?php if(!empty($news)): ?>
                <?php foreach($news as $item): ?>
                    <div class="swiper-slide">
                        <div class="card border-0">

                            <img src="<?= !empty($item['image']) ? $item['image'] : 'https://placehold.co/600x200' ?>"
                                 class="rounded-3 img-fluid w-100 mb-2 newsCard"
                                 data-title="<?= html_escape($item['title'] ?? 'No Title') ?>"
                                 data-date="<?= $item['event_date'] ?? '' ?>"
                                 data-description="<?= htmlspecialchars($item['description'] ?? '', ENT_QUOTES) ?>"
                                 data-image="<?= !empty($item['image']) ? $item['image'] : 'https://placehold.co/600x200' ?>">

                            <h6 class="fw-semibold mb-1">
                                <?= html_escape($item['title'] ?? 'No Title') ?>
                            </h6>

                            <h6 class="text-muted small mb-2">
                                <?= $item['event_date'] ?? '' ?>
                            </h6>

                            <button class="btn btn-sm rounded-pill newsCards"
                                data-title="<?= html_escape($item['title'] ?? 'No Title') ?>"
                                data-date="<?= $item['event_date'] ?? '' ?>"
                                data-description="<?= htmlspecialchars($item['description'] ?? '', ENT_QUOTES) ?>"
                                data-image="<?= !empty($item['image']) ? $item['image'] : 'https://placehold.co/600x200' ?>">
                                See more
                            </button>

                        </div>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <div class="swiper-slide text-center text-muted">
                    No News & Events available
                </div>
            <?php endif; ?>

        </div>
    </div>
</div>


</div>

<!--modal for policy-->
<div class="modal fade" id="policyModal" tabindex="-1">
  <div class="modal-dialog modal-xl modal-dialog-centered">
    <div class="modal-content">

      <div class="modal-header">
        <h5 class="modal-title" id="policyTitle"></h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>

      <div class="modal-body">
        <div id="policyContent"></div>
      </div>

    </div>
  </div>
</div>

<!-- modal for moments-->

<div class="modal fade" id="momentModal" tabindex="-1">
  <div class="modal-dialog modal-lg modal-dialog-centered">
    <div class="modal-content rounded-3">

      <div class="modal-header border-0">
        <h5 class="modal-title fw-bold" id="momentTitle"></h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>

      <div class="modal-body">

        <small class="text-muted d-block mb-2" id="momentDate"></small>

        <img id="momentImage"
            class="img-fluid rounded-3 mb-3 w-100">

        <p id="momentDescription" class="text-muted"></p>

      </div>

    </div>
  </div>
</div>


<!--modal for b,day-->
<div class="modal fade" id="birthdayModal" tabindex="-1">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content text-center rounded-3 p-4 position-relative">

      <button type="button" class="btn-close position-absolute end-0 top-0 m-3" data-bs-dismiss="modal"></button>

      <h4 class="fw-semibold mb-3">Happy Birthday</h4>

      <div style="width:60px;height:3px;background:#ff6b00;margin:auto;margin-bottom:20px;"></div>

      <img id="birthdayImage" src="" class="rounded-3 mb-3" width="180">

      <div style="width:60px;height:3px;background:#ff6b00;margin:auto;margin-bottom:20px;"></div>

      <h6 class="fw-semibold mb-0" id="birthdayName"></h6>
      <small class="text-muted" id="birthdayDate"></small>

    </div>
  </div>
</div>

<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script>

  $(document).on("click",".readMoreBtn",function(){

    var title = $(this).data("title");
    var type  = $(this).data("type");
    var content = $(this).data("content");
    var pdf = $(this).data("pdf");

    $("#policyTitle").text(title);

    if(type === "pdf" && pdf !== "")
    {
        $("#policyContent").html('<iframe src="'+pdf+'" width="100%" height="600px"></iframe>');
    }
    else
    {
        $("#policyContent").html(content);
    }

    $('#policyModal').modal('show');

});


$(document).on("click", ".momentCard, .newsCard", function(){

    var title = $(this).data("title");
    var date = $(this).data("date");
    var description = $(this).data("description");
    var image = $(this).data("image");

    $("#momentTitle").text(title);
    $("#momentDate").text(date);
    $("#momentDescription").html(description);
    $("#momentImage").attr("src", image);

    var modal = new bootstrap.Modal(document.getElementById('momentModal'));
    modal.show();

});

document.querySelectorAll(".birthday-card").forEach(function(card){

    card.addEventListener("click", function(){

        document.getElementById("birthdayName").innerText = this.dataset.name;
        document.getElementById("birthdayImage").src = this.dataset.image;
        document.getElementById("birthdayDate").innerText = this.dataset.date;

        var birthdayModal = new bootstrap.Modal(document.getElementById('birthdayModal'));
        birthdayModal.show();

    });

});
</script>