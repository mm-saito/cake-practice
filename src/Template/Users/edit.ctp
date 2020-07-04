<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */
?>
<?php echo $this->element('logout'); ?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('ユーザ管理') ?></li>
        <li><?= $this->Form->postLink(
                __('ユーザー削除'),
                ['action' => 'delete', $user->user_id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $user->user_id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('ユーザー一覧'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('権限一覧'), ['controller' => 'Groups', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('権限追加'), ['controller' => 'Groups', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="users form large-9 medium-8 columns content">
    <?= $this->Form->create($user) ?>
    <fieldset>
        <legend><?= __('ユーザー編集') ?></legend>
        <?php
            echo $this->Form->control('user_name');
            echo $this->Form->control('password');
            echo $this->Form->control('group_id', ['options' => $groups]);
            // echo $this->Form->control('create_date', ['empty' => true]);
            // echo $this->Form->control('update_date', ['empty' => true]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('登録')) ?>
    <?= $this->Form->end() ?>
</div>
