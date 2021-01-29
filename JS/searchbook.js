$(
    function () {
        $(".pannel").on("click", "#search", function (event) {
            var v1 = $("#name").val();
            var v2 = $("#cat").val();
            $.ajax({
                url: "searchingbookadmin.php",
                type: "POST",
                data: { name: v1, cat: v2 },
                success: function (data) {
                    $("#searchpannel").html(data)
                }
            })
        });
    }
);