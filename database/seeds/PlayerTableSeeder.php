<?php

use Illuminate\Database\Seeder;

class PlayerTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('player_settings')->delete();
        
        \DB::table('player_settings')->insert(array (
            0 => 
            array (
                'id' => 1,
                'logo' => 'logo.png',
                'logo_enable' => 1,
                'cpy_text' => "LILA",
                'share_enable' => 1,
                'autoplay' => 1,
                'download' => 0,
                'created_at' => '2020-01-21 12:08:34',
                'updated_at' => '2020-01-21 12:08:34',
            ),
        ));
        
        
    }
}