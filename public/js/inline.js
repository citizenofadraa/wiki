$(document).ready(function () {

    $('.editable').click(function () {
        $(this).attr('contenteditable', true).focus();
    });

    $('.save').click(function () {
        var itemId = $(this).data('id');
        var value = $(this).closest('tr').find('.editable').text();

        $.ajax({
            url: '/items/update/' + itemId,
            method: 'PATCH',
            data: {
                nazov: value,
                _token: $('meta[name="csrf-token"]').attr('content'),
            },
            success: function (data) {
                console.log(data.message);
            },
            error: function (error) {
                console.log('Error:', error);
            },
        });
    });
});
