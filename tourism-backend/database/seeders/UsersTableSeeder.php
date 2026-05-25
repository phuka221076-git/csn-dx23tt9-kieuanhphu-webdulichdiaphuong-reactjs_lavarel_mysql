<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('users')->delete();
        
        \DB::table('users')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'Test User',
                'email' => 'test@example.com',
                'email_verified_at' => '2026-04-19 21:46:57',
                'password' => '$2y$12$9J.GXjNym977sLjuOecAsOopIRplWuXTmJw4OKC3Yt812POaAzzIi',
                'role' => 'user',
                'is_active' => 1,
                'remember_token' => 'rRSsjaTxPJ',
                'created_at' => '2026-04-19 21:46:58',
                'updated_at' => '2026-05-10 04:42:55',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'Lien xo',
                'email' => 'lienxokieu@gmail.com',
                'email_verified_at' => NULL,
                'password' => '$2y$12$g7kovE.xANReNULSS2jp/OIe5l1NAyDuWgEECExGtT.P1qLCqBV02',
                'role' => 'admin',
                'is_active' => 1,
                'remember_token' => NULL,
                'created_at' => '2026-05-09 04:18:33',
                'updated_at' => '2026-05-09 04:18:33',
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'Lien xo',
                'email' => 'test1@gmail.com',
                'email_verified_at' => NULL,
                'password' => '$2y$12$4V0dOb4Yi1Awodoc1vsPQODlNzzUyDv1Ld17kY.lhcqp/aSTg2k1e',
                'role' => 'user',
                'is_active' => 1,
                'remember_token' => NULL,
                'created_at' => '2026-05-09 04:25:31',
                'updated_at' => '2026-05-09 04:25:31',
            ),
            3 => 
            array (
                'id' => 4,
                'name' => 'Kim Hằng',
                'email' => 'laikimhang80@gmail.com',
                'email_verified_at' => NULL,
                'password' => '$2y$12$.iZxp8mzD4uloeGhPSiWYOROYwN9BiWP02VIB0u7MnINV7SJ5AaCu',
                'role' => 'user',
                'is_active' => 1,
                'remember_token' => NULL,
                'created_at' => '2026-05-10 05:15:10',
                'updated_at' => '2026-05-10 05:21:53',
            ),
            4 => 
            array (
                'id' => 5,
                'name' => 'Anh Phu',
                'email' => 'phu@gmail.com',
                'email_verified_at' => NULL,
                'password' => '$2y$12$Ni8e.N/wA3P2FRpwAuJW7uxBhOwNfXZyptzNQaH3LVDjn0fbobeXG',
                'role' => 'admin',
                'is_active' => 1,
                'remember_token' => NULL,
                'created_at' => '2026-05-20 16:35:38',
                'updated_at' => '2026-05-20 16:37:17',
            ),
        ));
        
        
    }
}