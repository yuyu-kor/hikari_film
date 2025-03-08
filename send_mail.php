<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = htmlspecialchars($_POST["name"]);
    $phone = htmlspecialchars($_POST["phone"]);
    $email = htmlspecialchars($_POST["email"]);
    $concept = htmlspecialchars($_POST["concept"]);
    $date = htmlspecialchars($_POST["date"]);
    $marketing = htmlspecialchars($_POST["marketing"]) == "O" ? "동의" : "비동의";

    // 수신자 이메일 주소
    $to = "rkdrudgns18@naver.com";
    $subject = "[촬영 문의] $name 님의 요청";
    
    // 이메일 내용
    $message = "
        <html>
        <head>
            <title>촬영 문의</title>
        </head>
        <body>
            <h2>📷 촬영 문의 내역</h2>
            <p><strong>성함:</strong> $name</p>
            <p><strong>연락처:</strong> $phone</p>
            <p><strong>이메일:</strong> $email</p>
            <p><strong>컨셉 및 장소:</strong> $concept</p>
            <p><strong>촬영 희망 날짜 및 시간:</strong> $date</p>
            <p><strong>마케팅 동의 여부:</strong> $marketing</p>
        </body>
        </html>
    ";

    // 이메일 헤더 설정
    $headers = "MIME-Version: 1.0\r\n";
    $headers .= "Content-type: text/html; charset=UTF-8\r\n";
    $headers .= "From: $email\r\n";
    $headers .= "Reply-To: $email\r\n";

    // 이메일 전송
    if (mail($to, $subject, $message, $headers)) {
        echo "<script>alert('문의가 성공적으로 전송되었습니다!'); window.location.href='contact.html';</script>";
    } else {
        echo "<script>alert('문의 전송에 실패했습니다. 다시 시도해주세요.'); window.history.back();</script>";
    }
} else {
    echo "<script>alert('잘못된 접근입니다.'); window.location.href='contact.html';</script>";
}
?>
