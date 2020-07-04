<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Group $group
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('権限管理') ?></li>
        <li><?= $this->Html->link(__('権限一覧'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="groups form large-9 medium-8 columns content">
    <?= $this->Form->create($group) ?>
    <fieldset>
        <legend><?= __('権限追加') ?></legend>
        <?php
            echo $this->Form->control('group_name');
        ?>
    </fieldset>
    <?= $this->Form->button(__('登録')) ?>
    <?= $this->Form->end() ?>
</div>
