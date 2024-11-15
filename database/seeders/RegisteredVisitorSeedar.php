<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\RegisteredVisitor;
class RegisteredVisitorSeedar extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        RegisteredVisitor::factory(1)->create();
    }
}
