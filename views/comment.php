<?php if( isset( $comments ) ) : ?>
    <?php foreach( $comments as $first ) : ?>
        <div class="comment level-1">

            <div id="<?php echo $first->get_id(); ?>" level="<?php echo $first->get_level(); ?>" class="comment-content">
                <i class="fa fa-arrow-right" aria-hidden="true"></i>
                <?php echo show_date( $first->get_date() ); ?> | <?php echo $first->get_text(); ?>
            </div>

            <?php if( $first->get_sub() != FALSE ) : ?>
                <?php foreach( $first->get_sub() as $second ) : ?>
                    <div class="comment level-2">

                        <div id="<?php echo $second->get_id(); ?>" level="<?php echo $second->get_level(); ?>" class="comment-content">
                            <i class="fa fa-file-text-o" aria-hidden="true"></i>
                            <?php echo show_date( $second->get_date() ); ?> | <?php echo $second->get_text(); ?>
                        </div>

                        <?php if( $second->get_sub() != FALSE ) : ?>
                            <?php foreach( $second->get_sub() as $third ) : ?>
                                <div class="comment level-3">

                                    <div id="<?php echo $second->get_id(); ?>" level="<?php echo $third->get_level(); ?>" class="comment-content">
                                        <i class="fa fa-file-text-o" aria-hidden="true"></i>
                                        <?php echo show_date( $third->get_date() ); ?> | <?php echo $third->get_text(); ?>
                                    </div>

                                </div>
                            <?php endforeach; ?>
                        <?php endif; ?>

                    </div>
                <?php endforeach; ?>
            <?php endif; ?>

        </div>
    <?php endforeach; ?>
<?php endif; ?>