<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Image Editor</title>
    <link rel="stylesheet" href="{{ asset('assets/screenshot/style.css') }}">
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script type="text/javascript" src="{{ asset('assets/screenshot/action.js') }}"></script>
    <style>
        .main {
            margin: 0 auto;
            width: 100%;
        }
        
        .main h2 {
            text-align: center;
        }
    </style>
</head>

<body>
    <!-- <form method="post" accept-charset="utf-8" name="form1">
    <input name="hidden_data" id='hidden_data' type="hidden"/>
    <input name="visita" id="visita" value="10" type="text"/>
</form> -->
    <div class="main">
        <!-- <h2>Please Edit Images</h2> -->
        <div id="canvasDiv" style="margin: auto"></div>
    </div>
    <script type="text/javascript">
        $("#canvasDiv").simplePaint({})
    </script>
</body>

</html>