<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Order $order
 */
?>
<!-- <nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Order'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Stock'), ['controller' => 'Stock', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Stock'), ['controller' => 'Stock', 'action' => 'add']) ?></li>
    </ul>
</nav> -->
<div class="order form large-9 medium-8 columns content">
    <?= $this->Form->create($order) ?>
    <fieldset>
        <h3><?= __('発注社員ページ') ?></h3>
        <?php
            //label名変更　'label' => ['text' => 'Stock_name']
            //必須項目'required' => true　
            echo $this->Form->control('stock_id', ['options' => $stock, 
                                                   'label' => ['text' => 'Stock_name'],
                                                   'required' => true]);
            echo $this->Form->control('quantity');
        ?>
    </fieldset>
    <?= $this->Form->button(__('発注')) ?>
    <?= $this->Form->end() ?>
</div>
