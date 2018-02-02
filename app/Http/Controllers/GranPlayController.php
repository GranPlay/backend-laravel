<?php

namespace App\Http\Controllers;

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
use App\ReservationPolicy;
use App\CourtPolicy;
use App\PriceTimePolicy;
use App\Slots;

class GranPlayController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth',['except'=>['terms_of_use','private_policies']]);
    }


///////////////////////////////UPDATEPASSWORD-START///////////////////////////////////////////////

public function update_password()
{
    return view('auth.passwords.update_password');
}

///////////////////////////////UPDATEPASSWORD-END///////////////////////////////////////////////


///////////////////////////////SIGNUPDOCS-START///////////////////////////////////////////////


public function terms_of_use()
{
    return view('docs.terms_of_use');
}

public function private_policies()
{
    return view('docs.private_policies');
}


///////////////////////////////SIGNUPDOCS-END///////////////////////////////////////////////



///////////////////////////////ASSOCIATION-START///////////////////////////////////////////////
    public function association()
    {
      $association = Association::paginate(10);
      return view('administration.association')->with('association_view', $association);
    }

    public function create_new_association()
    {
        return view('administration.create_new_association');
    }

    public function store_new_association(Request $request)
    {

      $fields = array(
          'name'                          => 'required',
          'streetline1'                   => 'required',
          'neighbourhood'                 => 'required',
          'city'                          => 'required',
          'country'                       => 'required',
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

      // process the login
        if ($validator->fails()) {

          return  redirect()->back()->withErrors($validator->messages());

      } else {
          // store
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
          $association->country   = $request->input('country');
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

    public function edit_association($id)
    {
        $association = Association::find($id);
        $user = Owner::find($association->owner_id);
        // return $association;

        // show the edit form and pass the nerd
        return view('administration.edit_association')->with('assoc', $association)->with('user', $user);
    }

    public function update_association(Request $request, $id)
    {

          $fields = array(

              'name'                          => 'required',
              'streetline1'                   => 'required',
              'neighbourhood'                 => 'required',
              'city'                          => 'required',
              'country'                       => 'required',
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

          // process the login
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
              $association->country   = $request->input('country');
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

    public function delete_association($id)
    {
              // delete
          PriceTimePolicy::where('assoc_id',$id)->delete();
          Court::where('assoc_id',$id)->delete();
          AssociationPhoto::where('assoc_id',$id)->delete();
          Association::find($id)->delete();

          \Session::flash('message', 'Successfully deleted Association!');
          return redirect()->to('association');
    }

    public function view_association($id)
    {
              $association = Association::find($id);

              $user = Owner::find($association->owner_id);
              return view('administration.view_association')->with('assoc', $association)->with('user', $user);
    }

    public function add_association_photos($id)
    {
        // return view('administration.add_association_photos');
        $association = Association::find($id);
        $associationphoto= AssociationPhoto::where('assoc_id', $id)->get();
        // return $association;
        return view('administration.add_association_photos')->with('assoc', $association)->with('associationphoto', $associationphoto);
    }

    public function store_association_photo(Request $request, $id)
    {
      $fields = array(
          'url'     => 'required',
          'title'   => 'required',
      );

      $validator = Validator::make($request->all(), $fields);

      // process the login
        if ($validator->fails()) {

          return  redirect()->back()->withErrors($validator->messages());

      } else {

                      $association = Association::findOrFail($id);
                      $file = $request->file('url');
                       $extension = mb_strtolower($file->getClientOriginalExtension());
                       if ($extension == 'jpg' || $extension == 'png' || $extension == 'gif')
                       {
                         $destinationPath = 'images/association/' . $association->id;
                         if (!File::exists($destinationPath))
                           {
                             File::makeDirectory($destinationPath, 0777, true);
                           }
                          //  $count = count(AssociationPhoto::where('assoc_id', $association->id)->get());

                          $assoc_photo = new AssociationPhoto;
                          $assoc_photo->photo           = "no-image";
                          $assoc_photo->title         = $request->input('title');
                          $assoc_photo->description   = $request->input('description');
                          $assoc_photo->assoc_id      = $association->id;
                          $assoc_photo->save();

                          $image = 'IMG_Association_' . $association->id .'_'.$assoc_photo->id. '.jpg';
                          $file->move($destinationPath, $image);

                          $assoc_photo = AssociationPhoto::findOrFail($assoc_photo->id);
                          $assoc_photo->photo  = $image;
                          $assoc_photo->save();

                        }
          // store

          \Session::flash('message', 'Successfully saved Image!');
          return redirect()->to('/add_association_photos/' . $id);
      }

    }

    public function view_association_photos($id)
    {
        $assoc =  Association::find($id);
        return view('administration.view_association_photos')->with('association', $assoc);
    }

    public function delete_association_photos($id, $assoc_id)
    {
          $association_photos = AssociationPhoto::find($id);
          $association_photos->delete();

          \Session::flash('message', 'Successfully deleted Association Photo!');
          return redirect()->to('add_association_photos/'. $assoc_id);
    }
///////////////////////////////ASSOCIATION-END///////////////////////////////////////////////


//////////////////////////////RESERVATION POLICY-START///////////////////////////////////////////////

    public function reservation_policy()
    {
      $reservation = ReservationPolicy::paginate(9);
      return view('administration.reservation_policy')->with('reservation_view', $reservation);

        // return view('administration.reservation_policy');
    }

    public function create_new_reservation_policy()
    {
        return view('administration.create_new_reservation_policy');
    }

    public function store_new_reservation_policy(Request $request)
    {
      $fields = array(
          'policyname' => 'required',
          'max_time_reservation' => 'required',
          'max_reservatrions' => 'required',
          'players_distance' => 'required',
          'min_time_uphold_reservation'  => 'required',
          'game_reminders_notification' => 'required',
          'cancel_reservation_notification' => 'required',
          'auto_checkin' => 'required',
          'guests_allowed' => 'required',
          'max_time_singlematches' => 'required',
          'max_time_invite_confirmation' => 'required',

      );

      $validator = Validator::make($request->all(), $fields);

      // process the login
        if ($validator->fails()) {

          return  redirect()->back()->withErrors($validator->messages());

      } else {

        $association = null;
        if(Auth::user()->roles==1)
        {
          $association = $request->input('association');
        }
        elseif (Auth::user()->roles==2) {
          $association = Association::where('user_id',Auth::user()->id)->first()->id;
        }



        // store
        $reservation = new ReservationPolicy;
        $reservation->policyname          = $request->input('policyname');
        $reservation->max_time_reservation   = $request->input('max_time_reservation');
        $reservation->max_reservatrions        = $request->input('max_reservatrions');
        $reservation->players_distance     = $request->input('players_distance');
        $reservation->min_time_uphold_reservation   = $request->input('min_time_uphold_reservation');
        if ($request->input('game_reminders_notification')) $reservation->game_reminders_notification = TRUE;
        else $reservation->game_reminders_notification = FALSE;
        if ($request->input('cancel_reservation_notification')) $reservation->cancel_reservation_notification = TRUE;
        else $reservation->cancel_reservation_notification = FALSE;
        if ($request->input('auto_checkin')) $reservation->auto_checkin = TRUE;
        else $reservation->auto_checkin = FALSE;
        $reservation->guests_allowed      = $request->input('guests_allowed');
        $reservation->max_time_singlematches   = $request->input('max_time_singlematches');
        $reservation->max_time_doublematches   = $request->input('max_time_doublematches');
        $reservation->max_time_invite_confirmation = $request->input('max_time_invite_confirmation');
        $reservation->assoc_id    = $association;

        $reservation->save();

        \Session::flash('message', 'Successfully created ReservationPolicy!');
        return redirect()->to('/reservation_policy');
      }

    }

    public function edit_reservation_policy($id)
    {

        $reservation = ReservationPolicy::find($id);
        $association = Association::find($reservation->assoc_id);

        // show the edit form and pass the nerd
        return view('administration.edit_reservation_policy')
        ->with('res', $reservation)->with('assoc', $association);
    }

    public function update_reservation_policy(Request $request, $id)
    {

          $fields = array(

              'policyname' => 'required',
              'max_time_reservation' => 'required',
              'max_reservatrions' => 'required',
              'players_distance' => 'required',
              'min_time_uphold_reservation'  => 'required',
              'game_reminders_notification' => 'required',
              'cancel_reservation_notification' => 'required',
              'auto_checkin' => 'required',
              'guests_allowed' => 'required',
              'max_time_singlematches' => 'required',
              'max_time_invite_confirmation' => 'required',

          );
          $validator = Validator::make($request->all(), $fields);

          // process the login
          if ($validator->fails()) {
              return redirect()->back()->withErrors($validator->messages());

          } else {
              // store
              $reservation = ReservationPolicy::find($id);
              $association = Association::find($reservation->assoc_id);

              $reservation->policyname          = $request->input('policyname');
              $reservation->max_time_reservation   = $request->input('max_time_reservation');
              $reservation->max_reservatrions        = $request->input('max_reservatrions');
              $reservation->players_distance     = $request->input('players_distance');
              $reservation->min_time_uphold_reservation   = $request->input('min_time_uphold_reservation');
              if ($request->input('game_reminders_notification')) $reservation->game_reminders_notification = TRUE;
              else $reservation->game_reminders_notification = FALSE;
              if ($request->input('cancel_reservation_notification')) $reservation->cancel_reservation_notification = TRUE;
              else $reservation->cancel_reservation_notification = FALSE;
              if ($request->input('auto_checkin')) $reservation->auto_checkin = TRUE;
              else $reservation->auto_checkin = FALSE;
              $reservation->guests_allowed      = $request->input('guests_allowed');
              $reservation->max_time_singlematches   = $request->input('max_time_singlematches');
              $reservation->max_time_doublematches   = $request->input('max_time_doublematches');
              $reservation->max_time_invite_confirmation = $request->input('max_time_invite_confirmation');
              $reservation->assoc_id = $association->id;

              $reservation->save();
              $association->save();


              \Session::flash('message', 'Successfully Updated Reservation Policy!');
              return redirect()->to('/reservation_policy');

          }
    }

    public function view_reservation_policy($id)
    {
              $reservation = ReservationPolicy::find($id);
              $association = Association::find($reservation->assoc_id);
              return view('administration.view_reservation_policy')->with('res', $reservation)->with('assoc', $association);
    }

    public function delete_reservation_policy($id)
    {

          // delete

              $reservation = ReservationPolicy::find($id);
              $reservation->delete();

              // redirect
              \Session::flash('message', 'Successfully deleted Reservation Policy!');
              return redirect()->to('reservation_policy');
    }


//////////////////////////////RESERVATION POLICY-END///////////////////////////////////////////////



//////////////////////////////TIME/PRICE POLICY-START///////////////////////////////////////////////

    public function price_time_policy()
    {
        return view('administration.price_time_policy');
    }

    public function create_new_price_time_policy()
    {
        return view('administration.create_new_price_time_policy');
    }

    public function store_new_price_time_policy(Request $request)
    {
      $fields = array(
          'pricetimename' => 'required',
      );

      $validator = Validator::make($request->all(), $fields);

      // process the login
        if ($validator->fails()) {

          return  redirect()->back()->withErrors($validator->messages());

      } else {
        // store
        $pricetime = new PriceTimePolicy;
        $pricetime->pricetimename  = $request->input('pricetimename');
        $pricetime->pricetimedesc   = $request->input('pricetimedesc');
        $pricetime->assoc_id    = $request->input('assoc_id');
        $pricetime->save();

        \Session::flash('message', 'Successfully created Price/Time Policy!');
        return redirect()->to('/price_time_policy');
      }

    }

    public function slot_price_time_policy($id)
    {
        $pricetimepolicy = PriceTimePolicy::find($id);
        $association = Association::find($pricetimepolicy->assoc_id);
        $slots = Slots::where('policy_id', $id)->get();

        // show the edit form and pass the nerd
        return view('administration.slot_price_time_policy')
               ->with('slots', $slots)
               ->with('pricetime', $pricetimepolicy)
               ->with('assoc', $association);
    }

    public function save_slots(Request $request, $id)
    {
      try {

        // foreach (explode(',', $request->dates) as $date) {
          $slot = new Slots;
          // $slot->date = date('Y-m-d', strtotime($date));
          $slot->time = date('H:i', strtotime($request->time));
          $slot->price = $request->price;
          $slot->policy_id = $id;
          $slot->save();
        // }

        $pricetimepolicy = PriceTimePolicy::find($id);
        // $court = Court::find($pricetimepolicy->court_id);
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

    public function store_new_court_policy(Request $request)
    {
      $fields = array(
          'court_id' => 'required',
          'policy_id' => 'required',
          'dates' => 'required',
      );

      $validator = Validator::make($request->all(), $fields);

      // process the login
        if ($validator->fails()) {

          return  redirect()->back()->withErrors($validator->messages());

      } else {

        foreach (explode(',', $request->dates) as $date) {
          $slot = new CourtPolicy;
          $slot->date = date('Y-m-d', strtotime($date));
          $slot->court_id = $request->court_id;
          $slot->policy_id = $request->policy_id;
          $slot->save();
        }

        \Session::flash('message', 'Successfully applied Price/Time Policy!');
        return redirect()->to('apply_policy_view');
      }

    }

    public function delete_new_court_policy($id)
    {
        CourtPolicy::find($id)->delete();

        \Session::flash('message', 'Successfully deleted!');
        return redirect()->back();
    }

    public function delete_slot_price_time_policy($id)
    {
              $slot = Slots::find($id);
              $slot->delete();
              // redirect
              \Session::flash('message', 'Successfully deleted Price/Time Policy!');
              return redirect()->to('slot_price_time_policy/'.$slot->policy_id);
    }

    public function edit_price_time_policy($id)
    {

        $pricetimepolicy = PriceTimePolicy::find($id);
        $association = Association::find($pricetimepolicy->assoc_id);

        // show the edit form and pass the nerd
        return view('administration.edit_price_time_policy')
        ->with('pricetime', $pricetimepolicy)->with('assoc', $association);
    }

    public function update_price_time_policy(Request $request, $id)
    {

          $fields = array(

            'pricetimename' => 'required',

          );
          $validator = Validator::make($request->all(), $fields);

          // process the login
          if ($validator->fails()) {
              return redirect()->back()->withErrors($validator->messages());

          } else {
              // store
              $pricetime = PriceTimePolicy::find($id);

              $pricetime->pricetimename  = $request->input('pricetimename');
              $pricetime->pricetimedesc   = $request->input('pricetimedesc');
              $pricetime->assoc_id    = $request->input('assoc_id');
              $pricetime->save();

              \Session::flash('message', 'Successfully Updated Price/Time Policy!');
              return redirect()->to('/price_time_policy');

          }
    }

    public function view_price_time_policy($id)
    {
        $pricetimepolicy = PriceTimePolicy::find($id);
        $association = Association::find($pricetimepolicy->assoc_id);
        return view('administration.view_price_time_policy')->with('pricetime', $pricetimepolicy)->with('assoc', $association);
    }

    public function delete_price_time_policy($id)
    {
              $pricetimepolicy = PriceTimePolicy::find($id);
              $pricetimepolicy->delete();

              // redirect
              \Session::flash('message', 'Successfully deleted Price/Time Policy!');
              return redirect()->to('price_time_policy');
    }

//////////////////////////////TIME/PRICE POLICY-END///////////////////////////////////////////////


/////////////////////////////APPLY POLICY START////////////////////////////////////////

public function apply_policy_view()
{
  return view('administration.apply_policy');
}

public function apply_policy_create()
{
  return view('administration.create_new_apply_policy');
}
////////////////////////////APPLY POLICY END//////////////////////////////////////////

//////////////////////////////COURT-START///////////////////////////////////////////////

    public function court()
    {
      $courts = app('App\Http\Controllers\APIController')->court();
      return view('administration.court')->with('court_view', $courts);
    }

    public function create_new_court()
    {
        return view('administration.create_new_court');
    }

    public function store_new_court(Request $request)
    {
      $fields = array(
          'courtname' => 'required',
          'courttype' => 'required',
      );

      $validator = Validator::make($request->all(), $fields);

      // process the login
        if ($validator->fails()) {

          return  redirect()->back()->withErrors($validator->messages());

      } else {
        // store
        $court = new Court;
        $court->courtname  = $request->input('courtname');
        $court->courttype   = $request->input('courttype');
        if ($request->input('courtoperational')) $court->courtoperational = TRUE;
        else $court->courtoperational = FALSE;
        $court->courtdesc   = $request->input('courtdesc');
        $court->assoc_id    = $request->input('association_id');
        $court->save();

        \Session::flash('message', 'Successfully created Court!');
        return redirect()->to('/court');
      }

    }

    public function edit_court($id)
    {

        $courts = Court::find($id);
        $association = Association::find($courts->assoc_id);
        // show the edit form and pass the nerd
        return view('administration.edit_court')
        ->with('court', $courts)->with('assoc', $association);
    }

    public function update_court(Request $request, $id)
    {

          $fields = array(

            'courtname' => 'required',
            'courttype' => 'required',

          );
          $validator = Validator::make($request->all(), $fields);

          // process the login
          if ($validator->fails()) {
              return redirect()->back()->withErrors($validator->messages());

          } else {
              // store

              $court = Court::find($id);
              $association = Association::find($court->assoc_id);
              $court->courtname  = $request->input('courtname');
              $court->courttype   = $request->input('courttype');
              if ($request->input('courtoperational')) $court->courtoperational = TRUE;
              else $court->courtoperational = FALSE;
              $court->courtdesc   = $request->input('courtdesc');
              $court->assoc_id    = $request->input('association');
              $court->save();
              $association->save();


              \Session::flash('message', 'Successfully Updated Court!');
              return redirect()->to('/court');

          }
    }

    public function view_court($id)
    {
        $courts = Court::find($id);
        $association = Association::find($courts->assoc_id);
        return view('administration.view_court')->with('court', $courts)->with('assoc', $association);
    }

    public function delete_court($id)
    {
              $courts = Court::find($id);
              $courts->delete();

              \Session::flash('message', 'Successfully deleted Court!');
              return redirect()->to('court');
    }

    public function add_court_photos($id)
    {
        $courts = Court::find($id);
        $association = Association::find($courts->assoc_id);
        $courtphoto= CourtPhoto::where('court_id', $courts->id)->get();
        return view('administration.add_court_photos')->with('court', $courts)->with('assoc', $association)->with('courtphoto', $courtphoto);
    }

    public function store_court_photo(Request $request, $id)
    {
      $fields = array(
          'url'     => 'required',
          'title'   => 'required',
      );

      $validator = Validator::make($request->all(), $fields);

      // process the login
        if ($validator->fails()) {

          return  redirect()->back()->withErrors($validator->messages());

      } else {

                      $court = Court::findOrFail($id);
                      $file = $request->file('url');
                       $extension = mb_strtolower($file->getClientOriginalExtension());
                       if ($extension == 'jpg' || $extension == 'png' || $extension == 'gif')
                       {
                         $destinationPath = 'images/association/'.$court->assoc_id.'/courts/'. $court->id;
                         if (!File::exists($destinationPath))
                           {
                             File::makeDirectory($destinationPath, 0777, true);
                           }
                          //  $count = count(CourtPhoto::where('court_id', $court->id)->get());

                          $court_photo = new CourtPhoto;
                          $court_photo->photo         = "temp";
                          $court_photo->title         = $request->input('title');
                          $court_photo->description   = $request->input('description');
                          $court_photo->court_id      = $court->id;
                          $court_photo->save();

                          $image = 'IMG_Court_' . $court->id .'_'. $court_photo->id . '.jpg';
                          $file->move($destinationPath, $image);

                          $court_photo = CourtPhoto::find($court_photo->id);
                          $court_photo->photo  = $image;
                          $court_photo->save();

                        }

          \Session::flash('message', 'Successfully saved Image!');
          return redirect()->to('/add_court_photos/' . $id);
      }

    }

    public function delete_court_photos($id, $court_id)
    {
          $court_photos = CourtPhoto::find($id);
          $court_photos->delete();

          \Session::flash('message', 'Successfully deleted Court Photo!');
          return redirect()->to('add_court_photos/'. $court_id);
    }


//////////////////////////////COURT-START///////////////////////////////////////////////



//////////////////////////////MANAGERS-START///////////////////////////////////////////////


    public function managers()
    {
        return view('administration.managers');
    }

    public function create_new_managers()
    {
        return view('administration.create_new_managers');
    }

    public function add_manager_photos($id)
    {
        // return view('administration.add_manager_photos');
        $manager = Manager::find($id);
        $user = User::find($manager->user_id);
        $managerphoto= ManagerPhoto::where('manager_id', $id)->get();
        // return $manager;
        return view('administration.add_manager_photos')->with('user', $user)->with('manager', $manager)->with('managerphoto', $managerphoto);
    }

    public function store_manager_photo(Request $request, $id)
    {
      $fields = array(
          'url'     => 'required',
          'title'   => 'required',
      );

      $validator = Validator::make($request->all(), $fields);

      // process the login
        if ($validator->fails()) {

          return  redirect()->back()->withErrors($validator->messages());

      } else {

                      $manager = Manager::findOrFail($id);
                      $file = $request->file('url');
                       $extension = mb_strtolower($file->getClientOriginalExtension());
                       if ($extension == 'jpg' || $extension == 'png' || $extension == 'gif')
                       {
                         $destinationPath = 'images/association/'.$manager->assoc_id.'/managers/'.$manager->id;
                         if (!File::exists($destinationPath))
                           {
                             File::makeDirectory($destinationPath, 0777, true);
                           }
                          //  $count = count(ManagerPhoto::where('manager_id', $manager->id)->get());

                          $manager_photo = new ManagerPhoto;
                          $manager_photo->photo           = "temp";
                          $manager_photo->title         = $request->input('title');
                          $manager_photo->description   = $request->input('description');
                          $manager_photo->manager_id      = $manager->id;
                          $manager_photo->save();

                          $image = 'IMG_Manager_' . $manager->id .'_'.$manager_photo->id. '.jpg';
                          $file->move($destinationPath, $image);

                          $manager_photo = ManagerPhoto::findOrFail($manager_photo->id);
                          $manager_photo->photo  = $image;
                          $manager_photo->save();

                        }
          // store

          \Session::flash('message', 'Successfully saved Image!');
          return redirect()->to('/add_manager_photos/' . $id);
      }

    }

    public function view_manager_photos($id)
    {
        $manager =  Manager::find($id);
        return view('administration.view_manager_photos')->with('manager', $manager);
    }

    public function delete_manager_photos($id, $manager_id)
    {
          $manager_photos = ManagerPhoto::find($id);
          $manager_photos->delete();

          \Session::flash('message', 'Successfully deleted Manager Photo!');
          return redirect()->to('add_manager_photos/'. $manager_id);
    }

//////////////////////////////MANAGERS-END///////////////////////////////////////////////


    public function app_users_members()
    {
        return view('operations.app_users_members');
    }

    public function new_reservation()
    {
        return view('operations.new_reservation');
    }

    public function members()
    {
        return view('operations.members');
    }

    public function upload_players()
    {
        return view('operations.upload_players');
    }

    public function uploaded_players()
    {
        return view('reports.uploaded_players');
    }

    public function checkin_checkout()
    {
        return view('reports.checkin_checkout');
    }

    public function scores()
    {
        return view('reports.scores');
    }

    public function upcoming_reservations()
    {
        return view('reports.upcoming_reservations');
    }

    public function past_reservations()
    {
        return view('reports.past_reservations');
    }

    public function cancelled_reservations()
    {
        return view('reports.cancelled_reservations');
    }
}
