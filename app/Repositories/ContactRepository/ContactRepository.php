<?php

namespace App\Repositories\ContactRepository;

use App\Models\Contact;
use App\Repositories\ContactRepository\Models\ContactData;

class ContactRepository implements ContactContract
{

    public function call(ContactData $data)
    {
        if ($data->update == true || $data->id != null) {
            # code...
            return Contact::find($data->id)->update([
                'name' => $data->name,
                'email' => $data->email,
                'phone' => $data->phone,
                'address' => $data->address
            ]);
        } else {
            # code...
            return Contact::create([
                'name' => $data->name,
                'email' => $data->email,
                'phone' => $data->phone,
                'address' => $data->address
            ]);
        }
    }
}
