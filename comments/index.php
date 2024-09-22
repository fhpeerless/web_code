<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            color: #333;
            line-height: 1.6;
        }
        .container {
            max-width: 600px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }
        h1 {
            color: #333;
        }
        h2 {
            font-size: 1.2em;
            color: #666;
        }
        form {
            display: flex;
            flex-direction: column;
            align-items: stretch; /* 修改为 stretch 让 textarea 宽度100% */
        }
        textarea {
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ddd;
            border-radius: 4px;
            resize: vertical;
        }
        button {
            cursor: pointer;
            padding: 10px 20px;
            background-color: #5cb85c;
            color: white;
            border: 0;
            border-radius: 4px;
            transition: background-color 0.3s;
        }
        button:hover {
            background-color: #4cae4c;
        }
        #commentBox {
            background-color: #222;
            color: #ddd;
            height: 500px;
            overflow-y: auto;
            word-wrap: break-word;
            padding: 15px;
            border-radius: 4px;
        }
        @keyframes shake {
            0% { transform: translate(1px, 1px) rotate(0deg); }
            10% { transform: translate(-1px, -2px) rotate(-1deg); }
            20% { transform: translate(-3px, 0px) rotate(1deg); }
            30% { transform: translate(3px, 2px) rotate(0deg); }
            40% { transform: translate(1px, -1px) rotate(1deg); }
            50% { transform: translate(-1px, 2px) rotate(-1deg); }
            60% { transform: translate(-3px, 1px) rotate(0deg); }
            70% { transform: translate(3px, 1px) rotate(-1deg); }
            80% { transform: translate(-1px, -1px) rotate(1deg); }
            90% { transform: translate(1px, 2px) rotate(0deg); }
            100% { transform: translate(1px, -2px) rotate(-1deg); }
        }
    </style>

    <script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.5.1.min.js"></script>
    <script>
        $(document).ready(function(){
            fetchComments(); // 页面加载完毕后立即调用
            setInterval(fetchComments, 5000); // 然后每5秒调用一次
        });

        function fetchComments(){
            $.get("fetch_comments.php", function(data, status){
                $('#commentBox').html(data);
            });
        }
    </script>
</head>
<body>
    <div class="container">
        <h1 id="title">评论区</h1>
        <h2>由于时间关系，可能没有看到，您的建议，可以在下面留言，不时会查看</h2>
        <form action="comments.php" method="post">
            <textarea name="comment" required></textarea>
            <button type="submit">发表评论</button>
        </form>
        <div id="commentBox"></div>
        <div style="margin-top: 20px;">
            <?php include 'visit_count.php'; ?>
        </div>
    </div>
</body>
</html>