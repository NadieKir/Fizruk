$(document).ready(function(){

// TABS

const tabs = document.getElementById('tabs');
const content = document.querySelectorAll('.tab-content');

const changeClass = el => {

    for (let i = 0; i < tabs.children.length; i++) {
        tabs.children[i].classList.remove('active');
    }  
    el.classList.add('active');

}

tabs.addEventListener('click', e => {
    const currTab = e.target.dataset.btn;
    console.log('fuhgf');

    if(currTab) {
        changeClass(e.target);
    
        for(let i = 0; i < content.length; i++) {
            content[i].classList.remove('active');
            if(content[i].dataset.content === currTab) {
                content[i].classList.add('active');
            }
        }
    }
})

// MODAL CHANGE PHONE

const changePhoneModal = new HystModal({
    linkAttributeName: "data-hystmodal-phone",
    catchFocus: false,
    waitTransitions: true,
});

let helpBlocksPhone = Array.from(document.querySelectorAll('#changePhoneModal .help-block'));
helpBlocksPhone = helpBlocksPhone.filter(helpBlockPhone => helpBlockPhone.innerHTML !== '');

if(helpBlocksPhone.length != 0) changePhoneModal.open('#changePhoneModal');

// MODAL CHANGE PASSWORD

const changePasswordModal = new HystModal({
    linkAttributeName: "data-hystmodal-password",
    catchFocus: false,
    waitTransitions: true,
});

let helpBlocksPassword = Array.from(document.querySelectorAll('#changePasswordModal .help-block'));
helpBlocksPassword = helpBlocksPassword.filter(helpBlockPassword => helpBlockPassword.innerHTML !== '');

if(helpBlocksPassword.length != 0) changePasswordModal.open('#changePasswordModal');

// MODAL CANCEL TRAINING

const trainingCancelName = document.querySelector('.training-cancel-name'); 
const trainingCancelDate = document.querySelector('.training-cancel-date'); 

const cancelTrainingModal = new HystModal({
    linkAttributeName: "data-hystmodal-cancel",
    catchFocus: false,
    waitTransitions: true,
    beforeOpen: function() {

        // FILL DATA
        trainingCancelName.innerHTML = cancelTrainingModal.starter.dataset.trainingname;

        let date = new Date(cancelTrainingModal.starter.dataset.trainingdate);
        let time = cancelTrainingModal.starter.dataset.trainingtime;
        trainingCancelDate.innerHTML = `${date.toLocaleDateString()} &nbsp; в &nbsp; ${time.split('-')[0]}`;

        // ADD HIDDEN INPUTS VALUES

        let inputTraining = document.getElementById('canceltrainingform-training');
        let inputDate = document.getElementById('canceltrainingform-date');

        inputTraining.setAttribute('value', cancelTrainingModal.starter.dataset.trainingid);
        inputDate.setAttribute('value', `${date.toLocaleDateString()} ${time.split('-')[0]}`);
    }
});

const cancelTrainingBtn = document.querySelector('#cancelTrainingModal .green-modal-btn');

cancelTrainingBtn.addEventListener('click', () => {

})

// MODAL CANCEL MARATHON

const cancelMarathonModal = new HystModal({
    linkAttributeName: "data-hystmodal-cancel-marathon",
    catchFocus: false,
    waitTransitions: true,
});

// const cancelMarathoModalBtn = document.querySelector('#cancelMarathonModal .green-modal-btn');

// cancelMarathoModalBtn.addEventListener('click', {

// })
});

