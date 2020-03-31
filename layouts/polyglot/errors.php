<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title><?php echo $title; ?></title>
        <link rel="shortcut icon" href="/public/media/favicon_2.ico" type="image/x-icon">

        <link href="/public/css/bootstrap.css" rel="stylesheet">
        <link href="/public/css/errors.css" rel="stylesheet">
    </head>

    <body class="text-center">
        <form class="form-error">
            <img class="mb-5" src="/public/media/corporate/19.jpg" alt="" width="150" height="150">

            <h1 class="h2 mb-5 font-weight-normal opacity"><?php echo $title; ?></h1>
            <h1 class="h6 font-weight-normal opacity"><?php echo $cause; ?></h1>
            <h1 class="h6 mb-5 font-weight-normal opacity"><?php echo $advice; ?></h1>

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