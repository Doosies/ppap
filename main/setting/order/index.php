<?php
$phone_name = $_POST['phone_name_'];
$color = $_POST['radio_color'];
$now_service = $_POST['radio_now_service'];
$after_service = $_POST['radio_after_service'];
$contract = $_POST['radio_contract'];
$month = $_POST['radio_month'];
$plan_name = $_POST['select_planname'];

echo $phone_name;
echo $color;
echo $now_service;
echo $after_service;
echo $contract;
echo $month;
echo $plan_name;
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

        <link rel="stylesheet" type="text/css" href="style_order.css?ver=2.1.5">

    </head>
    <body>
        <div id="wrap" class="container">
            <div id="logo">
                SK Telecom 판매 전문점
            </div>
            <!-- 신청내역 -->
            <div id="order_list" class="container_body" style="margin-top: 250px;">
                <div class="container_header">
                    1. 신청내역
                </div>
                <div class="container_items" style="border-top:solid 1px #C0C0C0;">
                    <div>
                        <div class="container_item_left">
                            신청기기11
                        </div>
                        <div class="container_item_right">
                            <?php echo $phone_name; ?>
                        </div>
                    </div>
                    <div>
                        <div class="container_item_left">
                            색상
                        </div>
                        <div class="container_item_right">
                            <?php echo $color ?>
                        </div>
                    </div>
                    <div>
                        <div class="container_item_left">
                            사용중인 통신사
                        </div>
                        <div class="container_item_right">
                            <?php echo $now_service ?>
                        </div>
                    </div>
                    <div>
                        <div class="container_item_left">
                            사용할 통신사
                        </div>
                        <div class="container_item_right">
                            <?php echo $after_service; ?>
                        </div>
                    </div>
                    <div>
                        <div class="container_item_left">
                            약정선택
                        </div>
                        <div class="container_item_right">
                            <?php echo $contract ?>
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
                            <?php echo $plan_name ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- 배송지 정보 -->
            <form action="sktel/main/setting/order/send.php" method="post" onsubmit="return checkIt();">
                <div id="info_shipping" class="container_body" style="">
                    <div class="container_header">
                        2. 배송지 정보
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
                                <input name="tel1_1" type="tel" placeholder="010" pattern="^01(?:0|1|[6-9])$" title="3자리 지역번호" size="6"  required style="margin-right: 6px;">-
                                <input name="tel1_2" type="tel" placeholder="1234" pattern="^(?:\d{3}|\d{4})$" title="3자리 혹은 4자리 번호" size="6" required style="margin-right: 6px; margin-left:6px;">-
                                <input name="tel1_3" type="tel" placeholder="5678" pattern="\d{4}$" title="4자리 번호" size="6" required equired style="margin-left: 6px;">
                            </div>
                        </div>
                        <div>
                            <div class="container_item_left">
                                연락처
                                <font size="2px" color="red">*</font>
                            </div>
                            <div class="container_item_right" style="text-align:center;">
                                <input name="tel2_1" type="tel" placeholder="010" pattern="^01(?:0|1|[6-9])$|^0(2|3(?:1|2|3)|4(?:1|2|3|4)|5(?:1|2|3|4|5)|6(?:1|2|3|4))$" title="3자리지역번호" size="6"  required style="margin-right: 6px;">-
                                <input name="tel2_2" type="tel" placeholder="1234" pattern="^(?:\d{3}|\d{4})$" title="3자리 혹은 4자리 번호" size="6" required style="margin-right: 6px; margin-left:6px;">-
                                <input name="tel2_3" type="tel" placeholder="5678" pattern="\d{4}$" title="4자리 번호" size="6" required equired style="margin-left: 6px;">
                            </div>
                        </div>
                        <div>
                            <div class="container_item_left">
                                이메일
                                <font size="2px" color="red">*</font>
                            </div>
                            <div class="container_item_right">
                                <div>
                                    <input name="email" type="email" size="30" placeholder="honggildong@example.com">
                                </div>
                            </div>
                        </div>
                        <!-- <div>
                            <div class="container_item_left">
                                우편번호
                            </div>
                            <div class="container_item_right">
                                <div><input name="addr_num" type="text"  placeholder="우편번호" size="10" ></div>
                            </div>
                        </div> -->
                        <div>
                            <div class="container_item_left" style="padding-top:25px; padding-bottom:25px;">
                                주소
                                <font size="2px" color="red">*</font>
                            </div>
                            <div class="container_item_right">
                                <div>
                                    <div><input name="addr1" type="text"  placeholder="주소" size="30" required></div>
                                    <div style="margin-top:10px"><input name="addr2" type="text" placeholder="상세주소" size="30" required></div>
                                </div>
                            </div>
                        </div>
                        <div>
                            <div class="container_item_left" >
                                전달할 사항
                            </div>
                            <div class="container_item_right" style="flex-flow:column nowrap;">
                                <div><input name="note" type="text" placeholder="전달할 사항" size="30"></div>
                            </div>
                        </div>
                        <!--  -->
                        <div class="container_header" style="margin-top:10px">
                            3. 약관 동의서 및개인정보 취급방침
                        </div>
                        <div style="width:auto; height:88px; margin:5 0px; overflow-y:scroll; border:1px #e5e5e5 solid; padding:10px">
                            <약관 동의서 및개인정보 취급방침><br><br>
                            본 신청서에 기재된 본인의 정보 및 서비스 이용과정에서 생성되는 본인의 정보는 <br>
                            <정보통신망 이용촉진 정보보호 등에 관한 법률>,<위치정보의 보호 및 이용 등에 관한 법률> 및 <br>
                            <신용정보의 이용 및 보호에 관한 법률>의 규정에 따라 휴대폰 개통및 서비스 목적으로 귀사가 수집,<br>
                            이용, 제공 및 취급 위탁을 위해 본인의 동의를 얻거나 본인에게 위 내용을 고지ㆍ공개하여야 하는 정보입니다.<br><br>
                            이에 본인은 귀사의 이동전화 서비스, 부가서비스 및 개인맞춤서비스, 마케팅정보 제공서비스 등을 제공받기 위해 <br>
                            다음의 내용을 확인하고, 귀사가 본인의 개인정보ㆍ신용정보를 다음과같이 수집, 이용 제공 및 취급위탁하는 것에 동의합니다.<br><br>

                            1. 개인정보 수집ㆍ이용동의 및 판매조건 동의<br><br>
                                (SK텔레콤㈜,KT(주),LG텔레콤(주)귀중)<br>
                                가. 개인정보의 수집ㆍ이용 목적<br>
                                    (1) 서비스 제공 및 본인식별 등 : 이동전화서비스, 멤버쉽 서비스, 부가서비스, 통신과금서비스, 제휴서비스, 개인맞춤서비스, <br>
                                    광고서비스, 본인확인서비스 등 제반서비스(이하 ‘서비스’) 제공 및 이와 관련된 본인 확인 또는 인증, 결제절차진행(통신과금서비스), <br>
                                    통화품질 조사 등 서비스 품질 확인, 정상개통 여부 확인 및 미납 안내 등 서비스 제공 관련 연락<br>
                                    (2) 서비스 관련 정보 제공 등 : 상품 배송, 고지사항 전달, 본인의사 확인, 서비스 관련 상담·불만 처리,<br>
                                    서비스 이용관련 혜택·유의사항·편의사항 등 정보 제공, 신규 서비스나 이벤트 관련 정보 및 광고 전송<br>
                                    (3) 요금 정산 및 과금 : '서비스' 이용 요금 정산·청구·수납·자동이체·추심, 청구서 송부, 요금 관련<br>
                                    상담·불만 처리, 요금관련 혜택·유의사항·편의사항 등 정보 제공, 신규서비스나 이벤트 관련정보 및 광고전송<br>
                                    (4) 통계분석 : 개인을 식별할 수 없는 인구통계학적 분석자료 또는<br>
                                    지역·시장 조사 자료(연령별, 성별, 지역별 통계분석, 시장조사 등) 등 작성, 이용, 제공<br>
                                    (5) 개인 맞춤서비스 제공 : 개인정보, 위치정보, 생성정보 및 이를 조합·분석한 정보를 이용한,<br>
                                    요금제 등의 상품 및 서비스 개발 / 서비스 가입 신청·이용 중 문의 등 제반 고객 응대 시<br>
                                    고객 맞춤 상담 제공 / 개인 맞춤 상품 서비스 혜택 또는 개인 맞춤 광고 제안 및 제공 /<br>
                                    악성코드 분석·차단 서비스 제공 / 분실 단말 관리 서비스 제공<br><br>

                                나. 수집하는 개인정보의 항목<br>
                                    (1) 식별정보 : 성명(법인명), 주민(법인)등록번호, 여권번호, 외국인등록번호, 전화번호, 주민등록번호 대체수단<br>
                                    (2) 연락처정보 : 주소, 전화번호, e-mail 주소<br>
                                    (3) 거래정보 : 통신과금서비스 제공에 필요한 거래정보<br>
                                    (4) 계좌정보 : 계좌(카드)번호, 예금주명 등<br>
                                    (5) 생성정보 : 발·수신번호(통화상대방번호 포함), 통화시각, 사용도수, 서비스이용기록, 접속로그, 쿠키,<br>
                                    접속 IP 정보(도메인 주소 정보 및 접속 URL 정보 포함), 결제기록, 이용정지기록, 멤버쉽 정보(멤버쉽 가입고객에 한함),<br>
                                    기타 요금 과금에 필요한 데이터 및 이를 조합하여 생성되는 정보(요약개인정보, 데이터마이닝 분석 및<br>
                                    고객세분화 정보, 선호도, 라이프스타일, 사회적관계 추정 정보), Application 사용관련 정보(사용 App.정보, 사용량 등)<br>
                                    (6) 기타 서비스 제공 관련 필요 정보 : 2.에 따른 개인위치정보, 단말기 정보(모델, IMEI번호, USIM 번호(ICCID, IMSI 등),<br>
                                    단말기 S/W버전 정보, MAC Address 등), 직업, 국가유공자 증명·복지할인 증명 등 각종 증명,<br>
                                    부가서비스·번호이동·할부매매계약 내역, 이동전화 서비스 가입 및 해지일·이동전화 가입 기간 등<br>
                                    (5) 생성정보 : 발·수신번호(통화상대방번호 포함), 통화시각, 사용도수, 서비스이용기록, 접속로그, 쿠키,<br>
                                    접속 IP 정보, 결제기록, 이용정지기록, 멤버쉽 정보(멤버쉽 가입고객에 한함),<br>
                                    기타 요금 과금에 필요한 데이터 및 이를 조합하여 생성되는 정보(요약개인정보, 데이터마이닝 분석 및<br>
                                    고객세분화 정보, 선호도, 라이프스타일, 사회적관계 추정 정보),<br>
                                    Application 사용관련 정보(사용 App.정보, 사용량 등)<br>
                                    (6) 기타 서비스 제공 관련 필요 정보 : 2.에 따른 개인위치정보, 단말기 정보(모델, IMEI번호,<br>
                                    USIM 번호(ICCID, IMSI 등), 단말기 S/W버전 정보 등), 직업, 국가유공자 증명·복지할인 증명 등<br>
                                    각종 증명, 부가서비스·번호이동·할부매매계약 내역, 이동전화 서비스 가입 및 해지일·이동전화 가입 기간 등<br>
                                    ※ 위 정보는 가입 당시 정보 뿐만 아니라 정보 수정으로 변경된 정보를 포함합니다<br><br>

                                    다. 개인정보의 보유기간<br>
                                        개인정보를 제공받은 제3자는 개인정보의 수집목적 또는 제공받은 목적을 달성한 때에는 당해<br>
                                        개인정보를 지체없이 파기합니다.(최대 보유기간은 3개월로한다)<br>


                                        가. 법령에 따로 정하는 경우에는 해당 기간까지 보유<br>
                                        나. 요금 관련 분쟁 해결을 위해 해지 후 6개월까지<br>
                                        (단, 해지고객이 이용요금을 납부하지 않았거나 요금 관련 분쟁이 계속될 경우에는 해결시까지)<br><br>

                            2.통신사의 정책변경 및 기기입고 불가등 불가항적인 요소의 정책변경등으로 서비스의 취소 및 판매 취소를 할수 있다.<br>


                            - 본 상품의 배송 진행관련 정보를 문자로 구매자에게 통보할수있다<br>
                            - 본 상품의 개통을 한 고객대상 안내 문자 및 마케팅문자를 발송할수있다(단 고객이 원하지않을경우 발송을 중단한다.)<br><br>



                            * 계약의 이행을 위한 개인정보 취급위탁 내역은<br>
                            통신사 홈페이지(www.sktelecom.com) (http://www.kt.com/main.jsp) (http://www.uplus.co.kr/)의 개인정보취급방침에서 모두 공개하고 있습니다.<br><br>

                            본인은 위 1항,2항의 내용을 숙지하였으며, 이에 동의합니다.<br>
                        </div>
                        <div style="justify-content:center; padding:10px; border:0">
                            <input type="radio" id="agree" name="agree" value="agree"> <label for="agree">동의</label>
                            <input type="radio" id="reject" name="agree" value="reject"checked> <label for="reject">거부</label>
                        </div>
                    </div>
                    <!-- 주문서 작성 완료 -->
                    <div id="complete_button">
                            <input id="submit_"type="submit" id="button_box"  style="display:none;" value="" onsubmit="complete()">
                            <label id="order_button"for="submit_">
                                <div style="">주 문 서 작 성 완 료</div>
                                <div style="width:40px">
                                    <MARQUEE direction="right" scrollamount="3">&#10132;</MARQUEE>
                                </div>
                            </label>
                        <!-- <input type="submit" value="주 문 서 작 성 완 료" style="background:hsl(239, 75%, 54%); color:white; padding:20px; width:300px; margin-top:10px;cursor: pointer;"> -->
                    </div>
                </div>
            </div> 
            <?php echo $name; ?>
            <input type="hidden" name="submit_chk" value=''>
            <input type="hidden" name="phone_name" value='<?php echo $phone_name; ?>'>
            <input type="hidden" name="color" value='<?php echo $color; ?>'>
            <input type="hidden" name="now_service" value='<?php echo $now_service; ?>'>
            <input type="hidden" name="after_service" value='<?php echo $after_service; ?>'>
            <input type="hidden" name="contract" value='<?php echo $contract; ?>'>
            <input type="hidden" name="month" value='<?php echo $month; ?>'>
            <input type="hidden" name="plan_name" value='<?php echo $plan_name; ?>'>
        </form>
        <script type="text/javascript" language="javascript">
            function complete(){
                $("body").css({"cursor":"wait"});
            }
            var check = 0;
            // 폼 필수 항목 체크
            function checkIt()
            {
                let agree = $(":input:radio[name=agree]:checked").val();
                if( agree == 'reject'){
                    alert("약관을 읽고 동의를 눌러주세요.")
                    return false;
                }

                if(check == 0 ){
                    check = 1;
                    return true;
                }
                if(check == 1){
                    alert("현재 메일을 전송 중 입니다. 잠시만 기다려주세요.");
                    return false;
                }
            } 
            $(function(){

                $('#logo').click(function(e){
                    location.href='https://songminhyung.com/sktel';
                });
            });
        </script>
    </body>
</html>