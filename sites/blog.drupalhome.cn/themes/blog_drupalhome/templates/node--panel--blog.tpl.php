<?php
/**
 * @file
 * Returns the HTML for a node.
 *
 * Complete documentation for this file is available online.
 * @see https://drupal.org/node/1728164
 */
?>
<article class="blog-article">
    <h2>浏览文章</h2>
    <section class="article-header">
    <p class="article-submitted">
    <?php 
        global $user; 
		/*
        if($user->uid==0){
           $name = $variables['name'];
        }else{
		*/
           $org_name = drupal_html_to_text($variables['name']);
           $name = substr($org_name, 0, strpos($org_name, '[')); 
       //}
    ?>
    <a href="<?php print '/bloger/'.$node->uid.'/space'; ?>"><?php print $name; ?></a><?php print t(' 发表于 ').format_date($node->created, 'custom', 'Y-m-d H:i:s'); ?></p>
    <p class="article-blog-category"><?php print t('博文分类: '); ?><a href="<?php print '/category/'.$field_blog_category[0]['taxonomy_term']->tid.'/front/newest'; ?>"><?php print $field_blog_category[0]['taxonomy_term']->name; ?></a></p>
    <p class="article-blog-tags"><?php print t('Tags:'); ?>
        <?php foreach($field_blog_tags as $tag) :?><a href="<?php print '/search/tag?tag='.$tag['taxonomy_term']->name; ?>"><?php print $tag['taxonomy_term']->name; ?></a><?php endforeach; ?>
    </p>
    </section>
    <section class="article-body">
    <p class="article-content"><?php print $field_blog_content[0]['value']; ?></p>
    </section>
    <?php print render($content['links']['flag']); ?>
    <section class="article-comments">
        <?php if($user->uid>0){$content['comments']['comment_form']['author']['_author']['#markup'] = l("$user->name", "bloger/$user->uid/space");} ?>
        <?php //print render($content['comments']); ?>
    </section>
    <?php 
        if($user->uid==0 && $node->comment_count==0){
           print l(t('登录'), 'user/login', array('query'=>array('destination'=>drupal_get_path_alias(current_path())))).t(' 或者 ').l(t('注册'), 'user/register', array('query'=>array('destination'=>drupal_get_path_alias(current_path())))).t(' 发表评论 ');
        }
    ?>
</article>
