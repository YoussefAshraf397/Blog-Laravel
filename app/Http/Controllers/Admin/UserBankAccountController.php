<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Bank;
use App\Models\UserBankAccount;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class UserBankAccountController extends Controller
{
    public function index()
    {
        $userBankAccounts = UserBankAccount::latest()->get();
        return view('admin.user-bank-account.index',compact('userBankAccounts'));
    }

    public function create()
    {
        $users = User::where('status','active')->get();
        $banks = Bank::where('status', 1)->get();
        return view('admin.user-bank-account.create', compact('users','banks'));
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'user_id' => 'required|exists:users,id',
            'bank_id' => 'required|exists:banks,id',
            'account_name' => 'required',
            'swift_code' => 'required',
            'branch_name' => 'required',
            'account_number' => 'required',
            'iban' => 'required',
            'front_media' => 'mimes:jpeg,bmp,png,jpg',
            'back_media' => 'mimes:jpeg,bmp,png,jpg'
        ]);

        $input = $request->all();
        // get form image
        $frontImage = $request->file('front_media');
        $backImage = $request->file('back_media');
        if (isset($frontImage,$backImage))
        {
            $currentDate = Carbon::now()->toDateString();
            $imageNameFront = $currentDate.'-'.uniqid().'.'.$frontImage->getClientOriginalExtension();
            $imageNameBack = $currentDate.'-'.uniqid().'.'.$backImage->getClientOriginalExtension();
            if (!Storage::disk('public')->exists('user-bank-account'))
            {
                Storage::disk('public')->makeDirectory('user-bank-account');
            }
            $front = Image::make($frontImage)->resize(1600,479)->save();
            $back = Image::make($backImage)->resize(1600,479)->save();
            Storage::disk('public')->put('user-bank-account/'.$imageNameFront,$front);
            Storage::disk('public')->put('user-bank-account/'.$imageNameBack,$back);
        } else {
            $frontImage = "default.png";
            $backImage = "default.png";
        }

        $userBankAccount = new UserBankAccount();
        $userBankAccount->user_id = $input['user_id'];
        $userBankAccount->bank_id = $input['bank_id'];
        $userBankAccount->account_name = $input['account_name'] ;
        $userBankAccount->swift_code = $input['swift_code'];
        $userBankAccount->branch_name = $input['branch_name'];
        $userBankAccount->account_number = $input['account_number'];
        $userBankAccount->iban = $input['iban'];
        $userBankAccount->front_media = $imageNameFront;
        $userBankAccount->back_media = $imageNameBack;
        $userBankAccount->save();
        toastr()->success('User bank account has been Created successfully!');
        return redirect()->route('admin.user-bank-account.index');
    }

    public function show($id)
    {
    }

    public function edit($id)
    {
        $users = User::where('status','active')->get();
        $banks = Bank::where('status', 1)->get();
        $userBankAccount = UserBankAccount::find($id);
        return view('admin.bank.edit',compact('banks', 'userBankAccount','users'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'user_id' => 'required|exists:users,id',
            'bank_id' => 'required|exists:banks,id',
            'account_name' => 'required',
            'swift_code' => 'required',
            'branch_name' => 'required',
            'account_number' => 'required',
            'iban' => 'required',
            'front_media' => 'mimes:jpeg,bmp,png,jpg',
            'back_media' => 'mimes:jpeg,bmp,png,jpg'
        ]);
        $input = $request->all();

        $image = $request->file('icon');
        $bank = Bank::find($id);
        if (isset($image))
        {
            $currentDate = Carbon::now()->toDateString();
            $imagename = $currentDate.'-'.uniqid().'.'.$image->getClientOriginalExtension();
            if (!Storage::disk('public')->exists('bank'))
            {
                Storage::disk('public')->makeDirectory('bank');
            }
            if (Storage::disk('public')->exists('bank/'.$category->image))
            {
                Storage::disk('public')->delete('bank/'.$category->image);
            }
            $categoryimage = Image::make($image)->resize(1600,479)->save();
            Storage::disk('public')->put('bank/'.$imagename,$categoryimage);
        } else {
            $imagename = $bank->icon;
        }

        $input['name']['ar'] = $input['name_ar'];
        $input['name']['en'] = $input['name_en'];

        $bank->name = json_encode($input['name']) ;
        $bank->status = $input['status'];
        $bank->icon = $imagename;
        $bank->save();
        toastr()->success('Bank has been updated successfully!');
        return redirect()->route('admin.bank.index');
    }

    public function destroy($id)
    {
        $bank = Bank::find($id);
        if (Storage::disk('public')->exists('bank/'.$bank->image))
        {
            Storage::disk('public')->delete('bank/'.$bank->image);
        }

        $bank->delete();
        toastr()->success('Bank has been deleted successfully!');
        return redirect()->back();
    }
}
