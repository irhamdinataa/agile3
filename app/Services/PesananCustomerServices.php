<?php

namespace App\Services;

use App\Models\PesananCustomer;
use Illuminate\Support\Facades\Storage;
use Mail;
use PDF;
use Carbon\Carbon;

class PesananCustomerServices
{
    public function handleStore($request)
    {
        $data = $request->validated();
        $data['id'] = \Uuid::generate(4);
        PesananCustomer::create($data);

        return true;
    }

    public function handleUpdate($request, $PesananCustomer)
    {
        $data = $request->validated();
        $PesananCustomer->update($data);

        return true;
    }


    public function handleDestroy($PesananCustomer)
    {
        $PesananCustomer->delete();

        return true;
    }
}
