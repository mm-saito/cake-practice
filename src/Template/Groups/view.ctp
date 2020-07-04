<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Group $group
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Group'), ['action' => 'edit', $group->group_id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Group'), ['action' => 'delete', $group->group_id], ['confirm' => __('Are you sure you want to delete # {0}?', $group->group_id)]) ?> </li>
        <li><?= $this->Html->link(__('List Groups'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Group'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="groups view large-9 medium-8 columns content">
    <h3><?= h($group->group_id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Group Name') ?></th>
            <td><?= h($group->group_name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Group Id') ?></th>
            <td><?= $this->Number->format($group->group_id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Create Date') ?></th>
            <td><?= h($group->create_date) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Update Date') ?></th>
            <td><?= h($group->update_date) ?></td>
        </tr>
    </table>
</div>
