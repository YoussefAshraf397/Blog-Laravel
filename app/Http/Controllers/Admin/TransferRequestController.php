<?php

namespace App\Http\Controllers\Admin;

use App\Enums\TransferRequestEnum;
use App\Http\Controllers\Controller;
use App\Models\TransferRequest;
use Illuminate\Http\Request;

class TransferRequestController extends Controller
{
    public function index()
    {
        $transferRequests = TransferRequest::latest()->get();
        return view('admin.transfer-request.index',compact('transferRequests'));
    }

    public function edit($id)
    {
        $transferRequest = TransferRequest::find($id);
        $transferRequestStatus = TransferRequestEnum::getValues();
        return view('admin.transfer-request.edit',compact('transferRequest', 'transferRequestStatus'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'payment_transaction_number' => 'required',
            'status' => 'required',
        ]);
        $input = $request->all();

        $transferRequest = TransferRequest::find($id);
        $transferRequest->payment_transaction_number = $input['payment_transaction_number'];
        $transferRequest->status = $input['status'];
        $transferRequest->notes = $input['notes'];
        $transferRequest->save();

        toastr()->success('Transfer request has been updated successfully!');
        return redirect()->route('admin.transfer-request.index');
    }
}
