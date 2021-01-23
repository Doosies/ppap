<html>
    <head>
        <script src="https://code.jquery.com/jquery-1.11.2.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.14.3/xlsx.full.min.js"></script>
        <meta name="viewport" content="width=device-width, initial-scale=1.0" style="width: 100%; height:auto">

    </head>
    <body>
        <script type="text/javascript" language="javascript">
            console.log("!");
            $.ajax({
                url: "/main/setting/get_file_name.php",
                type: "get",
                dataType:"json",
                data: {
                    file_name:"IPHONE_12PRO_MAX_128",
                },
                success:function(data){
                    console.log("success"+data);
                },
                error:function(data){
                    console.log("error"+data);
                }
            });
        </script>
    </body>
</html>