# Fake User Generator

Simple helper to generate more realistic local users (for our needs). It will return an object where the email matches the name, and the username
looks vaguely correct.

Drop the class into database/factories/ then in your own factories you can do :

```php

class UserFactory extends Factory
{
    public function definition(): array
    {
        $user = FakeUserGenerator::generate();
        // or
        // $users = FakeUserGenerator::generate(5);

        return [
            'username' => $user->username,
            'forename' => $user->forename,
            'surname' => $user->surname,
            'email' => $user->email,
            'is_staff' => true,
            'password' => static::$password ??= Hash::make('password'),
            'remember_token' => Str::random(10),
        ];
    }
}
```

