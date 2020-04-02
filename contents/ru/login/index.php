
            <img class="mb-5" src="/public/media/corporate/11.png" alt="" width="150" height="150">
            <h1 class="h3 mb-5 font-weight-normal custom-text"><?php echo $phrase; ?></h1>

            <?php if ($response == 1) { ?>
                <div class="alert custom-alert-danger mb-5" role="alert">Поле логин не заполнено</div>
            <?php } else if ($response == 2) { ?>
                <div class="alert custom-alert-danger mb-5" role="alert">Поле пароль не заполнено</div>
            <?php } else if ($response == 3) { ?>
                <div class="alert custom-alert-danger mb-5" role="alert">Не верный логин или пароль</div>
            <?php } ?>

            <input type="login" class="form-control" placeholder="Ваш логин" name="login">
            <input type="password" class="form-control mb-5" placeholder="Ваш пароль" name="password">

            <button class="btn btn-lg btn-block mb-5 custom-btn" type="submit">Войти в систему</button>
