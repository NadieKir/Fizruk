$(document).ready(function(){

// ENROLL TRAINING MODAL

const trainingName = document.querySelector('.training-name');
const trainingDate = document.querySelector('.training-date');

const enrollTrainingModal = new HystModal({
    linkAttributeName: "data-hystmodal-enroll",
    catchFocus: false,
    waitTransitions: true,
    beforeOpen: function() {

        // FILL DATA

        trainingName.innerHTML = enrollTrainingModal.starter.dataset.trainingname;
        
        let date = new Date(enrollTrainingModal.starter.dataset.trainingdate);
        let time = enrollTrainingModal.starter.dataset.trainingtime;
        trainingDate.innerHTML = `${date.toLocaleDateString()} &nbsp; в &nbsp; ${time.split('-')[0]}`;

        // ADD HIDDEN INPUTS VALUE

        let inputTraining = document.getElementById('enrolltrainingform-training');
        let inputDate = document.getElementById('enrolltrainingform-date');

        inputTraining.setAttribute('value', enrollTrainingModal.starter.dataset.trainingid);
        inputDate.setAttribute('value', `${date.toLocaleDateString()} ${time.split('-')[0]}`);
    },
});

// CANT REGISTER

const enrollBtns = Array.from(document.querySelectorAll('.enroll-btn'));

enrollBtns.forEach(enrollBtn => {
    enrollBtn.addEventListener('click', ()=> {
        if(enrollBtn.dataset.alreadyin == 1) {
            alert('Вы уже зарегистрированы на тренировку');
            return;
        }
        if(enrollBtn.dataset['hystmodalEnroll'] === undefined) alert('Чтобы записаться на тренировку, необходимо зарегистрироваться');
        
    })
}) 

});