# Fake User Generator

Simple helper to generate more realistic local users (for our needs). It will return an array where the email matches the name, and the username looks vaguely correct.

Drop the class into database/factories/ then in your tests you can do :

```php
// in a test
$user = User::factory()->create(FakeUserFactory::generate());

// or more verbose
$userData = FakeUserGenerator::generate();
$userData['surname'] = 'Smith';
$user = User::factory()->create($userData);

// create multiple user data entries (collection of arrays)
$userData = FakeUserGenerator::generate(5);

// example of the generator output
$userData = FakeUserGenerator::generate();
dd($userData);
/**
[
  "surname" => "MacMillan",
  "forename" => "Jennifer",
  "username" => "jgm1a",
  "email" => "Jennifer.MacMillan@example.ac.uk"
]
*/
```
