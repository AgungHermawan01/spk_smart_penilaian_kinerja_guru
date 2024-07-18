<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Schema;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Schema::disableForeignKeyConstraints();

        $this->call([
            TruncateData::class,
            AdminSeeder::class,
            RoleSeeder::class,
            KriteriaSeeder::class,
            SubkriteriaSeeder::class,
            BobotSubkriteriaSeeder::class,
            GuruSeeder::class,
            KsSeeder::class,
        ]);

        Schema::enableForeignKeyConstraints();
    }
}
