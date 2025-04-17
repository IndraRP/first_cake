<?php

declare(strict_types=1);

use Cake\ORM\TableRegistry;
use Faker\Factory;
use Migrations\BaseSeed;

/**
 * Services seed.
 */
class ServicesSeed extends BaseSeed
{
    public function run(): void
    {
        $servicesTable = TableRegistry::getTableLocator()->get('Services');
        $faker = Factory::create();

        for ($i = 0; $i < 10; $i++) {
            $data = [
                'service_name' => $faker->word(),
                'description' => $faker->sentence(),
                'price' => $faker->numberBetween(50000, 100000),
                'image' => $faker->imageUrl(),
                'status' => $faker->randomElement(['active', 'blocked']),
                'created' => $faker->dateTime(),
                'modified' => $faker->dateTime(),
            ];
            $service = $servicesTable->newEntity($data);
            $servicesTable->save($service);
        }
    }
}
