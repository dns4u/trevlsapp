<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user=new \App\User();
        $user->name='root';
        $user->email='root@gmail.com';
        $user->password=bcrypt('root');
        $user->first_name='santosh';
        $user->middle_name='';
        $user->last_name='khadka';
        $user->contact='9803355800';
        $user->address='dipayal';
        $user->save();
    }
}
