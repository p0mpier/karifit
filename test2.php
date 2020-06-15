<html>
    <head>
<title>unko</title>
</head>
    <body>
        <script type="text/javascript">
            function onCreated(response) {
                document.querySelector('#token').innerHTML = response.id;
            }
        </script>
        <script
            type="text/javascript"
            src="https://checkout.pay.jp/"
            class="payjp-button"
            data-key="pk_test_0383a1b8f91e8a6e3ea0e2a9"
            data-on-created="onCreated"
            data-submit-text="トークンを作成する"
            data-partial="true">
        </script>
        <p><span id="token"></span></p>
        <p>---</p>
        
        <?php
        
        $api_key = "xxxxxxxxxxxxxxxxxxxxxxxxx";
        $url = "https://api.pay.jp/v1/customers?card=作成したトークン";
        
        $headerdata = array(
            'Content-Type: application/json',
            'X-HTTP-Method-Override: GET'
        );

        $conn = curl_init();
        curl_setopt($conn, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $res = curl_exec($conn);
        curl_close($conn);

        // 返り値の表示
        echo $res;
        
        ?>
        
        </body>
    </html>