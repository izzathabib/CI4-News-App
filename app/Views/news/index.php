<h2><?= esc($title) ?></h2>
 
<!-- 1. Check either there is news to display or not 
     2. If not empty it will loop through the array-->

<?php if ( $news_list !== [] ): ?>
  <?php foreach ($news_list as $news_item): ?>
    <h3><?= esc($news_item['title']) ?></h3>

    <div class="main">
      <?= esc($news_item['body']) ?>
    </div>
    <p><a href="/news/<?= esc($news_item['slug'], 'url') ?>">View article</a></p>

  <?php endforeach ?>

<?php else: ?>

    <h3>No News</h3>
    <p>Unable to find any news for you.</p>

<?php endif ?>