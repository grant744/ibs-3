<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title><?php echo $title; ?></title>
        <link rel="shortcut icon" href="/public/media/favicon.ico" type="image/x-icon">

        <link href="/public/css/bootstrap.css" rel="stylesheet">
        <link href="/public/css/login.css" rel="stylesheet">
    </head>

    <body class="text-center">
        <form method="post" enctype="multipart/form-data" class="blank">


            <?php echo $content; ?>


            <div class="input-group">
                <select class="custom-select language_event">
                    <option <?php if ($_SESSION['language'] == 'en') echo 'selected="selected"'; ?> value="en">English</option>
                    <option <?php if ($_SESSION['language'] == 'ru') echo 'selected="selected"'; ?> value="ru">Русский</option>
                </select>
            </div>
        </form>

        <script type="text/javascript" src="/public/js/jquery.js"></script>
        <script type="text/javascript" src="/public/js/language.js"></script>
    </body>
</html>