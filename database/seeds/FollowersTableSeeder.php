<?php

use Illuminate\Database\Seeder;
use App\Models\User;

class FollowersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = User::all();
        $user = $users->first();
        $user_id = $user->id;

        // 去除第一个用户，将其余用户当成第一个用户的粉丝
        $followers = $users->slice(1);
        $follower_ids = $followers->pluck('id')->toArray();

        // 一号用户关注所有人，除了自己
        $user->follow($follower_ids);

        // 其余人都关注一号
        foreach ($followers as $follower) {
            $follower->follow($user_id);
        }
    }
}
