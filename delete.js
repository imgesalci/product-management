$(document).ready(function () {
    $('.btn').on('click', function () {
        var id = $(this).data('id'); 
        $.ajax({
            type: 'POST',
            url: '/project/deleting.php',
            data: { id: id },
            success: function (response) {
                if (response.includes("successfully restored") || response.includes("Row deleted")) {
                    $(this).closest('tr').remove();
                    location.reload();
                }
            },
            error: function (xhr, status, error) {
                console.error(xhr);
            }
        });
    });
});
