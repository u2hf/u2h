<?php
include("sqlConnect.php");
$getdb=array();
$getdb="SELECT [username] ,[pwd] FROM [dbUser].[dbo].[adUser]";
$result = sqlsrv_query($conn,$getdb);
if( $result === false) {
    die( print_r( sqlsrv_errors(), true) );
}
//getdata tu input
function getData(){
    $data = array();
    $data[1]=$_POST['user'];
    $data[2]=$_POST['pwd'];
    return $data;
}


if(isset($_POST['insert']))
{
    $info = getdata();
//cho vao vong lap while de quet toan bo 
while($row = sqlsrv_fetch_array($result,SQLSRV_FETCH_ASSOC)){
    if($row['username']==$info[1] && $row['pwd']==$info[2]){
        header("Location: /adminpage.php");
    }
    else
    {
        //
    }
}
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Bootstrap Example</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>

        <div class="jumbotron text-center">
            <h1>Login</h1>
            <p>admin account</p>
        </div>

        <div class="container">
            <form method="POST" id="inform" require>
                <div class="row" style="justify-content: center;">

                    <div class="col-sm-5">
                        <div class="form-group">
                            <label for="user">Username:</label>
                            <input type="text" class="form-control" id="user" name="user" maxlength="20" minlength="4"
                                require>
                        </div>                        
                        <div class="form-group">
                            <label for="pwd">Password:</label>
                            <input type="password" class="form-control" id="pwd" name="pwd" minlength="6" require>
                        </div>
                        <h6><a href="/register.php">Tạo tài khoản</a> <br/></h6>
                        <button type="submit" onclick="matchPassword()" class="btn btn-outline-secondary" name="insert"
                            id="insert">Login</button>

                    </div>

            </form>

        </div>
        </div>

</body>

</html>