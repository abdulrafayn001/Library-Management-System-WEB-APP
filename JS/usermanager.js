$(
    function () {
        $("#users").click(
            function () {
                $.ajax({
                    url: "usermanager.php",
                    type: "POST",
                    success: function (data) {
                        $(".pannel").html(data)
                    }
                })
            }
        );
    }
);