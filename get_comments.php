<?php
// اتصال بقاعدة البيانات
$servername = "localhost";
$username = "";
$password = "";
$dbname = "databasru";

$conn = new mysqli($servername, $username, $password, $dbname);

// التحقق من الاتصال
if ($conn->connect_error) {
    die("فشل الاتصال: " . $conn->connect_error);
}

// استعلام SQL لاستعادة التعليقات
$sql = "SELECT * FROM comments";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // عرض التعليقات
    while($row = $result->fetch_assoc()) {
        echo "<p>" . $row["comment"] . "</p>";
    }
} else {
    echo "لا توجد تعليقات بعد";
}

// إغلاق الاتصال بقاعدة البيانات
$conn->close();
?>
