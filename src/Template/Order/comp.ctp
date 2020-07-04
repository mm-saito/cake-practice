<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Order[]|\Cake\Collection\CollectionInterface $order
 */
?>
<div class="order index large-9 medium-8 columns content">
    <h3><?= __('受注社ページ') ?></h3>
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
                    <?= $this->Html->link('確認',
                                          ['action' => 'compConfirm', 
                                            $order->order_id],
                                          ['class' => 'button', 
                                           'confirm' => __('在庫状態を更新します。発注ID：{0}', $order->order_id)])?>
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
