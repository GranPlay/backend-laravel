<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PriceTimePolicyController extends Controller
{
  public function index()
  {
      $pricetime = app('App\Http\Controllers\APIController')->price_time_policy();
      // return view('administration.price_time_policy')->with('pricetime_view', $pricetime);

      return view('administration.price_time_policy');
  }

  public function view($id)
  {
      $pricetimepolicy = TimePricePolicy::find($id);
      $association = Association::find($pricetimepolicy->assoc_id);
      return view('administration.view_price_time_policy')->with('pricetime', $pricetimepolicy)->with('assoc', $association);
  }

  public function create()
  {
      return view('administration.create_new_price_time_policy');
  }

  public function store_new_price_time_policy(Request $request)
  {
    $fields = array(
        'pricetimename' => 'required',
        'pricetimeslot' => 'required',
    );

    $validator = Validator::make($request->all(), $fields);

    // process the login
      if ($validator->fails()) {

        return  redirect()->back()->withErrors($validator->messages());

    } else {

      if(Auth::user()->roles==1)
      {
        $association = $request->input('association');
      }
      elseif (Auth::user()->roles==2) {
        $association = Association::where('user_id',Auth::user()->id)->first()->id;
      }


      // store
      $pricetime = new TimePricePolicy;
      $pricetime->pricetimename  = $request->input('pricetimename');
      $pricetime->pricetimedesc   = $request->input('pricetimedesc');
      $pricetime->pricetimeslot   = $request->input('pricetimeslot');
      $pricetime->assoc_id    = $association;
      $pricetime->save();

      \Session::flash('message', 'Successfully created Price/Time Policy!');
      return redirect()->to('/price_time_policy');
    }

  }

  public function edit($id)
  {

      $pricetimepolicy = TimePricePolicy::find($id);
      $association = Association::find($pricetimepolicy->assoc_id);

      // show the edit form and pass the nerd
      return view('administration.edit_price_time_policy')
      ->with('pricetime', $pricetimepolicy)->with('assoc', $association);
  }

  public function update(Request $request, $id)
  {

        $fields = array(

          'pricetimename' => 'required',
          'pricetimeslot' => 'required',

        );
        $validator = Validator::make($request->all(), $fields);

        // process the login
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator->messages());

        } else {
            // store
            $pricetime = TimePricePolicy::find($id);
            $association = Association::find($pricetime->assoc_id);

            $pricetime->pricetimename  = $request->input('pricetimename');
            $pricetime->pricetimedesc   = $request->input('pricetimedesc');
            $pricetime->pricetimeslot   = $request->input('pricetimeslot');
            $pricetime->assoc_id    = $association->id;
            $pricetime->save();
            $association->save();



            \Session::flash('message', 'Successfully Updated Price/Time Policy!');
            return redirect()->to('/price_time_policy');

        }
  }

  public function destroy($id)
  {

        // delete

            $pricetimepolicy = TimePricePolicy::find($id);
            $pricetimepolicy->delete();

            // redirect
            \Session::flash('message', 'Successfully deleted Price/Time Policy!');
            return redirect()->to('price_time_policy');
  }
}
