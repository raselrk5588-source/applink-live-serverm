<?php

use Illuminate\Database\Seeder;

class SiteSettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\SiteSetting::updateOrCreate(
            ['key' => 'total_install_limit'],
            ['value' => '10']
        );
    }
}
