// Main slider

$(document).ready(function(){
    $('.club-photos-slider').owlCarousel({
        center: true,
        items:3,
        loop:true,
        margin:15,
        autoWidth:true,
        autoplay: true,
        autoplayTimeout:7000,
        smartSpeed: 1000,
        dots:false,
        dotsEach: false,
    });

    $('.trainers-slider').owlCarousel({
        center: true,
        items:4,
        loop:true,
        margin:15,
        autoWidth:true,
        autoplay: false,
        smartSpeed: 1000,
        dots:false,
        dotsEach: false,
    });

    // trainer description translate    

    const trainersDescriptions = document.querySelectorAll('.trainer-desc');

    trainersDescriptions.forEach(trainerDesc => {
        let height = trainerDesc.offsetHeight;
        trainerDesc.style.transform = `translateY(${height - 85}px)`;

        trainerDesc.addEventListener('mouseover', () => {
            trainerDesc.style.transform = 'translateY(0)';
        })

        trainerDesc.addEventListener('mouseout', () => {
            trainerDesc.style.transform = `translateY(${height - 85}px)`;
        })
    })

    // LIKES

    $('.like-form').on('beforeSubmit', function(e){
        
        let currForm = e.target;

        let likeBtn = currForm.children[1];

        let likeAction = likeBtn.dataset.likeaction;
        let likeTrainer = likeBtn.dataset.trainer;
        
        let data = $(this).serialize();

        $.ajax({
            url: `/about-us/set-like?action=${likeAction}&trainer=${likeTrainer}`,
            type: 'POST',
            data: data,
            success: function(res) {

                if(res === 'userIsGuest') {

                    alert('Чтобы ставить лайки, необходимо авторизироваться');

                } else if (res === 'setLike') {

                    likeBtn.firstElementChild.setAttribute('src', '/img/liked.svg');
                    likeBtn.firstElementChild.setAttribute('alt', 'liked');
                    likeBtn.setAttribute('class', 'like-img unlike-btn');
                    likeBtn.dataset.likeaction = 'unsetLike';

                    currForm.nextElementSibling.innerHTML = `${parseInt(currForm.nextElementSibling.innerHTML) + 1} `;
                
                } else if (res === 'unsetLike') {

                    likeBtn.firstElementChild.setAttribute('src', '/img/like.svg');                    
                    likeBtn.firstElementChild.setAttribute('alt', 'like');
                    likeBtn.setAttribute('class', 'like-img like-btn');
                    likeBtn.dataset.likeaction = 'setLike';

                    currForm.nextElementSibling.innerHTML = `${parseInt(currForm.nextElementSibling.innerHTML) - 1} `;
                
                }

            },
            error: function(){
                alert('Произошла ошибка');
            }
        });

        return false;

    });

    // COMMENTS

    let comments = document.querySelectorAll('.comment-img');

    comments.forEach(comment => {
        comment.addEventListener('click', () => {
            
        })
    })




});



