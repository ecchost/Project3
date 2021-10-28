<?php

namespace Database\Seeders;

use App\Models\User;
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
        User::create([
            'name' => 'Admin',
            'email' => 'admin@ecanteen.id',
            'password'=> bcrypt('password'),
            'id_type' => 'KTP',
            'id_number' => '1',
            'role' => 'admin'
        ]);

        $this->call([
            VariantSeeder::class,
            DummySeeder::class,
        ]);
    }
}
