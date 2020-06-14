$(document).ready(function () {
    $('.selectpicker').selectpicker();
})

$("#update-order-status").click(function (event) {
    event.preventDefault();
    //Create an FormData object
    let data = {
        order_status: $('#order_status').val()
    }

    $.ajax({
        url: url+"/admin/orders/"+$('#orderID').text()+"/update/status",
        type : "PUT",
        contentType : 'application/json',
        data : JSON.stringify(data),
        success : function(result) {
            // продукт был создан, вернуться к списку продуктов
            alert('Статус заказа успешно обновлён');
            location.reload();
        },
        error: function(xhr, resp, text) {
            // вывести ошибку в консоль
            console.log(xhr, resp, text);
        }
    })
})
