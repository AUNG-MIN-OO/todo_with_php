<?php
require "config.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HOME</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
</head>
<body>
<?php
    $pdostatement = $pdo->prepare("SELECT * FROM todo ORDER BY id DESC");
    $pdostatement->execute();
    $result = $pdostatement->fetchAll();
?>
    <div class="card">
        <div class="card-body">
            <h2>TODO</h2>
            <div>
                <a type="button" class="btn btn-success" href="add.php">Create New</a>
            </div>
            <br>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Created</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                $i = 1;
                if ($result){
                    foreach ($result as $r){

                    ?>
                    <tr>
                        <td><?php echo $i; ?></td>
                        <td><?php echo $r['title']; ?></td>
                        <td><?php echo $r['description']; ?></td>
                        <td><?php echo date('Y-m-d',strtotime($r['created_at'])); ?></td>
                        <td>
                            <a type="button" class="btn btn-warning" href="edit.php?id=<?php echo $r['id']; ?>">Edit</a>
                            <a type="button" class="btn btn-danger"href="delete.php?id=<?php echo $r['id']; ?>">Delete</a>
                        </td>
                    </tr>
                <?php
                    $i++;
                    }
                    }
                ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>