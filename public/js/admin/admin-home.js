$(document).ready(function () {
    $("#sidebar").mCustomScrollbar({
        theme: "minimal"
    });

    $('#sidebarCollapse').on('click', function () {
        $('#sidebar, #content').toggleClass('active');
        $('.collapse.in').toggleClass('in');
        $('a[aria-expanded=true]').attr('aria-expanded', 'false');
    });

    $("#formCreateProduct").submit(function () {

        $('#result').html("JSON формы<br />" +
            JSON.stringify($(this).serializeJSON({useIntKeysAsArrayIndex: true})));
        $.ajax({
            url: "http://127.0.0.1:8000/admin/products/create",
            type : "POST",
            contentType : 'application/json',
            data : JSON.stringify($(this).serializeJSON({useIntKeysAsArrayIndex: true})),
            success : function(result) {
                // продукт был создан, вернуться к списку продуктов
                //showProducts();
            },
            error: function(xhr, resp, text) {
                // вывести ошибку в консоль
                console.log(xhr, resp, text);
            }
        });

        return false;
    });


    $("#buttonSelSoleMaterials").click(function () {
        $("#percentSoleMaterials").html('');
        let $i = 0;
        $("#selectSoleMaterials option:selected").each(function() {
            $("#percentSoleMaterials").append("<div class='form-row'>" +
                "<div class=\"col-sm-3 my-1\">"+
                "<input class=\"form-control\" name='soleMaterials["+$i+"][material]' type=\"text\" value=\""+$( this ).text()+"\" readonly>" +
                "</div>"+
                "<div class=\"col-sm-1 my-1\">"+
                "<input class=\"form-control\" name='soleMaterials["+$i+"][percent]' " +
                "min='1' max='100' type=\"text\" placeholder='%'>" +
                "</div>"+
                "</div>");
            $i++;
        });
    });



    $("#buttonSelInsoleMaterials").click(function () {
        $("#percentInsoleMaterials").html('');
        let $i = 0;
        $("#selectInsoleMaterials option:selected").each(function() {
            $("#percentInsoleMaterials").append("<div class='form-row'>" +
                "<div class=\"col-sm-3 my-1\">"+
                "<input class=\"form-control\" name='insoleMaterials["+$i+"][material]' type=\"text\" value=\""+$( this ).text()+"\" readonly>" +
                "</div>"+
                "<div class=\"col-sm-1 my-1\">"+
                "<input class=\"form-control\" name='insoleMaterials["+$i+"][percent]' " +
                "min='1' max='100' type=\"number\" placeholder='%'>" +
                "</div>"+
                "</div>");
            $i++;
        });
    });

    $("#buttonSelLiningMaterials").click(function () {
        $("#percentLiningMaterials").html('');
        let $i = 0;
        $("#selectLiningMaterials option:selected").each(function() {
            $("#percentLiningMaterials").append("<div class='form-row'>" +
                "<div class=\"col-sm-3 my-1\">"+
                "<input class=\"form-control\" name='liningMaterials["+$i+"][material]' type=\"text\" value=\""+$( this ).text()+"\" readonly>" +
                "</div>"+
                "<div class=\"col-sm-1 my-1\">"+
                "<input class=\"form-control\" name='liningMaterials["+$i+"][percent]' " +
                "min='1' max='100' type=\"number\" placeholder='%'>" +
                "</div>"+
                "</div>");
            $i++;
        });
    });

    $("#buttonSelBaseMaterials").click(function () {
        $("#percentBaseMaterials").html('');
        let $i = 0;
        $("#selectBaseMaterials option:selected").each(function() {
            $("#percentBaseMaterials").append("<div class='form-row'>" +
                "<div class=\"col-sm-3 my-1\">"+
                "<input class=\"form-control\" name='baseMaterials["+$i+"][material]' type=\"text\" value=\""+$( this ).text()+"\" readonly>" +
                "</div>"+
                "<div class=\"col-sm-1 my-1\">"+
                "<input class=\"form-control\" name='baseMaterials["+$i+"][percent]' " +
                "min='1' max='100' type=\"number\" placeholder='%'>" +
                "</div>"+
                "</div>");
            $i++;
        });
    });

    $("#buttonSelColors").click(function () {
        $("#colorsAdditions").html('');
        let $i = 0;
        $("#selectColors option:selected").each(function() {
            let $str = "";
            let $k = 0;
            $.each($("#selectSizes option:selected"), function(){
                $str += "<input class=\"form-control\" name='colors["+$i+"][sizes]["+$k+"][size]' value='"+$(this).val()+"' readonly>";
                $str += "<input class=\"form-control\" name='colors["+$i+"][sizes]["+$k+"][count]' type=\"number\" min=1>";
                $k++;
            });
            $("#colorsAdditions").append("<div class='form-row'>" +
                "<div class=\"col-sm-3 my-1\">"+
                "<input class=\"form-control\" name='colors["+$i+"][color]' type=\"text\" value=\""+$( this ).text()+"\" readonly>" +
                "</div>"+
                "<div class=\"col-sm-3 my-1\">"+
                "<label>Фотографии модели обуви</label>"+
                "<input type=\"file\" name='colors["+$i+"][images]' " +
                "class=\"form-control-file\" min='1' multiple=\"multiple\" accept=\".jpg, .jpeg, .png\">"+
                "</div>"+
                "<div class='col-sm-3 my-1'>" +
                $str+
                "</div>"+
                "</div>");
            $i++;
        });
    });

});

$('#selectSoleMaterials').multiSelect({
    afterSelect: function(values){
        let $str = values;
        //$str = $str.replace(/b/, '-');
        $str += '-input';
        $('#result').append("<input class='form-control' id='"+$str.replace(/ /g,'-')+"' value='"+values+"'>");
    },
    afterDeselect: function(values){
        let $str = values;
        $str += '-input';
        $('#'+$str.replace(/ /g,'-')).remove();
    }
});

$('#selectInsoleMaterials').multiSelect();
$('#selectLiningMaterials').multiSelect();
$('#selectBaseMaterials').multiSelect();
$('#selectColors').multiSelect();
$('#selectSizes').multiSelect();

$('#example-getting-started').multiselect({templates: {
        li: '<li><a class="dropdown-item" tabindex="0"><label style="padding-left: 10px;width: 100%"></label></a></li>',
    }
});

$(document).on('submit', '#create-product-form', function(){
    // получение данных формы
    var form_data=JSON.stringify($(this).serializeObject());

    // отправка данных формы
    $.ajax({
        url: "/admin/products/create",
        type : "POST",
        contentType : 'application/json',
        data : form_data,
        success : function(result) {
            // продукт был создан, вернуться к списку продуктов
            showProducts();
        },
        error: function(xhr, resp, text) {
            // вывести ошибку в консоль
            console.log(xhr, resp, text);
        }
    });

    return false;
});


