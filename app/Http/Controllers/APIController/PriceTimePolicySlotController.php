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

class PriceTimePolicySlotController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth',['except'=>['terms_of_use','private_policies']]);
    }

    public function index($id)
    {
        $pricetimepolicy = PriceTimePolicy::find($id);
        $association = Association::find($pricetimepolicy->assoc_id);
        $slots = Slots::where('policy_id', $id)->get();

        return view('administration.slot_price_time_policy')
               ->with('slots', $slots)
               ->with('pricetime', $pricetimepolicy)
               ->with('assoc', $association);
    }

    public function store(Request $request, $id)
    {
      try {
          $slot = new Slots;
          $slot->time = date('H:i', strtotime($request->time));
          $slot->price = $request->price;
          $slot->policy_id = $id;
          $slot->save();

        $pricetimepolicy = PriceTimePolicy::find($id);
        $association = Association::find($pricetimepolicy->assoc_id);
        $slots = Slots::where('policy_id', $id)->get();

        return back()
               ->with('slots', $slots)
               ->with('pricetime', $pricetimepolicy)
               ->with('assoc', $association);

      } catch (Exception $e) {
        return;
      }
    }

    public function delete($id)
    {
          $slot = Slots::find($id);
          $slot->delete();
          \Session::flash('message', 'Successfully deleted Price/Time Policy!');
          return redirect()->to('price_time_policy_slot/'.$slot->policy_id);
    }

}
