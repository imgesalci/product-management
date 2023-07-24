$(document).ready(function () {
    $('.btn').on('click', function () {
        var id = $(this).data('id'); // Retrieve the id from the button's data attribute
        console.log(id);
        $.ajax({
            type: 'POST',
            url: '/project/deleting.php',
            data: { id: id }, // Pass the correct id in the AJAX request
            success: function (response) {
                if (response.includes("successfully restored") || response.includes("Row deleted")) {
                    // Remove the deleted row from the table
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
