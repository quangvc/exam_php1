<?php
require_once '../dao/conn.php';
$sql = "SELECT * FROM tours";
$stmt = $conn->prepare($sql);
$stmt->execute();
$tours = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<meta name="Description" content="Enter your description here"/>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
<link rel="stylesheet" href="assets/css/style.css">
<title>Title</title>   
</head>
<body>
    <?php if (isset($_GET['message'])) { ?>
        <div>
            <?= $_GET['message'] ?>
        </div>
    <?php } ?>

    <table style="width:400px">
    <tr>
        <th>Danh sách tour</th>
        <th><button class="btn btn-success"><a href="them.php">Thêm</a></button></th>
    </tr>
    <?php foreach ($tours as $tour) { ?>
        <tr>
        <td><?= $tour['name'] ?></td>
        <td><button class="btn btn-warning"> <a href="sua.php?id=<?= $tour['id'] ?>">Sửa</a></button>
        <button class="btn btn-danger" onclick= "return confirm('Xác nhận xoá dòng này!')" ><a href="xoa.php?id=<?= $tour['id'] ?>">Xoá</a></button></td>
        </tr>
    <?php } ?>
    </table>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.1/umd/popper.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/js/bootstrap.min.js"></script>
</body>
</html>