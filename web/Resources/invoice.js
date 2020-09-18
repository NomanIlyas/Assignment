$(document).ready(function() {
    setTimeout(function() {
        $('#flash-messages').fadeOut('slow');
    }, 10000);
});

$(document).ready(function () {
    $('#dtBasicExample').DataTable({
        "pagingType": "full"
    });
    $('.dataTables_length').addClass('bs-select');
});