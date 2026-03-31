<!-- Hero Section -->
<div class="hero">
    <h1>Your workplace. Your updates. Your access point.</h1>
    <p>
        Everything you need at Saatvik - people, information, tools and culture - in one place
    </p>
</div>


<div class="greeting-banner">
    <h1>Hi Himanshu, Have an amazing day at work.</h1>
</div>


<div class="container my-5 cardctm">
    <div class="row g-4">

        <!-- 🎂 Happy Birthday Slider -->
        <div class="col-lg-6">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <h5 class="fw-semibold mb-0">Happy Birthday To You</h5>
                <div class="swiper-pagination birthday-pagination"></div>
            </div>

            <div class="card border-0 shadow-sm rounded-4 p-3 cardctmbox">
                <div class="swiper birthday-swiper">
                    <!-- <div class="swiper-wrapper text-center" id="birthday-wrapper">

                    </div> -->

                    <div class="swiper-wrapper text-center">

                        <?php if (!empty($birthdays)): ?>
                            <?php foreach ($birthdays as $item): ?>

                                <div class="swiper-slide">

                                    <img src="<?= $item['image']; ?>" class="rounded-3 mb-2">

                                    <h6 class="mb-0 fw-semibold">
                                        <?= $item['name']; ?>
                                    </h6>

                                    <small class="text-muted">
                                        <?= date('d M', strtotime($item['date_of_birth'])); ?>
                                    </small>

                                </div>

                            <?php endforeach; ?>
                        <?php endif; ?>

                    </div>
                </div>

                <div class="d-flex justify-content-between align-items-center mt-3">
                    <small class="text-muted">Celebrating our people, every day.</small>
                    <div class="d-flex gap-2 btngps">
                        <button class="btn btn-primary btn-sm rounded-pill">See more</button>
                        <button class="btn btn-outline-primary btn-sm rounded-pill">Jan, 2026</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- 📸 Today at Saatvik Slider -->
        <div class="col-lg-6">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <h5 class="fw-semibold mb-0">Today at Saatvik</h5>
                <div class="swiper-pagination today-pagination"></div>
            </div>


            <div class="card border-0 shadow-sm rounded-4 p-3">

                <div class="swiper today-swiper">
                    <div class="swiper-wrapper">

                        <?php if (!empty($moments)): ?>
                            <?php foreach ($moments as $moment): ?>
                                <div class="swiper-slide">
                                    <img src="<?= !empty($moment->image) ? base_url('uploads/moments/' . $moment->image) : 'https://placehold.co/600x200' ?>"
                                        class="rounded-3 img-fluid w-100">
                                </div>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <div class="swiper-slide">
                                <img src="https://placehold.co/600x200"
                                    class="rounded-3 img-fluid w-100">
                            </div>
                        <?php endif; ?>

                    </div>
                </div>

                <div class="d-flex justify-content-between align-items-center mt-3">
                    <small class="text-muted">Today's moments at Saatvik</small>
                    <div class="d-flex gap-2 btngps">
                        <button class="btn btn-primary btn-sm rounded-pill">See more</button>
                        <button class="btn btn-outline-primary btn-sm rounded-pill">Jan, 2026</button>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

<div class="container my-4">
    <div class="row g-4">

        <!-- LEFT COLUMN -->
        <div class="col-lg-8">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <h6 class="fw-semibold mb-0">From The Leadership Desk</h6>
                <div class="swiper-pagination today-leaderships"></div>
            </div>

            <div class="swiper today-leadership">
                <div class="swiper-wrapper">

                    <div class="swiper-slide">
                        <div class="card border-0 shadow-sm rounded-4 p-4 mb-4">

                            <!-- Leader Profile -->
                            <div class="d-flex align-items-center p-3 bg-light rounded-3 mb-3 leadership">

                                <img src="<?= !empty($leader_profile['image']) ? base_url('uploads/leadership/' . $leader_profile['image']) : 'https://placehold.co/80' ?>"
                                    class="rounded-circle me-3" width="60" height="60">

                                <div>
                                    <h6 class="mb-0 fw-semibold">
                                        <?= $leader_profile['name'] ?? 'Leader Name' ?>
                                        <small class="text-muted">| <?= $leader_profile['designation'] ?? '' ?></small>
                                    </h6>

                                    <p class="mb-0 text-muted small">
                                        <?= character_limiter(strip_tags($leader_profile['description'] ?? ''), 120); ?>
                                    </p>
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
                                <ul class="list-unstyled tab-content active" id="corp">

                                    <?php if (!empty($corp)): ?>
                                        <?php foreach ($corp as $row): ?>

                                            <li class="d-flex justify-content-between align-items-center bg-light rounded-3 p-2 mb-2">

                                                <small class="text-muted">
                                                    <?= date('M, Y', strtotime($row['publish_date'])) ?>
                                                </small>

                                                <span class="small">
                                                    <?= html_escape($row['title']) ?>
                                                </span>

                                                <a href="<?= !empty($row['document_link']) ? $row['document_link'] : '#' ?>"
                                                    class="btn btn-outline-primary btn-sm rounded-pill">
                                                    Read more
                                                </a>

                                            </li>

                                        <?php endforeach; ?>
                                    <?php else: ?>

                                        <li class="text-muted small">No Corporate Communication available</li>

                                    <?php endif; ?>

                                </ul>



                                <!-- Notice -->
                                <ul class="list-unstyled tab-content" id="notice">

                                    <?php if (!empty($notice)): ?>
                                        <?php foreach ($notice as $row): ?>

                                            <li class="d-flex justify-content-between align-items-center bg-light rounded-3 p-2 mb-2">

                                                <small class="text-muted">
                                                    <?= date('M, Y', strtotime($row['publish_date'])) ?>
                                                </small>

                                                <span class="small">
                                                    <?= html_escape($row['title']) ?>
                                                </span>

                                                <a href="<?= !empty($row['document_link']) ? $row['document_link'] : '#' ?>"
                                                    class="btn btn-outline-primary btn-sm rounded-pill">
                                                    Read more
                                                </a>

                                            </li>

                                        <?php endforeach; ?>
                                    <?php else: ?>

                                        <li class="text-muted small">No Notice available</li>

                                    <?php endif; ?>

                                </ul>



                                <!-- Welcome -->
                                <ul class="list-unstyled tab-content" id="welcome">

                                    <?php if (!empty($welcome)): ?>
                                        <?php foreach ($welcome as $row): ?>

                                            <li class="d-flex justify-content-between align-items-center bg-light rounded-3 p-2 mb-2">

                                                <small class="text-muted">
                                                    <?= date('M, Y', strtotime($row['publish_date'])) ?>
                                                </small>

                                                <span class="small">
                                                    <?= html_escape($row['title']) ?>
                                                </span>

                                                <a href="<?= !empty($row['document_link']) ? $row['document_link'] : '#' ?>"
                                                    class="btn btn-outline-primary btn-sm rounded-pill">
                                                    Read more
                                                </a>

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
                    </div>

                </div>
            </div>



            <div class="d-flex justify-content-between align-items-center mb-3">
                <h6 class="fw-semibold mb-0">Employee Directory</h6>
                <div class=""></div>
            </div>
            <!-- Employee Directory -->
            <!-- From The Leadership Desk -->
            <div class="swiper today-searcha">
                <div class="swiper-wrapper">

                    <div class="swiper-slide">

                        <div class="card border-0 shadow-sm rounded-4 p-4 ">


                            <input type="text" class="form-control rounded-pill mb-3" placeholder="Type in to search ..">

                            <div class="text-center">
                                <button class="btn btn-primary btn-sm rounded-pill px-4 mb-3">Search colleagues</button>
                            </div>

                            <div class="bg-light rounded-3 p-4 text-center text-muted">
                                Search Result
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">

                        <div class="card border-0 shadow-sm rounded-4 p-4 mt-4">


                            <input type="text" class="form-control rounded-pill mb-3" placeholder="Type in to search ..">

                            <div class="text-center">
                                <button class="btn btn-primary btn-sm rounded-pill px-4 mb-3">Search colleagues</button>
                            </div>

                            <div class="bg-light rounded-3 p-4 text-center text-muted">
                                Search Result
                            </div>
                        </div>
                    </div>
                </div>
            </div>



            <!-- Header -->
            <div class="d-flex justify-content-between align-items-center mb-3 mt-4">
                <h6 class="fw-semibold mb-0">Departmental Information</h6>
            </div>

            <div class="card border-0 shadow-sm rounded-4 p-4">

                <div class="row g-4">

                    <!-- SOPs -->
                    <div class="col-md-6">
                        <div class="bg-light rounded-4 p-3 h-100">

                            <button class="btn btn-dark btn-sm w-100 mb-3">
                                SOPs
                            </button>

                            <div class="accordion" id="deptAccordion1">

                                <?php if (!empty($sops)): ?>
                                    <?php $i = 1;
                                    foreach ($sops as $sop): ?>

                                        <div class="accordion-item border-0 mb-2">

                                            <h2 class="accordion-header">

                                                <button class="accordion-button collapsed py-2"
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

                                                        <a href="<?= $sop['document_link'] ?>"
                                                            target="_blank"
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

                                    <?php $i++;
                                    endforeach; ?>

                                <?php else: ?>

                                    <p class="text-muted small">No SOPs available</p>

                                <?php endif; ?>

                            </div>

                            <div class="text-center mt-3">
                                <button class="btn btn-dark btn-sm w-100">
                                    Search SOPs
                                </button>
                            </div>

                        </div>
                    </div>


                    <!-- Technical Documents -->
                    <div class="col-md-6">
                        <div class="bg-light rounded-4 p-3 h-100">

                            <button class="btn btn-dark btn-sm w-100 mb-3">
                                Technical Documents
                            </button>

                            <div class="accordion" id="deptAccordion2">

                                <?php if (!empty($technical_docs)): ?>
                                    <?php $j = 1;
                                    foreach ($technical_docs as $doc): ?>

                                        <div class="accordion-item border-0 mb-2">

                                            <h2 class="accordion-header">

                                                <button class="accordion-button collapsed py-2"
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

                                                        <a href="<?= $doc['document_link'] ?>"
                                                            target="_blank"
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

                                    <?php $j++;
                                    endforeach; ?>

                                <?php else: ?>

                                    <p class="text-muted small">No Technical Documents available</p>

                                <?php endif; ?>

                            </div>

                            <div class="text-center mt-3">
                                <button class="btn btn-primary btn-sm rounded-pill w-100">
                                    Access department resources
                                </button>
                            </div>

                        </div>
                    </div>

                </div>
            </div>
        </div>
        <!-- RIGHT SIDEBAR -->
         
        <div class="col-lg-4">
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
                <h6 class="fw-semibold mb-4 mt-4">Policy & Procedures</h6>
                <?php if (!empty($policies)): ?>

                    <?php foreach ($policies as $policy): ?>

                        <div class="d-flex justify-content-between align-items-center mb-2 procedures">

                            <span class="small">
                                <?= $policy['title'] ?>
                            </span>

                            <a href="<?= base_url($policy['document_link']) ?>"
                                target="_blank"
                                class="btn btn-outline-primary btn-sm rounded-pill">

                                Read more

                            </a>

                        </div>

                    <?php endforeach; ?>

                <?php endif; ?>
                <!-- policies dynamic data -->
            </div>


        </div>

    </div>
</div>

<div class="container my-4">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h6 class="fw-semibold mb-0">Learning Never Stops At Saatvik</h6>
        <div class=""></div>
    </div>
    <div class="card border-0 shadow-sm rounded-4 p-4">

        <!-- Header -->


        <div class="row g-3">

            <!-- Training Calendar -->
            <div class="col-lg-4">
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
            </div>

            <div class="col-lg-4">
                <div class="bg-lightl rounded-3 h-100">

                    <button class="btn btn-dark btn-sm w-100 bgbtn mb-3">
                        Learning Material
                    </button>

                    <div class="accordion" id="learningAccordion">

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
                                        class="accordion-collapse collapse <?= $key == 0 ? 'show' : ''; ?>"
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
            </div>

            <!-- Quiz of the Week -->
<div class="col-lg-4">
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

<!-- JS -->
<script>
document.addEventListener('DOMContentLoaded', function() {
    const submitButtons = document.querySelectorAll('.submitQuizBtn');

    submitButtons.forEach(btn => {
        btn.addEventListener('click', function() {
            const qIndex = btn.getAttribute('data-index');
            const correctOption = btn.getAttribute('data-correct');

            const selected = document.querySelector(`input[name="answer_${qIndex}"]:checked`);
            const resultDiv = document.getElementById(`quizResult_${qIndex}`);

            if(!selected) {
                alert('Please select an option');
                return;
            }

            const answer = selected.value;

            if(answer === correctOption) {
                resultDiv.innerHTML = "✅ Correct!";
                resultDiv.style.color = "green";
            } else {
                resultDiv.innerHTML = `❌ Wrong! Correct answer: ${correctOption}`;
                resultDiv.style.color = "red";
            }
        });
    });
});
</script>

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

<div class="card border-0 shadow-sm rounded-4 p-4">
    <div class="swiper news-swiper">
        <div class="swiper-wrapper">

            <?php if(!empty($news)): ?>
                <?php foreach($news as $item): ?>
                    <div class="swiper-slide">
                        <div class="card border-0">
                            <?php if(!empty($item['image'])): ?>
                                <img src="<?= $item['image'] ?>" class="rounded-3 img-fluid w-100 mb-2">
                            <?php else: ?>
                                <img src="https://placehold.co/600x200" class="rounded-3 img-fluid w-100 mb-2">
                            <?php endif; ?>

                            <h6 class="fw-semibold mb-1"><?= html_escape($item['title'] ?? 'No Title') ?></h6>
                            <h6 class="text-muted small mb-0">
                                <?= $item['event_date'] ?? '' ?>
                            </h6>

                            <?php if(!empty($item['document_link'])): ?>
                                <a href="<?= $item['document_link'] ?>" target="_blank" class="btn btn-outline-primary btn-sm rounded-pill mt-2">
                                    Read more
                                </a>
                            <?php endif; ?>
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

<!-- Initialize Swiper JS -->
<script>
    var newsSwiper = new Swiper(".news-swiper", {
        slidesPerView: 1,
        spaceBetween: 20,
        pagination: {
            el: ".today-news",
            clickable: true,
        },
        breakpoints: {
            768: {
                slidesPerView: 2
            },
            992: {
                slidesPerView: 3
            }
        }
    });
</script>
</div>