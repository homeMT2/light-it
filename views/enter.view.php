<!DOCTYPE html>
<html>

    <head>
        <?php include_once 'head.php'; ?>
        <script src="./public/js/fb.js"></script>

    </head>

    <body>

        <div class="content">

            <div class="fb-enter">
                <fb:login-button scope="public_profile,email" onlogin="checkLoginState();"></fb:login-button>
                <div id="status"></div>
            </div>

            <div class="comments">
                <?php include_once 'comment.php'; ?>
            </div>
        </div>

        <?php include_once 'foot.php'; ?>
    </body>

</html>