<?php
require_once '../dao/conn.php';
$id = $_GET['id'];
if ($_SERVER['REQUEST_METHOD']=='POST') {
    $ten = $_POST['ten'];
    $intro = $_POST['intro'];
    $des = $_POST['des'];
    $nd = $_POST['nd'];
    $price = $_POST['price'];
    $cate_id = $_POST['cate_id']; 
    
    $sql = "UPDATE tours SET name='$ten', intro='$intro', description='$des', number_date='$nd', price='$price', category_id='$cate_id' where id=$id";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    header("location: index.php?message=Sửa thành công");
}
$sql = "SELECT * FROM tours where id=$id";
$stmt = $conn->prepare($sql);
$stmt->execute();
$tour = $stmt->fetch(PDO::FETCH_ASSOC);

$sql = "SELECT * from categories";
$stmt = $conn->prepare($sql);
$stmt->execute();
$cate_id = $stmt->fetchAll(PDO::FETCH_ASSOC);
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
    <h1>Thêm</h1>
    <form action="" method="post">
        <label for="">Tên tour</label><input type="text" name="ten" value="<?= $tour['name'] ?>">
        <label for="">Intro</label><input type="text" name="intro" value="<?= $tour['intro'] ?>">
        <label for="">Description</label><input type="text" name="des" value="<?= $tour['description'] ?>">
        <label for="">Number date</label><input type="number" name="nd" value="<?= $tour['number_date'] ?>">
        <label for="">Price</label><input type="number" name="price" value="<?= $tour['price'] ?>">
        <label for="">Category id</label>
        <select name="cate_id" >
            <?php foreach ($cate_id as $ca_id) { ?>
                <option <?= $ca_id['id']==$tour['category_id'] ? 'selected' : '' ?> value="<?= $ca_id['id'] ?>"><?= $ca_id['name'] ?></option>
            <?php } ?>
        </select>
        <button class="btn btn-primary" type="submit">Sửa</button>
    </form>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.1/umd/popper.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/js/bootstrap.min.js"></script>
</body>
</html>