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

// استقبال التعليق من النموذج
$comment = $_POST['comment'];

// تنفيذ استعلام SQL لحفظ التعليق
$sql = "INSERT INTO comments (comment) VALUES ('$comment')";

if ($conn->query($sql) === TRUE) {
    // إرجاع التعليق الجديد
    echo "<p>" . $comment . "</p>";
} else {
    echo "خطأ: " . $sql . "<br>" . $conn->error;
}

// إغلاق الاتصال بقاعدة البيانات
$conn->close();

// توجيه المستخدم إلى صفحة comments.php بعد حفظ التعليق
header('Location: comments.php');
exit;
?>
