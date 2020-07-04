<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Order[]|\Cake\Collection\CollectionInterface $order
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Order'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Stock'), ['controller' => 'Stock', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Stock'), ['controller' => 'Stock', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="order index large-9 medium-8 columns content">
    <h3><?= __('Order') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('order_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('stock_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('quantity') ?></th>
                <th scope="col"><?= $this->Paginator->sort('price') ?></th>
                <th scope="col"><?= $this->Paginator->sort('status') ?></th>
                <th scope="col"><?= $this->Paginator->sort('create_date') ?></th>
                <th scope="col"><?= $this->Paginator->sort('update_date') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($order as $order): ?>
            <tr>
                <td><?= $this->Number->format($order->order_id) ?></td>
                <td><?= $order->has('stock') ? $this->Html->link($order->stock->stock_id, ['controller' => 'Stock', 'action' => 'view', $order->stock->stock_id]) : '' ?></td>
                <td><?= $this->Number->format($order->quantity) ?></td>
                <td><?= $this->Number->format($order->price) ?></td>
                <td><?= h($order->status) ?></td>
                <td><?= h($order->create_date) ?></td>
                <td><?= h($order->update_date) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $order->order_id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $order->order_id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $order->order_id], ['confirm' => __('Are you sure you want to delete # {0}?', $order->order_id)]) ?>
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
