$(function () {
    $('a[data-shortlink="true"]').click(function() {
        ajaxObject = {
            type: "POST",
            url: '/followings-log/add',
            dataType: "json",
            success: function (response) {

            },
            error: function () {
                console.log('AjaX ERROR!!!');
            }
        };
        $.ajax(ajaxObject);
    });
});