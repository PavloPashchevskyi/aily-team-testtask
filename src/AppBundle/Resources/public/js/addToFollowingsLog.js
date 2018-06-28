$(function () {
    $('a[data-shortlink="true"]').click(function() {
        ajaxObject = {
            type: "POST",
            url: "http://aily-team-testtask.loc/app_dev.php/followings-log/add",
            dataType: "json",
            data: {
                link: $(this).attr('href'),
                isShort: $(this).attr('data-shortlink')
            },
            success: function (response) {
                window.location.href = response['original'];
            },
            error: function () {
                console.log('AjaX ERROR!!!');
            }
        };
        $.ajax(ajaxObject);
    });
});