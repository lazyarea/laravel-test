<!DOCTYPE html>
<html>
    <head>
        <title>Laravel</title>

        <link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">

        <style>
            html, body {
                height: 100%;
            }

            body {
                margin: 0;
                padding: 0;
                width: 100%;
                display: table;
                font-weight: 100;
                font-family: 'Lato', sans-serif;
            }

            .container {
                text-align: center;
                display: table-cell;
                vertical-align: middle;
            }

            .content {
                text-align: center;
                display: inline-block;
            }

            .title {
                font-size: 96px;
            }
        </style>
    </head>
    <body>
        <div class="container">
            <div class="content">
                <div class="title">Laravel 51</div>
                <form method="post">
                    <textarea name="json" style="margin: 0px; height: 251px; width: 462px;"></textarea>
                    <br><input type="submit" name="submit" value="Check"><br>
                    <textarea name="result" readonly style="margin: 0px; height: 251px; width: 462px;"></textarea>
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                </from>
            </div>
        </div>
    </body>
</html>
