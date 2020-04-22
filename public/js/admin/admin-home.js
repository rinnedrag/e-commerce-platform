$(document).ready(function () {
    let $url = "http://127.0.0.1:8000";

    $("#sidebar").mCustomScrollbar({
        theme: "minimal"
    });

    $('#sidebarCollapse').on('click', function () {
        $('#sidebar, #content').toggleClass('active');
        $('.collapse.in').toggleClass('in');
        $('a[aria-expanded=true]').attr('aria-expanded', 'false');
    });

    $("#formCreateProduct").submit(function (event) {
        event.preventDefault();
        //Create an FormData object
        let $data = new FormData(this);

        $.ajax({
            url: $url+"/admin/products/create",
            type : "POST",
            contentType : false,
            processData: false,
            data : $data,
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
});

$('#selectSoleMaterials').multiSelect({
    afterSelect: function(values) {
        let $index = $('#percentSoleMaterials input').length/2;
        let $material = values + '-div';
        $material = $material.replace(/ /g, '-');
        $("#percentSoleMaterials").append("<div id='sole-"+$material+"' class='form-row'>" +
            "<div class=\"col-sm-6 my-1\">" +
            "<input class=\"form-control\"" +
            "name='soleMaterials[" + $index + "][material]' type=\"text\" value=\"" +values + "\" readonly>" +
            "</div>" +
            "<div class=\"col-sm-2 my-1\">" +
            "<input class=\"form-control\"" +
            "name='soleMaterials[" + $index + "][percent]' " +
            "min='1' max='100' type=\"text\" placeholder='%' required>" +
            "</div>" +
            "</div>");
    },
    afterDeselect: function(values){
        let $material = values + '-div';
        $('#sole-'+$material.replace(/ /g, '-')).children().remove();
        $('#sole-'+$material.replace(/ /g, '-')).remove();
    }
});

$('#selectInsoleMaterials').multiSelect({
    afterSelect: function(values) {
        let $index = $('#percentInsoleMaterials input').length/2;
        let $material = values + '-div';
        $material = $material.replace(/ /g, '-');
        $("#percentInsoleMaterials").append("<div id='insole-"+$material+"' class='form-row'>" +
            "<div class=\"col-sm-6 my-1\">" +
            "<input class=\"form-control\"" +
            "name='insoleMaterials[" + $index + "][material]' type=\"text\" value=\"" +values + "\" readonly>" +
            "</div>" +
            "<div class=\"col-sm-2 my-1\">" +
            "<input class=\"form-control\"" +
            "name='insoleMaterials[" + $index + "][percent]' " +
            "min='1' max='100' type=\"text\" placeholder='%' required>" +
            "</div>" +
            "</div>");
    },
    afterDeselect: function(values){
        let $material = values + '-div';
        $('#insole-'+$material.replace(/ /g, '-')).children().remove();
        $('#insole-'+$material.replace(/ /g, '-')).remove();
    }
});

$('#selectLiningMaterials').multiSelect({
    afterSelect: function(values) {
        let $index = $('#percentLiningMaterials input').length/2;
        let $material = values + '-div';
        $material = $material.replace(/ /g, '-');
        $("#percentLiningMaterials").append("<div id='lining-"+$material+"' class='form-row'>" +
            "<div class=\"col-sm-6 my-1\">" +
            "<input class=\"form-control\""+
            "name='liningMaterials[" + $index + "][material]' type=\"text\" value=\"" +values + "\" readonly>" +
            "</div>" +
            "<div class=\"col-sm-2 my-1\">" +
            "<input class=\"form-control\"" +
            "name='liningMaterials[" + $index + "][percent]' " +
            "min='1' max='100' type=\"text\" placeholder='%' required>" +
            "</div>" +
            "</div>");
    },
    afterDeselect: function(values){
        let $material = values + '-div';
        $('#lining-'+$material.replace(/ /g, '-')).children().remove();
        $('#lining-'+$material.replace(/ /g, '-')).remove();
    }
});
$('#selectBaseMaterials').multiSelect({
    afterSelect: function(values) {
        let $index = $('#percentBaseMaterials input').length/2;
        let $material = values + '-div';
        $material = $material.replace(/ /g, '-');
        $("#percentBaseMaterials").append("<div id='base-"+$material+"' class='form-row'>" +
            "<div class=\"col-sm-6 my-1\">" +
            "<input class=\"form-control\"" +
            "name='baseMaterials[" + $index + "][material]' type=\"text\" value=\"" +values + "\" readonly>" +
            "</div>" +
            "<div class=\"col-sm-2 my-1\">" +
            "<input class=\"form-control\"" +
            "name='baseMaterials[" + $index + "][percent]' " +
            "min='1' max='100' type=\"text\" placeholder='%' required>" +
            "</div>" +
            "</div>");
    },
    afterDeselect: function(values){
        let $material = values + '-div';
        $('#base-'+$material.replace(/ /g, '-')).children().remove();
        $('#base-'+$material.replace(/ /g, '-')).remove();
    }
});
$('#selectColors').multiSelect({
    afterSelect: function (values) {
        let $index = $('#colorsAdditions input:text').length;
        let $k = 0;
        let $str = '';
        $.each($("#selectSizes option:selected"), function(){
            $str += "<input class=\"form-control\" name='colors["+$index+"][sizes]["+$k+"][size]' value='"+$(this).val()+"' readonly>";
            $str += "<input class=\"form-control\" name='colors["+$index+"][sizes]["+$k+"][count]' type=\"number\" min=1>";
            $k++;
        });
        $("#colorsAdditions").append("<div id='"+values+"' class='form-row'>" +
            "<div class=\"col-sm-2 my-1\">"+
            "<input class=\"form-control\" name='colors["+$index+"][color]'" +
            " type=\"text\" value=\""+values+"\" readonly>" +
            "</div>"+
            "<div class=\"col-sm-3 my-1\">"+
            "<label>Фотографии модели обуви</label>"+
            "<input type=\"file\" name='"+ values+"[]'" +
            "class=\"form-control-file\" min='1' multiple=\"multiple\" accept=\".jpg, .jpeg, .png\">"+
            "</div>"+
            "<div class='col-sm-1 my-1'>" +
            $str+
            "</div>"+
            "</div>");
    },
    afterDeselect: function (values) {
        $('#'+values).children().remove();
        $('#'+values).remove();
    }
});
$('#selectSizes').multiSelect();

$('#example-getting-started').multiselect({templates: {
        li: '<li><a class="dropdown-item" tabindex="0"><label style="padding-left: 10px;width: 100%"></label></a></li>',
    }
});



