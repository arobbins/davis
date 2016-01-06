<?php $tag = ( 'div' === $args['style'] ) ? 'div' : 'li'; ?>
<<?php echo $tag; ?> id="comment-<?php comment_ID(); ?>" <?php comment_class( empty( $args['has_children'] ) ? '' : 'parent' ); ?>>
<article id="div-comment-<?php comment_ID(); ?>" class="comment-body">
   <footer class="l-row comment-meta">
      <div class="l-row l-col-center l-box-2 comment-author vcard">
         <?php if ( 0 != $args['avatar_size'] ) echo get_avatar( $comment, $args['avatar_size'] ); ?>
         <?php printf( __( '%s <span class="comment-author-name-says">says:</span>' ), sprintf( '<b class="comment-author-name fn">%s</b>', get_comment_author_link() ) ); ?>
      </div>

      <div class="l-row l-col-center l-fill comment-metadata">
         <a href="<?php echo esc_url( get_comment_link( $comment->comment_ID, $args ) ); ?>" class="comment-metadata-date nofollow">
            <b><time datetime="<?php comment_time( 'c' ); ?>">
               <?php printf( _x( '%1$s at %2$s', '1: date, 2: time' ), get_comment_date(), get_comment_time() ); ?>
            </time></b>
         </a>
         <?php edit_comment_link( __( 'Edit' ), '<span class="edit-link">', '</span>' ); ?>
      </div>

      <?php if ( '0' == $comment->comment_approved ) : ?>
         <p class="comment-awaiting-moderation"><?php _e( 'Your comment is awaiting moderation.' ); ?></p>
      <?php endif; ?>
   </footer>

   <div class="comment-content">
      <?php comment_text(); ?>
   </div>

   <div class="reply">
      <?php comment_reply_link( array_merge( $args, array( 'add_below' => 'div-comment', 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
   </div>

</article>
