<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Services\fatooser;

class FatoorahContoller extends Controller
{
    private $fatttt;
   public function __construct(fatooser $faa)
   {
    $this->fatttt=$faa;
   }

   public function payorder()
   {
    // return 'in the pay';
        $data=
                [
                    "CustomerName"=>'IbrahimSamy',
                    "NotificationOption"=>'LNK',
                    "InvoiceValue"=>'50',
                    "CustomerEmail"=>'ibrahimsamy308@gmail.com',
                    "CallBackUrl"=>'http://localhost:8000/api/callback',
                    "ErrorUrl"=>'https://youtube.com',
                    "DisplayCurrencyIso"=>'KWD'
        
        
                ];
           return  $this->fatttt->SendPayment($data);
   }

   public function paymentcallback(Request $request)
   {
    // dd($request);
    // return $request;
    $data=[];
    $data['Key']=$request->paymentId;
    $data['KeyType']='paymentId';

    return $this->fatttt->getpaymentstatus($data);

   } 
}
