<?php
include("sqlConnect.php");

function getData(){
    $data = array();
    $data[1]=$_POST['user'];
    $data[2]=$_POST['email'];
    $data[3]=$_POST['dob'];
    $data[4]=$_POST['pwd'];
    $data[5]=$_POST['repwd'];
    return $data;
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
        <h1>Register</h1>
        <p>admin account</p>
    </div>

    <div class="container">
        <form method="POST" id="inform">
            <div class="row" style="justify-content: center;">

                <div class="col-sm-5">
                    <div class="form-group">
                        <label for="user">Username:</label>
                        <input required type="text" class="form-control" id="user" name="user" maxlength="20" minlength="4">
                    </div>
                    <div class="form-group">
                        <label for="email">Email:</label>
                        <input required type="email" class="form-control" id="email" name="email" maxlength="30">
                    </div>
                    <div class="form-group">
                        <label for="dob">Date of birth</label>
                        <input required type="date" class="form-control" id="dob" name="dob">
                    </div>
                    <div class="form-group">
                        <label for="pwd">Password:</label>
                        <input required type="password" class="form-control" id="pwd" name="pwd" minlength="6">
                    </div>
                    <div class="form-group">
                        <label for="repwd">Confirm Password:</label>
                        <input required type="password" class="form-control" id="repwd" name="repwd">
                    </div>

                    <button type="submit" onclic class="btn btn-outline-secondary" name="insert"
                        id="insert">Register</button>
                    <?php
                    var_dump(isset($_POST['insert'])); 
                    if(isset($_POST['insert']) ){                      
                    $info = getData();
                    if($info[4]==$info[5]){       
                        echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>Success!</strong> Lets <a href="/login.php">login</a> site!
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="false">&times;</span>
                        </button>
                    </div>';        
                        $insert="INSERT INTO [adUser] ([username]
                        ,[email]
                        ,[dob]
                        ,[pwd]) VALUES ('$info[1]','$info[2]','$info[3]','$info[4]')";
                        $result= sqlsrv_query($conn, $insert);
                    
                    }
                    else{
                        echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
                        <strong>Warning!</strong> Password not match!!!
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="false">&times;</span>
                        </button>
                    </div>';
                    }                    
                    }
                    ?>
                </div>

        </form>

    </div>
    </div>

</body>

</html>