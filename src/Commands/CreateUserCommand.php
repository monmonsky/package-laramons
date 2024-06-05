<?php

namespace Laramons\Laramons\Commands;

use Illuminate\Console\Command;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class CreateUserCommand extends Command
{
    protected $signature = 'laramons:create-user';
    protected $description = 'Create a new user';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        // Ask for user input
        $name = $this->ask('What is the user\'s name?');
        $email = $this->ask('What is the user\'s email?');
        $password = $this->secret('What is the user\'s password?');

        // Validate email format
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $this->error('Invalid email format.');
            return;
        }

        // Check if email already exists
        if (User::where('email', $email)->exists()) {
            $this->error('Email already exists.');
            return;
        }

        // Create user
        $user = User::create([
            'name' => $name,
            'email' => $email,
            'password' => Hash::make($password),
        ]);

        $this->info("User {$name} created successfully.");
    }
}
