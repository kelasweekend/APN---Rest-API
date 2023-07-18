<?php

namespace App\Services\Contact;

use App\Base\ServiceBase;
use App\Models\Contact;
use App\Responses\ServiceResponse;
use Illuminate\Support\Facades\Validator;

class IndexContactService extends ServiceBase
{
    /**
     * main method of this servicexx
     *
     * @return ServiceResponse
     */
    public function call(): ServiceResponse
    {

        $data = Contact::all();
        if (count($data) <= 0) {
            # code...
            return self::error('Data Empty Please Insert');
        }
        return self::success($data);
    }
}
