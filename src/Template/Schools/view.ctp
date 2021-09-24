<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\School $school
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit School'), ['action' => 'edit', $school->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete School'), ['action' => 'delete', $school->id], ['confirm' => __('Are you sure you want to delete # {0}?', $school->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Schools'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New School'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Learners'), ['controller' => 'Learners', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Learner'), ['controller' => 'Learners', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('Transfer History'), ['controller' => 'Transferdata', 'action' => 'index']) ?></li>
    </ul>
</nav>
<div class="schools view large-9 medium-8 columns content">
    <h3><?= h($school->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Schoolname') ?></th>
            <td><?= h($school->schoolname) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Province') ?></th>
            <td><?= h($school->province) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Area') ?></th>
            <td><?= h($school->area) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Learners at').' '.h($school->schoolname) ?></h4>
        <?php if (!empty($school->learners)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Firstname') ?></th>
                <th scope="col"><?= __('Lastname') ?></th>
                <th scope="col"><?= __('Idnumber') ?></th>
                <th scope="col"><?= __('Email') ?></th>
                <th scope="col"><?= __('Phone') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($school->learners as $learners): ?>
            <tr>
                <td><?= h($learners->id) ?></td>
                <td><?= h($learners->firstname) ?></td>
                <td><?= h($learners->lastname) ?></td>
                <td><?= h($learners->idnumber) ?></td>
                <td><?= h($learners->email) ?></td>
                <td><?= h($learners->phone) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Learners', 'action' => 'view', $learners->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Learners', 'action' => 'edit', $learners->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Learners', 'action' => 'delete', $learners->id], ['confirm' => __('Are you sure you want to delete # {0}?', $learners->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
