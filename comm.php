<!DOCTYPE html>
<html>
<head>
    <title>تعليقات المستخدمين</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
    <link rel="stylesheet" type="text/css" href="home.css">
    <link rel="stylesheet" type="text/css" href="meno.css">
    <link rel="shortcut icon" href="قلب الرياض.jpg" type="image/x-icon"/>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
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
    <div id="comments"></div>
    <form id="commentForm" class="input-group">
        <textarea id="comment" placeholder="اكتب تعليقك هنا"></textarea>
        <br>
        <input class="button--submit" type="submit" value="تعليق">
    </form>

</body>
<script>
    $(document).ready(function(){
        // عرض التعليقات المخزنة
        $.ajax({
            url: 'get_comments.php',
            type: 'GET',
            success: function(response) {
                $('#comments').html(response);
            }
        });

        // إرسال التعليق
        $('#commentForm').submit(function(e) {
            e.preventDefault();
            var comment = $('#comment').val();
            $.ajax({
                url: 'save_comment.php',
                type: 'POST',
                data: {comment: comment},
                success: function(response) {
                    window.location.href = 'comments.php'; // Redirect to comments.php after saving comment
                }
            });
        });
    });
</script>
</html>
