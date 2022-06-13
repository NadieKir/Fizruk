// MAIN SLIDER

$(document).ready(function(){

    $('.loop').owlCarousel({
        center: true,
        items:1,
        loop:true,
        margin:0,
        autoWidth:true,
        autoplay: true,
        autoplayTimeout:7000,
        smartSpeed: 1000,
        dots:false,
        dotsEach: false,
    });


// MARQUEE for club benefits section

$(function() {
    $('.marquee').marquee({
        speed: 10,
        startVisible: true,   
        duplicated: true,
        direction: 'left',
    });
});

// MODAL MARATHON

const enrollMarathonBtn = document.querySelector('.enroll-marathon-btn');
let isForbidden = enrollMarathonBtn.dataset.forbidden;

enrollMarathonBtn.addEventListener('click', ()=> {
    if(isForbidden == 'guest') alert('Для регистрации на марафон необходимо авторизироваться');
    if(isForbidden == 'participant') alert('Вы уже зарегистрированы на марафон');
})

const marathonModal = new HystModal({
    linkAttributeName: "data-hystmodal",
    catchFocus: false,
    waitTransitions: true,
    afterClose: function(){
        marathonModalEnroll.style.display = 'flex';
        marathonModalSuccess.style.display = 'none';
    },
});

const marathonModalBtn = document.querySelector('#marathonModal .green-btn');
const marathonModalSuccess = document.getElementById('marathonModalSuccess');
const marathonModalEnroll = document.getElementById('marathonModalEnroll');
const registrationNumber = document.querySelector('.registration-number');
const numOfParticipants = document.querySelector('.num-of-participants');

marathonModalSuccess.style.display = 'none';

marathonModalBtn.addEventListener('click', () => {
    let data = $(this).serialize();
    const userId = marathonModalBtn.dataset.userid;

    $.ajax({
        url: `/main/enroll-marathon?user=${userId}`,
        type: 'POST',
        data: data,
        success: function(res) {
            registrationNumber.innerHTML = res;

            marathonModalEnroll.style.display = 'none';
            marathonModalSuccess.style.display = 'flex';

            enrollMarathonBtn.removeAttribute('data-hystmodal');
            enrollMarathonBtn.setAttribute('data-forbidden', 'participant');
            isForbidden = enrollMarathonBtn.dataset.forbidden;

            numOfParticipants.innerHTML = parseInt(numOfParticipants.innerHTML) + 1;

        },
        error: function(){
            alert('Произошла ошибка');
        }
    });
});

// COUNTDOWN

function getTimeRemaining(endtime) {
    let total = Date.parse(endtime) - Date.parse(new Date());
    let seconds = Math.floor((total / 1000) % 60);
    let minutes = Math.floor((total / 1000 / 60) % 60);
    let hours = Math.floor((total / (1000 * 60 * 60)) % 24);
    let days = Math.floor(total / (1000 * 60 * 60 * 24));

    return {
      'total': total,
      'days': days,
      'hours': hours,
      'minutes': minutes,
      'seconds': seconds
    };
}
   
function initializeClock(endtime) {
    let daysSpan = document.getElementById('countdown-days');
    let hoursSpan = document.getElementById('countdown-hours');
    let minutesSpan = document.getElementById('countdown-minutes');
    let secondsSpan = document.getElementById('countdown-seconds');
   
    function updateClock() {
      let remainingTime = getTimeRemaining(endtime);
   
      daysSpan.innerHTML = remainingTime.days;
      hoursSpan.innerHTML = ('0' + remainingTime.hours).slice(-2);
      minutesSpan.innerHTML = ('0' + remainingTime.minutes).slice(-2);
      secondsSpan.innerHTML = ('0' + remainingTime.seconds).slice(-2);
   
      if (remainingTime.total <= 0) {
        clearInterval(timeinterval);
      }
    }
   
    updateClock();
    let timeinterval = setInterval(updateClock, 1000);
}
   
let deadline = new Date('2022-06-01 10:00');
initializeClock(deadline);


});