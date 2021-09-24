<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Learner[]|\Cake\Collection\CollectionInterface $learners
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Learner'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Schools'), ['controller' => 'Schools', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New School'), ['controller' => 'Schools', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('Transfer History'), ['controller' => 'Transferdata', 'action' => 'index']) ?></li>
    </ul>
</nav>
<div class="learners index large-9 medium-8 columns content">
    <h3><?= __('Learners') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('firstname') ?></th>
                <th scope="col"><?= $this->Paginator->sort('lastname') ?></th>
                <th scope="col"><?= $this->Paginator->sort('idnumber') ?></th>
                <th scope="col"><?= $this->Paginator->sort('phone') ?></th>
                <th scope="col"><?= $this->Paginator->sort('school_name') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($learners as $learner): ?>
            <tr>
                <td><?= h($learner->firstname) ?></td>
                <td><?= h($learner->lastname) ?></td>
                <td><?= $learner->idnumber ?></td>
                <td><?= $learner->phone ?></td>
                <td><?= $learner->has('school') ? $this->Html->link($learner->school->schoolname, ['controller' => 'Schools', 'action' => 'view', $learner->school->id]) : '' ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $learner->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $learner->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $learner->id], ['confirm' => __('Are you sure you want to delete # {0}?', $learner->id)]) ?>
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
