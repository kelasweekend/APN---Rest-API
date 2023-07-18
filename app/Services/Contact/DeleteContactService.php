<?php

namespace App\Services\Contact;

use App\Base\ServiceBase;
use App\Models\Contact;
use App\Repositories\ContactRepository\Models\ContactData;
use App\Responses\ServiceResponse;
use Illuminate\Support\Facades\Validator;

class DeleteContactService extends ServiceBase
{
    public function __construct(ContactData $data)
    {
        $this->data = $data;
    }

    protected function validate(): \Illuminate\Contracts\Validation\Validator
    {
        return Validator::make($this->data->toArray(), [
            "id"    => "required"
        ]);
    }
    /**
     * main method of this servicexx
     *
     * @return ServiceResponse
     */
    public function call(): ServiceResponse
    {
        $id = $this->data->id;
        $data = Contact::where('id', $id)->first();
        if (empty($data)) {
            # code...
            return self::error('Contact Not Found');
        }
        $data->delete();
        return self::success('Data Hass Been Deleted');
    }
}
