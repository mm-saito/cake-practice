<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Group[]|\Cake\Collection\CollectionInterface $groups
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('権限管理') ?></li>
        <li><?= $this->Html->link(__('権限登録'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="groups index large-9 medium-8 columns content">
    <h3><?= __('Groups') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('group_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('group_name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('create_date') ?></th>
                <th scope="col"><?= $this->Paginator->sort('update_date') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($groups as $group): ?>
            <tr>
                <td><?= $this->Number->format($group->group_id) ?></td>
                <td><?= h($group->group_name) ?></td>
                <td><?= h($group->create_date) ?></td>
                <td><?= h($group->update_date) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('詳細'), ['action' => 'view', $group->group_id]) ?>
                    <?= $this->Html->link(__('編集'), ['action' => 'edit', $group->group_id]) ?>
                    <?= $this->Form->postLink(__('削除'), ['action' => 'delete', $group->group_id], ['confirm' => __('削除してもいいですか？ # {0}?', $group->group_id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
    </div>
</div>
