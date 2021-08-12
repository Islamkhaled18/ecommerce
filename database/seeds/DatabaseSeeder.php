<?php

use Illuminate\Database\Seeder;
use App\Models\Admin;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        $admins = new Admin();
        $admins->email = "admin@gmail.com";
        $admins->password =Hash::make('123456789');
        $admins->name = "admin";
        $admins->save();

        $this->call(SettingDatabaseSeeder::class);
    }
}
