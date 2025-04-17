<?php

declare(strict_types=1);

use Cake\ORM\TableRegistry;
use Faker\Factory;
use Migrations\BaseSeed;

/**
 * Users seed.
 */
class UsersSeed extends BaseSeed
{
    /**
     * Run Method.
     *
     * Write your database seeder using this method.
     *
     * More information on writing seeds is available here:
     * https://book.cakephp.org/migrations/4/en/seeding.html
     *
     * @return void
     */
    public function run(): void
    {
        $usersTable = TableRegistry::getTableLocator()->get('Users'); // Nama tabelnya "Users"
        $faker = Factory::create();

        for ($i = 0; $i < 10; $i++) {
            $data = [
                'name' => $faker->name(),  // Menghasilkan nama lengkap
                'email' => $faker->email(),  // Menghasilkan email yang valid
                'password' => password_hash('12345678', PASSWORD_DEFAULT),  // Password di-hash
                'role' => $faker->randomElement(['admin', 'barber', 'customer']),  // Memastikan role ada di pilihan
                'created' => $faker->dateTimeThisYear()->format('Y-m-d H:i:s'),  // Format sesuai dengan tipe data datetime
                'modified' => $faker->dateTimeThisYear()->format('Y-m-d H:i:s'),  // Format sesuai dengan tipe data datetime
            ];
            $user = $usersTable->newEntity($data);
            $usersTable->save($user);
        }
    }
}
