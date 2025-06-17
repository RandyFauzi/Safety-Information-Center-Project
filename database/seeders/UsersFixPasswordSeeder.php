<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UsersFixPasswordSeeder extends Seeder
{
    public function run(): void
    {
        $users = User::all();

        foreach ($users as $user) {
            $user->password = bcrypt($user->nik); // Password = NIK (di-hash)
            $user->save();
        }
    }
}
