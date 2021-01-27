$(
    function () {
        $("#changpswd").click(
            function () {
                $.ajax({
                    url: "passwordform.php",
                    type: "POST",
                    success: function (data) {
                        $(".pannel").html(data)
                    }
                })
            }
        );
    }
);