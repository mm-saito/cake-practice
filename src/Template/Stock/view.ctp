<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Stock $stock
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Stock'), ['action' => 'edit', $stock->stock_id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Stock'), ['action' => 'delete', $stock->stock_id], ['confirm' => __('Are you sure you want to delete # {0}?', $stock->stock_id)]) ?> </li>
        <li><?= $this->Html->link(__('List Stock'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Stock'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="stock view large-9 medium-8 columns content">
    <h3><?= h($stock->stock_id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Stock Name') ?></th>
            <td><?= h($stock->stock_name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Stock Id') ?></th>
            <td><?= $this->Number->format($stock->stock_id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Quantity') ?></th>
            <td><?= $this->Number->format($stock->quantity) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Price') ?></th>
            <td><?= $this->Number->format($stock->price) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Create Date') ?></th>
            <td><?= h($stock->create_date) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Update Date') ?></th>
            <td><?= h($stock->update_date) ?></td>
        </tr>
    </table>
</div>
