<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use App\Models\Produk;
use App\Models\Role;
use App\Models\status;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

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

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        User::create([
            'role_id'        =>  '1',
            'nama'           =>  'admin',
            'username'       =>  'admin',
            'email'          =>  'admin@gmail.com',
            'alamat'         =>  'jepara',
            'telp'           =>  '082543167',
            'password'       =>  Hash::make('admin'),
        ]);
        User::create([
            'role_id'        =>  '2',
            'nama'           =>  'user',
            'username'       =>  'user',
            'email'          =>  'user@gmail.com',
            'alamat'         =>  'pati',
            'telp'           =>  '0928739837',
            'password'       =>  Hash::make('user'),
        ]);

        Role::create([
            'nama' => 'admin'
        ]);
        Role::create([
            'nama' => 'user'
        ]);

        status::create([
            'nama'      =>  'order'
        ]);
        status::create([
            'nama'      =>  'kirim'
        ]);
        status::create([
            'nama'      =>  'selesai'
        ]);
    }
}
