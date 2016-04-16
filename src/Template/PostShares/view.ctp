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
    <h3><?= h($postShare->title) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($postShare->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Modified') ?></th>
            <td><?= h($postShare->modified) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Title') ?></h4>
        <?= $this->Text->autoParagraph(h($postShare->title)); ?>
    </div>
    <div class="row">
        <h4><?= __('Link') ?></h4>
        <?= $this->Text->autoParagraph(h($postShare->link)); ?>
    </div>
    <div class="row">
        <h4><?= __('Target Link') ?></h4>
        <?= $this->Text->autoParagraph(h($postShare->target_link)); ?>
    </div>
    <div class="row">
        <h4><?= __('Fake View') ?></h4>
        <?= $this->Text->autoParagraph(h($postShare->fake_view)); ?>
    </div>
    <div class="row">
        <h4><?= __('Button') ?></h4>
        <?= $this->Text->autoParagraph(h($postShare->button)); ?>
    </div>
    <div class="row">
        <h4><?= __('Photo Url') ?></h4>
        <?= $this->Text->autoParagraph(h($postShare->photo_url)); ?>
    </div>
</div>
