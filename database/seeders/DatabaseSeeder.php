<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
        $this->call(RolesAndPermissionsSeeder::class);

        $user = User::factory()->create([
            'name' => 'Test User',
            'email' => 'admin@example.com',
        ]);

        $user->assignRole('super_admin','web');


        $users = User::factory(100)->create();

        $users->each(function (User $user) {
            $user->assignRole('admin');
        });

    }
}
