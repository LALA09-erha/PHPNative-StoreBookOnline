<?php
if (isset($_POST['submit'])) {
    $id_pelanggan = $_POST['id'];
    $komen = $_POST['comment'];
    $value = $_POST['value'];
    echo $id_pelanggan;
    echo $komen;
    echo $value;
}
?>