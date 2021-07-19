$(".checkbox_wrapper").on('click', function() {
    console.log($(this).parents('.card').find('.checkbox_children').prop('checked', $(this).prop('checked')));
});