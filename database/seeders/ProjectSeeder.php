<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Project;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
  public function run(): void
{
    Project::create([
        'title' => 'Product CRUD System',
        'description' => 'A web application for creating, reading, updating and deleting products.',
        'github_url' => 'https://github.com/Max552-1/product_crud',
        'technologies' => 'PHP, Laravel, MySQL, HTML, CSS',
        'image' => null,
    ]);

    Project::create([
        'title' => 'Personal Portfolio',
        'description' => 'A multi-page portfolio website built using Laravel and Blade.',
        'github_url' => 'https://github.com/Max552-1/dinesh-portfolio',
        'technologies' => 'Laravel, PHP, Blade, CSS',
        'image' => null,
    ]);

    Project::create([
        'title' => 'Online_Shopping_System',
        'description' => 'An object-oriented Java application demonstrating abstraction, inheritance and interfaces.',
        'github_url' => 'https://github.com/Max552-1/Online_Shopping_System',
        'technologies' => 'Java, OOP',
        'image' => null,
    ]);

    Project::create([
        'title' => 'Fantassy Sports',
        'description' => 'Fantasy sports are interactive games where you act as the manager of a virtual team made up of real-life professional athletes.',
        'github_url' => 'https://github.com/Max552-1/Fantasy_Sport',
        'technologies' => 'HTML, CSS, JavaScript',
        'image' => null,
    ]);
}
}