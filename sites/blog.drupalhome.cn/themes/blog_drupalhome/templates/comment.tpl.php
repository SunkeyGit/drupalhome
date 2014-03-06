<?php
/**
 * @file
 * Returns the HTML for comments.
 *
 * Complete documentation for this file is available online.
 * @see https://drupal.org/node/1728216
 */
?>
<article class="<?php print $classes; ?> clearfix"<?php print $attributes; ?>>

  <header>
    <?php 
        $user_name = '';
        $user_id = '';

        if($comment->pid!=0){
              $row = db_query('SELECT uid FROM {comment} WHERE cid=:cid', array(':cid'=>$comment->pid))->fetchObject();
              $uid = $row->uid;
              $user = user_load($uid);
              $user_name = $user->name;
              $user_id = $user->uid;
        }else{
            $user_name = t('博主');
            $user_id = $comment->uid;
        }
    ?>
    <p class="submitted">
     <a href="<?php print '/bloger/'.$comment->uid.'/space'; ?>"><?php print $node->uid==$comment->uid?'博主':$comment->name; ?></a><?php print ' 回复 ';?>
     <a href="<?php print '/bloger/'.$user_id.'/space'?>"><?php print $node->uid==$user_id?'博主':$user_name; ?></a><?php print ' 于 '.format_date($comment->created, 'custom', 'Y-m-d H:i:s'); ?>
    </p>

  </header>

  <?php
    // We hide the comments and links now so that we can render them later.
    global $user;
    if($user->uid==0){
        $links = l(t('登录'), 'user/login', array('query'=>array('destination'=>drupal_get_path_alias(current_path())."#comment-$comment->cid"))).t(' 或者 ').l(t('注册'), 'user/register', array('query'=>array('destination'=>drupal_get_path_alias(current_path())."#comment-$comment->cid"))).t(' 发表评论 ');
        $content['links']['comment']['#links']['comment_forbidden']['title'] = $links;
    }
    print render($content);
  ?>
</article>
