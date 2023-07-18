<?php

namespace App\Repositories\ContactRepository;

use App\Repositories\ContactRepository\Models\ContactData;

interface ContactContract
{
    public function call(ContactData $data);
}
