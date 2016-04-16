<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $postShare->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $postShare->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Post Shares'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="postShares form large-9 medium-8 columns content">
    <?= $this->Form->create($postShare) ?>
    <fieldset>
        <legend><?= __('Edit Post Share') ?></legend>
        <?php
            echo $this->Form->input('title');
            echo $this->Form->input('link');
            echo $this->Form->input('target_link');
            echo $this->Form->input('fake_view');
            echo $this->Form->input('button');
            echo $this->Form->input('photo_url');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
