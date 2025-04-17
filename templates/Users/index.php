<?php

/**
 * @var \App\View\AppView $this
 * @var \Cake\Collection\CollectionInterface $users
 */
?>
<h1>Users</h1>

<p>
    <?= $this->Html->link('Add New User', ['action' => 'add'], ['class' => 'button']) ?>
</p>

<table>
    <thead>
        <tr>
            <th><?= __('ID') ?></th>
            <th><?= __('Name') ?></th>
            <th><?= __('Email') ?></th>
            <th><?= __('Role') ?></th>
            <th><?= __('Actions') ?></th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($users as $user): ?>
            <tr>
                <td><?= h($user->id) ?></td>
                <td><?= h($user->name) ?></td>
                <td><?= h($user->email) ?></td>
                <td><?= h($user->role) ?></td>
                <td>
                    <?= $this->Html->link('View', ['action' => 'view', $user->id]) ?> |
                    <?= $this->Html->link('Edit', ['action' => 'edit', $user->id]) ?> |
                    <?= $this->Form->postLink('Delete', ['action' => 'delete', $user->id], ['confirm' => 'Are you sure?']) ?>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<!-- <td>= debug($user->id); ?></td> -->