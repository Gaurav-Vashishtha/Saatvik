<footer class="footer-custom py-3 mt-5">
  <div class="container d-flex justify-content-between align-items-center">
    
    <!-- Left Logo + Text -->
    <div class="d-flex align-items-center">
       <img src="assets/images/logo.png" height="35" class="me-2">
    </div>

    <!-- Right Copyright -->
    <div class="text-muted small">
      Copyright © Saatvik Green Energy Ltd. All right reserved.
    </div>

  </div>
</footer>

    <!-- Bootstrap JS Bundle -->
     <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
     <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
     <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.min.js"></script>
    <script src="assets/js/bootstrap.bundle.min.js"></script>

<script>
new Swiper(".birthday-swiper", {
  slidesPerView: 3,
  spaceBetween: 20,
  pagination: {
    el: ".birthday-pagination",
    clickable: true,
  },
  breakpoints: {
    0: { slidesPerView: 1 },
    768: { slidesPerView: 3 }
  }
});

new Swiper(".today-swiper", {
  slidesPerView: 1,
  pagination: {
    el: ".today-pagination",
    clickable: true,
  },
});

new Swiper(".today-leadership-1", {
  slidesPerView: 1,
  spaceBetween: 20,
  loop: false,
  autoHeight: true,
  pagination: {
    el: ".today-leaderships-1",
    clickable: true
  }
});
new Swiper(".today-searcha", {
  slidesPerView: 1,
  spaceBetween: 20,
  loop: false,
  autoHeight: true,
  pagination: {
    el: ".today-search",
    clickable: true
  }
});
new Swiper(".today-searcha", {
  slidesPerView: 1,
  spaceBetween: 20,
  loop: false,
  autoHeight: true,
  pagination: {
    el: ".today-Information",
    clickable: true
  }
});

new Swiper(".today-searcha", {
  slidesPerView: 1,
  spaceBetween: 20,
  loop: false,
  autoHeight: true,
  pagination: {
    el: ".today-saatvik",
    clickable: true
  }
});

new Swiper(".news-swiper", {
  slidesPerView: 3,
  spaceBetween: 20,
   pagination: {
    el: ".today-news",
    clickable: true
  },
  breakpoints: {
    0: { slidesPerView: 1 },
    768: { slidesPerView: 2 },
    992: { slidesPerView: 3 }
  }
});

$("#trainingDate").datepicker({
  dateFormat: "dd M yy",
  showOtherMonths: true,
  selectOtherMonths: true
});
const quizQuestions = [
  {
    question: "Who invented the solar cell?",
    correct: "B",
    options: {
      A: "Charles Fritts",
      B: "Russell Ohl",
      C: "Gerald Pearson",
      D: "Daryl Chapin"
    }
  },
  {
    question: "Solar energy comes from?",
    correct: "A",
    options: {
      A: "Sun",
      B: "Wind",
      C: "Water",
      D: "Coal"
    }
  },
  {
    question: "Which device converts sunlight into electricity?",
    correct: "C",
    options: {
      A: "Inverter",
      B: "Battery",
      C: "Solar Panel",
      D: "Transformer"
    }
  },
  {
    question: "Solar power is a type of?",
    correct: "D",
    options: {
      A: "Fossil energy",
      B: "Nuclear energy",
      C: "Thermal energy",
      D: "Renewable energy"
    }
  }
];
let currentQuestion = 0;

function loadQuestion() {
  const q = quizQuestions[currentQuestion];
  $("#quizQuestion").text(q.question);
  $("#quizOptions").html("");

  $.each(q.options, function (key, value) {
    $("#quizOptions").append(`
      <label class="quiz-option">
        <input type="radio" name="quiz" value="${key}">
        ${key}. ${value}
      </label>
    `);
  });
}

$("#submitQuiz").on("click", function () {
  const selected = $("input[name='quiz']:checked").val();
  if (!selected) {
    alert("Please select an answer");
    return;
  }

  if (selected === quizQuestions[currentQuestion].correct) {
    alert(" Correct");
  } else {
    alert(" Wrong");
  }

  currentQuestion++;

  if (currentQuestion < quizQuestions.length) {
    loadQuestion();
  } else {
    $("#quizBox").html("<p class='text-success fw-semibold'>Quiz Completed 🎉</p>");
  }
});

loadQuestion();

</script>
<script>
   document.addEventListener("click", function (e) {
    if (e.target.matches(".leadership-tabs .btn")) {
      const tabs = e.target.closest(".card");

      tabs.querySelectorAll(".leadership-tabs .btn").forEach(btn => {
        btn.classList.remove("active", "btn-dark");
        btn.classList.add("btn-light");
      });

      tabs.querySelectorAll(".tab-content").forEach(content => {
        content.classList.remove("active");
      });

      e.target.classList.add("active", "btn-dark");
      e.target.classList.remove("btn-light");

      const target = e.target.getAttribute("data-tab");
      tabs.querySelector("#" + target).classList.add("active");
    }
  });

</script>
<script>
const monthNames = [
  "January","February","March","April","May","June",
  "July","August","September","October","November","December"
];

let currentDate = new Date(2026, 0); // Jan 2026
const calendarDays = document.getElementById("calendarDays");
const monthName = document.getElementById("monthName");
const year = document.getElementById("year");

const trainingDates = [1,2,6,8,13,14,20,21,27,28];

function renderCalendar() {
  calendarDays.innerHTML = "";

  const month = currentDate.getMonth();
  const yearValue = currentDate.getFullYear();

  monthName.textContent = monthNames[month];
  year.textContent = yearValue;

  const firstDay = new Date(yearValue, month, 1).getDay();
  const daysInMonth = new Date(yearValue, month + 1, 0).getDate();

  for (let i = 0; i < firstDay; i++) {
    const empty = document.createElement("div");
    empty.classList.add("disabled");
    calendarDays.appendChild(empty);
  }

  for (let day = 1; day <= daysInMonth; day++) {
    const dateDiv = document.createElement("div");
    dateDiv.textContent = day;

    if (trainingDates.includes(day)) {
      dateDiv.classList.add("active");
    }

    dateDiv.onclick = () => {
      alert(`Training selected on ${day} ${monthNames[month]} ${yearValue}`);
    };

    calendarDays.appendChild(dateDiv);
  }
}

document.getElementById("prevMonth").onclick = () => {
  currentDate.setMonth(currentDate.getMonth() - 1);
  renderCalendar();
};

document.getElementById("nextMonth").onclick = () => {
  currentDate.setMonth(currentDate.getMonth() + 1);
  renderCalendar();
};

renderCalendar();
</script>

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

<script>

function searchEmployee() {

    var input = document.getElementById("employeeSearch").value.toLowerCase();
    var items = document.getElementsByClassName("employee-item");
    var msg = document.getElementById("noEmployeeMsg");

    var found = false;

    for (var i = 0; i < items.length; i++) {

        var text = items[i].innerText.toLowerCase();

        if (input !== "" && text.includes(input)) {
            items[i].style.display = "block";
            found = true;
        } else {
            items[i].style.display = "none";
        }
    }

    if(!found && input !== ""){
        msg.style.display = "block";
    } else {
        msg.style.display = "none";
    }

}

</script>
  </body>
</html>