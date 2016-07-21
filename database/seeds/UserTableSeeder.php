<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use CodeCommerce\User;
class UserTableSeeder extends Seeder
{
    public function run()
    {

        DB::table('users')->truncate();

        factory('CodeCommerce\User', 10)->create();

    }


}