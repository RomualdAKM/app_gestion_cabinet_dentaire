<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Acte;
use App\Models\Code;
use App\Models\Devi;
use App\Models\Client;
use App\Models\Facture;
use App\Models\ItemDevi;
use App\Models\Reglement;
use App\Models\ItemFacture;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
         Acte::factory(30)->create();
         Client::factory(5)->create();
         Code::factory(30)->create();
         Devi::factory(5)->create();
         Facture::factory(5)->create();
         ItemFacture::factory(20)->create();
         ItemDevi::factory(20)->create();
         Reglement::factory(9)->create();
         

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
