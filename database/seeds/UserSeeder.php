<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run()
    {
        factory(App\User::class)->states('user-fajar')->create();
        $this->command->info('User Fajar created!');

        $usersAmount = (int)$this->command->ask('How much users do you want?', 10);
        factory(App\User::class, $usersAmount)->create();
    }
}
