<?php

/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Service> $services
 */
?>
<div class="services index content">
    <?= $this->Html->link(__('New Service'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Services') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('service_name') ?></th>
                    <th><?= $this->Paginator->sort('description') ?></th>
                    <th><?= $this->Paginator->sort('price') ?></th>
                    <th><?= $this->Paginator->sort('image') ?></th>
                    <th><?= $this->Paginator->sort('status') ?></th>
                    <th><?= $this->Paginator->sort('created') ?></th>
                    <!-- <th> $this->Paginator->sort('modified') ?></th> -->
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($services as $service): ?>
                    <tr>
                        <td><?= $this->Number->format($service->id) ?></td>
                        <td><?= h($service->service_name) ?></td>
                        <td><?= h($service->description) ?></td>
                        <td><?= $this->Number->format($service->price) ?></td>
                        <td>
                            <?php if (!empty($service->image)): ?>
                                <?= $this->Html->image($service->image, ['alt' => 'Service Image', 'style' => 'max-width:100px; height:auto;']) ?>
                            <?php else: ?>
                                <em>No Image</em>
                            <?php endif; ?>
                        </td>
                        <td><?= h($service->status) ?></td>
                        <td><?= h($service->created) ?></td>
                        <!-- <td> h($service->modified) ?></td> -->
                        <td class="actions">
                            <?= $this->Html->link(__('View'), ['action' => 'view', $service->id]) ?>
                            <?= $this->Html->link(__('Edit'), ['action' => 'edit', $service->id]) ?>
                            <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $service->id], ['confirm' => __('Are you sure you want to delete # {0}?', $service->id)]) ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(__('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')) ?></p>
    </div>
</div>