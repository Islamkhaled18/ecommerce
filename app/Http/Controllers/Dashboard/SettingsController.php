<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Setting;
use App\Http\Requests\ShippingsRequest;
use DB;

class SettingsController extends Controller
{
    public function editShippingMethods( $type )
    {
        //free - internal -- external

        if($type === 'freeshipping')
        $shippingMethod = Setting::where('key' , 'free_shipping')->first();

        if($type === 'internalshipping')
        $shippingMethod = Setting::where('key' , 'internal_shippng')->first();

        if($type === 'externalshipping')
        $shippingMethod = Setting::where('key' , 'external_shippng')->first();

        else
        $shippingMethod = Setting::where('key' , 'free_shipping')->first();

        return view('dashboard.settings.shippings.edit',compact('shippingMethod'));

    }

    public function updateShippingMethods(ShippingsRequest $request , $id)
    {

            
        
            $shipping_method = Setting::find($id);
            

            $shipping_method ->update(['plain_value' => $request-> plain_value]);
            //save translation
    
            $shipping_method -> value = $request -> value;

            
            $shipping_method ->save();

            return redirect()->back()->with(['success'=> 'Updated Successfuly']);

       
      


    }
}
