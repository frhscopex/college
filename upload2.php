<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "aiemp_olx";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) die("Connection failed: " . $conn->connect_error);

if(isset($_FILES['item_image']) && $_FILES['item_image']['error'] == 0){

    $target_dir = "uploads2/";
    if(!is_dir($target_dir)) mkdir($target_dir, 0777, true);

    $target_file = $target_dir . basename($_FILES["item_image"]["name"]);

    if(move_uploaded_file($_FILES["item_image"]["tmp_name"], $target_file)) {

        $item_name = $conn->real_escape_string($_POST['item_name']);
        $seller_name = $conn->real_escape_string($_POST['seller_name']);
        $contact_info = $conn->real_escape_string($_POST['contact_info']);
        $price = $conn->real_escape_string($_POST['price']);

        $sql = "INSERT INTO listings (item_name, seller_name, contact_info, price, image_path)
                VALUES ('$item_name', '$seller_name', '$contact_info', '$price', '$target_file')";

        if($conn->query($sql) === TRUE){
            header("Location: olx.php");
            exit();
        } else {
            echo "Database error: ".$conn->error;
        }

    } else {
        echo "Failed to upload image.";
    }

} else {
    echo "No file uploaded or file too large.";
}

$conn->close();
?>
