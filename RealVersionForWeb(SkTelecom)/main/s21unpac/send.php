<?php

    $phone = $_POST['radio_phone'];
    $color = $_POST['radio_color'];
    $service = $_POST['radio_service'];
    $memory = $_POST['radio_memory'];
                
    $name = $_POST['name'];
    $tel1_1 = $_POST['tel1_1'];
    $tel1_2 = $_POST['tel1_2'];
    $tel1_3 = $_POST['tel1_3'];
    $email = $_POST['email'];
    $addr1 = $_POST['addr1'];
    $addr2 = $_POST['addr2'];
?>

<?php
    include "Sendmail.php";
    /* 클래스 객체 변수 선언 */ 
    $sendmail = new Sendmail(); 
    /* + $to : 받는사람 메일주소 ( ex. $to="hong <hgd@example.com>" 으로도 가능) 
    + $from : 보내는사람 이름 
    + $subject : 메일 제목 
    + $body : 메일 내용 
    + $cc_mail : Cc 메일 있을경우 (옵션값으로 생략가능) 
    + $bcc_mail : Bcc 메일이 있을경우 (옵션값으로 생략가능) */ 
    // $to="song961003@gmail.com"; 
    $to="8851011@naver.com";
    // $to="song961003@gmail.com";
    $from="하늘통신"; 
    $subject= "S21 사전예약";
    $body="----------------------------=휴대폰 정보=----------------------------\n"
    ."기기이름 : $phone  \n"
    ."기기색상 : $color   \n"
    ."현재통신사 : $service   \n"
    ."메모리 : $memory   \n"
    ."----------------------------=가입자 정보=----------------------------\n"
    ."이름 : $name   \n"
    ."연락처 : $tel1_1 - $tel1_2 - $tel1_3   \n"
    ."이메일 : $email   \n"
    ."주소 : $addr1 / $addr2    \n"
    ."---------------------------------------------------------------------"; 
    // $cc_mail="cc@example.com"; 
    // $bcc_mail="bcc@example.com"; 

    /* 메일 보내기 */ 
    $sendmail->send_mail($to, $from, $subject, $body,$cc_mail,$bcc_mail);
    echo "
    <script>
        alert('신청서를 성공적으로 작성했습니다.\\n빠른시일내에 요청하신 순서대로 연락 드리겠습니다.\\n확인을 누르시면 잠시 후 이전페이지로 돌아갑니다.');
        location.href='/';
    </script>";
?>