
<!DOCTYPE html>
<html>
<head>
    <title>تعليقات المستخدمين</title>
    <link rel="shortcut icon" href="قلب الرياض.jpg" type="image/x-icon"/>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <link rel="stylesheet" type="text/css" href="home.css">
    <link rel="stylesheet" type="text/css" href="meno.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>
<body>
    <header>
        <img id="logl" src="قلب الرياض.png" width="150" height="150">
    <nav>
        <ul>
          <li><a href="admin.html" ><i class="fa-solid fa-lock"></i></a></li>
           <li><a href="home.HTML"><i class="fa-solid fa-house"></i></a></li>
          <li><a href="فنادق ومنتجعات.html" data-i18n="Hotels">فنادق ومنتجعات</a></li>
          <li><a href="مطاعم.html" data-i18n="Restaurants" >مطاعم</a></li>
          <li><a href="أسواق.html" data-i18n="Markets">أسواق</a></li>
          <li><a href="الثقافه والتراث.html" data-i18n="Culture">الثقافة والتراث</a></li>
          <li><a href="الفعاليات والتجارب.html" data-i18n="Events">الفعاليات والتجارب</a></li>
        </ul>
    </nav>
</header>
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
