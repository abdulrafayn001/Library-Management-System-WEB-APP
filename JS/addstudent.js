$(
    function () {
        $(".pannel").on("click", "#addstd", function (event) {
            $.ajax({
                url: "studentadd.php",
                type: "POST",
                success: function (data) {
                    $(".pannel").html(data)
                }
            })
        });
    }
);
$(
    function () {
        $(".pannel").on("click", "#adstd", function (event) {
            var name = $("#name").val();
            var eml = $("#email").val();
            var pswd = $("#pswd").val();
            $.ajax({
                url: "studentaddop.php",
                type: "POST",
                data: {user:name,email:eml,password:pswd},
                success: function (data) {
                    $(".pannel").html(data)
                }
            })
        });
    }
);