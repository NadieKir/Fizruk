$(".main-form").on("click", ".tab", function () {
    $(".main-form").find(".active").removeClass("active");

    $(this).addClass("active");
    $(".tab-form").eq($(this).index()).addClass("active");
});

// OPEN REGISTARTION TAB IF MISTAKES

let helpBlocks = document.querySelectorAll('#form-registration .help-block');
helpBlocks = Array.from(helpBlocks).filter(item => item.innerHTML !== '');

if(helpBlocks.length > 0) {
    let authTab = document.querySelector('.tab.authorisation');
    let regTab = document.querySelector('.tab.registration');

    let authForm = document.querySelector('#form-authorization');
    let regForm = document.querySelector('#form-registration');

    authTab.classList.remove('active');
    regTab.classList.add('active');

    authForm.classList.remove('active');
    regForm.classList.add('active');
}