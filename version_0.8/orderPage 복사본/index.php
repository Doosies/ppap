<?php
$phone_name = $_POST['phone_name_'];
$color = $_POST['radio_color'];
$now_service = $_POST['radio_now_service'];
$after_service = $_POST['radio_after_service'];
$contract = $_POST['radio_contract'];
$month = $_POST['radio_month'];
$plan_name = $_POST['select_planname'];
?>
<!DOCTYPE html>
<html>
    <title>주문 페이지</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate">
    <meta http-equiv="Expires" content="0">
    <meta http-equiv="Pragma" content="no-cache">

    <head>
        <script src="https://code.jquery.com/jquery-1.11.2.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.14.3/xlsx.full.min.js"></script>
        <meta name="viewport" content="width=device-width, initial-scale=1.0" style="width: 100%; height:auto">

        <link rel="stylesheet" type="text/css" href="style_order.css?ver=0.0.5">

    </head>
    <body>
        <div id="wrap" class="container">
            <!-- 신청내역 -->
            <div id="order_list" class="container_body">
                <div class="container_header">
                    1.신청내역
                </div>
                <div class="container_items" style="border-top:solid 1px #C0C0C0;">
                    <div>
                        <div class="container_item_left">
                            신청기기11
                        </div>
                        <div class="container_item_right">
                            <? echo $phone_name; ?>
                        </div>
                    </div>
                    <div>
                        <div class="container_item_left">
                            색상
                        </div>
                        <div class="container_item_right">
                            <? echo $color ?>
                        </div>
                    </div>
                    <div>
                        <div class="container_item_left">
                            사용중인 통신사
                        </div>
                        <div class="container_item_right">
                            <? echo $now_service ?>
                        </div>
                    </div>
                    <div>
                        <div class="container_item_left">
                            사용할 통신사
                        </div>
                        <div class="container_item_right">
                            <? echo $after_service; ?>
                        </div>
                    </div>
                    <div>
                        <div class="container_item_left">
                            약정선택
                        </div>
                        <div class="container_item_right">
                            <? echo $contract ?>
                        </div>
                    </div>
                    <div>
                        <div class="container_item_left">
                            가입유형
                        </div>
                        <div class="container_item_right">
                            기기변경
                        </div>
                    </div>
                    <div>
                        <div class="container_item_left">
                            신청요금제
                        </div>
                        <div class="container_item_right">
                            <div>
                            <? echo $plan_name ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- 배송지 정보 -->
            <form action="/minhyungWork/order/send.php" method="post">
                <div id="info_shipping" class="container_body" style="">
                    <div class="container_header">
                        2.배송지 정보
                        <font size="2px" color="red">*</font>
                        <font size="2px" color="grey">항목은 필수 입력사항 입니다.</font>

                    </div>
                    <div class="container_items" style="border-top:solid 1px #C0C0C0;">
                        <div>
                            <div class="container_item_left">
                                <div>
                                    신청자
                                    <font size="2px" color="red">*</font>
                                </div>
                            </div>
                            <div class="container_item_right">
                                <div>
                                    <input type="text" name="name" size="10"  placeholder="홍길동" autofocus required/>
                                </div>
                            </div>
                        </div>
                        <div>
                            <div class="container_item_left">
                                개통번호
                                <font size="2px" color="red">*</font>
                            </div>
                            <div class="container_item_right" style="text-align:center;">
                                <input name="tel1_1" type="tel" placeholder="010" pattern="^01(?:0|1|[6-9])$" title="형식 010-1234-5678" size="6"  required style="margin-right: 6px;">-
                                <input name="tel1_2" type="tel" placeholder="1234" pattern="^(?:\d{3}|\d{4})$" title="형식 010-1234-5678" size="6" required style="margin-right: 6px; margin-left:6px;">-
                                <input name="tel1_3" type="tel" placeholder="5678" pattern="\d{4}$" title="형식 010-1234-5678" size="6" required equired style="margin-left: 6px;">
                            </div>
                        </div>
                        <div>
                            <div class="container_item_left">
                                연락처
                                <font size="2px" color="red">*</font>
                            </div>
                            <div class="container_item_right" style="text-align:center;">
                                <input name="tel2_1" type="tel" placeholder="010" pattern="^01(?:0|1|[6-9])$" title="형식 010-1234-5678" size="6"  required style="margin-right: 6px;">-
                                <input name="tel2_2" type="tel" placeholder="1234" pattern="^(?:\d{3}|\d{4})$" title="형식 010-1234-5678" size="6" required style="margin-right: 6px; margin-left:6px;">-
                                <input name="tel2_3" type="tel" placeholder="5678" pattern="\d{4}$" title="형식 010-1234-5678" size="6" required equired style="margin-left: 6px;">
                            </div>
                        </div>
                        <div>
                            <div class="container_item_left">
                                이메일
                                <font size="2px" color="red">*</font>
                            </div>
                            <div class="container_item_right">
                                <div>
                                    <input name="email" type="email" size="38" placeholder="honggildong@example.com">
                                </div>
                            </div>
                        </div>
                        <div>
                            <div class="container_item_left">
                                우편번호
                                <!-- <font size="2px" color="red">*</font> -->
                            </div>
                            <div class="container_item_right">
                                <div><input name="addr_num" type="text"  placeholder="우편번호" size="10" ></div>
                            </div>
                        </div>
                        <div>
                            <div class="container_item_left" style="padding-top:25px; padding-bottom:25px;">
                                주소
                                <font size="2px" color="red">*</font>
                            </div>
                            <div class="container_item_right">
                                <div>
                                    <div><input name="addr1" type="text"  placeholder="주소" size="38" required></div>
                                    <div style="margin-top:10px"><input name="addr2" type="text" placeholder="상세주소" size="38" required></div>
                                </div>
                            </div>
                        </div>
                        <div>
                            <div class="container_item_left" >
                                전달할 사항
                            </div>
                            <div class="container_item_right" style="flex-flow:column nowrap;">
                                <div><input name="note" type="text" placeholder="전달할 사항" size="38"></div>
                            </div>
                        </div>
                    </div>
                    <!-- 주문서 작성 완료 -->
                    <div id="complete_button">
                        <input type="submit" value="주 문 서 작 성 완 료" style="background:hsl(239, 75%, 54%); color:white; padding:20px; width:300px;">
                    </div>
                </div>
            </div> 
            <?php echo $name; ?>
            <input type="hidden" name="phone_name" value='<?php echo $phone_name; ?>'>
            <input type="hidden" name="color" value='<?php echo $color; ?>'>
            <input type="hidden" name="now_service" value='<?php echo $now_service; ?>'>
            <input type="hidden" name="after_service" value='<?php echo $after_service; ?>'>
            <input type="hidden" name="contract" value='<?php echo $contract; ?>'>
            <input type="hidden" name="month" value='<?php echo $month; ?>'>
            <input type="hidden" name="plan_name" value='<?php echo $plan_name; ?>'>
        </form>
        <script type="text/javascript" language="javascript">
            
        </script>
    </body>
</html>