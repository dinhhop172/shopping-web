$(".checkbox_wrapper").on('click', function() {
    $(this).parents('.card').find('.checkbox_children').prop('checked', $(this).prop('checked'));
});
$('.check_all').on('click ', function() {
    console.log($(this).parents().find('.checkbox_children').prop('checked', $(this).prop('checked')));
    console.log($(this).parents().find('.checkbox_wrapper').prop('checked', $(this).prop('checked')));
})