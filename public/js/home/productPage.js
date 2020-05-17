let url="http://127.0.0.1:8000"

$('input[name="cs"]').change(function() {
    let modelID = $('input[name="cs"]:checked').val();
    $.ajax({
        url: url+"/product/" + modelID + "/data",
        type : "GET",
        success : function (result) {
            changeImages(result.images);
            changeSizes(result.sizes);
            changeModelDetails(result.model_details);
        },
        error: function(xhr, resp, text) {
            // вывести ошибку в консоль
            console.log(xhr, resp, text);
        }
    });
});

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
        "<div class=\"product-pic-zoom\">\n" +
        "  <img class=\"product-big-img\" " +
        "src='/storage/images/footwear/"+ images[0].model_id+"/" + images[0].filename +"' alt=\"\">\n" +
        "</div>\n" +
        "<div class=\"product-thumbs\" tabindex=\"1\" style=\"overflow: hidden; outline: none;\">\n" +
        "   <div class=\"product-thumbs-track\">\n";
    let firstIteration = true;
    for (let image of images) {
        let active = '';
        if (firstIteration) {
            active = 'active';
            firstIteration = false;
        }
        content +=
            "<div class='pt "+ active +"' data-imgbigurl='/storage/images/footwear/"+ image.model_id+"/thumb-" +image.filename +"'>\n" +
            "  <img src='/storage/images/footwear/"+ image.model_id+"/thumb-" +image.filename +"' alt=\"\"></div>"
    }
    content +=
        "</div>\n</div>\n";
    $('#images').html(content);
}
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

