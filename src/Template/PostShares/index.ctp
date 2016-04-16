
<nav class="large-3 medium-4 columns left-column" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Post Share'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="postShares index large-9 medium-8 columns content">
    <h3><?= __('Post Shares') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('id') ?></th>
                <th><?= $this->Paginator->sort('title') ?></th>
                <th><?= $this->Paginator->sort('link') ?></th>
                <th><?= $this->Paginator->sort('target_link') ?></th>
                <th><?= $this->Paginator->sort('photo_url') ?></th>
                <th><?= 'Post (Đăng bài)' ?></th>
                <th><?= $this->Paginator->sort('modified') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($postShares as $postShare): ?>
            <tr>
                <td><?= $this->Number->format($postShare->id) ?></td>
                <td><?= $postShare->title ?></td>
                <td><?= $this->Html->link($postShare->link) ?></td>
                <td><?= $this->Html->link($postShare->target_link) ?></td>
                <td><?= $this->Html->link($this->Html->image($postShare->photo_url), $postShare->photo_url, array('escape' => false)
				); ?></td>
                <td><?= $this->Html->link($this->Form->button('Post'), array('action' => 'share',$postShare->id), array('escape'=>false,'title' => "Post"));?></td>
                <td><?= h($postShare->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $postShare->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $postShare->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $postShare->id], ['confirm' => __('Are you sure you want to delete # {0}?', $postShare->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
        </ul>
        <p><?= $this->Paginator->counter() ?></p>
    </div>
</div>
