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
    <div class="row ">
        <div class="col-lg-6 mt-0">
            <div class="containers cardctm">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h5 class="fw-semibold mb-0" id="sectionTitle">Happy Birthday To You</h5>
                    <div class="swiper-pagination birthday-pagination"></div>
                </div>
                <div class="card border-0 shadow-sm rounded-4 p-3">

                    <div class="swiper birthday-swiper">
                        <div class="swiper-wrapper">

                            <!-- BIRTHDAY -->
                            <div class="swiper-slide">
                                <div class="row text-center w-100">
                                    
                                    <?php foreach (array_slice($birthdays, 0, 3) as $item): ?>
                                        <div class="col-4 birthday-card brtnew"
                                            data-bs-toggle="modal"
                                            data-bs-target="#birthdayModal"
                                            data-name="<?= $item['name']; ?>"
                                            data-image="<?= $item['image']; ?>"
                                            data-date="<?= date('M d', strtotime($item['date'])); ?>">
                                            <img src="<?= $item['image']; ?>" >
                                            <h6><?= $item['name']; ?></h6>
                                            <p><?= date('M d', strtotime($item['date'])); ?></p>
                                        </div>
                                    <?php endforeach; ?>
                                </div>
                                <div class="d-flex justify-content-between align-items-center mt-3 px-2 w-100">
                                    <small>Celebrating our people, every day.</small>

                                    <div class="d-flex align-items-center">
                                        
                                        <button class="btn btn-primary btn-sm rounded-pill see-more-btn" data-type="birthday">
                                            See more
                                        </button>
                                        <!-- Month Dropdown -->
                                        <select class="form-select form-select-sm month-filter " data-type="birthday" >
                                            <?php for ($m = 1; $m <= 12; $m++):
                                                $val = str_pad($m, 2, '0', STR_PAD_LEFT);
                                            ?>
                                                <option value="<?= $val ?>" <?= ($val == date('m')) ? 'selected' : '' ?>>
                                                    <?= date('M', mktime(0, 0, 0, $m, 1)) ?>
                                                </option>
                                            <?php endfor; ?>
                                        </select>

                                    </div>
                                </div>
                            </div>

                            <!-- ANNIVERSARY -->
                            <div class="swiper-slide">
                                <div class="row text-center w-100">
                                    <?php foreach (array_slice($anniversaries, 0, 3) as $item): ?>
                                        <div class="col-4 birthday-card brtnew"
                                            data-bs-toggle="modal"
                                            data-bs-target="#anniversaryModal"
                                            data-name="<?= $item['name']; ?>"
                                            data-image="<?= $item['image']; ?>"
                                            data-date="<?= date('M d', strtotime($item['date'])); ?>">
                                            <img src="<?= $item['image']; ?>" >
                                            <h6><?= $item['name']; ?></h6>
                                            <p><?= date('M d', strtotime($item['date'])); ?></p>
                                        </div>
                                    <?php endforeach; ?>
                                </div>

                                <div class="d-flex justify-content-between align-items-center mt-3 px-2 w-100">
                                    <small>Celebrating together.</small>

                                    <div class="d-flex align-items-center">
                                         <button class="btn btn-primary btn-sm rounded-pill see-more-btn" data-type="anniversary">
                                            See more
                                        </button>
                                        <select class="form-select form-select-sm month-filter " data-type="anniversary">
                                            <?php for ($m = 1; $m <= 12; $m++):
                                                $val = str_pad($m, 2, '0', STR_PAD_LEFT);
                                            ?>
                                                <option value="<?= $val ?>" <?= ($val == date('m')) ? 'selected' : '' ?>>
                                                    <?= date('M', mktime(0, 0, 0, $m, 1)) ?>
                                                </option>
                                            <?php endfor; ?>
                                        </select>

                                       
                                    </div>
                                </div>
                            </div>

                            <!-- JOINERS -->
                            <div class="swiper-slide">
                                <div class="row text-center w-100">
                                    <?php foreach (array_slice($joinings, 0, 3) as $item): ?>
                                        <div class="col-4 birthday-card brtnew"
                                            data-bs-toggle="modal"
                                            data-bs-target="#joiningModal"
                                            data-name="<?= $item['name']; ?>"
                                            data-image="<?= $item['image']; ?>"
                                            data-date="<?= date('M d', strtotime($item['date'])); ?>">
                                            <img src="<?= $item['image']; ?>" >
                                            <h6><?= $item['name']; ?></h6>
                                            <p><?= date('M d', strtotime($item['date'])); ?></p>
                                        </div>
                                    <?php endforeach; ?>
                                </div>
                                <div class="d-flex justify-content-between align-items-center mt-3 px-2 w-100">
                                    <small>Welcome to the team!</small>

                                    <div class="d-flex align-items-center">
                                           <button class="btn btn-primary btn-sm rounded-pill see-more-btn" data-type="joining">
                                            See more
                                        </button>
                                        <select class="form-select form-select-sm month-filter " data-type="joining">
                                            <?php for ($m = 1; $m <= 12; $m++):
                                                $val = str_pad($m, 2, '0', STR_PAD_LEFT);
                                            ?>
                                                <option value="<?= $val ?>" <?= ($val == date('m')) ? 'selected' : '' ?>>
                                                    <?= date('M', mktime(0, 0, 0, $m, 1)) ?>
                                                </option>
                                            <?php endfor; ?>
                                        </select>

                                     
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>


            </div>

        </div>
        <!-- Today at Saatvik Slider -->
        <div class="col-lg-6 mt-0">

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
                        <div class="swiper-slide gutter-1">
                            <div class="row">
                                <?php if (!empty($events)): ?>
                                    <?php $moment = $events[0]; ?>
                                    <div class="col-12 ">
                                        <img src="<?= base_url('uploads/moments/' . $moment->image) ?>"
                                            class="img-fluid rounded-3 momentCard w-100"
                                            data-title="<?= $moment->title ?>"
                                            data-date="<?= date('d F Y', strtotime($moment->date)) ?>"
                                            data-description="<?= htmlspecialchars($moment->description) ?>"
                                            data-image="<?= base_url('uploads/moments/' . $moment->image) ?>">
                                    </div>
                                <?php else: ?>
                                    <p>No Events</p>
                                <?php endif; ?>
                            </div>
                            <div class="d-flex justify-content-between align-items-center mt-3 w-100">
                                <small>Company events and updates</small>
                                <button class="btn btn-primary btn-sm rounded-pill"
                                    data-bs-toggle="modal"
                                    data-bs-target="#eventsModal">
                                    See more
                                </button>
                            </div>
                        </div>

                        <!-- AWARD SLIDE -->
                        <div class="swiper-slide  gutter-1">
                            <div class="row">
                                <?php if (!empty($awards)): ?>
                                    <?php $moment = $awards[0]; ?>
                                    <div class="col-12 ">
                                        <img src="<?= base_url('uploads/moments/' . $moment->image) ?>"
                                            class="img-fluid rounded-3 momentCard w-100"
                                            data-title="<?= $moment->title ?>"
                                            data-date="<?= date('d F Y', strtotime($moment->date)) ?>"
                                            data-description="<?= htmlspecialchars($moment->description) ?>"
                                            data-image="<?= base_url('uploads/moments/' . $moment->image) ?>">
                                    </div>
                                <?php else: ?>
                                    <p>No Awards</p>
                                <?php endif; ?>
                            </div>
                            <div class="d-flex justify-content-between align-items-center mt-3 w-100">
                                <small>Company events and updates</small>
                                <button class="btn btn-primary btn-sm rounded-pill"
                                    data-bs-toggle="modal"
                                    data-bs-target="#awardsModal">
                                    See more
                                </button>
                            </div>
                        </div>

                        <!-- WORKSHOP SLIDE -->
                        <div class="swiper-slide  gutter-1">
                            <div class="row">
                                <?php if (!empty($workshops)): ?>
                                    <?php $moment = $workshops[0]; ?>
                                    <div class="col-12 ">
                                        <img src="<?= base_url('uploads/moments/' . $moment->image) ?>"
                                            class="img-fluid rounded-3 momentCard w-100"
                                            data-title="<?= $moment->title ?>"
                                            data-date="<?= date('d F Y', strtotime($moment->date)) ?>"
                                            data-description="<?= htmlspecialchars($moment->description) ?>"
                                            data-image="<?= base_url('uploads/moments/' . $moment->image) ?>">
                                    </div>
                                <?php else: ?>
                                    <p>No Workshop</p>
                                <?php endif; ?>
                            </div>
                            <div class="d-flex justify-content-between align-items-center mt-3 w-100">
                                <small>Company events and updates</small>
                                <button class="btn btn-primary btn-sm rounded-pill"
                                    data-bs-toggle="modal"
                                    data-bs-target="#workshopsModal">
                                    See more
                                </button>
                            </div>
                        </div>

                    </div>
                </div>


            </div>

        </div>

    </div>

    <div class="container my-4 mt-5">
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

                            <?php if (!empty($leaders)): ?>
                               <?php foreach (array_slice($leaders, 0, 3) as $leader_profile): ?>

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
                                <?php foreach (array_slice($corp, 0, 3) as $row): ?>

                                    <li class="d-flex justify-content-between align-items-center bg-light rounded-3 mb-2">

                                        <small class="text-muted">
                                            <?= date('M, Y', strtotime($row['publish_date'])) ?>
                                        </small>

                                        <span class="small">
                                            <?= html_escape($row['title']) ?>
                                        </span>

                                        <button
                                            class="btn btn-outline-primary btn-sm rounded-pill readMoreBtn1"
                                            data-title="<?= htmlspecialchars($row['title'], ENT_QUOTES) ?>"
                                            data-type="<?= $row['content_type'] ?>"
                                            data-content="<?= htmlspecialchars($row['description'], ENT_QUOTES) ?>"
                                            data-pdf="<?= !empty($row['pdf_file']) ? base_url('uploads/leadershipdesk/' . $row['pdf_file']) : '' ?>">
                                            Read More
                                        </button>

                                    </li>

                                <?php endforeach; ?>
                            <?php else: ?>

                                <li class="text-muted small">No Corporate Communication available</li>

                            <?php endif; ?>
                          <div class="text-center mt-3">
                            <button class="btn btn-primary btn-sm rounded-pill px-4 viewAllBtn"
                                data-type="corp">
                                View all announcements
                            </button>
                            </div>
                        </ul>



                        <!-- Notice -->
                        <ul class="list-unstyled tab-content startbox" id="notice">

                            <?php if (!empty($notice)): ?>
                                    <?php foreach (array_slice($notice, 0, 3) as $row): ?>

                                    <li class="d-flex justify-content-between align-items-center bg-light rounded-3  mb-2">

                                        <small class="text-muted">
                                            <?= date('M, Y', strtotime($row['publish_date'])) ?>
                                        </small>

                                        <span class="small">
                                            <?= html_escape($row['title']) ?>
                                        </span>

                                        <button
                                            class="btn btn-outline-primary btn-sm rounded-pill readMoreBtn1"

                                            data-title="<?= htmlspecialchars($row['title']) ?>"
                                            data-type="<?= $row['content_type'] ?>"
                                            data-content="<?= htmlspecialchars($row['description']) ?>"
                                            data-pdf="<?= !empty($row['pdf_file']) ? base_url('uploads/leadershipdesk/' . $row['pdf_file']) : '' ?>">
                                            Read More
                                        </button>
                                    </li>

                                <?php endforeach; ?>
                            <?php else: ?>

                                <li class="text-muted small">No Notice available</li>

                            <?php endif; ?>
                            <div class="text-center mt-3">
                                <button class="btn btn-primary btn-sm rounded-pill px-4 viewAllBtn"
                                        data-type="notice">
                                        View all announcements
                                    </button>
                            </div>
                        </ul>



                        <!-- Welcome -->
                        <ul class="list-unstyled tab-content startbox" id="welcome">

                            <?php if (!empty($welcome)): ?>
                              <?php foreach (array_slice($welcome, 0, 3) as $row): ?>

                                    <li class="d-flex justify-content-between align-items-center bg-light rounded-3 mb-2">

                                        <small class="text-muted">
                                            <?= date('M, Y', strtotime($row['publish_date'])) ?>
                                        </small>

                                        <span class="small">
                                            <?= html_escape($row['title']) ?>
                                        </span>

                                        <button
                                            class="btn btn-outline-primary btn-sm rounded-pill readMoreBtn1"

                                            data-title="<?= htmlspecialchars($row['title']) ?>"
                                            data-type="<?= $row['content_type'] ?>"
                                            data-content="<?= htmlspecialchars($row['description']) ?>"
                                            data-pdf="<?= !empty($row['pdf_file']) ? base_url('uploads/leadershipdesk/' . $row['pdf_file']) : '' ?>">
                                            Read More
                                        </button>

                                    </li>

                                <?php endforeach; ?>
                            <?php else: ?>

                                <li class="text-muted small">No Welcome posts available</li>

                            <?php endif; ?>
                           <div class="text-center mt-3">
                            <button class="btn btn-primary btn-sm rounded-pill px-4 viewAllBtn"
                                    data-type="welcome">
                                    View all announcements
                                </button>
                            </div>  

                        </ul>

                    </div>

                    <!-- <div class="text-center mt-3">
                        <button class="btn btn-primary btn-sm rounded-pill px-4">
                            View all announcements
                        </button>
                    </div> -->


                </div>



                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h6 class="fw-semibold mb-0">Employee Directory</h6>
                </div>
                <div class="card border-0 shadow-sm rounded-4 p-4">
                    <div class="swipers today-searcha">
                        <div class="swiper-wrappers swiper-wrapper-slide1s">

                            <div class="swiper-slides">
                                <div class="text-center flxedblok">
                                          <input type="text" id="employeeSearch"
                                    class="form-control rounded-pill "
                                    placeholder="Type in to search .."
                                    onkeyup="searchEmployee()">
                                    <button onclick="searchEmployee()" class="btn btn-primary btn-sm rounded-pill px-4 mb-3">
                                        <img src="/satvik/assets/images/search.png">
                                    </button>
                                </div>

                                <div class="bg-light rounded-3 p-4 text-muted" id="searchResult">

                                    <div id="noEmployeeMsg" style="display:none;" class="text-center">
                                        No matching employee found
                                    </div>

                                    <?php if (!empty($employees)): ?>
                                        <?php foreach ($employees as $emp): ?>

                                            <div class="employee-item mb-2" style="display:none;">

                                                    <img src="<?= base_url('uploads/employee/' . $emp['employee_image']) ?>"
                                                    class="rounded-circle me-2"
                                                    width="40" height="40">

                                                <strong><?= $emp['salutation'] . ' ' . $emp['full_name']; ?></strong><br>

                                                <small><?= $emp['designation']; ?> | <?= $emp['department']; ?></small>
                                                <small>
                                                    Code: <?= $emp['employee_code']; ?> |
                                                    Location: <?= $emp['location_name']; ?> |
                                                    Email: <?= $emp['email']; ?> |
                                                    Phone: <?= $emp['phone']; ?>
                                                </small>
                                            </div>

                                        <?php endforeach; ?>
                                    <?php endif; ?>

                                </div>

                            </div>
                        </div>

                    </div>
                </div>
                


                <?php
                $sopGrouped = [];
                $techGrouped = [];

                // Group SOPs by category
                if (!empty($sops)) {
                    foreach ($sops as $item) {
                        $cat = $item['category'] ?? 'General';
                        $sopGrouped[$cat][] = $item;
                    }
                }

                // Group Technical Docs by category
                if (!empty($technical_docs)) {
                    foreach ($technical_docs as $item) {
                        $cat = $item['category'] ?? 'General';
                        $techGrouped[$cat][] = $item;
                    }
                }
                ?>
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

            <div class="col-lg-4 mt-0" >
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h6 class="fw-semibold mb-0">My Apps</h6>
                    <div class="swiper-pagination today-leaderships"></div>
                </div>

                <!-- My Apps -->
                <div class="card border-0 shadow-sm rounded-4 p-4 mb-4 mt-3">

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
                    <h6 class="fw-semibold mb-0 mt-0">Policy & Procedures</h6>
                    <div class="swiper-pagination today-leaderships"></div>
                </div>
                 <div class="card border-0 shadow-sm rounded-4 p-4 mb-4 mt-3">

                   <div class="d-flex flex-column gap-3">
        
                <?php if (!empty($policies)): ?>
        
                    <?php foreach ($policies as $category => $items): ?>
        
                        <!-- Category Card -->
                        <div class="border rounded-3 p-3">
        
                            <!-- Header -->
                            <div class="d-flex justify-content-between align-items-center mb-2">
                                <h6 class="fw-semibold mb-0"><?= $category ?></h6>
                                <span class="badge bg-primary"><?= count($items) ?></span>
                            </div>
        
                            <!-- Scrollable Content -->
                            <div class="scroll-box">
        
                                <?php foreach ($items as $policy): ?>
        
                                    <div class="d-flex justify-content-between align-items-center mb-2 procedures">
        
                                        <span class="small">
                                            <?= $policy['title'] ?>
                                        </span>
        
                                        <button
                                            class="btn btn-outline-primary btn-sm rounded-pill readMoreBtn"
                                            data-title="<?= htmlspecialchars($policy['title'], ENT_QUOTES) ?>"
                                            data-type="<?= $policy['content_type'] ?>"
                                            data-content="<?= htmlspecialchars($policy['description'], ENT_QUOTES) ?>"
                                            data-pdf="<?= !empty($policy['pdf_file']) ? base_url('uploads/policy/' . $policy['pdf_file']) : '' ?>">
                                            Read More
                                        </button>
        
                                    </div>
        
                                <?php endforeach; ?>
        
                            </div>
        
                        </div>
        
                    <?php endforeach; ?>
        
                <?php endif; ?>
        
            </div>
        
                </div>

                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h6 class="fw-semibold mb-0">Learning Never Stops At Saatvik</h6>
                    <div class="swiper-pagination today-leaderships"></div>
                </div>
                <div class="card border-0 shadow-sm rounded-4 p-4 mb-4 mt-3">
                     <div class="bg-lightc rounded-3 h-100">
    
                        <button class="btn btn-dark btn-sm w-100 bgbtn mb-3">
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

                    <div class="bg-lightl rounded-3 h-100 mt-4">

                        <button class="btn btn-dark btn-sm w-100 bgbtn mb-3">
                            Learning Material
                        </button>

                        <div class="accordion" id="learningAccordion">

                            <?php // print_r($learning); die;
                            ?>

                            <?php if (!empty($learning)): ?>

                                <?php foreach (array_slice($learning, 0, 3) as $key => $item): ?>

                                    <div class="accordion-item">

                                        <h2 class="accordion-header" id="heading<?= $item['id']; ?>">

                                            <button class="accordion-button <?= $key != 0 ? : '' ?>"
                                                type="button"
                                                data-bs-toggle="collapse"
                                                data-bs-target="#collapse<?= $item['id']; ?>"
                                                aria-expanded="<?= $key == 0 ? 'true' : ''; ?>">

                                                <?= $item['question']; ?>

                                            </button>

                                        </h2>

                                        <div id="collapse<?= $item['id']; ?>"
                                            class="accordion-collapse collapse <?= $key == 0 ? : ''; ?>"
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
                           <button class="btn btn-primary btn-sm rounded-pill px-4"
                                data-bs-toggle="modal"
                                data-bs-target="#learningModal">
                                Learn more
                            </button>
                        </div>

                    </div>

                    <div class="bg-lightq rounded-3 h-100 mt-3">
                        <button class="btn btn-dark btn-sm w-100 bgbtn mb-3">
                            Quiz of the Week
                        </button>

                        <?php if (!empty($quiz)): ?>
                            <?php $q_index = 0; ?>
                            <?php foreach ($quiz as $q): ?>
                                <div class="quiz-card mb-4" data-index="<?= $q_index ?>">
                                    <!-- Question -->
                                    <p class="fw-semibold small mb-2 qubox"><?= $q['question'] ?></p>

                                   <div class="asnbox">
                                        <?php foreach ($q['options'] as $key => $value): ?>
                                            <?php if (!empty($value)): ?>
                                                
                                                <label class="option-box">
                                                    <input type="radio"
                                                        name="answer_<?= $q_index ?>"
                                                        id="option_<?= $q_index ?>_<?= $key ?>"
                                                        value="<?= strtoupper($key) ?>">
                                    
                                                    <span class="option-label">
                                                        <?= strtoupper($key) ?>
                                                    </span>
                                    
                                                    <span class="option-text">
                                                        <?= $value ?>
                                                    </span>
                                                </label>
                                    
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
    <?php
    $townhall = array_filter($news, fn($n) => ($n['content_type'] ?? '') == 'townhall');
    $plant    = array_filter($news, fn($n) => ($n['content_type'] ?? '') == 'plant_meeting');
    $csr      = array_filter($news, fn($n) => ($n['content_type'] ?? '') == 'csr');
    $awr   = array_filter($news, fn($n) => ($n['content_type'] ?? '') == 'awards');
    ?>
    <!-- News & Events -->
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h6 class="fw-semibold mb-0">
            News & Events - <span id="newsTitle">Townhalls</span>
        </h6>
        <div class="swiper-pagination today-news"></div>
    </div>
    <div class="card border-0 shadow-sm rounded-3 p-4">
        <div class="swiper news-swiper">
            <div class="swiper-wrapper">

                <div class="swiper-slide">
                    <div class="row">
                        <?php foreach (array_slice($townhall, 0, 3) as $item): ?>
                            <div class="col-4 mb-3">

                                <img src="<?= $item['image'] ?>"
                                    class="img-fluid rounded-3 newsCard"
                                    data-title="<?= $item['title'] ?>"
                                    data-date="<?= $item['event_date'] ?>"
                                    data-description="<?= htmlspecialchars($item['description']) ?>"
                                    data-image="<?= $item['image'] ?>">

                                <h6 class="small mt-1"><?= $item['title'] ?></h6>
                                <small class="text-muted">
                                    <?= !empty($item['event_date']) 
                                        ? date('F Y', strtotime($item['event_date'])) 
                                        : '-' ?>
                                </small>
                                <div class="d-flex justify-content-between align-items-center mt-3">
                

                <div class="d-flex gap-2">
                   <button class="btn btn-primary btn-sm rounded-pill" id="newsSeeMore">
                        See More
                    </button>
                </div>
            </div>

                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>

                <div class="swiper-slide">
                    <div class="row">
                       <?php foreach (array_slice($plant, 0, 3) as $item): ?>
                            <div class="col-4 mb-3">

                                <img src="<?= $item['image'] ?>" class="img-fluid rounded-3 newsCard"
                                    data-title="<?= $item['title'] ?>"
                                    data-date="<?= $item['event_date'] ?>"
                                    data-description="<?= htmlspecialchars($item['description']) ?>"
                                    data-image="<?= $item['image'] ?>">

                                <h6 class="small mt-1"><?= $item['title'] ?></h6>
                                <small class="text-muted">
                                    <?= !empty($item['event_date']) 
                                        ? date('F Y', strtotime($item['event_date'])) 
                                        : '-' ?>
                                </small>
                                 <div class="d-flex justify-content-between align-items-center mt-3">
                

                <div class="d-flex gap-2">
                   <button class="btn btn-primary btn-sm rounded-pill" id="newsSeeMore">
                        See More
                    </button>
                </div>
            </div>

                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>

                <div class="swiper-slide">
                    <div class="row">
                     <?php foreach (array_slice($csr, 0, 3) as $item): ?>
                            <div class="col-4 mb-3">

                                <img src="<?= $item['image'] ?>" class="img-fluid rounded-3 newsCard"
                                    data-title="<?= $item['title'] ?>"
                                    data-date="<?= $item['event_date'] ?>"
                                    data-description="<?= htmlspecialchars($item['description']) ?>"
                                    data-image="<?= $item['image'] ?>">

                                <h6 class="small mt-1"><?= $item['title'] ?></h6>
                                <small class="text-muted">
                                    <?= !empty($item['event_date']) 
                                        ? date('F Y', strtotime($item['event_date'])) 
                                        : '-' ?>
                                </small>
                                 <div class="d-flex justify-content-between align-items-center mt-3">
                

                <div class="d-flex gap-2">
                   <button class="btn btn-primary btn-sm rounded-pill" id="newsSeeMore">
                        See More
                    </button>
                </div>
            </div>

                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>

                <!-- Awards -->
                <div class="swiper-slide">
                    <div class="row">
                       <?php foreach (array_slice($awr, 0, 3) as $item): ?>
                            <div class="col-4 mb-3">

                                <img src="<?= $item['image'] ?>" class="img-fluid rounded-3 newsCard"
                                    data-title="<?= $item['title'] ?>"
                                    data-date="<?= $item['event_date'] ?>"
                                    data-description="<?= htmlspecialchars($item['description']) ?>"
                                    data-image="<?= $item['image'] ?>">

                                <h6 class="small mt-1"><?= $item['title'] ?></h6>
                                <small class="text-muted">
                                    <?= !empty($item['event_date']) 
                                        ? date('F Y', strtotime($item['event_date'])) 
                                        : '-' ?>
                                </small>
                                 <div class="d-flex justify-content-between align-items-center mt-3">
                

                <div class="d-flex gap-2">
                   <button class="btn btn-primary btn-sm rounded-pill" id="newsSeeMore">
                        See More
                    </button>
                </div>
            </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>

            </div>

            <!-- Pagination bullets -->
            <div class="d-flex justify-content-between align-items-center mt-3 d-none">
                <small class="text-muted" id="newsDesc">
                    Company Townhall updates
                </small>

                <div class="d-flex gap-2">
                   <button class="btn btn-primary btn-sm rounded-pill"
                        id="newsSeeMore"
                        data-type="townhall">
                        See More
                    </button>
                </div>
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

                <!-- Description -->
                <div id="policyDescription" style="display:none;"></div>

                <!-- PDF -->
                <iframe
                    id="policyPdf"
                    src=""
                    width="100%"
                    height="650px"
                    style="border:none; display:none;">
                </iframe>

            </div>

        </div>
    </div>
</div>

<!-- modal for moments-->

<div class="modal fade" id="momentModal" tabindex="-1">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content rounded-4">

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

<!-- //model for sliders celebration -->
<div class="modal fade" id="peopleModal" tabindex="-1">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content rounded-4">

            <div class="modal-header">
                <h5 class="modal-title" id="modalTitle">Title</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <div class="modal-body">
                <div class="row text-center" id="modalContent">
                    <!-- dynamic content -->
                </div>
            </div>

        </div>
    </div>
</div>

<!--modal for b,day-->
<div class="modal fade" id="birthdayModal" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content text-center rounded-4 p-4 position-relative">

            <button type="button" class="btn-close position-absolute end-0 top-0 m-3" data-bs-dismiss="modal"></button>

            <!-- Dynamic Title -->
            <h4 class="fw-semibold mb-2" id="birthdayTitle">Happy Birthday</h4>
            <!-- Optional Subtitle/Message -->
            <small class="text-muted mb-3" id="birthdayMessage">Wishing you a wonderful day!</small>

            <img id="birthdayImage" src="" class="rounded-3 mb-3" width="180">

            <h6 class="fw-semibold mb-0" id="birthdayName"></h6>
            <small class="text-muted" id="birthdayDate"></small>
        </div>
    </div>
</div>


<div class="modal fade" id="anniversaryModal" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content text-center rounded-4 p-4 position-relative">

            <button type="button" class="btn-close position-absolute end-0 top-0 m-3" data-bs-dismiss="modal"></button>

            <!-- Dynamic Title -->
            <h4 class="fw-semibold mb-2" id="anniversaryTitle">Happy Anniversary</h4>
            <small class="text-muted mb-3" id="anniversaryMessage">Celebrating your milestones together!</small>

            <img id="anniversaryImage" src="" class="rounded-3 mb-3" width="180">

            <h6 class="fw-semibold mb-0" id="anniversaryName"></h6>
            <small class="text-muted" id="anniversaryDate"></small>
        </div>
    </div>
</div>


<div class="modal fade" id="joiningModal" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content text-center rounded-4 p-4 position-relative">

            <button type="button" class="btn-close position-absolute end-0 top-0 m-3" data-bs-dismiss="modal"></button>

            <!-- Dynamic Title -->
            <h4 class="fw-semibold mb-2" id="joiningTitle">Welcome to the Team!</h4>
            <small class="text-muted mb-3" id="joiningMessage">We are excited to have you with us!</small>

            <img id="joiningImage" src="" class="rounded-3 mb-3" width="180">

            <h6 class="fw-semibold mb-0" id="joiningName"></h6>
            <small class="text-muted" id="joiningDate"></small>
        </div>
    </div>
</div>


<!-- //departmentalinfo modal -->
<div class="modal fade" id="docModal" tabindex="-1">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content rounded-4">

            <div class="modal-header">
                <h5 class="modal-title" id="docTitle"></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <div class="modal-body">
                <p id="docDesc" class="text-muted"></p>

                <div id="docLinkBox"></div>
            </div>

        </div>
    </div>
</div>

<!-- modal for events -->

<div class="modal fade" id="eventsModal" tabindex="-1">
    <div class="modal-dialog modal-lg modal-dialog-scrollable">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title">All Events</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <div class="modal-body">

                <?php foreach ($events as $event): ?>
                    <div class="mb-3 border-bottom pb-2">
                        <h6><?= $event->title ?></h6>
                        <small><?= date('d F Y', strtotime($event->date)) ?></small>
                        <img src="<?= base_url('uploads/moments/' . $event->image) ?>"
                            class="img-fluid rounded mb-2">
                        <p><?= $event->description ?></p>
                    </div>
                <?php endforeach; ?>

            </div>

        </div>
    </div>
</div>



<!-- AWARDS MODAL -->
<div class="modal fade" id="awardsModal" tabindex="-1">
    <div class="modal-dialog modal-lg modal-dialog-scrollable">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title">All Awards</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <div class="modal-body">

                <?php foreach ($awards as $award): ?>
                    <div class="mb-3 border-bottom pb-2">
                        <h6><?= $award->title ?></h6>
                        <small><?= date('d F Y', strtotime($award->date)) ?></small>
                        <img src="<?= base_url('uploads/moments/' . $award->image) ?>"
                            class="img-fluid rounded mb-2">
                        <p><?= $award->description ?></p>
                    </div>
                <?php endforeach; ?>

            </div>

        </div>
    </div>
</div>

<!-- WORKSHOPS MODAL -->
<div class="modal fade" id="workshopsModal" tabindex="-1">
    <div class="modal-dialog modal-lg modal-dialog-scrollable">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title">All Workshops</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <div class="modal-body">

                <?php foreach ($workshops as $workshop): ?>
                    <div class="mb-3 border-bottom pb-2">
                        <img src="<?= base_url('uploads/moments/' . $workshop->image) ?>"
                            class="img-fluid rounded mb-2">

                        <h6><?= $workshop->title ?></h6>
                        <small><?= date('d F Y', strtotime($workshop->date)) ?></small>
                        <img src="<?= base_url('uploads/moments/' . $workshop->image) ?>"
                            class="img-fluid rounded mb-2">
                        <p><?= $workshop->description ?></p>
                    </div>
                <?php endforeach; ?>

            </div>

        </div>
    </div>
</div>

<!-- 
//news event mb_encoding_aliases -->
<div class="modal fade" id="newsModal" tabindex="-1">
  <div class="modal-dialog modal-lg modal-dialog-scrollable">
    <div class="modal-content">

      <div class="modal-header">
        <h5 class="modal-title" id="newsModalTitle">All Items</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>

      <div class="modal-body" id="newsModalBody">
        <!-- dynamic content -->
      </div>

    </div>
  </div>
</div>


<!-- learning modal -->

<div class="modal fade" id="learningModal" tabindex="-1">
  <div class="modal-dialog modal-lg modal-dialog-scrollable">
    <div class="modal-content">

      <div class="modal-header">
        <h5 class="modal-title">All Learning Material</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>

      <div class="modal-body">

        <?php if (!empty($learning)): ?>
            <?php foreach ($learning as $item): ?>

                <div class="mb-3 border-bottom pb-2">

                    <h6><?= $item['question']; ?></h6>

                    <p><?= $item['answer']; ?></p>

                </div>

            <?php endforeach; ?>
        <?php else: ?>
            <p>No learning material available</p>
        <?php endif; ?>

      </div>

    </div>
  </div>
</div>

<!-- leadership modal -->
 <div class="modal fade" id="leadershipModal" tabindex="-1">
  <div class="modal-dialog modal-lg modal-dialog-scrollable">
    <div class="modal-content">

      <div class="modal-header">
        <h5 class="modal-title" id="leadershipModalTitle">All Announcements</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>

      <div class="modal-body" id="leadershipModalBody">
        <!-- dynamic content -->
      </div>

    </div>
  </div>
</div>

<!--modal for read more at leadeership-->
<div class="modal fade" id="commonModal" tabindex="-1">
  <div class="modal-dialog modal-lg modal-dialog-centered">
    <div class="modal-content">

      <div class="modal-header border-bottom">
        <h5 class="modal-title fw-semibold fs-5" id="commonModalTitle"></h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>

      <div class="modal-body">

        <div id="modalDescription" style="display:none;"></div>

        <iframe 
          id="modalPdf" 
          src="" 
          width="100%" 
          height="500px" 
          style="display:none; border:none;">
        </iframe>

      </div>

    </div>
  </div>
</div>


<!-- modal for trainig calender -->
<div class="modal fade" id="trainingModal" tabindex="-1">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title">Training Details</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <!-- ADD THIS CLASS -->
            <div class="modal-body modal-scroll" id="trainingModalBody"></div>

        </div>
    </div>
</div>


<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script>
    $(document).on("click", ".readMoreBtn", function() {
    
        var title = $(this).attr("data-title");
        var type = $(this).attr("data-type");
        var content = $(this).attr("data-content");
        var pdf = $(this).attr("data-pdf");
    
        $("#policyTitle").text(title);
    
        if(type === "description") {
            $("#policyDescription").html(content).show();
            $("#policyPdf").hide().attr("src", "");
        } 
        else if(type === "pdf") {
            $("#policyPdf").attr("src", pdf + "#toolbar=0&navpanes=0&scrollbar=0").show();
            $("#policyDescription").hide().html("");
        }
    
        $("#policyModal").modal("show");
    });
    
    $("#policyModal").on("hidden.bs.modal", function () {
        $("#policyPdf").attr("src", "");
        $("#policyDescription").html("");
    });
    

$(document).on("click", ".readMoreBtn1", function() {

    var title = $(this).attr("data-title");
    var type = $(this).attr("data-type");
    var content = $(this).attr("data-content");
    var pdf = $(this).attr("data-pdf");

    $("#commonModal").modal("show");

    setTimeout(() => {

        $("#commonModalTitle").text(title);

        if(type === "description") {

            var decodedContent = $("<textarea/>").html(content).text();
            $("#modalDescription").html(decodedContent).show();
            $("#modalPdf").hide().attr("src", "");

        } 
        else if(type === "pdf") {

           $("#modalPdf").attr("src", pdf + "#toolbar=0&navpanes=0&scrollbar=0").show();
            $("#modalDescription").hide().html("");

        }

    }, 100);
});


 


$(document).on("click", ".momentCard, .newsCard, #newsSeeMore", function () {

    let element = $(this);
    if ($(this).attr("id") === "newsSeeMore") {
        element = $(this).closest(".card, .news-item, .col").find(".newsCard");
    }
    var title = element.data("title");
    var date = element.data("date");
    var description = element.data("description");
    var image = element.data("image");

    $("#momentTitle").text(title);
    $("#momentDate").text(date);
    $("#momentDescription").html(description);
    $("#momentImage").attr("src", image);

    var modal = new bootstrap.Modal(document.getElementById('momentModal'));
    modal.show();
});


    // console.log("SCRIPT LOADED");
    const birthdayData = <?= json_encode($birthdays); ?>;
    const anniversaryData = <?= json_encode($anniversaries); ?>;
    const joiningData = <?= json_encode($joinings); ?>;


  document.addEventListener('click', function (e) {

    const btn = e.target.closest('.see-more-btn');
    if (!btn) return;

    let type = btn.dataset.type;

    let select = document.querySelector(`.month-filter[data-type="${type}"]`);
    let month = select ? select.value : new Date().getMonth() + 1;

    fetch(`<?= base_url('Home_controller') ?>?type=${type}&month=${month}`)
        .then(res => res.text())   // IMPORTANT FIX
        .then(text => {

            console.log("RAW:", text);

            let data = JSON.parse(text); // safe parsing

            let title = type === 'birthday'
                ? 'Birthday List'
                : type === 'anniversary'
                ? 'Anniversary List'
                : 'New Joiners';

            document.getElementById('modalTitle').innerText = title;

            let html = '';

            data.forEach(item => {

                let date = item.date
                    ? new Date(item.date).toLocaleDateString('en-US', {
                        month: 'short',
                        day: '2-digit'
                    })
                    : '';

                html += `
                    <div class="col-4 text-center mb-3">
                        <img src="${item.image}" width="90" class="rounded mb-2">
                        <div>${item.name}</div>
                        <small>${date}</small>
                    </div>
                `;
            });

            document.getElementById('modalContent').innerHTML = html;

            bootstrap.Modal.getOrCreateInstance(
                document.getElementById('peopleModal')
            ).show();
        })
        .catch(err => {
            console.error("FAILED:", err);
        });
});


    document.querySelectorAll('.month-filter').forEach(dropdown => {
        dropdown.addEventListener('change', function() {
            let month = this.value; // selected month
            let type = this.getAttribute('data-type'); // section type
            let slide = this.closest('.swiper-slide'); // current slide
            let container = slide.querySelector('.row'); // where cards are

            // Optional: show loading
            container.innerHTML = '<p>Loading...</p>';

            // Fetch filtered data from backend
            fetch(`<?= base_url('home_controller'); ?>?type=${type}&month=${month}`)
                .then(response => response.json())
               .then(data => {

                        let html = '';

                        data.slice(0, 3).forEach(item => {  
                            
                           let date = item.date
                            ? new Date(item.date).toLocaleDateString('en-US', {
                                month: 'short',
                                day: '2-digit'
                            })
                            : '';                            

                            html += `
                                <div class="col-4 birthday-card">
                                    <img src="${item.image}">
                                    <h6>${item.name}</h6>
                                    <p>${date}</p>
                                </div>
                            `;
                        });

                        container.innerHTML = html;
                    })
                .catch(err => {
                    container.innerHTML = '<p>Error loading data</p>';
                    console.error(err);
                });
        });
    });




    // Birthday Modal
    document.querySelectorAll('.birthday-card[data-bs-target="#birthdayModal"]').forEach(card => {
        card.addEventListener('click', function() {
            document.getElementById('birthdayTitle').innerText = "Happy Birthday";
            document.getElementById('birthdayMessage').innerText = "Wishing you a wonderful day!";
            document.getElementById('birthdayName').innerText = this.dataset.name;
            document.getElementById('birthdayImage').src = this.dataset.image;
            document.getElementById('birthdayDate').innerText = this.dataset.date;
        });
    });

    // Anniversary Modal
    document.querySelectorAll('.birthday-card[data-bs-target="#anniversaryModal"]').forEach(card => {
        card.addEventListener('click', function() {
            document.getElementById('anniversaryTitle').innerText = "Happy Anniversary";
            document.getElementById('anniversaryMessage').innerText = "Celebrating your milestones together!";
            document.getElementById('anniversaryName').innerText = this.dataset.name;
            document.getElementById('anniversaryImage').src = this.dataset.image;
            document.getElementById('anniversaryDate').innerText = this.dataset.date;
        });
    });

    // Joining Modal
    document.querySelectorAll('.birthday-card[data-bs-target="#joiningModal"]').forEach(card => {
        card.addEventListener('click', function() {
            document.getElementById('joiningTitle').innerText = "Welcome to the Team!";
            document.getElementById('joiningMessage').innerText = "We are excited to have you with us!";
            document.getElementById('joiningName').innerText = this.dataset.name;
            document.getElementById('joiningImage').src = this.dataset.image;
            document.getElementById('joiningDate').innerText = this.dataset.date;
        });
    });


    $(document).on("click", ".docBtn", function() {

        let title = $(this).data("title");
        let desc = $(this).data("description");
        let link = $(this).data("link");

        $("#docTitle").text(title);
        $("#docDesc").html(desc || 'No description available');

        if (link) {
            $("#docLinkBox").html(`
            <a href="${link}" target="_blank"
               class="btn btn-primary btn-sm rounded-pill">
               Open Document
            </a>
        `);
        } else {
            $("#docLinkBox").html(`<p class="text-muted small">No document link available</p>`);
        }

        let modal = new bootstrap.Modal(document.getElementById('docModal'));
        modal.show();
    });


    

    


    document.getElementById("newsSeeMore").addEventListener("click", function () {

    let type = this.getAttribute("data-type");
    let items = newsData[type];

    let titleMap = {
        townhall: "Townhalls",
        plant_meeting: "Plant Meetings",
        csr: "CSR Activities",
        awards: "Awards"
    };

    document.getElementById("newsModalTitle").innerText = "All " + titleMap[type];

    let html = "";

    if (items.length === 0) {
        html = "<p>No data available</p>";
    } else {
        items.forEach(item => {
            html += `
                <h6>${item.title}</h6>
                <div class="mb-3 border-bottom pb-2">
                    <small>
                        ${item.event_date 
                            ? new Date(item.event_date).toLocaleDateString('en-GB', {
                                day: '2-digit',
                                month: 'long',
                                year: 'numeric'
                              }) 
                            : '-'}
                    </small>

                    <img src="${item.image}" class="img-fluid rounded mb-2">

                    <p>${item.description ?? ''}</p>
                </div>
            `;
        });
    }

    document.getElementById("newsModalBody").innerHTML = html;

    new bootstrap.Modal(document.getElementById("newsModal")).show();
});



document.addEventListener("DOMContentLoaded", function () {

    const BASE_URL = "<?= base_url(); ?>";

    document.querySelectorAll(".viewAllBtn").forEach(btn => {
        btn.addEventListener("click", function () {

            let type = this.getAttribute("data-type");
            let data = leadershipData[type];

            let titleMap = {
                corp: "Corporate Communication",
                notice: "Notice & Circulars",
                welcome: "New Joinee Welcome"
            };

            document.getElementById("leadershipModalTitle").innerText =
                titleMap[type] || "Details";

            let html = "";

            if (!data || data.length === 0) {
                html = "<p class='text-muted'>No data available</p>";
            } else {

                data.forEach(item => {
                    html += `
                        <div class="border-bottom pb-2 mb-3">

                            <div class="d-flex justify-content-between">
                                <small class="text-muted">
                                    ${item.publish_date ? new Date(item.publish_date).toLocaleDateString() : ''}
                                </small>

                                <strong>${item.title ?? ''}</strong>
                            </div>

                            ${item.content_type === 'description' && item.description
                                ? `<p class="small mt-2">${item.description}</p>`
                                : ''
                            }

                            ${item.content_type === 'pdf' && item.pdf_file
                                ? `<a href="${BASE_URL}uploads/leadershipdesk/${item.pdf_file}"
                                      target="_blank"
                                      class="btn btn-sm btn-outline-primary mt-2">
                                    View PDF
                                   </a>`
                                : ''
                            }

                        </div>
                    `;
                });
            }

            document.getElementById("leadershipModalBody").innerHTML = html;

            new bootstrap.Modal(document.getElementById("leadershipModal")).show();
        });
    });

});
</script>
<script>
    const newsData = {
        townhall: <?= json_encode(array_values($townhall)) ?>,
        plant_meeting: <?= json_encode(array_values($plant)) ?>,
        csr: <?= json_encode(array_values($csr)) ?>,
        awards: <?= json_encode(array_values($awr)) ?>
    };

</script>
<script>
    const leadershipData = {
        corp: <?= json_encode($corp) ?>,
        notice: <?= json_encode($notice) ?>,
        welcome: <?= json_encode($welcome) ?>
    };
    $(document).on("change", ".option-box input", function () {
    let name = $(this).attr("name");

    // same question ke options reset karo
    $("input[name='" + name + "']").closest(".option-box").removeClass("active");

    // selected pe active add karo
    $(this).closest(".option-box").addClass("active");
});
</script>





<script>
let trainingData = <?= json_encode($trainings); ?>;
</script>

<!-- CALENDAR SCRIPT -->
<script>
let currentDate = new Date();

function renderCalendar(month, year) {

    const daysContainer = document.getElementById("calendarDays");
    daysContainer.innerHTML = "";

    const firstDay = new Date(year, month).getDay();
    const totalDays = new Date(year, month + 1, 0).getDate();

    document.getElementById("monthName").innerText =
        new Date(year, month).toLocaleString('default', { month: 'long' });

    document.getElementById("year").innerText = year;

    // Empty slots
    for (let i = 0; i < firstDay; i++) {
        daysContainer.innerHTML += `<div></div>`;
    }

    for (let day = 1; day <= totalDays; day++) {

        let dateStr = `${year}-${String(month+1).padStart(2,'0')}-${String(day).padStart(2,'0')}`;

        let items = trainingData.filter(t => t.training_date === dateStr);

        let isMarked = items.length ? 'marked' : '';

        daysContainer.innerHTML += `
            <div class="day ${isMarked}" onclick="showTraining('${dateStr}')">
                ${day}
            </div>
        `;
    }
}

function showTraining(date) {

    let items = trainingData.filter(t => t.training_date === date);

    if(items.length === 0) return;

    let html = '';

    items.forEach(item => {
        html += `
            <div class="mb-4 border-bottom pb-3">
                <h5 class="fw-bold">${item.title}</h5>

                ${item.image ? 
                    `<img src="<?= base_url('uploads/training/') ?>${item.image}" 
                          class="img-fluid rounded mb-2">` : ''}

                <p>${item.description ?? ''}</p>
            </div>
        `;
    });

    document.getElementById("trainingModalBody").innerHTML = html;

    new bootstrap.Modal(document.getElementById('trainingModal')).show();
}

// Navigation
document.getElementById("prevMonth").onclick = function () {
    currentDate.setMonth(currentDate.getMonth() - 1);
    renderCalendar(currentDate.getMonth(), currentDate.getFullYear());
};

document.getElementById("nextMonth").onclick = function () {
    currentDate.setMonth(currentDate.getMonth() + 1);
    renderCalendar(currentDate.getMonth(), currentDate.getFullYear());
};

// INIT
renderCalendar(currentDate.getMonth(), currentDate.getFullYear());
</script>

