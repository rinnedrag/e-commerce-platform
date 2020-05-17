$(document).ready(function () {
    $('.selectpicker').selectpicker();
})

let url = "http://127.0.0.1:8000";
/* Filter Parameters */

function getFilterParams() {
    let query_params = '?';

    let selected_colors = [];
    $('input:checkbox:checked').each(function() {
        selected_colors.push($(this).val())
    });
    if (selected_colors.length !== 0) {
        query_params += 'color=' + selected_colors + '&';
    }

    $('.selectpicker').each(function() {
        let selected_data = $(this).val();
        let select_name = $(this).attr('name');
        if (selected_data.length !== 0) {
            query_params += select_name + '=' + selected_data + '&';
        }
    });

    let min_price = $('input[name="min_price"]').val().slice(0,-4);
    let max_price = $('input[name="max_price"]').val().slice(0,-4);

    query_params += 'min_price='+ min_price + '&max_price=' + max_price;

    return query_params;
}

function replaceCatalog(result) {
    let content = '';
    for (let item of result) {
        content += "<div class=\"col-lg-4 col-sm-6\">\n" +
            " <div class=\"product-item\">\n" +
            "   <div class=\"pi-pic\">\n" +
            "     <div class=\"tag-sale\">ON SALE</div>\n" +
            "        <a  href='"+ url +"/product/" + item.id + "'>\n" +
            "           <img src='/storage/images/footwear/"+ item.id + '/'+ item.filename +"' alt=\"\"></a>\n" +
            "              <div class=\"pi-links\">\n" +
            "                 <a href=\"#\" class=\"add-card\">\n" +
            "                     <i class=\"fas fa-shopping-bag\"></i><span>ADD TO CART</span></a>\n" +
            "                        <a href=\"#\" class=\"wishlist-btn\"><i class=\"fas fa-heart\"></i></a>\n" +
            "              </div>\n" +
            "     </div>\n" +
            "      <div class=\"pi-text\">\n" +
            "         <h6> "+ item.price +" &#8381;</h6>\n" +
            "            <p><b>"+ item.brand +"</b>\\"+ item.kind +"</p>\n" +
            "      </div>\n" +
            "  </div>\n" +
            "</div>\n"
    }
    $('#footwear_content').html(content);
}

/*-------------------
    Range Slider
        --------------------- */
let rangeSlider = $(".price-range"),
    minamount = $("#minamount"),
    maxamount = $("#maxamount"),
    minPrice = rangeSlider.data('min'),
    maxPrice = rangeSlider.data('max');
rangeSlider.slider({
    range: true,
    min: minPrice,
    max: maxPrice,
    step: 10,
    values: [minPrice, maxPrice],
    slide: function (event, ui) {
        minamount.val( ui.values[0] + ' RUB');
        maxamount.val( ui.values[1] + ' RUB');
    },
    change: function( event, ui ) {
        $.ajax({
            url: url+"/catalog/filters" + getFilterParams(),
            type : "GET",
            success : function (result) {
                replaceCatalog(result)
            },
            error: function(xhr, resp, text) {
                // вывести ошибку в консоль
                console.log(xhr, resp, text);
            }
        });
    }
});
minamount.val( rangeSlider.slider("values", 0) + ' RUB');
maxamount.val( rangeSlider.slider("values", 1) + ' RUB');


$('input:checkbox').change(function() {
    $.ajax({
        url: url+"/catalog/filters" + getFilterParams(),
        type : "GET",
        success : function (result) {
            replaceCatalog(result)
        },
        error: function(xhr, resp, text) {
            // вывести ошибку в консоль
            console.log(xhr, resp, text);
        }
    });
});

$('.selectpicker').on('changed.bs.select', function (e, clickedIndex, isSelected, previousValue) {
    $.ajax({
        url: url+"/catalog/filters" + getFilterParams(),
        type : "GET",
        success : function (result) {
            replaceCatalog(result)
        },
        error: function(xhr, resp, text) {
            // вывести ошибку в консоль
            console.log(xhr, resp, text);
        }
    });
})

/*  sildeBar scroll */
$.scrollUp({
    scrollName: 'scrollUp', // Element ID
    topDistance: '300', // Distance from top before showing element (px)
    topSpeed: 300, // Speed back to top (ms)
    animation: 'fade', // Fade, slide, none
    animationInSpeed: 200, // Animation in speed (ms)
    animationOutSpeed: 200, // Animation out speed (ms)
    scrollText: '<i class="ti-arrow-up"></i>', // Text for element
    activeOverlay: false, // Set CSS color to display scrollUp active point, e.g '#00FFFF'
});
