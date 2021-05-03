<?php
    require 'config.php';
    if ($_POST){
        $title = $_POST['title'];
        $desc = $_POST['description'];

        $sql = "INSERT INTO todo(title,description) VALUES (:title,:description)" ;
        $pdostatement = $pdo->prepare($sql);
        $result = $pdostatement->execute(
                array(
                        ':title'=>$title,
                        ':description'=>$desc
                )
        );
        if ($result){
            echo "<script>alert('New todo is added');window.location.href='index.php';</script>";
        }
    }
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Create New</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
</head>
<body>
    <div class="card">
        <div class="card-body">
            <h2>Create New TODO List</h2>
            <form action="add.php" class="" method="post">
                <div class="form-group">
                    <label for="">Title</label>
                    <input type="text" class="form-control" name="title" value="">
                </div>
                <div class="form-group mb-3">
                    <label for="">Description</label>
                    <textarea class="form-control" rows="8" cols="80" name="description" value=""></textarea>
                </div>
                <div class="form-group">
                    <input type="submit" class="btn btn-primary " name="" value="SUBMIT">
                    <a href="index.php" type="button" class="btn btn-default" name="">Back</a>
                </div>
            </form>
        </div>
    </div>

</body>
</html>
