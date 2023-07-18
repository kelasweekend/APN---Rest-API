<?php

namespace Tests\Unit\Contact;

use App\Models\Contact;
use App\Repositories\ContactRepository\Models\ContactData;
use App\Services\Contact\FindContactService;
use Tests\TestCase;

class FindTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_find_Id_is_true()
    {
        $items = Contact::all();
        $data = new ContactData;
        $data->id = $items[rand(1, count($items))]->id;
        $response = (new FindContactService($data))->call();
        // echo "\nresult : " . json_encode($data[rand(1, count($data))]);
        self::assertTrue($response->status() == 200);
    }

    public function test_find_Id_is_false()
    {
        $data = new ContactData;
        $data->id = UUID_TYPE_RANDOM;
        $response = (new FindContactService($data))->call();
        // echo "\nresult : " . json_encode($data[rand(1, count($data))]);
        self::assertEquals(300, $response->status() == 300);
    }
}
