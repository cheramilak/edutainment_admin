<?php
namespace Database\Seeders;

use App\Models\User;
use Hash;
use Illuminate\Database\Seeder;

class AdminSeederSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user           = new User();
        $user->name     = 'Admin user';
        $user->email    = 'admin@gmail.com';
        $user->type     = 2;
        $user->password = Hash::make('11223344');
        $user->save();
    }
}
