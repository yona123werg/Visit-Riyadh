<?php
$servername = "localhost";
$username = "";
$password = "";
$dbname = "tourism";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $image_name = $_FILES["image"]["name"];
    $description = $_POST["description"];
    $category = $_POST["category"];

    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES["image"]["name"]);
    move_uploaded_file($_FILES["image"]["tmp_name"], $target_file);

    $sql = "INSERT INTO images (image_name, description, category, uploaded_at)
            VALUES ('$image_name', '$description', '$category', NOW())";

    if ($conn->query($sql) === TRUE) {
        echo "تم رفع الصورة بنجاح";
    } else {
        echo "حدث خطأ أثناء رفع الصورة: " . $conn->error;
    }
}

$conn->close();
?>
