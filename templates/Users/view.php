<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */
?>
<h1><?= h($user->name) ?></h1>

<table>
    <tr>
        <th><?= __('ID') ?></th>
        <td><?= h($user->id) ?></td>
    </tr>
    <tr>
        <th><?= __('Name') ?></th>
        <td><?= h($user->name) ?></td>
    </tr>
    <tr>
        <th><?= __('Email') ?></th>
        <td><?= h($user->email) ?></td>
    </tr>
    <tr>
        <th><?= __('Role') ?></th>
        <td><?= h($user->role) ?></td>
    </tr>
</table>

<?= $this->Html->link('Edit', ['action' => 'edit', $user->id]) ?>
<?= $this->Html->link('Back to list', ['action' => 'index']) ?>