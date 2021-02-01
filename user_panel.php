<?php
    session_start();
    // function phpAlert($msg) {
    //     echo '<script type="text/javascript">alert("' . $msg . '")</script>';
    // }
    
    // if($_SESSION['login']=="yes")
    // {
    //     phpAlert("Successfully Login.\nClick ok to continue");
    //     $_SESSION['login']=="no";
    // }
    
    if(!isset($_SESSION['username']))
    {
        header("Location: student_login_form.php" );
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Dashboard | User</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css">
    <link rel="stylesheet" href="CSS/student_dashboard.css">
    <script src="JS/dashboard.js" defer></script>
    <script
        type="text/javascript"
        src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"
    ></script>
    

    <script
        type="text/javascript"
    >
         

        $(
            function()
            {
                $("#data_container").on("click","#searching",function(enent){
                    var val1 = $('#book_name').val();
                    var val2 = $('#cat').val();
                    var val3 = "no";
                    $.ajax(
                        {
                            url:"searching.php",
                            type:"POST",
                            data:{name:val1, cat:val2,check:val3},
                            success:function(response)
                            {
                                $("#info_table").html(response);
                            }
                        }
                    )
                });
                
            }
        );

        $(
            function()
            {
                $("#data_container").on("click","#changePassword",function(enent){
                    var val1 = $('#new_one').val();
                    var val2 = $('#confirm_new_one').val();
                    var val4 = $('#op').val();
                    var val3 = "yes";
                    $.ajax(
                        {
                            url:"student_password_change.php",
                            type:"POST",
                            data:{new_one:val1, confirm_new_one:val2,isCheck:val3, old_pas:val4},
                            success:function(response)
                            {
                                $("#data_container").html(response);
                            }
                        }
                    )
                }); 
            }
        );  

        $(
            function()
            {
                $("#data_container").on("click",".request",function(enent){
                    var val2 = $(this).val();
                    var val1 = $(this).attr("name");
                    var val3 = "yes";
                    $.ajax(
                        {
                            url:"searching.php",
                            type:"POST",
                            data:{book_id:val1, user_email:val2,check:val3},
                            success:function(response)
                            {
                                $("#info_table").html(response);
                            }
                        }
                    )
                }); 
            }
        );
        //-------------->$_SESSIO
        $(
            function()
            {
                $("#data_container").on("click",".ok",function(enent){
                    var val2 = $(this).val();
                    var val1 = $(this).attr("name");
                    var val3 = "yes";
                    $.ajax(
                        {
                            url:"books_status.php",
                            type:"POST",
                            data:{user:val1, book:val2,check:val3},
                            success:function(response)
                            {
                                $("#data_container").html(response);
                            }
                        }
                    )
                }); 
            }
        );

        
       


        $(
            function()
            {
                $("#change_pasword").click(
                    function()
                    {
                        var x="no";
                        $.ajax(
                            {
                                url:"student_password_change.php",
                                type:"POST",
                                data:{isCheck:x},
                                success:function(d)
                                {
                                    $("#data_container").html(d)
                                }
                            }
                        )
                    }
                );
            }
        );


        $(
            function()
            {
                $("#books").click(
                    function()
                    {
                        $.ajax(
                            {
                                url:"allBooksTable.php",
                                type:"POST",
                               
                                success:function(data)
                                {
                                    $("#data_container").html(data)
                                }
                            }
                        )
                    }
                );
            }
        );

        $(
            function()
            {
                $("#book_status").click(
                    function()
                    {
                        var val3 = "no";
                        $.ajax(
                            {
                                url:"books_status.php",
                                type:"POST",
                                data:{check:val3},
                                success:function(data)
                                {
                                    $("#data_container").html(data)
                                }
                            }
                        )
                    }
                );
            }
        );
        

        $(
            function()
            {
                $("#new_req").click(
                    function()
                    {
                        $.ajax(
                            {
                                url:"request_new_book.php",
                                type:"POST",
                                success:function(data)
                                {
                                    $("#data_container").html(data)
                                }
                            }
                        )
                    }
                );
            }
        );
//+++++++++++++++++++++?
        $(
            function()
            {
                $("#data_container").on("click","#req",function(enent){
                        var v1 = $('#req_book_name').val();
                        var v2 = $('#new_book_url').val();
                        var v3 = $('#req_note').val();
                    $.ajax(
                        {
                            url:"insert_new_book.php",
                            type:"POST",
                            data:{book_name:v1,url:v2,note:v3},
                            success:function(response)
                            {
                                $("#data_container").html(response);
                            }
                        }
                    )
                }); 
            }
        );
    </script>

    
    <style>
        .update_password {
            margin-top: 40px;
            padding: 5%;
            background-color: #654062;
            text-align: right;
            border-radius:30px;
            }

        input {
            margin-top: 20px;
            margin-bottom: 20px;
        }

        input[type=password] {
            width: 40%;
            padding: 12px;
            font-size: 18px;
        }

        #changePassword {
            outline: none;
            background: linear-gradient(to bottom, #f0be48 5%, #ffd369 100%);
            background-color: #ffd369;
            border-radius: 20px;
            display: inline-block;
            cursor: pointer;
            font-size: 16px;
            margin: 2rem;
            font-weight: bold;
            padding: 1rem;
            text-decoration: none;
        }
        .pannel
        {
            background-color: linen;
            height:100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            overflow: scroll;
        }
        .all {
            margin:0;
            height:inherit;
            padding:20px;
            background-color: linen;
            text-align:center;
        }
        input[type=text] {
        width: 40%;
        padding: 6px 10px;
        box-sizing: border-box;
        }
        input[type=text]:focus {
            border: 3px solid #555;
        }

        .search{
            margin-bottom:10px;
        }

        #searching{
            outline: none;
            background: linear-gradient(to bottom, #f0be48 5%, #ffd369 100%);
            background-color: #ffd369;
            border-radius: 20px;
            display: inline-block;
            cursor: pointer;
            font-size: 12px;
            width: 70px;
            font-weight: bold;
            padding:5px;
            text-decoration: none;
        }
    </style>
</head>

<body>
    <div class="headSection">
        <h1><?php echo $_SESSION['username']?>'s Dashboard</h1>
        <a href="logout.php" class="myButton"><i class="fas fa-sign-out-alt"></i>&nbsp;&nbsp;logout</a>
    </div>
    <div class="itemContainer">
        <div id="menuItem" class="menuItem">
            <h3>Options</h3>
            <button id="books" class="menuItems"><i class="fas fa-tachometer-alt"></i>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Dashboard</button>
            <button id="change_pasword" class="menuItems"><i class="fas fa-book"></i>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Change Password</button><br>
            <button id="new_req" class="menuItems"><i class="fas fa-book"></i>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Request New Book</button><br>
            <button id="book_status" class="menuItems"><i class="fas fa-book"></i>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Books Status</button><br>
        </div>
        <div class="collapser">
            <button name="hide" id="conatinerHider"><i class="fas fa-caret-right"></i></button>
        </div>
        <div id="data_container" class="pannel">
            <div class="all">
                <div class="search">
                    <input type="text" name="name" id="book_name" placeholder="Book Name">
                    <input type="text" name="cat" id="cat" placeholder="Category">
                    <button id="searching"> Search </button>
                </div>
                <div id="info_table">
                        <?php
                            $con = mysqli_connect('localhost','root','','Library Management System');
                            if($con)
                            {
                                $sql="SELECT *FROM books";
                                $check=mysqli_query($con,$sql);
                                if(empty($check))
                                {
                                    echo "<h3>No Recoed Found</h3><br>";
                                }
                                else
                                {
                                    echo '<table class="info">
                                    <tr>
                                        <th>ID #</th>
                                        <th>Book Name</th>
                                        <th>Book Desc</th>
                                        <th>Category</th>
                                        <th>Qty</th>
                                        <th>Borrowed</th>
                                        <th></th>
                                    </tr>';
                                    $i=0;
                                        while ($data = mysqli_fetch_assoc($check))
                                        {
                                            if($i%2==0)
                                            {
                                                echo '<tr class="body">';
                                            }
                                            else
                                            {
                                                echo '<tr class="active-row">';
                                            }

                                                echo'<td>' . $data['id'] . '</td>
                                                <td>' . $data['name'] . '</td>
                                                <td>' . $data['description'] . '</td>
                                                <td>' . $data['category'] . '</td>
                                                <td>' . $data['quantity'] . '</td>
                                                <td>' . $data['borrowed'] . '</td>
                                                <td>
                                                <input type="text" class="book_id" value=' . $data['id'] . ' hidden>
                                                <input type="text" class="user_email" value=' . $_SESSION['email'] . ' hidden>
                                                <button class="request" name=' . $data['id'] . ' value=' . $_SESSION['email'] . '>Request</button>
                                                </form></td>
                                                </tr>';
                                                $i=$i+1;
                                        }
                                    echo '</table>';
                                }
                            }
                        ?>
                </div>
            </div>
        </div>
    </div>
    <div class="table">
        
    </div>
</body>

</html>