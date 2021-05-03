<?php
    require 'config.php';

    if($_POST){
        $title = $_POST['title'];
        $desc = $_POST['description'];
        $id = $_POST['id'];

        $pdostatement = $pdo->prepare("UPDATE todo SET title='$title',description='$desc' WHERE id='$id'");
        $result = $pdostatement->execute();
        if ($result){
            echo "<script>alert('New todo is updated');window.location.href='index.php';</script>";
        }
    }else{
        $pdostatement = $pdo->prepare("SELECT * FROM todo WHERE id=".$_GET['id']);
        $pdostatement->execute();
        $result = $pdostatement->fetchAll();
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
        <h2>Edit TODO List</h2>
        <form action="" class="" method="post">
            <input type="hidden" value="<?php echo $result[0]['id'] ?>" name="id">
            <div class="form-group">
                <label for="">Title</label>
                <input type="text" class="form-control" name="title" value="<?php echo $result[0]['title']; ?>">
            </div>
            <div class="form-group mb-3">
                <label for="">Description</label>
                <textarea class="form-control" rows="8" cols="80" name="description" value=""><?php echo $result[0]['description']; ?></textarea>
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-primary " name="" value="Update">
                <a href="index.php" type="button" class="btn btn-default" name="">Back</a>
            </div>
        </form>
    </div>
</div>

</body>
</html>
