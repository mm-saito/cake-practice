<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Order $order
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $order->order_id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $order->order_id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Order'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Stock'), ['controller' => 'Stock', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Stock'), ['controller' => 'Stock', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="order form large-9 medium-8 columns content">
    <?= $this->Form->create($order) ?>
    <fieldset>
        <legend><?= __('Edit Order') ?></legend>
        <?php
            echo $this->Form->control('stock_id', ['options' => $stock]);
            echo $this->Form->control('quantity');
            echo $this->Form->control('price');
            echo $this->Form->control('status');
            echo $this->Form->control('create_date', ['empty' => true]);
            echo $this->Form->control('update_date', ['empty' => true]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
