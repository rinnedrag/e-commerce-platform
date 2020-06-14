$('#size').change(function (e) {
    e.preventDefault();
    $('#count').val(parseInt($('#size-count-'+$(this).val()).text()));
})
