<?php
  header('Content-Type: text/html; charset=utf-8');
?>
<?php
    $data_plan_data = $_POST['data_plan_data'];
    $data_price_data = $_POST['data_price_data'];
    $data_const_data = $_POST['data_const_data'];
    $data_phone_name = $_POST['data_phone_name'];
    $data_phone_name_eng = $_POST['data_phone_name_eng'];
?>

<!DOCTYPE html>
<html>
    <title>SK Telecom 판매 전문점

    </title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate">
    <meta http-equiv="Expires" content="0">
    <meta http-equiv="Pragma" content="no-cache">

    <head>
        <script src="https://code.jquery.com/jquery-1.11.2.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.14.3/xlsx.full.min.js"></script>
        <script src="//developers.kakao.com/sdk/js/kakao.min.js"></script>
        <!-- <script src='dir.php'></script> -->
        <meta name="viewport" content="width=device-width, initial-scale=1.0" style="width: 100%; height:auto">

        <link rel="stylesheet" type="text/css" href="main/setting/style.css?ver=2.1.0">

    </head>
    <body>
        <form action="/sktel/main/setting/order/index.php" method="post" id="send_form">
            <div id="wrap" class="container"><!--전체 랩-->
                <!--상단 핸드폰 이름 -->
                <div id="logo">
                    SK Telecom 판매 전문점
                </div>
                <!-- <div id="head_phone_name" style="width:100%"> -->
                    <div id="head_phone_name" style="width:100%;">
                        <div id="phoneName" >loading...</div>
                        <div id="phone_name" style="display:none;"></div><!--데이터 전송을 위한 div-->
                    </div>
                <!-- </div> -->
                <!--왼쪽 이미지-->
                <div id="container_left" class = "container_body">
                    <!--핸드폰 이미지 나오는 div-->
                    <div id="main_image_div"></div>
                    <!--색상 고르는 div 시작-->
                    <div id="color_pick" ></div>
                </div><!--왼쪽 끝-->
                <!--가운데 표-->
                <div id="container_center" class = "container_body">
                    <div id="select_color" class= "item_body">
                        <div class="item_left">
                            색상
                        </div>
                        <div id="radio_color" class="item_right"  name="testname"> </div>
                    </div>
                    <div id="select_now_service" class= "item_body">
                        <div class="item_left">
                            사용중인 통신사
                        </div>
                        <div id="now_service" class="item_right"  >
                            <label>
                                <input class="radio_service" type="radio" name="radio_now_service" value="SK" checked>
                                    SK
                            </label>
                            <label>
                                <input class="radio_service" type="radio" name="radio_now_service" value="KT" >
                                    KT
                            </label>
                            <label>
                                <input class="radio_service" type="radio" name="radio_now_service" value="LG" >
                                    LG
                            </label>
                            <label> 
                                <input class="radio_service" type="radio" name="radio_now_service" value="알뜰폰" >
                                    알뜰폰
                            </label>
                        </div>
                    </div>
                    <div id="select_after_service"  class= "item_body">
                        <div class="item_left">
                            사용하실 통신사
                        </div>
                        <div id="after_service" class="item_right"  >
                            <label>
                                <input class="radio_service" type="radio" name="radio_after_service" value="SK" checked>
                                    SK
                            </label>
                        </div>
                    </div>
                    <div id="select_contract" class= "item_body" >
                        <div class="item_left">
                            약정 선택
                        </div>
                        <div id="contract" class="item_right" >
                            <label>
                                <input class="radio_calc" type="radio" name="radio_contract" value="공시지원" checked>
                                    공시지원
                            </label>
                            <label>
                                <input class="radio_calc" type="radio" name="radio_contract" value="선택약정" >
                                    선택약정
                            </label>
                        </div>
                    </div>
                    <div id="select_info" class= "item_body" >
                        <div class="item_left">
                            할부개월
                        </div>
                        <div id="info" class="item_right"  >
                            <label>
                                <input class="radio_calc" type="radio" name="radio_month" value="24" checked>
                                    24개월
                            </label>
                            <label>
                                <input class="radio_calc" type="radio" name="radio_month" value="36" >
                                    36개월
                            </label>
                            <label>
                                <input class="radio_calc" type="radio" name="radio_month" value="48" >
                                    48개월
                            </label>
                        </div>
                    </div>
                    <div id="select_plans" class= "item_body">
                        <div class="item_left">
                            요금제
                        </div>
                        <div id="plans" class="item_right"  >
                            <select name="select_planname" id="select_plan" class="radio_calc" form="send_form">
                                </select>
                        </div>

                    </div>
                    <div id="compare_money" class= "item_body" style="padding:0;border:0;">
                        <!-- xxxx가 더 유리 -->
                        <div id="compare2">
                            <div id="select1" style="color:red; display:none;">
                                    <<< 공시지원금이 더 유리
                            </div>
                            <div id="select2" style="color:red; display: none;">
                                    선택약정이 더 유리 >>>
                            </div>
                            <div id="tmp_select"style="color:red;">loading ...</div>
                        </div>
                        <div id="compare1">
                            <!-- 공시지원금 xxx원 -->
                            <div id="get_money_of_color" >
                                <div>
                                    공  시  지  원  금
                                </div>  
                                <div id="get_money_of" >
                                    loading...
                                </div>
                            </div>
                            <!-- 선택약정 xxx원 -->
                            <div id="sale_contract_of_color" >
                                <div >
                                    선  택  약  정
                                </div>
                                <div id="sale_contract_of">
                                    loading...
                                </div>
                            </div>
                        </div>
                    </div>
                </div><!--가운데 끝-->
                <!--오른쪽 표-->
                <div id="container_right" class = "container_body">
                    <div id="phone_price"  class= "item_body" >
                        <div class="item_left">
                            출고가
                        </div>
                        <div id="phone_price_value" class="item_right">
                            loading...
                        </div>
                    </div>
                    <!--사용자가 입력 가능한 값-->
                    <div id="special_discount"  class= "item_body" style="color:red">
                        <div class="item_left">
                            특별할인
                        </div>
                        <div id="special_discount_value" class="item_right">
                            loading...
                        </div>
                    </div>
                    <!--공시지원금 버튼 선택시 보임, 요금제 할인 누를시 숨김-->
                    <div id="get_money" class= "item_body" style="font-weight: bold; ">
                        <div style=" display: flex; flex: 1;">
                            <div style="width:120px; flex:1;">
                                공시지원금
                            </div>
                            <div id="get_money_value" class="item_right" style="flex:1;">
                                loading...
                            </div>
                        </div>
                        <!--사용자가 입력 가능한 값-->
                        <div  style=" display: flex; flex: 1;">
                            <div class="item_left" style="flex:1;">
                                추가할인
                            </div>
                            <div id="additional_discount_value" class="item_right" style="flex:1;">
                                loading...
                            </div>
                        </div>
                    </div>
                    
                    <div id="last_price_phone"  class= "item_body" style="background:#F4F4F4; ">
                        <div id="tt" class="item_left">
                            할부원금
                        </div>
                        <div id="last_price_phone_value" class="item_right">
                            loading...
                        </div>
                    </div>
                    <!--요금제할인 버튼 선택시 보임, 공시지원금 누를시 숨김-->
                    <div id="total_sale_contract"  class= "item_body" style="display:none;">
                        <div class="item_left">
                            선택약정 총 할인액
                        </div>
                        <div id="plan_discount_value"  class="item_right">
                        </div>
                    </div>
                    <div id="installment_month"  class= "item_body">
                        <div class="item_left">
                            할부개월
                        </div>
                        <div id="installment_month_value" class="item_right">
                            loading...
                        </div>
                    </div>
                    <div id="plan"  class= "item_body">
                        <div class="item_left">
                            요금제
                        </div>
                        <div id="plan_value"  class="item_right">
                            loading...
                        </div>
                    </div><div id="month_price_ui"  class= "item_body" style="background:#F4F4F4;">
                        <div class="calc_ui">
                            <div class="calc_tap">
                                월 할부원금
                            </div>
                            <div class="calc_tap">
                                +
                            </div>
                            <div class="calc_tap">
                                통신요금
                            </div>
                            <div class="calc_tap">
                                =
                            </div>
                            <div class="calc_tap">
                                월 납부금액
                            </div>
                        </div>
                    </div>
                    <div id="month_price_calc"  class= "item_body" style="border-bottom: 1px solid #CCCCCC;" >
                        <div class="calc_ui">
                            <div id="calc_result1" class="calc_tap">
                                loading...
                            </div>
                            <div class="calc_tap">
                                +
                            </div>
                            <div id="calc_result2" class="calc_tap">
                                loading...
                            </div>
                            <div class="calc_tap">
                                =
                            </div>
                            <div id="calc_result3" class="calc_tap" style="color:red">
                                loading...
                            </div>
                        </div>
                    </div>
                    <div id="notice"  class= "item_body" >
                        <div id="notice_value" class="">
                            (최종 월 납부액은 부가세 10% 와 분할상환 수수료 5.9% 포함됨)
                        </div>
                    </div>
                    <div id="send_button"  class= "item_body" style="padding:0; ">
                        <input id="submit_"type="submit" id="button_box"  style="display:none;" value="">
                        <label id="order_button"for="submit_">
                            <div style="width:60px">신  청  하  기</div>
                            <div style="width:40px">
                                <MARQUEE direction="right" scrollamount="3">&#10132;</MARQUEE>
                            </div>
                        </label>
                    </div>
                </div><!--오른쪽 끝-->
                <div id="main_image_bottom" style="text-align:center;">

                <img style="cursor:pointer; " src="http://www.ictmarket.or.kr/getCertIcon.do?cert_icon=KL20122352310V001" onclick="window.open('http://www.ictmarket.or.kr/precon/pop_CertIcon.do?PRECON_REQ_ID=PRE0000145236','_blank','width=600, height=500, toolbar=no, menubar=no, scrollbars=no, resizable=no' )"/>
                        <img style="cursor:pointer; " src="http://www.ictmarket.or.kr/getCertIcon.do?cert_icon=KP19021936496O003" onclick="window.open('http://www.ictmarket.or.kr/precon/pop_CertIcon.do?PRECON_REQ_ID=PRE0000110286','_blank','width=600, height=500, toolbar=no, menubar=no, scrollbars=no, resizable=no' )"/>
                    <!-- <img id="main_image" src="main.jpg"> -->
                    <!-- <img src="./main/01_main.jpg"> -->
                </div>
            </div><!--wrap 끝-->
        </form>
        <div>
        </div>
        <!-- 오른쪽 아래 고정메뉴 -->
        <div id="float_banner" class="float_banner">
            <!-- 가로메뉴 -->
            <div id="scroll_menu" name="scroll_top">
                <!-- 최상단 이동 -->
                <div id="scroll_menu_1" class="scroll_menu_item"> > </div>
                <!-- 최하단 이동-->
                <div id="scroll_menu_2" class="scroll_menu_item"> > </div>

            </div>
            <!-- 세로메뉴 -->
            <div id="scroll_menu_kakao">
                <!-- 카톡 상담 div -->
                <div id="for_pc">
                    <div id="scroll_menu_kakao_pc" class="scroll_menu_item_kakao">
                        <div id="kakao_pc_top">고객센터</div>
                        <div id="kakao_pc_bottom">
                            <p style="font-weight:bold">연락처</p>
                            <p>1600 - 8412</p>
                            <p style="font-weight:bold">문자수신 번호</p>
                            <p>010-5929-7227</p>
                            <p style="font-weight:bold">상담시간</p>
                            <p>10:00 ~ 19:00</p>
                            <p style="font-weight:bold">점심</p> 
                            <p>12:30 ~ 13:30</p>
                            <div id="support_kakao" >
                                <div id="support_kakao_add" >
                                    <div>
                                        <img src="/sktel/main/setting/kakao/add.png" style="width:25px;height:25px;"/>
                                    </div>
                                     
                                    <div>
                                        채널 추가
                                    </div>
                                    
                                </div>
                                <div id="support_kakao_chat" >
                                    <div>
                                        <img src="/sktel/main/setting/kakao/chat.png" style="width:25px;height:25px;"/>
                                    </div>
                                    <div>
                                        카카오 상담
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><!--오른쪽 끝-->
                    <div >
                    </div>
                    <!-- <div id="scroll_menu_kakao_2" class="scroll_menu_item_kakao"></div> -->
                </div>
                <div id="for_mobile">
                    <div id="support_kakao_add_mobile">
                        <img src="/sktel/main/setting/kakao/add.png" style="width:38;height:38;"/>
                    </div>
                    
                    <div id="support_kakao_chat_mobile" >
                        <img src="/sktel/main/setting/kakao/chat.png" style="width:38;height:38; margin-top:2px;"/>
                    </div>
                </div>
        </div>
        <!-- <p align="center"></p> -->
        <?php setlocale(LC_ALL,'ko_KR.UTF-8'); ?>
        <script type="text/javascript">
        Kakao.init('0dc502d4ec530c54f639753d2b02a71d');
        </script>
        <!-- 파일 경로, 사진 로딩-->
        <script type="text/javascript" language="javascript">
            var files = <?php $out = array();
            foreach (glob("main/{$data_phone_name_eng}/*.png") as $filename) {
                $p = pathinfo(urldecode($filename));
                $out[] = $p['filename'];
            }
            echo json_encode($out);?>;
            
            
            var files2 = <?php $out = array();
            foreach (glob("main/{$data_phone_name_eng}/main/*.jpg") as $filename) {
                $p = pathinfo(urldecode($filename));
                $out[] = $p['filename'];
            }
            echo json_encode($out);?>;

        </script>
        <!--초기 const 변수들-->
        <script type="text/javascript" language="javascript">
            // 선택약정 할인 퍼센트 = 25%
            let DISCOUNT_PRICE_PERCENT = 0;
            // 공시지원 추가지원금 퍼센트 = 15% 
            let ADDITIONAL_DISCOUNT_PERCENT = 0;
            // 할부이자 = 6.27%
            let INSTALLMENT_MONTH_PERCENT = 0;
            // 보정금액
            let CORRECTION_NUMBER = 0;
            // 24개월 세금 계산
            let MONTH_INTEREST = 0;
            // 요금제 정보
            var PLAN_DATA = <?php echo $data_plan_data;?>;
            // 핸드폰 출고가, 보조금 정보
            var PRICE_DATA = <?php echo $data_price_data; ?>;
            
            var CONST_DATA = <?php echo $data_const_data; ?>;

            var PHONE_NAME = "<?php echo $data_phone_name; ?>";
            var PHONE_NAME_ENG = "<?php echo $data_phone_name_eng; ?>";

            var NOW_PATH = `main/${PHONE_NAME_ENG}`;

            // 핸드폰 이미지 색깔
            const PHONE_COLOR_NAME = files;
            // 아래쪽 메인 이미지 경로들
            const MAIN_IMAGE_PATH = files2;

            //공시 추가지원 여부
            var IS_AVARIABLE_ADDITIONAL_DISCOUNT = true;
            
        </script>
        <!--이벤트 연결 스크립트-->
        <script type="text/javascript" language="javascript">
            // 이미지 바꾸는 함수
            function onClick_changeColor(number){
                $("#main_image").attr("src", `${NOW_PATH}/${PHONE_COLOR_NAME[number]}.png`);

                $('input[name="radio_color"]:radio[value="'+PHONE_COLOR_NAME[number]+'"]').prop('checked',true);

                select_color = number;
            }
             
            function scroll_follow( id )
            {   
                let size = $(window).width();
                if( size < 847) return;
                if( size > 847){
                    $(window).scroll(function(){ 
                        var position = $(window).scrollTop();
                        // console.log(position);
                        if( position < 400 ) position = position + 450;
                        else position = position + 30;
                        $( id ).stop().animate({top:position+"px"}, 300);
                    });
                }
            }
            scroll_follow( "#float_banner" );
            $( window ).resize(function() {
                let size = $(window).width();
                // console.log(size);
                if(size > 847){
                    // $('#float_banner').css("position","absolute");
                    // $('#float_banner').css("position","absolute")
                    // $('#float_banner').css("position","absolute")
                    // scroll_follow( "#float_banner" );
                }
                else{
                    // $('#float_banner').css("position","fixed");
                    // $('#float_banner').css("top","0");
                    // $('#float_banner').css("right","0");
                    // $('#float_banner').css("bottom","0");

                }
            });


            // 이벤트 연결
            $(function(){

                $('#logo').click(function(e){
                    location.href='http://sktel.co.kr/';
                })
                //현재 통신사 선택 radio
                //특별 할인값을 바꿔준 후 재계산.
                $('input[name=radio_now_service]').change(function(e){
                    //특가 변경
                    change_special_discount();
                    common_calculation();
                })

                //사용할 통신사 선택 radio
                //$('input[name=radio_after_service]').change(function(e){
                //    radio_after_service=$(this).val();
                //})

                //약정선택 radio
                $('input[name=radio_contract]').change(function(e){
                    kind_installlment_month = $(this).val();
                    // 공시일 때
                    if(kind_installlment_month == "공시지원"){
                        $('#get_money').css("display", "");   
                        //$('#additional_discount').css("display", "");   
                        $('#total_sale_contract').css("display", "none");
                    }
                    //선택약정 일 때
                    else if(kind_installlment_month == "선택약정"){
                        $('#get_money').css("display", "none");   
                        //$('#additional_discount').css("display", "none");   
                        $('#total_sale_contract').css("display", "");   
                    }
                    //특가 변경
                    change_special_discount();
                    common_calculation();
                })

                // 할부 radio 골랐을 때
                $('input[name=radio_month]').change(function(e){
                    change_installment_month();
                    common_calculation();
                })
                //요금제 select
                $('#select_plan').change(function(e){
                    //현재 선택된 요금제를 숫자 형식으로 받아옴.
                    //var select_val = $('#select_plan option:selected').val();
                    change_plan();
                    common_calculation();
                })
                // 신청하기 버튼
                $('#send_button').click(function(){
                    
                })
                
                // 오른쪽 아래 스크롤 메뉴
                $('#scroll_menu_1').click(function(){
                    window.scrollTo(0,0);
                })
                // 오른쪽 아래 스크롤 메뉴
                $('#scroll_menu_2').click(function(){
                    let scr = document.body.scrollHeight; //페이지의 길이를 체크
                    window.scrollTo(0,scr);
                })
                // 
                $('#support_kakao_add').click(function(){
                    Kakao.Channel.addChannel({
                        channelPublicId: '_xcexoxaK',
                    })
                })
                $('#support_kakao_chat').click(function(){
                    Kakao.Channel.chat({
                    channelPublicId: '_xcexoxaK',
                    })
                })
                $('#support_kakao_add_mobile').click(function(){
                    Kakao.Channel.addChannel({
                        channelPublicId: '_xcexoxaK',
                    })
                })
                $('#support_kakao_chat_mobile').click(function(){
                    Kakao.Channel.chat({
                    channelPublicId: '_xcexoxaK',
                    })
                })

            });
        </script>
        <!--수식 계산 스크립트-->
        <script type="text/javascript" language="javascript">
            // 요금제와 가격이 들어있는 json
            var plans = new Object();
            // ���Ŀ� �ʿ��� ����
            var phone_price;        //출고가
            var selected_plan;           //현재 요금제를 불러옴(0, 1 형식)
            var spt_price;          //공시지원금
            var additional_discount;//추가지원금
            var special_discount;   //특별지원금(특가)
            var month;              //할부개월
            //var selected_plan_char;      //현재 요금제를 불러옴(5GX 슬림 형식)
            var kind_installlment_month = "공시지원";//현재 선택된 할인방법 0 = 공시 / 1 = 약정
            var discount_price;

            //통신요금 계산용
            //var plan_price = plans[selected_plan_char];
            // 통신요금
            var plan_price;
            // 할부원금
            var final_phone_price ;
            
            ///////////////////////////////////////////////////////////////////////
            ////////////////////초기 페이지 로딩시에만 불러옴////////////////////
            ///////////////////////////////////////////////////////////////////////
            //출고가
            function change_phone_price(){
                phone_price = PRICE_DATA['출고가'];
                $('#phone_price_value').text(numberWithCommas( phone_price+"원"));
            }
            ///////////////////////////////////////////////////////////////////////
            ///////////////////할부개월 radio를 선택했을 때에만////////////////////
            ///////////////////////////////////////////////////////////////////////
            //할부개월
            function change_installment_month(){
                month = $('input:radio[name="radio_month"]:checked').val() ;
                $('#installment_month_value').text(month+"개월");
            }
            ///////////////////////////////////////////////////////////////////////
            ///////////////////요금제 select를 선택했을 때에만////////////////////
            ///////////////////////////////////////////////////////////////////////
            //요금제
            function change_plan(){
                //현재 요금제를 불러옴(0, 1 형식)
                selected_plan = $('#select_plan option:selected').val();
                //현재 요금제를 문자 형식으로 받아옴
                //selected_plan_char = PLAN_DATA[selected_plan]['']
                //현재 요금제를 가격으로 불러옴
                plan_price = PLAN_DATA[selected_plan];
                //현재 요금을 적용시킴
                $('#plan_value').text(selected_plan);
            }
            ///////////////////////////////////////////////////////////////////////
            ///////////////현재 통신사, 할인방법 radio 눌렀을 때에만///////////////
            ///////////////////////////////////////////////////////////////////////
            // 특가를 변경함
            function change_special_discount(){
                var seleted_radio_val = $("input[name=radio_now_service]:checked").val();
                // 공시와 선약 종류.
                var kind_of_discount = $("input[name=radio_contract]:checked").val();
                if(kind_of_discount == "공시지원")kind_of_discount = "공시";
                else if(kind_of_discount == "선택약정") kind_of_discount = "선약";
                var service;
                switch(seleted_radio_val){
                    case "SK" : service = kind_of_discount+"-sk"; break;
                    case "KT" : service = kind_of_discount+"-kt"; break;
                    case "LG" : service = kind_of_discount+"-lg"; break;
                    case "알뜰폰" : service = kind_of_discount+"-알뜰"; break;
                }
                //console.log(service);
                special_discount = PRICE_DATA[service];
                if(!special_discount) special_discount = 0;
                $('#special_discount_value').text(numberWithCommas(special_discount+"원"));
            }
            ///////////////////////////////////////////////////////////////////////
            ////////////////////할인방법(공시,선약) radio 눌렀을 때에만/////////////
            ///////////////////////////////////////////////////////////////////////
            //공시지원금을
            function change_get_money(){
                // 공시지원금을 불러옴
                spt_price = PRICE_DATA[selected_plan];
                // 추가할인 = 공시지원 * 0.15
                additional_discount = parseInt(spt_price * ADDITIONAL_DISCOUNT_PERCENT);

                //폰통신요금 = 그대로
                plan_price = PLAN_DATA[selected_plan];
                //최종 할부원금 = 폰가격 - 공시지원금 - 추가지원금 - 특가
                final_phone_price = (phone_price - spt_price - additional_discount - special_discount);
                //console.log(spt_price+additional_discount);
                //공시지원금
                $('#get_money_value').text(numberWithCommas( spt_price+"원"));
                //공시지원금 추가지원
                $('#additional_discount_value').text(numberWithCommas(additional_discount+"원"));
            }
            //선택약정용
            function change_plan_discount(){
                discount_price = PLAN_DATA[selected_plan] * DISCOUNT_PRICE_PERCENT;
                //통신요금 = 통신요금의 25퍼를 뺌
                plan_price = PLAN_DATA[selected_plan] - discount_price;
                // 최종 할부원금 = 폰 가격 - 특가
                final_phone_price = phone_price - special_discount;

                //총 요금 할인액
                $('#plan_discount_value').text(numberWithCommas(discount_price*24)+"원");
            }
            function change_discount(){
                if( kind_installlment_month == "공시지원"){
                    change_plan_discount();
                    change_get_money();
                    //alert("1");
                }
                else if(kind_installlment_month == "선택약정"){
                    change_get_money();
                    change_plan_discount();
                    //alert("2");
                }   

                $('#get_money_of').text(numberWithCommas( (Number(spt_price)+additional_discount)+"원"));
                $('#sale_contract_of').text(numberWithCommas(discount_price*24)+"원");
                //공시지원금
                var get_money = spt_price+additional_discount;
                //선택약정
                var contract = discount_price*24;
                // 공시지원금이 선택약정보다 클 경우는
                if( get_money > contract){
                    // 공시지원금 백그라운드 = 파란색
                    $('#get_money_of_color').css("background","#d7d8ea");
                    // 선택약정 백그라운드 = 흰색
                    $('#sale_contract_of_color').css("background","#F4F4F4");
                    
                    $('#select1').css("display", ""); 
                    $('#select2').css("display", "none"); 
                }
                else if( contract > get_money){
                    // 선택약정 백그라운드 = 흰색
                    $('#get_money_of_color').css("background","#F4F4F4");
                    // 공시지원금  백그라운드 = 파란색
                    $('#sale_contract_of_color').css("background","#d7d8ea");
                    
                    $('#select1').css("display", "none"); 
                    $('#select2').css("display", ""); 
                }
            }
            ///////////////////////////////////////////////////////////////////////
            /////////////////////////////////공통//////////////////////////////////
            ///////////////////////////////////////////////////////////////////////
            function common_calculation(){
                change_discount();

                //월 할부원금 =  할부원금 / 개월 수
                var month_price = parseInt(final_phone_price / month);
                //총 세금 = 할부원금 * 0.0627
                var total_month_interest = final_phone_price * INSTALLMENT_MONTH_PERCENT;
                // 24개월 세금 = (총 세금 / 24) -3
                var month_interest = (total_month_interest / MONTH_INTEREST)+CORRECTION_NUMBER;
                //최종 가격 = 월 할부원금 + 통신요금 + 세금
                var pricep = parseInt(month_price + plan_price + month_interest);


                // 할부원금
                $('#last_price_phone_value').text(numberWithCommas(final_phone_price)+"원");
                // 월 할부원금
                $('#calc_result1').text(numberWithCommas(month_price)+"원");
                // 월 요금 가격
                $('#calc_result2').text(numberWithCommas(plan_price)+"원");
                // 최종 가격
                $('#calc_result3').text(numberWithCommas(pricep)+"원");
            }
            // 콤마 붙여주는 함수
            function numberWithCommas(x) {
                return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
            }
        </script>
        <!-- 최초 실행시 설정들 -->
        <script type="text/javascript" language="javascript">
            // 선택약정 할인 퍼센트 
            DISCOUNT_PRICE_PERCENT = CONST_DATA[0]['선약할인'];
            // 공시지원 추가지원금 퍼센트 
            ADDITIONAL_DISCOUNT_PERCENT = CONST_DATA[0]['공시추가지원'];
            // 할부이자
            INSTALLMENT_MONTH_PERCENT = CONST_DATA[0]['할부이자'];
            // 24개월 세금 계산
            MONTH_INTEREST = CONST_DATA[0]['이자계산개월수'];
            // 보정금액
            CORRECTION_NUMBER = CONST_DATA[0]['보정금액'];

            // 핸드폰 이름을 로딩시켜줌
            $('#phoneName').text(PRICE_DATA['기기명']);
            $('#phone_name').append('<input name="phone_name_" value="'+PRICE_DATA["기기명"]+'"type="radio" checked>');

            // 메인 이미지를 로딩시켜줌
            $('#main_image_div').append(`<img id="main_image" src="${NOW_PATH}/${PHONE_COLOR_NAME[0]}.png" style="width:300px; height:300px;">`);
            // 색 고르는 이미지들을 로딩시켜줌
            // 이미지가 6개 이상이면 정렬 방법을 바꿈
            if( PHONE_COLOR_NAME.length >= 6){
                $('#color_pick').css("justify-content","flex-start");
            }
            for(i=0; i<PHONE_COLOR_NAME.length; i++){
                var name = PHONE_COLOR_NAME[i]
                // 메인이미지 아래
                $('#color_pick').append(`<div class="color_pick_sub"><div class="img_pick"><img src="${NOW_PATH}/${name}.png" style="width:40px; height:40px;"onclick="onClick_changeColor(${i})"></div><div class="color_text">${name}</div></div>`);

                // radio 버튼
                $('#radio_color').append(`<label><input class="select_color" value="${name}"type="radio" name="radio_color"  onclick="onClick_changeColor(${i})">${name}</label>`)

            }// for문
            //$('#radio_color_name').append('<input value="'+PHONE_COLOR_NAME[0]+'"type="radio" id="radio_color_name" checked>')
            //컬러 선택의 첫번쨰 radio를 선택으로 바꿔줌
            $(`input[name="radio_color"]:radio[value="${PHONE_COLOR_NAME[0]}"]`).prop('checked',true);

            // 요금제 select를 채워줌 ( 액셀에서 불러온ㄷ=ㅏ아아)
            var rep = /공시-(?:sk|kt|lg|알뜰)|선약-(?:sk|kt|lg|알뜰)|공시추가지원|모델명|기기명|출고가/;
            for( key in PRICE_DATA){
                //요금제에 해당할 때에만 추가해줌
                if ( rep.test(key) == false )$('#select_plan').append('<option value="'+key+'">'+key+'</option>');
            }

            //공시 추가지원금 지원여부?
            if(PRICE_DATA['공시추가지원'] == 'x'){
                ADDITIONAL_DISCOUNT_PERCENT = 0;
            }

            // 아래쪽 mainimage 를 불러옴
            for(name in MAIN_IMAGE_PATH){
                // console.log(MAIN_IMAGE_PATH[name]);
                $('#main_image_bottom').append(`<img  src="${NOW_PATH}/main/${MAIN_IMAGE_PATH[name]}.jpg" style="width:100%;">`);

            }

            //출고가 변경
            change_phone_price();
            //할부개월 변경
            change_installment_month();
            //특별할인(특가)변경
            change_special_discount();
            //현재 요금제 얻어옴
            change_plan();
            //공시지원 변경
            //change_get_money();
            change_discount();
            //공통변경
            common_calculation();

            $('#total_sale_contract').css("display", "none");   
            $('#tmp_select').css("display","none");
        </script>
    </body>
</html>