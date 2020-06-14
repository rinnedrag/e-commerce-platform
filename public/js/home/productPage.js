let url = '';

$('input[name="cs"]').change(function() {
    let modelID = $('input[name="cs"]:checked').val();
    location.href = url+'/product/'+modelID
});

$('input[name="sc"]').change(function() {
    let ID = $('input[name="sc"]:checked').attr('id');
    let str = ID.split('-');
    $('#modelsCount').html(str[1]);
});
/*


$('input[name="sc"]').change(function() {
    alert('helo');
});

function changeModelDetails(model_details) {
    $('#price').html(model_details.price);
}

function changeSizes(sizes) {
    let content = '<p>Размер</p>\n';
    let firstIteration = true;
    for (let size of sizes) {
        let disabled = '';
        if (size.count === 0) {
            disabled = 'disabled';
        }
        let checked = '';
        if (firstIteration) {
            checked = 'checked';
            firstIteration = false;
        }
        content +=
            "<div class=\"sc-item\">\n" +
            "  <input type='radio' name='sc' value='"+ size.size +"'\n "+
            disabled + " " + checked +" id='"+ size.size +"'>\n" +
            "   <label for='"+ size.size +"'>"+ size.size +"</label>\n" +
            "  </div>\n"
    }
    $('#sizes').html(content);
}

function changeImages(images) {
    let content =
        "<div class='product-pic-zoom'>\n" +
        "  <img class='product-big-img' " +
        "src='/storage/images/footwear/"+ images[0].model_id+"/" + images[0].filename +"' alt=''>\n" +
        "</div>\n" +
        "<div class='product-thumbs' tabindex='1' style='overflow: hidden; outline: none;'>\n" +
        "   <div class='product-thumbs-track'>\n";
    let firstIteration = true;
    for (let image of images) {
        let active = '';
        if (firstIteration) {
            active = 'active';
            firstIteration = false;
        }
        content +=
            "<div class='pt "+ active +"' data-imgbigurl='/storage/images/footwear/"+ image.model_id+"/" +image.filename +"'>\n" +
            "  <img src='/storage/images/footwear/"+ image.model_id+"/thumb-" +image.filename +"' alt=\"\">" +
            "</div>"
    }
    content +=
        "</div>\n</div>\n</div>\n";
    $('#images').html(content);

    /!*------------------
		Single Product
	--------------------*!/
    $('.product-thumbs-track > .pt').on('click', function(){
        $('.product-thumbs-track .pt').removeClass('active');
        $(this).addClass('active');
        var imgurl = $(this).data('imgbigurl');
        var bigImg = $('.product-big-img').attr('src');
        if(imgurl != bigImg) {
            $('.product-big-img').attr({src: imgurl});
            $('.zoomImg').attr({src: imgurl});
        }
    });


    $('.product-pic-zoom').zoom();

    /!*------------------
            ScrollBar
        --------------------*!/
    $(".cart-table-warp, .product-thumbs").niceScroll({
        cursorborder:"",
        cursorcolor:"#afafaf",
        boxzoom:false
    });
}*/


/* 8. sildeBar scroll */
$.scrollUp({
    scrollName: 'scrollUp', // Element ID
    topDistance: '300', // Distance from top before showing element (px)
    topSpeed: 300, // Speed back to top (ms)
    animation: 'fade', // Fade, slide, none
    animationInSpeed: 200, // Animation in speed (ms)
    animationOutSpeed: 200, // Animation out speed (ms)
    scrollText: '<i class="fas fa-arrow-up"></i>', // Text for element
    activeOverlay: false, // Set CSS color to display scrollUp active point, e.g '#00FFFF'
});

