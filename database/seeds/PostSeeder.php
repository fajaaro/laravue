<?php

use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    public function run()
    {
    	$users = App\User::all();

        $postsAmount = (int)$this->command->ask('How much posts do you want?', 10);
        factory(App\Post::class, $postsAmount)->make()->each(function ($post) use ($users) {
        	$post->user_id = $users->random()->id;
        	$post->save();
        });
    }
}