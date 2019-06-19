<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/vendor/laravel-admin/AdminLTE/bootstrap/css/bootstrap.min.css">
    <script src="/vendor/laravel-admin/AdminLTE/plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <title>Document</title>
    <style>
        .message-box {border:1px solid #ccc;border-radius: 8px;min-height:500px;max-height:500px;padding:10px;overflow:scroll;}
        .message-unit {border:0;width:100%;}
        .message-content {padding:5px;border:1px solid #ccc;border-radius: 5px;word-wrap:break-word;}
        .message-left {float:left;}
        .message-right {float:right;}
        .message-left .message-content{width:80%;min-width:50%;max-width:90%; text-align: left;float:left;}
        .message-right .username{width:90%;text-align: right; float:right;}
        .message-right .message-content {width:80%;min-width:50%;max-width:90%; text-align: right;float:right;}
    </style>
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-md-4 col-md-offset-4">
            <h2>Chat</h2>
            <div class="message-box">
                <div class="message-unit message-left">
                    <div>
                        <span class="user-name">用户名</span>
                    </div>
                    <div class="message-content">
                        <p>
                            123123
                        </p>
                    </div>
                </div>
                <div class="message-unit message-right">
                    <div class="username">
                        <span class="user-name">用户名</span>
                    </div>
                    <div class="message-content">
                        <p>
                            123123
                        </p>
                    </div>
                </div>
            </div>
            <div class="send-box">
                <input type="text" class="input-sm message-input" name="message">
                <button class="btn btn-default message-send-btn" type="button">发送</button>
            </div>
        </div>
    </div>
</div>

<script>
    $(function () {
        var ws = new WebSocket('ws://127.0.0.1:3001');
        ws.onopen = function (data) {
            console.log(data);
        }
        ws.onmessage = function (data) {
            var msgObj = JSON.parse(data.data);
            // JSON.parse 两次调用，可以将 转义符去掉
            msgObj = JSON.parse(msgObj);
            console.log(msgObj);
            showMessage({content:msgObj.msg}, false);
        }
        ws.onclose = function (data) {
            console.log(data);
            $('.message-send-btn').addClass('disabled');
        }

        $('.message-send-btn').click(function () {
            var _this = $(this);
            if (_this.hasClass('disabled')) {
                return;
            }
            var msg = $('.message-input').val();
            var msgData = {
                msg:msg
            };
            ws.send(JSON.stringify(msgData));
            showMessage({content:msgData.msg}, true);
        });
        // 向视窗中添加一组信息
        // example: showMessage({content:'This is a message content'}, true);
        var showMessage = function (msgObj,isLeft) {
            var messageStyle = isLeft ? 'message-left' : 'message-right';
            var messageHtml =
                '<div class="message-unit '+messageStyle+'">\
                    <div class="username">\
                        <span class="user-name">usermaexxx</span>\
                    </div>\
                    <div class="message-content">\
                        <p>'+msgObj.content+'</p>\
                    </div>\
                </div>';
            $('.message-box').append(messageHtml);
            // 当前滚动条距顶部高度
            var height = $('.message-box').scrollTop();
            var boxHeight = $('.message-box').height();
            //  滚动到底部
            $('.message-box').scrollTop(height + boxHeight*10);
        }
    });
</script>
</body>
</html>