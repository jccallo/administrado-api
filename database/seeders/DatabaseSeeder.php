<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Account;
use App\Models\Bank;
use App\Models\Call;
use App\Models\Career;
use App\Models\Course;
use App\Models\Exam;
use App\Models\Fault;
use App\Models\Friend;
use App\Models\Job;
use App\Models\Place;
use App\Models\Postulation;
use App\Models\User;
use App\Models\Vacancy;
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

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        Place::factory(10)->create();
        User::factory(10)->create();
        Friend::factory(10)->create();
        Fault::factory(10)->create();
        Career::factory(10)->create();
        Job::factory(10)->create();
        Bank::factory(10)->create();
        Account::factory(10)->create();
        Vacancy::factory(10)->create();
        Postulation::factory(10)->create();
        Exam::factory(10)->create();
        Course::factory(10)->create();
    }
}
