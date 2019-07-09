<?php

use Illuminate\Database\Seeder;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Settings::create([
            'blog_name' => 'abdullah ehab',
            'phone_number' => "01554783056",
            'blog_email' => 'nrtroz.ae@gmail.com',
            'address' => 'cairo'
        ]);
    }
}
