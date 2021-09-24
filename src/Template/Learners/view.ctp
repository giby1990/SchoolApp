<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Learner $learner
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Learner'), ['action' => 'edit', $learner->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Learner'), ['action' => 'delete', $learner->id], ['confirm' => __('Are you sure you want to delete # {0}?', $learner->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Learners'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Learner'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Schools'), ['controller' => 'Schools', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New School'), ['controller' => 'Schools', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('Transfer History'), ['controller' => 'Transferdata', 'action' => 'index']) ?> </li>
    </ul>
</nav>
<div class="learners view large-9 medium-8 columns content">
    <h3><?= h($learner->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Firstname') ?></th>
            <td><?= h($learner->firstname) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Lastname') ?></th>
            <td><?= h($learner->lastname) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Email') ?></th>
            <td><?= h($learner->email) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('School') ?></th>
            <td><?= $learner->has('school') ? $this->Html->link($learner->school->schoolname, ['controller' => 'Schools', 'action' => 'view', $learner->school->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Idnumber') ?></th>
            <td><?= $learner->idnumber ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Phone') ?></th>
            <td><?= $learner->phone ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Dateofbirth') ?></th>
            <td><?= h($learner->dateofbirth) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Homeaddress') ?></h4>
        <?= $this->Text->autoParagraph(h($learner->homeaddress)); ?>
    </div>
    
</div>
