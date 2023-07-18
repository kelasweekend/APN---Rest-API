<?php

namespace Tests\Unit\Contact;

use App\Repositories\ContactRepository\Models\ContactData;
use App\Services\Contact\CreateContactService;
use Illuminate\Database\Eloquent\Factories\Factory;
use Tests\TestCase;

class CreateTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_create_is_true()
    {
        $faker = \Faker\Factory::create();
        $data = new ContactData;
        $data->id = null;
        $data->update = false;
        $data->name = $faker->firstName();
        $data->email = $faker->email();
        $data->phone = rand(111, 3333);
        $data->address = $faker->firstName();

        $response = (new CreateContactService($data))->call();
        // echo "\nresult : " . json_encode($response);
        self::assertTrue($response->status() == 200);
    }

    public function test_create_is_false()
    {
        $data = new ContactData;
        $data->id = null;
        $data->update = false;
        $data->name = null;
        $data->email = null;
        $data->phone = null;
        $data->address = null;
        $response = (new CreateContactService($data))->call();
        // echo "\nresult : " . json_encode($response);
        self::assertEquals(300, $response->status() == 300);
    }
}
