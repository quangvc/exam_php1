<?php
require_once '../dao/conn.php';
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "DELETE from tours where id=$id";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    header("location: index.php?message=Xoá thành công");
}