<!DOCTYPE html>
<html>

    <head>
        <?php include_once 'head.php'; ?>
    </head>

    <body>

        <div class="content">
            <h1>Comments</h1>

            <div class="add-comment">
                <textarea class="textarea-comment" name="comment" id="comment"></textarea>
                <input name="comment_id"  id="comment_id" type="hidden" value="" />
                <input name="comment_level"  id="comment_level" type="hidden" value="0" />
                <button class="button-comment-send" id="comment-send">Send</button>
            </div>

            <div class="comments">
                <?php include_once 'comment.php'; ?>
            </div>
        </div>

        <?php include_once 'foot.php'; ?>
    </body>

</html>