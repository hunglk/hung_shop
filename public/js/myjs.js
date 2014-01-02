$(document).ready(function () {

    filter_product();
    slider_product();
    category_tree_view();
    pagination_product();
    menu_dropdown();
    checkbox();
});

function load_filter()
{
    $("#filter_color").html('load filter');
    $.ajax({
        type: 'POST',
        url: root_url + 'index.php/product/set_color_filter',
        data: {
            "color_id_encode" : $('#hiddent_color_id').val(),
            datatype: 'html'
        },
        success: function (kq) {
            $("#filter_color").html(kq);
        }
    }).done(function () {

    });
}

function filter_product() {
    $('input[name="filter_submit"]').click(function (e) {
        var chk_color = new Array();
        $("#color_id:checked").each(function(){
            chk_color.push($(this).val());
        });
        $.ajax({
            type: 'POST',
            url: root_url + 'index.php/product/filter',
            data: {
                amount: $("#amount").val(),
                catid: $("#hiddent_cat_id").val(),
                color_id: chk_color,
                datatype: 'html'
            },
            success: function (kq) {
                $("#prod_content").html(kq);
                //load_filter();
            }
        }).done(function () {

        });

    });
}

function checkbox(){
    $('input[name="color_id[]"]').change(function(){
        var count_checked = 0;
        $('input[name="color_id[]"]').each(function () {
            if($(this).is(':checked'))
            {
                count_checked++;
            }
        });
        if(count_checked === 0)
        {
            slider_product();
        }
        filter();
    });
}

function filter()
{
    var chk_color = new Array();
    $("#color_id:checked").each(function () {
        chk_color.push($(this).val());
    });
    console.log($("#hiddent_cat_id").val());
    console.log($("#amount").val());
    console.log(chk_color);
    $.ajax({
        type: 'POST',
        url: root_url + 'index.php/product/filter',
        data: {
            amount: $("#amount").val(),
            catid: $("#hiddent_cat_id").val(),
            color_id: chk_color,
            datatype: 'html'
        },
        success: function (kq) {
            $("#prod_content").html(kq);
            //load_filter();
        }
    }).done(function () {

        });
}

function slider_product() {
    $( "#slider-range" ).slider({
        range: true,
        min: 0,
        max: 500,
        values: [ 0, 500 ],
        slide: function( event, ui ) {
            $( "#amount" ).val( "$" + ui.values[ 0 ] + " - $" + ui.values[ 1 ] );
        },
        change: function( event, ui ) {
            filter();
        }
    });
    $( "#amount" ).val( "$" + $( "#slider-range" ).slider( "values", 0 ) +
        " - $" + $( "#slider-range" ).slider( "values", 1 ) );
}

function category_tree_view() {
    $(".btn_toggle").click(function () {
        var my_id = $(this).parent().parent().attr('my_id');

        $(".catloop").each(function () {
            var parent_id = $(this).attr('parent_id');
            if (parent_id === my_id) {
                $(this).toggle();
            }
        });
        //dd
        if ($(this).text() == "+") {
            $(this).text('-');
        }
        else {
            $(this).text('+');
        }

    });
}

function pagination_product() {
    $("#content").on("click", "#jquery_home_product a", function(){
        var url = $(this).attr("href");
        console.log($('#hiddent_current_price').val());
        console.log($('#hiddent_color_id').val());
        console.log($('#hiddent_cat_id').val());
        console.log($(this).attr("href"));
        $.ajax({
            type: "POST",
            url: url,
            data: {
                "ajax" : 1,
                "amount" : $('#hiddent_current_price').val(),
                "catid" : $('#hiddent_cat_id').val(),
                "color_id" : $('#hiddent_color_id').val(),
                "color_id_encode" : $('#hiddent_color_id').val()
            },
            success: function(kq){
                $("#prod_content").html(kq);
            }
        })
        return false;
    });
}

function menu_dropdown(){
    $("#jMenu").jMenu({
        openClick: false,
        ulWidth: 'auto',
        TimeBeforeOpening: 100,
        TimeBeforeClosing: 11,
        animatedText: false,
        paddingLeft: 1,
        effects: {
            effectSpeedOpen: 150,
            effectSpeedClose: 150,
            effectTypeOpen: 'slide',
            effectTypeClose: 'slide',
            effectOpen: 'swing',
            effectClose: 'swing'
        }

    });
}