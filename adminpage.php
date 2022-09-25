<?php
include("sqlConnect.php");


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
        <h1>Upload image</h1>
        <p>-----------------</p>
    </div>
    <form method="POST" id="inform">
        <div class="container">
            <div class="row">
                <div class="form-group">
                    <label for="datetime">Time:</label>
                    <input type="datetime" class="form-control" id="datetime" name="datetime" value="<?php echo date("d-m-Y H:i:s") ?>">
                </div>
                <div class="form-group">
                    <label for="comment">Comment:</label>
                    <textarea class="form-control" rows="1" id="comment" name="comment"></textarea>
                </div>
                <div class="form-group">
                    <label for="tag">Tag:</label>
                    <textarea class="form-control" rows="1" id="tag" name="tag"></textarea>
                </div>
                <div class="form-group">
                    <label for="tag">File upload:</label>
                    <input class="form-control" type="file" multiple="multiple" id="file" name="file">
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-outline-primary" name="submit" id="submit">
                    <?php              
                    function getData(){
                        $data = array();
                        $data[1]=$_POST['datetime'];
                        $data[2]=$_POST['comment'];
                        $data[3]=$_POST['tag'];
                        $data[4]=$_FILES['file']['name'];
                        return $data;
                    } 
                    if(isset($_POST['submit'])){
                        echo'<span class="spinner-border spinner-border-sm"></span> Uploading..';
                        $info = getData();
                        var_dump($info);
                        $insert="INSERT INTO [dataIMG] ([time]
                        ,[img]
                        ,[cmt]
                        ,[tag]) VALUES ('$info[1]','$info[4]','$info[2]','$info[3]')";
                        $result= sqlsrv_query($conn, $insert);


                    }
                    else echo 'Upload';
                    ?>    
                    
                    </button>
                </div>
            </div>
        </div>
    </form>
</body>

</html>