<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Task;
use App\Models\User;
use App\Models\Project;
use App\Models\Suggestion;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Dzakwan Irfan Ramdhani',
            'email' => 'dzakone07@gmail.com',
            'role' => 'owner',
            'password'=> bcrypt('12345'),
        ]);

        User::create([
            'name' => 'Connected Admin',
            'email' => 'admin@gmail.com',
            'role' => 'owner',
            'password'=> bcrypt('12345'),
        ]);

        User::create([
            'name' => 'Brian Cahya',
            'email' => 'brian@gmail.com',
            'role' => 'staff',
            'password'=> bcrypt('12345'),
        ]);

        User::factory(15)->create();

        Project::create([
            'nama_project' => 'Nuclear Project',
            'deskripsi_project' => 'Membuat senjata nuklir untuk pemusnah alien',
            'mulai' => '2023-10-31',
            'selesai' => '2023-11-03'
        ]);

        Suggestion::create([
            'project_id' => '1',
            'user_id' => '1',
            'suggestion' => 'Contoh suggestion'
        ]);

        Task::create([
            'id_project' => '1',
            'nama_task' => 'Membuat pangkalan militer',
            'deskripsi_task' => 'Mencari tempat di Los Alamos untuk dijadikan markas militer',
            'status' => '0',
            'mulai' => '2023-10-31',
            'selesai' => '2023-11-03'
        ]);

        Task::create([
            'id_project' => '1',
            'nama_task' => 'Merekrut ilmuan atom',
            'deskripsi_task' => 'Merekrut Bohr dan Robert Oppenheimer',
            'status' => '0',
            'mulai' => '2023-11-03',
            'selesai' => '2023-11-06'
        ]);

        Project::create([
            'nama_project' => 'Dump Project',
            'deskripsi_project' => 'Project ini hanya sebuah uji coba',
            'mulai' => '2023-10-31',
            'selesai' => '2023-11-03'
        ]);

        Suggestion::create([
            'project_id' => '2',
            'user_id' => '1',
            'suggestion' => 'Contoh suggestion'
        ]);

        Task::create([
            'id_project' => '2',
            'nama_task' => 'Dump task 1',
            'deskripsi_task' => 'Deskripsi dump task 1',
            'status' => '0',
            'mulai' => '2023-10-31',
            'selesai' => '2023-11-03'
        ]);

        Task::create([
            'id_project' => '2',
            'nama_task' => 'Dump task 2',
            'deskripsi_task' => 'Deskripsi dump task 2',
            'status' => '0',
            'mulai' => '2023-11-03',
            'selesai' => '2023-11-06'
        ]);
    }
}
