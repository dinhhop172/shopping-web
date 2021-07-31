$(function() {
    $('#checkActive li a').on('click', function() {
        $('li a').removeClass('active');
        $(this).addClass('active');
        console.log($(this));
    });
});