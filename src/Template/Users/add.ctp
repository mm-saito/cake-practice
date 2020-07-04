<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */
?>
<!-- <nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('ユーザ管理') ?></li>
        <li><?= $this->Html->link(__('ユーザー一覧'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('権限一覧'), ['controller' => 'Groups', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('権限追加'), ['controller' => 'Groups', 'action' => 'add']) ?></li>
    </ul>
</nav> -->
<div class="users form large-9 medium-8 columns content">
    <?= $this->Form->create($user) ?>
    <fieldset>
        <legend><?= __('ユーザー登録') ?></legend>
        <?php
            echo $this->Form->control('user_name');
            echo $this->Form->control('password');
            echo $this->Form->control('group_id', ['options' => $groups]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('登録')) ?>
    <?= $this->Form->end() ?>
</div>
