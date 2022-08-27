delivery();
$(function () {
    $(".checkbox_wrapper").on("click", function () {
        $(this)
            .parents(".card")
            .find(".checkbox_childrent")
            .prop("checked", $(this).prop("checked"));
    });

    $(".checkall").on("click", function () {
        $(this)
            .parents()
            .find(".checkbox_childrent")
            .prop("checked", $(this).prop("checked"));
        $(this)
            .parents()
            .find(".checkbox_wrapper")
            .prop("checked", $(this).prop("checked"));
    });
});

$(document).ready(function () {
    load_gallery();
    function load_gallery() {
        var product_id = $(".product_id").val();
        var _token = $('.input[name="_token"]').val();
        $.ajax({
            url: "/admin/gallery/gallery-all",
            method: "GET",
            data: { product_id: product_id, _token: _token },
            success: function (data) {
                $("#gallery_load").html(data);
            },
        });
    }

    $("#file").change(function () {
        var error = "";
        var files = $("#file")[0].files;
        if (files.length > 5) {
            error += "<p>Tối đa 5 ảnh</p>";
        } else if (files.length == "") {
            error += "<p>không được để trống</p>";
        }
        if ((error = "")) {
        } else {
            $("#file").val("");
            $("#error_gallery").html(
                '<span class = "text-danger">' + error + "</span>"
            );
            return false;
        }
    });
});

$(document).ready(function () {
    $("#datatable").DataTable();
});

function delivery() {
    $(document).ready(function () {
        update_delivery();
        fetch_delivery();
        function fetch_delivery() {
            var _token = $('input[name="_token"]').val();
            $.ajax({
                type: "POST",
                url: route("feeship.feeship"),
                data: {
                    _token: _token,
                },
                success: function (data) {
                    $("#load_delivery").html(data);
                },
            });
        }

        function update_delivery() {
            $(document).on("blur", ".edit_feeship", function () {
                var id = $(this).data("feeship_id");
                var value = $(this).text();
                var _token = $('input[name="_token"]').val();
                $.ajax({
                    type: "POST",
                    url: route("feeship.update_feeship"),
                    data: {
                        id: id,
                        value: value,
                        _token: _token,
                    },
                    success: function (data) {
                        fetch_delivery();
                    },
                });
            });
        }
        $(".delivery").click(function () {
            var city = $(".city").val();
            var province = $(".province").val();
            var wards = $(".wards").val();
            var feeship = $(".feeship").val();
            var _token = $('input[name="_token"]').val();

            $.ajax({
                type: "POST",
                url: route("feeship.insert_delivery"),
                data: {
                    city: city,
                    province: province,
                    wards: wards,
                    feeship: feeship,
                    _token: _token,
                },
                success: function (data) {
                    swal({
                        title: "",
                        text: "Thêm Thành công",
                        icon: "success",
                        button: "",
                    });
                    fetch_delivery();
                },
            });
        });
        $(".choose").on("change", function () {
            var action = $(this).attr("id");
            var ma_id = $(this).val();
            var _token = $('input[name="_token"]').val();
            var result = "";

            if (action == "city") {
                result = "province";
            } else {
                result = "wards";
            }
            $.ajax({
                type: "POST",
                url: route("coupon.select_delivery"),
                data: {
                    action: action,
                    ma_id: ma_id,
                    _token: _token,
                },
                success: function (data) {
                    $("#" + result).html(data);
                },
            });
        });
    });
}
