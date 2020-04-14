<?php

use Illuminate\Database\Seeder;

class ConversationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Conversation::class, 1)->create(['user_id' => 1])->each(function($conversation) {
            $conversation->replies()->createMany(
                factory(App\Reply::class, 3)->make(['conversation_id'=> $conversation->id])->toArray()
            );
        });

        factory(App\Conversation::class, 2)->create()->each(function($conversation) {
            $conversation->replies()->createMany(
                factory(App\Reply::class, 3)->make(['conversation_id'=> $conversation->id])->toArray()
            );
        });
    }
}
