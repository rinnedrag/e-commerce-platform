let url = '';

$('input[name="shipping"]').change(function (event) {
    event.preventDefault();

    let shipping = $('input[name="shipping"]:checked').val();
    let shippingPrice = 0;
    let address = '';
    switch (shipping) {
        case 'Курьерская доставка':
            shippingPrice = 300.00;
            break;
        case 'Почта России':
            shippingPrice = 1000.00;
            break;
        case 'Самовывоз':
            shippingPrice = 0.00;
            address = 'Санкт-Петербург, пр. Маршала-Блюхера, 8'
            break;
    }
    $('input[name="address"]').val(address);
    $('#shippingPrice').html(shippingPrice);
    $('#totalAmount').html(shippingPrice+parseFloat($('#productsAmount').text()));
})

$('#payment').click(function(event) {
    event.preventDefault();

    let form = document.getElementById('billing_info');
    let data = new FormData(form);
    data.append('billing_method', $('input[name="billing_method"]:checked').val())
    data.append('shipping_price', $('#shippingPrice').text());
    data.append('total', $('#totalAmount').text());

    $.ajax({
        url: url+"/orders/create",
        type : "POST",
        processData: false,
        contentType: false,
        data: data,
        success : function (result) {
            window.location = url + '/payment?order=' + result.order
        },
        error: function(xhr, resp, text) {
            // вывести ошибку в консоль
            console.log(xhr, resp, text);
        }
    });
})
