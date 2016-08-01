<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use CodeCommerce\User;

class CategoryTableSeeder extends Seeder
{
    public function run()
    {

        DB::table('categories')->truncate();

        factory('CodeCommerce\Category', 20)->create();

    }
}