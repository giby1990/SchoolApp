<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Transferdata[]|\Cake\Collection\CollectionInterface $transferdata
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Schools'), ['controller' => 'Schools', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New School'), ['controller' => 'Schools', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Learners'), ['controller' => 'Learners', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Learner'), ['controller' => 'Learners', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="transferdata index large-9 medium-8 columns content">
    <h3><?= __('Transfer History') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('learner_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('from_school_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('to_school_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('transfertime') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($transferdata as $transferdata): ?>
            <tr>
                <td><?= $this->Number->format($transferdata->id) ?></td>
                <td><?= $transferdata->has('learner') ? $this->Html->link($transferdata->learner->firstname.' '.$transferdata->learner->lastname, ['controller' => 'Learners', 'action' => 'view', $transferdata->learner->id]) : '' ?></td>
                <td><?= $transferdata->has('from_school') ? $this->Html->link($transferdata->from_school->schoolname, ['controller' => 'Schools', 'action' => 'view', $transferdata->from_school_id]) : '' ?></td>
                <td><?= $transferdata->has('to_school') ? $this->Html->link($transferdata->to_school->schoolname, ['controller' => 'Schools', 'action' => 'view', $transferdata->to_school_id]) : '' ?></td>
                <td><?= h($transferdata->transfertime) ?></td>
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
