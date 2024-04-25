<!DOCTYPE html>
<html>
<head>
    <title>تعليقات المستخدمين</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
    <link rel="stylesheet" type="text/css" href="home.css">
    <link rel="stylesheet" type="text/css" href="meno.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>
<body>
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
