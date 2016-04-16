<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Post Shares'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="postShares form large-9 medium-8 columns content">
    <?= $this->Form->create($postShare) ?>
    <fieldset>
        <legend><?= __('Add Post Share') ?></legend>
        <?php
            echo $this->Form->input('title', array('label' =>'Title (Tiêu đề chia sẻ)'));
            echo $this->Form->input('link', array('label' =>'link (Đường dẫn VIDEO)'));
            echo $this->Form->input('target_link', array('label' =>'Target_link (Link ĐÍCH)'));
            echo $this->Form->input('fake_view', array('label' =>'Fake view (Fake  (20.000.356 VIEWS | 1.212.304 DOWNLOADS ))'));
            echo $this->Form->input('button', array('label' =>'Button (Nút (DOWNLOAD, WATCH_VIDEO, WATCH_MORE, INSTALL_APP, INSTALL_MOBILE_APP, USE_MOBILE_APP, USE_APP, SUBSCRIBE, SIGN_UP, SHOP_NOW, PLAY_GAME))'));
            echo $this->Form->input('photo_url', array('label' =>'Photo url (Ảnh tự up)'));
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
