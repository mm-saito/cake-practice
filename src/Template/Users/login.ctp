<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User[]|\Cake\Collection\CollectionInterface $users
 */
?>
<div class="users form large-9 medium-8 columns content">
    <?= $this->Flash->render() ?>
    <?= $this->Form->create() ?>
    <fieldset>
        <legend><?= __('ユーザー名とパスワードを入力して下さい') ?></legend>
        <?= $this->Form->control('user_name') ?>
        <?= $this->Form->control('password') ?>
    </fieldset>
    <?= $this->Form->button(__('ログイン')) ?>
    <?= $this->Form->end() ?>
    <?= $this->Html->link('新規登録','users/add', ['class' => 'button']); ?>
</div>