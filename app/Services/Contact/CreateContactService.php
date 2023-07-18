<?php

namespace App\Services\Contact;

use App\Base\ServiceBase;
use App\Models\Contact;
use App\Repositories\ContactRepository\ContactRepository;
use App\Repositories\ContactRepository\Models\ContactData;
use App\Responses\ServiceResponse;
use Illuminate\Support\Facades\Validator;

class CreateContactService extends ServiceBase
{
    public function __construct(ContactData $data)
    {
        $this->data = $data;
    }

    /**
     * Validate the data
     *
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validate(): \Illuminate\Contracts\Validation\Validator
    {
        return Validator::make($this->data->toArray(), [
            "email"    => "required|email|unique:contacts,email",
            "name" => "required",
            "phone" => 'required|numeric|unique:contacts,phone',
            "address" => 'required'
        ]);
    }
    /**
     * main method of this service
     *
     * @return ServiceResponse
     */
    public function call(): ServiceResponse
    {
        if ($this->validate()->fails()) {
            return self::error($this->validate()->errors(), 'Error Validate Input');
        }

        $dataStore = (new ContactRepository)->call($this->data);
        return self::success($dataStore);
    }
}
