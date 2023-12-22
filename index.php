<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>نموذج البريد الإلكتروني</title>
</head>
<body>
<div id="resultMessage"></div>
<div class="container">
    
    <h3>نموذج إرسال البريد الإلكتروني</h3>
    
    <form id="emailForm" action="send_email.php" method="post">
        <label for="to">المستلم:</label>
        <input type="email" id="to" name="to" required>

        <label for="subject">الموضوع:</label>
        <input type="text" id="subject" name="subject" required>

        <label for="message">الرسالة:</label>
        <textarea id="message" name="message" required></textarea>

        <button type="submit">إرسال البريد الإلكتروني</button>
    </form>

</div>

<script src="script.js"></script>
</body>
</html>
