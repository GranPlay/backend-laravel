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


class AssociationController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth',['except'=>['terms_of_use','private_policies']]);
    }

    public function index()
    {
      $association = Association::paginate(10);
      return view('administration.association')->with('association_view', $association);
    }

    public function create()
    {
        return view('administration.create_new_association');
    }

    public function store(Request $request)
    {
      $fields = array(
          'name'                          => 'required',
          'streetline1'                   => 'required',
          'neighbourhood'                 => 'required',
          'state'                          => 'required',
          // 'country'                       => 'required',
          'longitude'                     => 'required',
          'latitude'                      => 'required',
          'postalcode'                    => 'required',
          'phone1'                        => 'required',
          'associationtype'               => 'required',
          'max_time_singlematches'        => 'required',
          'max_time_doublematches'        => 'required',
          'max_time_invite_confirmation'  => 'required',
          'guests_allowed'                => 'required',

      );

      $validator = Validator::make($request->all(), $fields);

        if ($validator->fails()) {

          return  redirect()->back()->withErrors($validator->messages())->withInput();

      } else {
          $association = new Association;
          $association->name              = $request->input('name');
          $association->association_role  = $request->input('associationrole');
          $association->description   = $request->input('description');
          $association->weburl        = $request->input('weburl');
          $association->fbpageurl     = $request->input('fbpageurl');
          $association->streetline1   = $request->input('streetline1');
          $association->streetline2   = $request->input('streetline2');
          $association->neighbourhood = $request->input('neighbourhood');
          $association->state      = $request->input('state');
          $association->city      = $request->input('city');
          $association->country   = 30;
          $association->longitude = $request->input('longitude');
          $association->latitude  = $request->input('latitude');
          $association->postalcode= $request->input('postalcode');
          $association->phone1    = $request->input('code1')." ".$request->input('phone1');
          $association->phone2    = $request->input('code2')." ".$request->input('phone2');
          $association->phone3    = $request->input('code3')." ".$request->input('phone3');
          $association->associationtype   = $request->input('associationtype');
          $association->max_time_singlematches   = $request->input('max_time_singlematches');
          $association->max_time_doublematches   = $request->input('max_time_doublematches');
          $association->max_time_invite_confirmation   = $request->input('max_time_invite_confirmation');
          $association->guests_allowed   = $request->input('guests_allowed');
          $association->owner_id = Owner::where('user_id', Auth::user()->id)->first()->id;
          $association->save();

          \Session::flash('message', 'Successfully created Association!');
          return redirect()->to('/association');
      }

    }

    public function edit($id)
    {
        $association = Association::find($id);
        $user = Owner::find($association->owner_id);

        return view('administration.edit_association')->with('assoc', $association)->with('user', $user);
    }

    public function update(Request $request, $id)
    {
          $fields = array(
              'name'                          => 'required',
              'streetline1'                   => 'required',
              'neighbourhood'                 => 'required',
              'state'                         => 'required',
              // 'country'                       => 'required',
              'longitude'                     => 'required',
              'latitude'                      => 'required',
              'postalcode'                    => 'required',
              'phone1'                        => 'required',
              'associationtype'               => 'required',
              'max_time_singlematches'        => 'required',
              'max_time_doublematches'        => 'required',
              'max_time_invite_confirmation'  => 'required',
              'guests_allowed'                => 'required',
          );
          $validator = Validator::make($request->all(), $fields);

          if ($validator->fails()) {
              return redirect()->back()->withErrors($validator->messages());

          } else {

              $association = Association::find($id);
              $association->name          = $request->input('name');
              $association->association_role  = $request->input('associationrole');
              $association->description   = $request->input('description');
              $association->weburl        = $request->input('weburl');
              $association->fbpageurl     = $request->input('fbpageurl');
              $association->streetline1   = $request->input('streetline1');
              $association->streetline2   = $request->input('streetline2');
              $association->neighbourhood = $request->input('neighbourhood');
              $association->state      = $request->input('state');
              $association->city      = $request->input('city');
              $association->country   = 30;
              $association->longitude = $request->input('longitude');
              $association->latitude  = $request->input('latitude');
              $association->postalcode= $request->input('postalcode');
              $association->phone1    = $request->input('phone1');
              $association->phone2    = $request->input('phone2');
              $association->phone3    = $request->input('phone3');
              $association->associationtype   = $request->input('associationtype');
              $association->max_time_singlematches   = $request->input('max_time_singlematches');
              $association->max_time_doublematches   = $request->input('max_time_doublematches');
              $association->max_time_invite_confirmation   = $request->input('max_time_invite_confirmation');
              $association->guests_allowed   = $request->input('guests_allowed');
              $association->owner_id = Owner::where('user_id', Auth::user()->id)->first()->id;
              $association->save();

              \Session::flash('message', 'Successfully Updated Association!');
              return redirect()->to('/association');
          }
    }

    public function delete($id)
    {
          PriceTimePolicy::where('assoc_id',$id)->delete();
          $courts = Court::where('assoc_id',$id)->get();
          foreach ($courts as $court) {
            CourtPhoto::where('court_id', $court->id)->delete();
            Court::find($court->id)->delete();
          }
          $managers = Manager::where('assoc_id',$id)->get();
          foreach ($managers as $manager) {
            ManagerPhoto::where('manager_id', $manager->id)->delete();
            Manager::find($manager->id)->delete();
          }
          AssociationPhoto::where('assoc_id',$id)->delete();
          Association::find($id)->delete();

          \Session::flash('message', 'Successfully deleted Association!');
          return redirect()->to('association');
    }

    public function show($id)
    {
        $association = Association::find($id);
        $user = Owner::find($association->owner_id);
        return view('administration.view_association')->with('assoc', $association)->with('user', $user);
    }

}
