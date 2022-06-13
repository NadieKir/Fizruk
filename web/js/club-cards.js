$(document).ready(function(){
    
 
// Выбор фильтров

const allFilterBtns = document.querySelectorAll('.filter-option');

const allTypeFilterBtns = document.querySelectorAll('.filter-option-type');
const allHoursFilterBtns = document.querySelectorAll('.filter-option-hours');
const allDurationFilterBtns = document.querySelectorAll('.filter-option-duration');

const activeTypeFilterBtn = document.querySelector('.filter-option-type.active');
const activeHoursFilterBtn = document.querySelector('.filter-option-hours.active');
const activeDurationFilterBtn = document.querySelector('.filter-option-duration.active');

const findCardBtn = document.querySelector('.find-card-btn');

const btnHref = findCardBtn.getAttribute('href');

let chosenType = activeTypeFilterBtn.dataset.type, 
chosenHours = activeHoursFilterBtn.dataset.hours, 
chosenDuration = activeDurationFilterBtn.dataset.duration;

findCardBtn.setAttribute('href', btnHref + `?type=${chosenType}&hours=${chosenHours}&duration=${chosenDuration}#selected-cards`);

allFilterBtns.forEach(filterBtn => {
    filterBtn.addEventListener('click', ()=> {
        if(filterBtn.classList.contains('filter-option-type')) {
            allTypeFilterBtns.forEach(item => item.classList.remove('active'));
            filterBtn.classList.add('active');

            chosenType = filterBtn.dataset.type;
        }

        if(filterBtn.classList.contains('filter-option-hours')) {
            allHoursFilterBtns.forEach(item => item.classList.remove('active'));
            filterBtn.classList.add('active');

            chosenHours = filterBtn.dataset.hours;
        }

        if(filterBtn.classList.contains('filter-option-duration')) {
            allDurationFilterBtns.forEach(item => item.classList.remove('active'));
            filterBtn.classList.add('active');

            chosenDuration = filterBtn.dataset.duration;
        }

        findCardBtn.setAttribute('href', btnHref + `?type=${chosenType}&hours=${chosenHours}&duration=${chosenDuration}#selected-cards`);
    })
})

// Сортировка

// let sortOptions = document.querySelectorAll('.sort-options span');
// let selectedCards = document.querySelector('.selected-cards');

// sortOptions.forEach(sortOption => {
//     sortOption.addEventListener('click', () => {
//         let sort = sortOption.dataset.sort;

//         $.ajax({
//             url: `/club-cards/set-sort?sort=${sort}&type=${chosenType}&hours=${chosenHours}&duration=${chosenDuration}`,
//             type: 'POST',
//             success: function(sortedClubCards) {
//                 sortOptions.forEach(item => item.classList.remove('active'));
//                 sortOption.classList.add('active');

//                 selectedCards.innerHTML = sortedClubCards;
//             },
//             error: function(){
//                 alert('Произошла ошибка');
//             }
//         });
//     })
// })

})   