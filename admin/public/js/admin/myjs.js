$(document).ready(function () {
    pagination_product();
    pagination_user();
});

function pagination_product() {
    $(document).ready(function () {
        $("#jquery_link_product a").click(function () {
            var url = $(this).attr("href");
            $.ajax({
                type: "POST",
                url: url,
                data: "ajax=1",
                beforeSend: function () {
                    $("#content").html("");
                },
                success: function (kq) {
                    $("#content").html(kq);
                }
            })
            return false;
        });
    })
}

function pagination_user() {
    $(document).ready(function () {
        $("#jquery_link a").click(function () {
            var url = $(this).attr("href");
            $.ajax({
                type: "POST",
                url: url,
                data: "ajax=1",
                beforeSend: function () {
                    $("#content").html("");
                },
                success: function (kq) {
                    $("#content").html(kq);
                }
            })
            return false;
        });
    })
}