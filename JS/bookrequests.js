$(
    function () {
        $("#bookreq").click(
            function () {
                $.ajax({
                    url: "bookrequestsadmin.php",
                    type: "POST",
                    success: function (data) {
                        $(".pannel").html(data)
                    }
                })
            }
        );
    }
);