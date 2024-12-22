<?php

namespace App\Http\Controllers\Users;
use Auth;
use App\Models\Product\Order;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Redirect;



class UsersController extends Controller
{
    public function trackOrder() {
        $orderTrans = Order::select()->where('user_id', Auth::user()->id)->get();
        return view('account.track-order', compact('orderTrans'));
    }
    public function mySettings() {
        $myData = User::find(Auth::user()->id);
        return view('account.settings', compact('myData'));
    }
    
    public function updateSettings(Request $request, $id) {
        Request()->validate([
            "email" => "required|max:40",
            "fullName" => "required|max:40",
        ]);
        $myData = User::find($id);
        $myData->update($request->all());
        if($myData) {
            return Redirect::route("account.settings")->with(['update' => 'Data has been updated succesfully']);
        }
    }
}
