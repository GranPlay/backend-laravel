<?php

namespace App\Http\Controllers\APIController;

use App\Http\Controllers\Controller;

use Auth;
use File;

use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\User;
use App\Association;
use App\AssociationPhoto;
use App\Court;
use App\CourtPhoto;
use App\Manager;
use App\ManagerPhoto;
use App\ManagerPolicy;
use App\Owner;
use App\CourtPolicy;
use App\PriceTimePolicy;
use App\Slots;

class PriceTimePolicyController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth',['except'=>['terms_of_use','private_policies']]);
    }

    public function index()
    {
        return view('administration.price_time_policy');
    }

    public function create()
    {
        return view('administration.create_new_price_time_policy');
    }

    public function store(Request $request)
    {
      $fields = array(
          'pricetimename' => 'required',
          'pricetimedesc' => 'required',
      );
      $validator = Validator::make($request->all(), $fields);

      if ($validator->fails()) {

        return  redirect()->back()->withErrors($validator->messages())->withInput();

      } else {
        $pricetime = new PriceTimePolicy;
        $pricetime->pricetimename  = $request->input('pricetimename');
        $pricetime->pricetimedesc   = $request->input('pricetimedesc');
        $pricetime->assoc_id    = $request->input('assoc_id');
        $pricetime->save();

        \Session::flash('message', 'Successfully created Price/Time Policy!');
        return redirect()->to('/price_time_policy');
      }
    }

    public function edit($id)
    {
        $pricetimepolicy = PriceTimePolicy::find($id);
        $association = Association::find($pricetimepolicy->assoc_id);

        return view('administration.edit_price_time_policy')
        ->with('pricetime', $pricetimepolicy)->with('assoc', $association);
    }

    public function update(Request $request, $id)
    {
          $fields = array(
            'pricetimename' => 'required',
          );
          $validator = Validator::make($request->all(), $fields);
          if ($validator->fails()) {
              return redirect()->back()->withErrors($validator->messages())->withInput();
          } else {
              $pricetime = PriceTimePolicy::find($id);
              $pricetime->pricetimename  = $request->input('pricetimename');
              $pricetime->pricetimedesc   = $request->input('pricetimedesc');
              $pricetime->assoc_id    = $request->input('assoc_id');
              $pricetime->save();

              \Session::flash('message', 'Successfully Updated Price/Time Policy!');
              return redirect()->to('/price_time_policy');
          }
    }

    public function delete($id)
    {
        $pricetimepolicy = PriceTimePolicy::find($id);
        $pricetimepolicy->delete();

        \Session::flash('message', 'Successfully deleted Price/Time Policy!');
        return redirect()->to('price_time_policy');
    }

    public function show($id)
    {
        $pricetimepolicy = PriceTimePolicy::find($id);
        $association = Association::find($pricetimepolicy->assoc_id);
        return view('administration.view_price_time_policy')->with('pricetime', $pricetimepolicy)->with('assoc', $association);
    }

}
