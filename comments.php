
<!DOCTYPE html>
<html>
<head>
    <title>تعليقات المستخدمين</title>
    <link rel="stylesheet" type="text/css" href="home.css">
    <link rel="stylesheet" type="text/css" href="meno.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>
<body>
    <h1>تعليقات المستخدمين</h1>
    <div id="comments">
        <!-- Display comments here -->
        <form action="sign.Html">
        <input type="submit" value="سجل" class="button--submit" >
              </form>
    </div>
    <?php
// Display comments here (e.g., retrieve comments from the database)
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

// استعلام SQL لاسترداد التعليقات
$sql = "SELECT * FROM comments";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // عرض البيانات
    while($row = $result->fetch_assoc()) {
        echo "<p>" . $row["comment"] . "</p>";
    }
} else {
    echo "لا توجد تعليقات";
}

// إغلاق الاتصال بقاعدة البيانات
$conn->close();
?>
</body>
</html>
