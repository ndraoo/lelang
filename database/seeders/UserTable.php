<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserTable extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = [
            [
            'username' => 'masyarakat',
            'nama_lengkap' => 'ini akun masyarakat (non admin)',
            'level' => 'masyarakat',
            'telp' => '08997722441',
            'password' => bcrypt('12345678'),
            ],
            [
            'username' => 'admin',
            'nama_lengkap' => 'ini akun Admin',
            'level' => 'admin',
            'telp' => '08997722451',
            'password' => bcrypt('12345678'),
            ],
            [
            'username' => 'petugas',
            'nama_lengkap' => 'ini akun petugas (non admin)',
            'level' => 'petugas',
            'telp' => '08997722461',
            'password' => bcrypt('12345678'),
            ],
        ];

        foreach ($user as $key => $value) {
            User::create($value);
        }
    }
}
