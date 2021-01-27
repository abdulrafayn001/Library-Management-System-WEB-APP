$(
    function () {
        $(".pannel").on("click", "#update_admin", function (event) {
            var v1 = $("#email").val();
            var v2 = $("#name").val();
            $.ajax({
                url: "profileupdate.php",
                type: "POST",
                data: { email: v1, name: v2},
                success: function (data) {
                    $(".pannel").html(data)
                }
            })
        });
    }
);