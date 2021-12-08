<?php

namespace Sil2\Vidflex\Database\Seeds;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $pivotTable = config('auth.providers.users.model');

        $user           = $pivotTable::where('name', 'test')->first() ?? new $pivotTable();
        $user->name     = 'test';
        $user->email    = 'test@test.com';
        $user->password = Hash::make('test');
        $user->save();
    }
}
