<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Service $service
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Services'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="services form content">
            <!-- $this->Form->create($service) ?> -->
            <?= $this->Form->create($service, ['type' => 'file']) ?>

            <fieldset>
                <legend><?= __('Add Service') ?></legend>
                <?php
                echo $this->Form->control('service_name');
                echo $this->Form->control('description');
                echo $this->Form->control('price');
                echo $this->Form->control('image', [
                    'type' => 'file',
                    'label' => 'Image',
                    'accept' => 'image/*'
                ]);
                echo $this->Form->control('status', [
                    'type' => 'select',
                    'options' => ['active' => 'Active', 'blocked' => 'Blocked'],
                    'empty' => false
                ]);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>