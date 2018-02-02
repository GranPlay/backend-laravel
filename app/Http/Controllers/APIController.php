<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

use App\User;
use App\Association;
use App\PriceTimePolicy;
use App\Court;
use App\CourtPolicy;
use App\Manager;

class APIController extends Controller
{
    public function users()
    {
      return User::all();
    }

    public function association()
    {
      return Association::all();
    }

    public function price_time_policyapi()
    {
        $association_id = Input::get('association_id');
        $pricetime = PriceTimePolicy::where('assoc_id',$association_id)->get();
        return $pricetime;
    }

    public function courtapi()
    {
      $association_id = Input::get('assoc_id');
      $courts = Court::where('assoc_id',$association_id)->get();
      return $courts;
    }

    public function price_time_policy($association_id)
    {
        $pricetime = PriceTimePolicy::where('assoc_id',$association_id)->paginate(10);
        return $pricetime;
    }

    public function court($association_id)
    {
      $courts = Court::where('assoc_id',$association_id)->paginate(10);
      return $courts;
    }

    public function apply_policy($association_id)
    {
        $courts = Court::where('assoc_id', $association_id)->pluck('id');
        $courtpolicies = CourtPolicy::leftjoin('courts', 'courts.id', '=', 'court_policies.court_id')
                                    ->leftjoin('price_time_policies', 'price_time_policies.id', '=', 'court_policies.policy_id')
                                    ->whereIn('court_id', $courts)
                                    ->orderBy('date')
                                    ->select(['court_policies.id','court_policies.court_id','courts.courtname','court_policies.date','court_policies.policy_id','price_time_policies.pricetimename'])
                                    ->paginate(10);

        return $courtpolicies;
    }

    public function managers()
    {
        $association_id = Input::get('association_id');

        $managers = Manager::leftjoin('users', 'users.id', '=', 'managers.user_id')
                            ->where('assoc_id', $association_id)
                            ->get(['managers.id','users.name','users.email','users.phone','managers.created_at']);
        return $managers;
    }
}
