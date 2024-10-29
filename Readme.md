# Fake User Generator

Simple helper to generate more realistic local users (for our needs). It will return an object where the email matches the name, and the username
looks vaguely correct.

Drop the class into database/factories/ then in your own factories you can do :

```php
// in a test
$user = User::factory()->create(FakeUserFactory::generate());

// or more verbose
$userData = FakeUserGenerator::generate();
$userData['surname'] = 'Smith';
$user = User::factory()->create($userData);
```
