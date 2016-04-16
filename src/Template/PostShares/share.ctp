
<?php echo $this->Html->script('/js/toolbar.min.js'); ?>

<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Post Share'), ['action' => 'edit', $postShare->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Post Share'), ['action' => 'delete', $postShare->id], ['confirm' => __('Are you sure you want to delete # {0}?', $postShare->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Post Shares'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Post Share'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="postShares view large-9 medium-8 columns content">
<!--
<?= $this->Form->create(null, [
    'url' => ['controller' => 'post-shares', 'action' => 'share', $postShare->id]
]); ?>
-->
<!--
APP ID
<input type="text" name="app_id" id='app_id' value="">
APP SECRET
<input type="text" name="app_secret" id='app_secret' value="">
-->
<a target="_blank" href="https://developers.facebook.com/tools/explorer/?method=GET">Click vào đây để lấy token</a>
<div>
TOKEN
<input type="text" id ='token' name="token" value="">
    <button id ='save_token' type="button">Lưu Token</button>

</div>
<div id='fan_pages'></div>
<br>
  <input type="hidden"  id="link" name="country" value="<?= $postShare['media_link'] ?>">
  <input type="hidden"  id="title" name="country" value="<?= $postShare['title'] ?>">
  <input type="hidden"  id="picture" name="country" value="<?= $postShare['photo_url'] ?>">
  <input type="hidden"  id="caption" name="country" value="<?= $postShare['fake_view'] ?>">
  <input type="hidden"  id="message" name="country" value="<?= $postShare['title'] ?>">
  
  
  <input type="hidden"  id="main_link" name="main_link" value="<?= $postShare['main_link'] ?>">

<!--
    <?= $this->Form->button('Bắt đầu bắn bài', array('name'=>'share')) ?>
    -->
    <button id ='share' type="button">Bắt dầu bắn bài</button>
    <?= $this->Form->end() ?>
</div>

<div id='result'></div>
