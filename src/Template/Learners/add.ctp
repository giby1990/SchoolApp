<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Learner $learner
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Learners'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Schools'), ['controller' => 'Schools', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New School'), ['controller' => 'Schools', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('Transfer History'), ['controller' => 'Transferdata', 'action' => 'index']) ?></li>
    </ul>
</nav>
<div class="learners form large-9 medium-8 columns content">
    <?= $this->Form->create($learner) ?>
    <fieldset>
        <legend><?= __('Add Learner') ?></legend>
        <?php
            echo $this->Form->control('firstname');
            echo $this->Form->control('lastname');
            echo $this->Form->control('idnumber');
            echo $this->Form->control('dateofbirth');
            echo $this->Form->control('homeaddress');
            echo $this->Form->control('email');
            echo $this->Form->control('phone');
            echo $this->Form->control('school_id', ['options' => $schools]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
