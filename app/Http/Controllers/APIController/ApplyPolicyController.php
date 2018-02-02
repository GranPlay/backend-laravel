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


class ApplyPolicyController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth',['except'=>['terms_of_use','private_policies']]);
    }

    public function index()
    {
      return view('administration.apply_policy');
    }

    public function create()
    {
      return view('administration.create_new_apply_policy');
    }

    public function getDays($year, $startMonth=1, $startDay=1, $dayOfWeek='monday') {
        $start = new \DateTime(
            sprintf('%04d-%02d-%02d', $year, $startMonth, $startDay)
        );
        $start->modify($dayOfWeek);
        $end   = new \DateTime(
            sprintf('%04d-12-31', $year)
        );
        $end->modify( '+1 day' );
        $interval = new \DateInterval('P1W');
        $period   = new \DatePeriod($start, $interval, $end);

        $array = array();
        foreach ($period as $dt) {
            // echo $dt->format("d/m/Y") . '<br />';
            array_push($array, $dt->format("m/d/Y"));
        }

        return $array;
        // return $year;
    }

    public function store(Request $request)
    {
        $fields = array(
            'policy' => 'required',
            'courts' => 'required',
            'option' => 'required',
            'dates' => ($request->option == 1) ? 'required' : '',
            'years' => ($request->option == 2) ? 'required' : '',
        );

        $validator = Validator::make($request->all(), $fields);

        if ($validator->fails()) {

            return  redirect()->back()->withErrors($validator->messages())->withInput();

        } else {

          if ($request->option == 1) {

            foreach (explode(',', $request->dates) as $date) {
              foreach ($request->courts as $court) {

                CourtPolicy::where('court_id',  $court)
                           ->where('date', date('Y-m-d', strtotime($date)))
                           ->delete();

                $cp = new CourtPolicy;
                $cp->policy_id = $request->policy;
                $cp->court_id = $court;
                $cp->date = date('Y-m-d', strtotime($date));
                $cp->priority = 1;
                $cp->save();
              }
            }
          }
          else {

            $dates = array();
            foreach ($request->years as $year) {
              foreach ($request->days as $day) {
                $dates = array_merge($dates, $this->getDays($year, 1, 1, $day));
              }
            }

            foreach ($dates as $date) {
              foreach ($request->courts as $court) {

                CourtPolicy::where('court_id',  $court)
                           ->where('date', date('Y-m-d', strtotime($date)))
                           ->where('priority', 0)
                           ->delete();

               $count = count(
                             CourtPolicy::where('court_id',  $court)
                                        ->where('date', date('Y-m-d', strtotime($date)))
                                        ->where('priority', 1)
                                        ->get()
                );

                if ($count == 0) {
                  $cp = new CourtPolicy;
                  $cp->policy_id = $request->policy;
                  $cp->court_id = $court;
                  $cp->date = date('Y-m-d', strtotime($date));
                  $cp->priority = 0;
                  $cp->save();
                }
              }
            }
          }

          \Session::flash('message', 'Successfully applied Price/Time Policy!');
          return redirect()->to('apply_policy');
        }
    }

    public function delete($id)
    {
        CourtPolicy::find($id)->delete();
        \Session::flash('message', 'Successfully deleted!');
        return redirect()->back();
    }

}
