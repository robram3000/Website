<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AccountDetail;
use App\Models\AccountDetailAuth;

class DataTransferringController 
{
    public function storeAccountDetails(Request $request)
    {
        $accountDetailData = [
            'account_no' => $this->generateAccountNo(), 
            'firstname' => session('Firstname'),
            'lastname' => session('Lastname'),
            'age' => session('Age'),
            'birthday' => session('Birthday'),
            'address' => session('Address'),
            'phone_number' => session('Phonenumber'),
        ];
        $accountDetail = AccountDetail::create($accountDetailData);


        $accountDetailAuthData = [
            'account_no' => $accountDetail->account_no,
            'email' => $request->input('email'),
            'password' => bcrypt($request->input('Password')), 
            'role_type' => session('Roletype'), 
            'otp' => null, 
        ];

 
        AccountDetailAuth::create($accountDetailAuthData);
    }


    protected function generateAccountNo()
    {
        $randomNumber = rand(1000, 9999);
        return 'AN-' . $randomNumber;
    }
}
