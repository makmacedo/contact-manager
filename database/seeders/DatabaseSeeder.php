<?php

namespace Database\Seeders;

use App\Models\Company;
use App\Models\Contact;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Artisan;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {        
        // Create first Passport personal access client
        Artisan::call('passport:client --personal -n');

        $this->call([
            UserSeeder::class,
        ]);

        Company::factory(10)->create();
        Contact::factory(100)->create();
    }
}
