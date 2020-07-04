<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Order $order
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Order'), ['action' => 'edit', $order->order_id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Order'), ['action' => 'delete', $order->order_id], ['confirm' => __('Are you sure you want to delete # {0}?', $order->order_id)]) ?> </li>
        <li><?= $this->Html->link(__('List Order'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Order'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Stock'), ['controller' => 'Stock', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Stock'), ['controller' => 'Stock', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="order view large-9 medium-8 columns content">
    <h3><?= h($order->order_id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Stock') ?></th>
            <td><?= $order->has('stock') ? $this->Html->link($order->stock->stock_id, ['controller' => 'Stock', 'action' => 'view', $order->stock->stock_id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Status') ?></th>
            <td><?= h($order->status) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Order Id') ?></th>
            <td><?= $this->Number->format($order->order_id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Quantity') ?></th>
            <td><?= $this->Number->format($order->quantity) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Price') ?></th>
            <td><?= $this->Number->format($order->price) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Create Date') ?></th>
            <td><?= h($order->create_date) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Update Date') ?></th>
            <td><?= h($order->update_date) ?></td>
        </tr>
    </table>
</div>
