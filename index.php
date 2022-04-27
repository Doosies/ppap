<?php
  header('Content-Type: text/html; charset=utf-8');
?>
<!DOCTYPE html>
<html>
    <title>SK Telecom 판매 전문점</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <!-- <meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate">
    <meta http-equiv="Expires" content="0">
    <meta http-equiv="Pragma" content="no-cache"> -->

    <head>
        <script src="https://code.jquery.com/jquery-1.11.2.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.14.3/xlsx.full.min.js"></script>
        <meta name="viewport" content="width=device-width, initial-scale=1.0" style="width: 100%; height:auto">

        <link rel="stylesheet" type="text/css" href="./index.css?ver=10.0.1">

    </head>
    <body>
        <div id="wrap" >
            <div id="logo">
                SK Telecom 판매 전문점
            </div>
            <div id="header">
                <div><img src="/sktel/main/setting/logo.png" style="width:100%"></div>
            </div>
            <form action="./calc.php" method="post"  style="display:flex; justify-content:center; align-items:center;">
                <div id="body" class="containner">
                </div>
            <!-- <form action="./calc.php" method="post"> -->
                <input type="hidden" name="data_plan_data" value="">
                <input type="hidden" name="data_price_data" value="">
                <input type="hidden" name="data_const_data" value="">
                <input type="hidden" name="data_phone_name" value="">
                <input type="hidden" name="data_phone_name_eng" value="">
                <!-- <input type="submit" id= -->
            </form>
        </div>
        <?php setlocale(LC_ALL,'ko_KR.UTF-8'); ?>
        <!--초기 const 변수들-->
        <script type="text/javascript" language="javascript">
            // 요금제 정보
            var PLAN_DATA;
            // 핸드폰 출고가, 보조금 정보
            var PRICE_DATA = {};
            //셋팅정보
            var CONST_DATA;
            // 핸드폰 이름들
            var PHONE_NAME = {};
        </script>
        <!-- 최초 실행시 설정들 -->
        <script type="text/javascript" language="javascript">
            var url = "./main/setting/PriceTable.xlsx";
            var oReq = new XMLHttpRequest();
            oReq.open("GET", url, true);
            oReq.responseType = "arraybuffer";
            oReq.onreadystatechange = on_ready_state;
            oReq.send();


            function on_ready_state(){
                // 4 = 데이터 전송완료
                if(oReq.readyState == 4) {
                    // 200 은 에러 없음을 의미 ( 404 = 페이지가 존재하지 않음 )
                    if(oReq.status == 200) {
                        var arraybuffer = oReq.response;
                        /* convert data to binary string */
                        var data = new Uint8Array(arraybuffer);
                        var arr = new Array();
                        for (var i = 0; i != data.length; ++i) arr[i] = String.fromCharCode(data[i]);
                        var bstr = arr.join("");

                        /* Call XLSX */
                        var workbook = XLSX.read(bstr, {
                            type: "binary"
                        });

                        
                        workbook.SheetNames.forEach( function(__data, idx){   //시트 여러개하려면 이곳에서 반복문
                            let sheetName = __data;
                            var worksheet = workbook.Sheets[sheetName];
                            let datas = XLSX.utils.sheet_to_json(worksheet, {raw: true});
                            //datas = datas.toString().replace(/\n/gi,"\\r\\n"); 

                            // 시트의 이름이 plan이면
                            if(sheetName=='plan'){
                                let tmp = {};
                                datas.forEach(function(data,idx){
                                    var key = data['name'].toString().replace(/\n/g, " ").replace(/\r/g, "");
                                    var value = data[' price '];
                                    tmp[key] = value;
                                })
                                PLAN_DATA = tmp;
                            }
                            // 시트의 이름이 price면
                            else if(sheetName == 'price'){
                                // price 시트에서 해당 기기명을 key로 json을 만듬
                                datas.forEach(function(__data,idx){
                                    let key = __data['모델명'];
                                    let val = datas[idx];
                                    PRICE_DATA[key] = val;
                                    PHONE_NAME[idx] = key;
                                })
                            }
                            // 시트의 이름이 const 일 경우
                            else if( sheetName == 'const'){
                                CONST_DATA = datas;
                            }
                        })//workbook.SheetNames.forEach

                        // 액셀에 저장된 기기 갯수만큼 핸드폰 이미지들을 출력함.
                        let length_body = Object.keys(PRICE_DATA).length;
                        for(var i=1; i<length_body; i++){
                            $('#body').append(`<div class="containner_items">
                                                    <div name="phone_name">
                                                        ${PRICE_DATA[PHONE_NAME[i]]['기기명']}
                                                    </div>
                                                    <div >
                                                        <input type="image" onClick="Onclick_image('${PHONE_NAME[i]}');" 
                                                        class="phone_image" src="/sktel/main/${PHONE_NAME[i]}/first/first.png">
                                                    </div>
                                               </div>`);
                        }

                    }//if(oReq.status == 200)
                    else {
                        alert('처리 중 에러가 발생했습니다.');
                    }
                }//if(oReq.readyState == 4) 
            }

        </script>
        <script type="text/javascript">
            function Onclick_image(name){
                var data_const_data = JSON.stringify(CONST_DATA)
                var data_plan_data = JSON.stringify(PLAN_DATA);
                var data_phone_name = PRICE_DATA[name]['기기명'].toString().replace(/\n/g, " ").replace(/\r/g, "");
                var data_phone_name_eng = PRICE_DATA[name]['모델명'].toString().replace(/\n/g, " ").replace(/\r/g, "");

                // 문자열 /r /n 처리를 위해 있는 줄
                // var data_price_data = JSON.stringify(PRICE_DATA[name]);
                let tmp = PRICE_DATA[name];
                var data_price_data = {};
                for(key in tmp){
                    let _key = key.toString().replace(/\n/g, " ").replace(/\r/g, "");
                    let _val = tmp[key].toString().replace(/\n/g, " ").replace(/\r/g, "");
                    data_price_data[_key] = _val;
                }
                // console.log(data_price_data);
                data_price_data = JSON.stringify(data_price_data);

                
                $('input[name="data_const_data"]').attr('value',data_const_data);
                $('input[name="data_plan_data"]').attr('value',data_plan_data);
                $('input[name="data_price_data"]').attr('value',data_price_data);
                $('input[name="data_phone_name"]').attr('value',data_phone_name);
                $('input[name="data_phone_name_eng"]').attr('value',data_phone_name_eng);
            }
            function onSubmitCalc(){
            }
                        
                    
        </script>

    </body>
</html>