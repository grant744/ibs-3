
            <img class="mb-5" src="/public/media/corporate/11.png" alt="" width="150" height="150">
            <h1 class="h3 mb-5 font-weight-normal text-color"><?php echo $phrase; ?></h1>

            <?php if ($response == 1) { ?>
                <div class="mb-5 response fail_color">Поле пароль не заполнено</div>
            <?php } else if ($response == 2) { ?>
                <div class="mb-5 response fail_color">Поле логин не заполнено</div>
            <?php } else if ($response == 3) { ?>
                <div class="mb-5 response fail_color">Не верный логин или пароль</div>
            <?php } else if ($response == 4) { ?>
                <div class="mb-5 response success_color">Добро пожаловать</div>
            <?php } ?>

            <input type="login" class="form-control" placeholder="Ваш логин" name="login">
            <input type="password" class="form-control mb-5" placeholder="Ваш пароль" name="password">

            <button class="btn btn-lg btn-primary btn-block mb-5" type="submit">Войти в систему</button>
