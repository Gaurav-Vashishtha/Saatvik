var BASE_URL = window.location.origin;

// birthdays
function loadBirthdays() {
    fetch(BASE_URL + "/satvik/api/get-this-month-birthday")
        .then(res => res.json())
        .then(data => {

            let wrapper = document.getElementById("birthday-wrapper");
            let html = "";

            if (data.users) {
                data.users.forEach(user => {
                    html += `
                <div class="swiper-slide">
                    <img src="${user.image ?? 'https://placehold.co/600x400'}" class="rounded-3 mb-2">
                    <h6 class="mb-0 fw-semibold">${user.name ?? ''}</h6>
                    <small class="text-muted">${user.date_of_birth}</small>
                </div>`;
                });
            }

            if (data.employees) {
                data.employees.forEach(emp => {
                    html += `
                <div class="swiper-slide">
                    <img src="${emp.image ?? 'https://placehold.co/600x400'}" class="rounded-3 mb-2">
                    <h6 class="mb-0 fw-semibold">${emp.name ?? ''}</h6>
                    <small class="text-muted">${emp.date_of_birth}</small>
                </div>`;
                });
            }

            wrapper.innerHTML = html;

            if (typeof birthdaySwiper !== "undefined") {
                birthdaySwiper.update();
            }

        });
}


// policies
function loadPolicy() {
    fetch(BASE_URL + "/satvik/api/get-policies")
        .then(res => res.json())
        .then(data => {

            let wrapper = document.getElementById("policy-wrapper");
            let html = "";

            if (data.data) {
                data.data.forEach(policy => {
                    html += `
                <div class="d-flex justify-content-between align-items-center mb-2 procedures">
                    <span class="small">${policy.title}</span>
                    <a href="${policy.document_link}" target="_blank" class="btn btn-outline-primary btn-sm rounded-pill">
                        Read more
                    </a>
                </div>`;
                });
            }

            wrapper.innerHTML = html;
        });
}


// moments
function loadMoments() {
    fetch(BASE_URL + "/satvik/api/get-moments")
        .then(res => res.json())
        .then(data => {

            let wrapper = document.getElementById("moments-wrapper");
            let html = "";

            if (data.data) {
                data.data.forEach(moment => {
                    html += `
                <div class="swiper-slide">
                    <img src="${moment.image ?? 'https://placehold.co/600x400'}" class="rounded-3 mb-2">
                </div>`;
                });
            }

            wrapper.innerHTML = html;
        });
}


//news & events
function loadNews() {
    fetch(BASE_URL + "/satvik/api/get-new-events")
        .then(res => res.json())
        .then(data => {

            let wrapper = document.getElementById("new-wrapper");
            let html = "";

            if (data.data) {
                data.data.forEach(news => {

                    let formattedDate = '';
                    if (news.event_date) {
                        const date = new Date(news.event_date);
                        formattedDate = date.toLocaleDateString('en-US', {
                            month: 'long',
                            year: 'numeric'
                        });
                    }

                    html += `
                <div class="swiper-slide">
                    <img src="${news.image ?? 'https://placehold.co/600x400'}" class="rounded-3 mb-2">
                    <h6 class="mb-0 fw-semibold">${news.title ?? ''}</h6>
                    <small class="text-muted">${formattedDate}</small>
                </div>`;
                });
            }

            wrapper.innerHTML = html;
        });
}

//learning material
function loadLearningMaterial() {

    fetch(BASE_URL + "/satvik/api/get-learning-material")
        .then(res => res.json())
        .then(data => {

            let wrapper = document.getElementById("learningAccordion");
            let html = "";

            if (data.data && data.data.length > 0) {

                data.data.forEach((item, index) => {

                    let collapseId = "learningItem" + item.id;

                    html += `
                <div class="accordion-item border-0 mb-2">

                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed rounded-3"
                            type="button"
                            data-bs-toggle="collapse"
                            data-bs-target="#${collapseId}">
                            ${item.question}
                        </button>
                    </h2>

                    <div id="${collapseId}" 
                        class="accordion-collapse collapse"
                        data-bs-parent="#learningAccordion">

                        <div class="accordion-body">
                            ${item.answer}
                        </div>

                    </div>

                </div>
                `;
                });

            } else {
                html = `<p class="text-muted">No learning material available</p>`;
            }

            wrapper.innerHTML = html;

        })
        .catch(error => {
            console.error("Error loading learning material:", error);
        });

}


//quiz
function loadQuiz() {
    fetch(BASE_URL + "/satvik/api/get-quiz")
        .then(res => res.json())
        .then(data => {
            if (data.data && data.data.length > 0) {
                const quiz = data.data[0];
                const questionEl = document.getElementById("quizQuestion");
                const optionsEl = document.getElementById("quizOptions");
                const submitBtn = document.getElementById("submitQuiz");

                questionEl.textContent = quiz.question;

                optionsEl.innerHTML = `
                <div class="row">
                    <div class="col-6">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="quizOption" id="optionA" value="A">
                            <label class="form-check-label" for="optionA">A. ${quiz.option_a}</label>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="quizOption" id="optionB" value="B">
                            <label class="form-check-label" for="optionB">B. ${quiz.option_b}</label>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="quizOption" id="optionC" value="C">
                            <label class="form-check-label" for="optionC">C. ${quiz.option_c}</label>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="quizOption" id="optionD" value="D">
                            <label class="form-check-label" for="optionD">D. ${quiz.option_d}</label>
                        </div>
                    </div>
                </div>
            `;

                submitBtn.replaceWith(submitBtn.cloneNode(true));
                const newSubmitBtn = document.getElementById("submitQuiz");

                newSubmitBtn.addEventListener('click', () => {
                    const selected = document.querySelector('input[name="quizOption"]:checked');
                    if (!selected) {
                        alert("Please select an option");
                        return;
                    }

                    if (selected.value === quiz.correct_option) {
                        alert("Correct answer! ✅");
                    } else {
                        alert(`Wrong answer! ❌ Correct answer is option ${quiz.correct_option}`);
                    }
                });

            } else {
                document.getElementById("quizBox").innerHTML = "<p class='text-muted'>No quiz available this week.</p>";
            }
        })
        .catch(err => console.error("Error loading quiz:", err));
}

//leadership desk
function loadLeadershipDesk() {

    fetch(BASE_URL + "/satvik/api/get-ledership-desk")
        .then(res => res.json())
        .then(data => {

            const corpBox = document.getElementById("corp");
            const noticeBox = document.getElementById("notice");
            const welcomeBox = document.getElementById("welcome");

            if (!corpBox || !noticeBox || !welcomeBox) return;

            // clear previous data
            corpBox.innerHTML = "";
            noticeBox.innerHTML = "";
            welcomeBox.innerHTML = "";

            if (!data.data || data.data.length === 0) return;

            data.data.forEach(item => {

                let formattedDate = "";

                if (item.publish_date) {
                    const date = new Date(item.publish_date);
                    formattedDate = date.toLocaleString('default', {
                        month: 'short',
                        year: 'numeric'
                    });
                }

                const html = `
                <li class="d-flex justify-content-between align-items-center bg-light rounded-3 p-2 mb-2">
                    <small class="text-muted">${formattedDate}</small>
                    <span class="small">${item.title ?? ""}</span>
                    <button class="btn btn-outline-primary btn-sm rounded-pill read-btn"
                        data-link="${item.document_link ?? '#'}">
                        Read more
                    </button>
                </li>
                `;

                if (item.section === "corporate") {
                    corpBox.innerHTML += html;
                }

                if (item.section === "notice") {
                    noticeBox.innerHTML += html;
                }

                if (item.section === "joinee") {
                    welcomeBox.innerHTML += html;
                }

            });

        })
        .catch(err => console.error("Leadership API Error:", err));

}
//departmental information
function loadDepartmentInformation() {

    fetch(BASE_URL + "/satvik/api/get-departmental-information")
        .then(res => res.json())
        .then(response => {

            let sops = document.getElementById("sops-wrapper");
            let tech = document.getElementById("techdoc-wrapper");

            sops.innerHTML = "";
            tech.innerHTML = "";

            let sopIndex = 0;
            let techIndex = 0;

            response.data.forEach(item => {

                if (item.section === "sops") {

                    let id = "sop" + sopIndex++;

                    sops.innerHTML += `
                                <div class="accordion-item border-0 mb-2">

                                <h2 class="accordion-header">
                                <button class="accordion-button collapsed"
                                type="button"
                                data-bs-toggle="collapse"
                                data-bs-target="#${id}">
                                ${item.title}
                                </button>
                                </h2>

                                <div id="${id}" class="accordion-collapse collapse" data-bs-parent="#deptAccordion1">
                                <div class="accordion-body">
                                ${item.description}
                                </div>
                                </div>

                                </div>
                                `;

                }

                if (item.section === "technical_document") {

                    let id = "tech" + techIndex++;

                    tech.innerHTML += `
                <div class="accordion-item border-0 mb-2">

                <h2 class="accordion-header">
                <button class="accordion-button collapsed"
                type="button"
                data-bs-toggle="collapse"
                data-bs-target="#${id}">
                ${item.title}
                </button>
                </h2>

                <div id="${id}" class="accordion-collapse collapse" data-bs-parent="#deptAccordion2">
                <div class="accordion-body">
                ${item.description}
                </div>
                </div>

                </div>
                `;

                }

            });

        });

}

document.addEventListener("click", function(e){

    if(e.target.classList.contains("read-btn")){

        const link = e.target.getAttribute("data-link");

        if(link && link !== "#"){
            window.location.href = link;
        }

    }

});

