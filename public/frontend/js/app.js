$(function() {
    $('#checkActive li a').on('click', function() {
        $('li a').removeClass('active');
        $(this).addClass('active');
    });
    // $('.owl-prev')[0].classList.add('recommended-item-control');
    // $('.owl-next')[0].classList.add('recommended-item-control');
    // $('.owl-prev')[1].classList.add('recommended-item-control');
    // $('.owl-next')[1].classList.add('recommended-item-control');
    // $('.active_product')[0].classList.add('active', 'in');

    // console.log($active_product);
    // $tabs = $('.nav.nav-tabs')[0];
    // $tabs.firstElementChild.classList.add('active');
});
$('.owl-carousel1').owlCarousel({
    margin: 10,
    autoWidth: false,
    dots: false,
    nav: true,
    items: 3,
    responsiveClass: true,
    navText: ['<i class="fa fa-angle-left" aria-hidden="true"></i>', '<i class="fa fa-angle-right" aria-hidden="true"></i>'],
    responsive: {
        0: {
            items: 1,
            nav: true,
            loop: true
        },
        600: {
            items: 2,
            nav: true,
            loop: true
        },
        1000: {
            items: 3,
            nav: true,
            loop: true
        },
    }
})
$('.owl-carousel2').owlCarousel({
    margin: 10,
    autoWidth: false,
    dots: false,
    nav: true,
    items: 3,
    responsiveClass: true,
    navText: ['<i class="fa fa-angle-left" aria-hidden="true"></i>', '<i class="fa fa-angle-right" aria-hidden="true"></i>'],
    responsive: {
        0: {
            items: 3,
            nav: true,
            loop: true
        },
        600: {
            items: 3,
            nav: true,
            loop: true
        },
        1000: {
            items: 3,
            nav: true,
            loop: true
        },
    }
})