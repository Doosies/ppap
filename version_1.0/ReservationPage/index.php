<!DOCTYPE html>
<html>
    <title>예약구매 페이지</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate">
    <meta http-equiv="Expires" content="0">
    <meta http-equiv="Pragma" content="no-cache">

    <head>
        <script src="https://code.jquery.com/jquery-1.11.2.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.14.3/xlsx.full.min.js"></script>
        <meta name="viewport" content="width=device-width, initial-scale=1.0" style="width: 100%; height:auto">

        <link rel="stylesheet" type="text/css" href="style.css?ver=1.1">

    </head>
    <body>
        <div id="wrap" class="container">
            <div id="logo">
                SK Telecom 판매 전문점
            </div>
            <!-- 배송지 정보 -->
            <form id="form" action="./send.php" method="post" onsubmit="return checkIt();" class="container">
                <div id="info_shipping" class="container">
                    <div class="container_items" style="border-top:solid 1px #C0C0C0;">
                        <div id="timmer">
                            <div>마감시간 2021년 1월 22일<br>사전예약 종료까지</div>
                            <div id="time"></div>
                        </div>
                        <div class="container_body">
                            <div class="container_item_left">
                                <div>
                                    신청자
                                    <font size="2px" color="red">*</font>
                                </div>
                            </div>
                            <div class="container_item_right">
                                <div style="width:100%;">
                                    <input type="text" name="name" size="10"  placeholder="홍길동" autofocus required/>
                                </div>
                            </div>
                        </div>
                        <div class="container_body">
                            <div class="container_item_left">
                                연락처
                                <font size="2px" color="red">*</font>
                            </div>
                            <div class="container_item_right" style="display:flex; flex-flow:row nowrap">
                                <input name="tel1_1" type="tel" placeholder="010" pattern="^01(?:0|1|[6-9])$" title="3자리 지역번호" size="6"  required style="flex:1;">-
                                <input name="tel1_2" type="tel" placeholder="1234" pattern="^(?:\d{3}|\d{4})$" title="3자리 혹은 4자리 번호" size="6" required style="flex:1;">-
                                <input name="tel1_3" type="tel" placeholder="5678" pattern="\d{4}$" title="4자리 번호" size="6" required equired style="flex:1;">
                            </div>
                        </div>
                        <div class="container_body">
                            <div class="container_item_left">
                                이메일
                                <font size="2px" color="red">*</font>
                            </div>
                            <div class="container_item_right">
                                <div style="width:100%;">
                                    <input name="email" type="email" size="30" placeholder="honggildong@example.com">
                                </div>
                            </div>
                        </div>
                        <div class="container_body">
                            <div class="container_item_left" style="padding-top:25px; padding-bottom:25px;">
                                주소
                                <font size="2px" color="red">*</font>
                            </div>
                            <div class="container_item_right">
                                <div style="width:100%;">
                                    <div><input name="addr1" type="text"  placeholder="주소" size="30" required></div>
                                    <div style="margin-top:10px"><input name="addr2" type="text" placeholder="상세주소" size="30" required></div>
                                </div>
                            </div>
                        </div>
                        <div class="container_body">
                            <div class="container_item_left">
                                기종선택
                                    <font size="2px" color="red">*</font>
                            </div>
                            <div id="radios_pphone" class="container_item_right">
                                <label><input class="radio" type="radio" name="radio_phone" value="갤럭시s21" checked>갤럭시s21</label>
                                <label><input class="radio" type="radio" name="radio_phone" value="갤럭시s21+" >갤럭시s21+</label>
                                <label><input class="radio" type="radio" name="radio_phone" value="갤럭시s21울트라">갤럭시s21울트라</label>
                            </div>
                        </div>
                        <div class="container_body">
                            <div class="container_item_left">
                                현재통신사
                                    <font size="2px" color="red">*</font>
                            </div>
                            <div id="radios_service" class="container_item_right">
                                <label><input class="radio" type="radio" name="radio_service" value="sk" checked>sk</label>
                                <label><input class="radio" type="radio" name="radio_service" value="kt" >kt</label>
                                <label><input class="radio" type="radio" name="radio_service" value="lg">U+</label>
                                <label><input class="radio" type="radio" name="radio_service" value="알뜰폰">알뜰폰</label>
                            </div>
                        </div>
                        <div class="container_body">
                            <div class="container_item_left">
                                색상선택
                                    <font size="2px" color="red">*</font>
                            </div>
                            <div id="radios_color" class="container_item_right">
                                <label id="color_gray"><input class="radio" type="radio" name="radio_color" value="그레이"checked>그레이</label> 
                                <label id="color_white"><input class="radio" type="radio" name="radio_color" value="화이트" style="color:white;">화이트</label>
                                <label id="color_violet"><input class="radio" type="radio" name="radio_color" value="바이올렛">바이올렛</label>
                                <label id="color_pink"><input class="radio" type="radio" name="radio_color" value="핑크">핑크</label>
                                <label id="color_black"><input class="radio" type="radio" name="radio_color" value="블랙">블랙</label>
                                <label id="color_silver"><input class="radio" type="radio" name="radio_color" value="실버">실버</label>
                            </div>
                        </div>
                        <div class="container_body">
                            <div class="container_item_left">
                                메모리선택
                                    <font size="2px" color="red">*</font>
                            </div>
                            <div id="radios_memory" class="container_item_right">
                                <label id="memory_256"><input class="radio" type="radio" name="radio_memory" value="256GB" checked>256GB</label>
                                <label id="memory_512"><input class="radio" type="radio" name="radio_memory" value="512GB">512GB</label>
                            </div>
                        </div>
                    </div>
                    <!-- 주문서 작성 완료 -->
                    <div id="complete_button">
                            <input id="submit_"type="submit" id="button_box"  style="display:none;" value="" onsubmit="">
                            <label id="order_button"for="submit_">
                                <div style="">주 문 서 작 성 완 료</div>
                                <div style="width:40px">
                                    <MARQUEE direction="right" scrollamount="3">&#10132;</MARQUEE>
                                </div>
                            </label>
                    </div>
                    <div id="image" style="width: inherit;">
                        <img  style="width: inherit;" src="main.png"/>
                    </div>
                </div>
            </div> 
        </form>
        <script type="text/javascript" language="javascript">
            function complete(){
                $("body").css({"cursor":"wait"});
            }
            var check = 0;
            // 폼 필수 항목 체크
            function checkIt()
            {
                if(check == 0){
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
                    location.href='http://sktel.co.kr/';
                });
            });
            //테스트로 추가해봄
            function srvTime() {
                $(function () {
                    $.ajax({
                        type: 'GET',
                        cache: false,
                        url: location.href,
                        complete: function (req, textStatus) {
                            var dateString = req.getResponseHeader('Date');
                            if (dateString.indexOf('GMT') === -1) {
                                dateString += ' GMT';
                            }
                            var nowDay = new Date(dateString).getTime();
                            var dday_tmp = "2021-01-22 00:00:00";
                            var dday = new Date(dday_tmp.replace(/[.-]/gi, '/')).getTime();
                            // var dday = new Date(dday_tmp.replace(/[.-]/gi, "/")); //정상동작

                            // console.log(nowDay);
                            // var clock = document.getElementById("time");            // 출력할 장소 선택
                            
                            var distance = dday-nowDay;
                            // console.log(dday);

                            var d = Math.floor(distance / (1000 * 60 * 60 * 24));//일
                            var h = Math.floor((distance / (1000*60*60)) % 24);//시간
                            var m = Math.floor((distance / (1000*60)) % 60);//분
                            var s = Math.floor((distance / 1000) % 60);//초
                                                    // 현재시간
                            // var nowTime = `${d}일 ${h}시간${m}분 ${s}초 남았습니다!`;
                            var nowTime = d+"일 "+h+"시간"+m+"분 "+s+"초 남았습니다!";

                            $('#time').text(nowTime);
                            setTimeout("srvTime()",1000);         // setTimeout(“실행할함수”,시간) 시간은1초의 경우 1000
                        }
                    });
                });
            }

            window.onload = function(){
                srvTime();
            }
            $(function(){
                $('input[name=radio_phone]').change(function(e){
                    let phone = $(this).val();
                    // :nth-child()
                    if(phone == "갤럭시s21"){
                        $('#color_gray').show();
                        $('#color_white').show();
                        $('#color_violet').show();
                        $('#color_pink').show();
                        $('#color_black').hide();
                        $('#color_silver').hide();

                        $('#memory_256').show();
                        $('#memory_512').hide();
                    }
                    else if(phone =="갤럭시s21+"){
                        $('#color_gray').hide();
                        $('#color_white').hide();
                        $('#color_violet').show();
                        $('#color_pink').show();
                        $('#color_black').show();
                        $('#color_silver').show();

                        $('#memory_256').show();
                        $('#memory_512').hide();//ss
                    }
                    else if(phone =="갤럭시s21울트라"){
                        $('#color_gray').hide();
                        $('#color_white').hide();
                        $('#color_violet').hide();
                        $('#color_pink').hide();
                        $('#color_black').show();
                        $('#color_silver').show();

                        $('#memory_256').show();
                        $('#memory_512').show();
                    }
                });
            });

            $(window).load(function(){
                $('#color_gray').show();
                $('#color_white').show();
                $('#color_violet').show();
                $('#color_pink').show();
                $('#color_black').hide();
                $('#color_silver').hide();

                $('#memory_256').show();
                $('#memory_512').hide();
            });


        </script>
    </body>
</html>