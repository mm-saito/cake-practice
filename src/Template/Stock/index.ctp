<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Stock[]|\Cake\Collection\CollectionInterface $stock
 */
?>
<!-- <nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Stock'), ['action' => 'add']) ?></li>
    </ul>
</nav> -->
<div class="stock index large-9 medium-8 columns content">
    <h3><?= __('在庫一覧') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('stock_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('stock_name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('quantity') ?></th>
                <th scope="col"><?= $this->Paginator->sort('price') ?></th>
                <th scope="col"><?= $this->Paginator->sort('create_date') ?></th>
                <th scope="col"><?= $this->Paginator->sort('update_date') ?></th>
                <!-- <th scope="col" class="actions"><?= __('Actions') ?></th> -->
            </tr>
        </thead>
        <tbody>
            <?php foreach ($stock as $stock): ?>
            <tr>
                <td><?= $this->Number->format($stock->stock_id) ?></td>
                <td><?= h($stock->stock_name) ?></td>
                <td><?= $this->Number->format($stock->quantity) ?></td>
                <td><?= $this->Number->format($stock->price) ?></td>
                <td><?= h($stock->create_date) ?></td>
                <td><?= h($stock->update_date) ?></td>
                <!-- <td class="actions"> -->
                    <!-- <?= $this->Html->link(__('詳細'), ['action' => 'view', $stock->stock_id]) ?> -->
                    <!-- <?= $this->Html->link(__('Edit'), ['action' => 'edit', $stock->stock_id]) ?> -->
                    <!-- <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $stock->stock_id], ['confirm' => __('Are you sure you want to delete # {0}?', $stock->stock_id)]) ?> -->
                <!-- </td> -->
            </tr>
            <button type="button">計算</button>
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
        
        
        <? 
        //ログインユーザの権限で遷移するページを振り分ける
        switch($group_id){
            case 1:                    
                $path = 'order/staff'; //在庫発注社員 add
                break;
            case 2: 
                $path = 'order/admin'; //在庫発注管理者 edit
                break;
            case 3:
                $path = 'order/comp';  //在庫発注社
                break;
        }
        ?>
        <?= $this->Html->link('管理', $path, ['class' => 'button']); ?>
        <?= $this->Html->link('ＣＳＶ', ['action' => 'exportStcok'], ['class' => 'button']) ?>
    </div>
</div>
