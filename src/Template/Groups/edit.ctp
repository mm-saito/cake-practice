<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Group $group
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('権限管理') ?></li>
        <li><?= $this->Form->postLink(
                __('権限削除'),
                ['action' => 'delete', $group->group_id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $group->group_id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('権限一覧'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="groups form large-9 medium-8 columns content">
    <?= $this->Form->create($group) ?>
    <fieldset>
        <legend><?= __('権限編集') ?></legend>
        <?php
            echo $this->Form->control('group_name');
            echo $this->Form->control('create_date', ['empty' => true]);
            echo $this->Form->control('update_date', ['empty' => true]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
