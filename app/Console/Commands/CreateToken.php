<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Hash;
use Laravel\Sanctum\NewAccessToken;
use function Laravel\Prompts\password;
use function Laravel\Prompts\text;

class CreateToken extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:create-token
                            {--name= : Name of the user}
                            {--email= : Email of the user}
                            {--password= : Password of the user}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create token for API consumption';

    /**
     * @var array
     */
    protected array $options = [];

    /**
     * Execute the console command.
     * @throws \Throwable
     */
    public function handle(): int
    {
        $this->options = $this->options();

        $token = $this->createUserToken($this->getUserData());

        $this->line(sprintf('Token: %s', $token->plainTextToken));

        return Command::SUCCESS;
    }

    protected function getUserData(): array
    {
        return [
            'name' => $this->options['name'] ?? text(
                label: 'Name',
                required: true
            ),
            'email' => $this->options['email'] ?? text(
                label: 'Email',
                validate: ['email' => 'required|email|unique:users']
            ),
            'password' => $this->options['password'] ?? password(
                label: 'Password',
                required: true
            ),
        ];
    }

    private function createUserToken(array $data): NewAccessToken
    {
        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);

        return $user->createToken(sprintf('%s-AuthToken', $user->email));
    }
}

//curl -i -H "Accept: application/json" -H "Authorization: Bearer 1|sYMpVGP6KXocs2Z2lgE7ejFVqKwraBRCvifXrldZac77e978" http://localhost:8000/api/user
