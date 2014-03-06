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
    <section class="article-header">
    <p class="article-submitted">
    <?php print format_date($node->created, 'custom', 'Y-m-d H:i:s'); ?></p>
    </section>
    <section class="article-body">
    <p class="article-content"><?php print $field_info_content[0]['value']; ?></p>
    </section>
</article>
