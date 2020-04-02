
            <img class="mb-5" src="/public/media/corporate/11.png" alt="" width="150" height="150">
            <h1 class="h3 mb-5 font-weight-normal custom-text"><?php echo $phrase; ?></h1>

            <div class="alert alert-primary alert-message d-flex rounded p-0" role="alert">
        <div class="alert-icon d-flex justify-content-center align-items-center flex-grow-0 flex-shrink-0 py-3">
            <i class="fas fa-bullhorn"></i>
        </div>
        <div class="d-flex align-items-center py-2 px-3">
            Информационное сообщение, имеющее тему primary
        </div>
        <a href="#" class="close d-flex ml-auto justify-content-center align-items-center px-3" data-dismiss="alert">
            <i class="fas fa-times"></i>
        </a>
    </div>

            <?php if ($response == 1) { ?>
                <div class="alert custom-alert-danger mb-5" role="alert">Login field is empty</div>
            <?php } else if ($response == 2) { ?>
                <div class="alert custom-alert-danger mb-5" role="alert">Password field is empty</div>
            <?php } else if ($response == 3) { ?>
                <div class="alert custom-alert-danger mb-5" role="alert">Wrong login or password</div>
            <?php } ?>

            <input type="login" class="form-control" placeholder="Your login" name="login">
            <input type="password" class="form-control mb-5" placeholder="Your password" name="password">

            <button class="btn btn-lg btn-block mb-5 custom-btn" type="submit">Sign in</button>