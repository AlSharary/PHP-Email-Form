<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // الحصول على بيانات النموذج
    $to = isset($_POST['to']) ? $_POST['to'] : '';
    $subject = isset($_POST['subject']) ? $_POST['subject'] : '';
    $message = isset($_POST['message']) ? $_POST['message'] : '';

    // تنقية وتحقق من المدخلات
    $to = filter_var($to, FILTER_SANITIZE_EMAIL);
    $subject = filter_var($subject, FILTER_SANITIZE_STRING);
    $message = filter_var($message, FILTER_SANITIZE_STRING);

    // التحقق من البريد الإلكتروني
    if (!filter_var($to, FILTER_VALIDATE_EMAIL)) {
        echo json_encode(['status' => 'error', 'message' => 'عنوان بريد إلكتروني غير صالح']);
        exit;
    }

    // يمكنك إضافة المزيد من التحققات حسب الحاجة

    // إعداد رؤوس البريد الإلكتروني
    $headers = "From: webmaster@example.com";

    // إرسال البريد الإلكتروني
    $success = mail($to, $subject, $message, $headers);

    // إعادة الاستجابة (يمكنك التعديل حسب احتياجاتك)
    if ($success) {
        echo json_encode(['status' => 'success', 'message' => 'تم إرسال البريد الإلكتروني بنجاح']);
    } else {
        echo json_encode(['status' => 'error', 'message' => 'فشل في إرسال البريد الإلكتروني']);
    }
} else {
    // طريقة طلب غير صالحة
    echo json_encode(['status' => 'error', 'message' => 'طريقة طلب غير صالحة']);
}
?>
