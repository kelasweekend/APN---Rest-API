<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Repositories\ContactRepository\Models\ContactData;
use App\Services\Contact\CreateContactService;
use App\Services\Contact\DeleteContactService;
use App\Services\Contact\FindContactService;
use App\Services\Contact\IndexContactService;
use App\Services\Contact\UpdateContactService;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        return response()->json((new IndexContactService)->call());
    }

    public function create(Request $request)
    {
        $data = new ContactData;
        $data->id = null;
        $data->update = false;
        $data->name = $request->name;
        $data->email = $request->email;
        $data->phone = $request->phone;
        $data->address = $request->address;

        return response()->json((new CreateContactService($data))->call());
    }

    public function show(Request $request)
    {
        $data = new ContactData;
        $data->id = $request->id;
        return response()->json((new FindContactService($data))->call());
    }

    public function update(Request $request)
    {
        $data = new ContactData;
        $data->id = $request->id;
        $data->update = true;
        $data->name = $request->name;
        $data->email = $request->email;
        $data->phone = $request->phone;
        $data->address = $request->address;

        return response()->json((new UpdateContactService($data))->call());
    }

    public function destroy(Request $request)
    {
        $data = new ContactData;
        $data->id = $request->id;
        return response()->json((new DeleteContactService($data))->call());
    }
}
