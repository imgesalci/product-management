$(document).ready(function () {
    $('.btn').on('click', function () {
        var button = $(this);
        var id = $(this).data('id');
        if (confirm("Do you want to delete this row?")) {
            $.ajax({
                type: 'POST',
                url: './deleting.php',
                data: { id: id },
                success: function (response) {
                    alert(response);
                    button.closest('tr').remove();
                    window.location.reload();
                },
                error: function (xhr, status, error) {
                    console.error(xhr);
                }
            });
        }
    });
});
