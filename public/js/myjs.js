$(document).ready(function () {
    filter_product();
    slider_product();
    category_tree_view();
    pagination_product();
});

function filter_product() {
    $('input[name="btn_submit"]').click(function () {
        $.ajax({
            type: 'POST',
            url: root_url + 'index.php/product/filter',
            data: {
                amount: $("#amount").val(),
                catid: $("#hiddent_cat_id").val(),
                color_id: $("#color_id:checked").val(),
                datatype: 'html'
            },
            beforeSend: function () {
                $("#prod_content").html("");
            },
            success: function (kq) {
                $("#prod_content").html(kq);
            }
        }).done(function () {

            });

    });
}

function slider_product() {
    $( "#slider-range" ).slider({
        range: true,
        min: 0,
        max: 500,
        values: [ 58, 300 ],
        slide: function( event, ui ) {
            $( "#amount" ).val( "$" + ui.values[ 0 ] + " - $" + ui.values[ 1 ] );
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
        $.ajax({
            type: "POST",
            url: url,
            data: {
                "ajax" : 1,
                "amount" : $('#hiddent_current_price').val()
            },
            beforeSend: function(){
                $("#prod_content").html("");
            },
            success: function(kq){
                $("#prod_content").html(kq);
            }
        })
        return false;
    });
}