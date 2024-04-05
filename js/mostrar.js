
$(document).ready(function() {
    $('#name').change(function() {
        var name = $(this).val();
        $.ajax({
            type: 'POST',
            url: 'getUserData.php',
            data: { name: name },
            success: function(response) {
                var data = JSON.parse(response);
                $('#no_empleado').val(data.no_empleado);
                $('#user_name').val(data.user_name);
                $('#sucursal').val(data.sucursal);
                $('#area').val(data.area);
            },
            error: function(xhr, status, error) {
                console.error(error);
            }
        });
    });
});
