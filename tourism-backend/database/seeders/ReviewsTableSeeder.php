<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ReviewsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('reviews')->delete();
        
        \DB::table('reviews')->insert(array (
            0 => 
            array (
                'id' => 1,
                'user_id' => 3,
                'location_id' => 1,
                'rating' => 4,
                'comment' => 'đfds',
                'created_at' => '2026-05-09 15:54:43',
                'updated_at' => '2026-05-09 15:54:43',
            ),
        ));
        
        
    }
}