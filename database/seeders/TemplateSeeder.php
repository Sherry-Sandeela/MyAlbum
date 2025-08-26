<?php

namespace Database\Seeders;

use App\Models\Template;
use Illuminate\Database\Seeder;

class TemplateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Template::create([
            'title' => 'Welcome',
            'content' => 'Hello [Name], welcome to our platform! We are excited to have you on board.'
        ]);

        // Complain Template
        Template::create([
            'title' => 'Complain',
            'content' => 'Dear [Name], we have received your complaint and our team will look into it immediately.'
        ]);

        // Promotion Template
        Template::create([
            'title' => 'Promotion',
            'content' => 'Hello [Name], congratulations! You have been promoted to [Position]. Keep up the great work!'
        ]);

        // Feedback Template
        Template::create([
            'title' => 'Feedback',
            'content' => 'Hi [Name], we value your feedback. Please share your thoughts on our service.'
        ]);
    }
}
