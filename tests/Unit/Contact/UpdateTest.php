<?php

namespace Tests\Unit\Contact;

use App\Models\Contact;
use App\Repositories\ContactRepository\Models\ContactData;
use App\Services\Contact\UpdateContactService;
use Tests\TestCase;

class UpdateTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_update_is_true()
    {
        $faker = \Faker\Factory::create();
        $items = Contact::all();

        $data = new ContactData;
        $data->id = $items[rand(1, count($items))]->id;
        $data->update = true;
        $data->name = $faker->firstName();
        $data->email = $faker->email();
        $data->phone = rand(111, 3333);
        $data->address = $faker->firstName();

        $response = (new UpdateContactService($data))->call();
        // echo "\nresult : " . json_encode($response);
        self::assertTrue($response->status() == 200);
    }

    public function test_update_is_false()
    {
        $data = new ContactData;
        $data->id = UUID_TYPE_RANDOM;
        $data->update = true;
        $data->name = null;
        $data->email = null;
        $data->phone = null;
        $data->address = null;
        $response = (new UpdateContactService($data))->call();
        // echo "\nresult : " . json_encode($response);
        self::assertEquals(300, $response->status() == 300);
    }
}
