document.getElementById('emailForm').addEventListener('submit', function (event) {
    event.preventDefault();

    // الحصول على بيانات النموذج
    var formData = new FormData(event.target);

    // طلب AJAX لإرسال البريد الإلكتروني باستخدام PHP
    fetch('send_email.php', {
        method: 'POST',
        body: formData
    })
    .then(response => response.json())
    .then(data => {
        // التعامل مع الاستجابة من الخادم
        var resultMessage = document.getElementById('resultMessage');

        if (data.status === 'success') {
            // إذا نجح الإرسال، عرض رسالة نجاح
            resultMessage.className = 'success';
            resultMessage.textContent = 'تم إرسال البريد الإلكتروني بنجاح.';
            document.getElementById('to').value = '';
            document.getElementById('subject').value = '';
            document.getElementById('message').value = '';
        } else {
            // إذا فشل الإرسال، عرض رسالة خطأ
            resultMessage.className = 'error';
            resultMessage.textContent = 'فشل في إرسال البريد الإلكتروني.';
        }

        // إخفاء رسالة النجاح أو الفشل بعد مدة زمنية معينة (هنا 5 ثوان)
        setTimeout(function () {
            resultMessage.textContent = '';
            resultMessage.className = ''; // إزالة الفئة لإخفاء رسالة النجاح أو الفشل
        }, 5000);
    })
    .catch(error => {
        console.error('خطأ:', error);
    });
});
