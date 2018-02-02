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

class CourtController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth',['except'=>['terms_of_use','private_policies']]);
    }

    public function index()
    {
      // $courts = app('App\Http\Controllers\APIController')->court();
      // return view('administration.court')->with('court_view', $courts);
      return view('administration.court');
    }

    public function create()
    {
        return view('administration.create_new_court');
    }

    public function store(Request $request)
    {
      $fields = array(
          'courtname' => 'required',
          'courttype' => 'required',
      );
      $validator = Validator::make($request->all(), $fields);
      if ($validator->fails()) {
        return  redirect()->back()->withErrors($validator->messages())->withInput();
      } else {
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

    public function edit($id)
    {
        $courts = Court::find($id);
        $association = Association::find($courts->assoc_id);
        return view('administration.edit_court')
        ->with('court', $courts)->with('assoc', $association);
    }

    public function update(Request $request, $id)
    {
          $fields = array(
            'courtname' => 'required',
            'courttype' => 'required',
          );
          $validator = Validator::make($request->all(), $fields);
          if ($validator->fails()) {
            return redirect()->back()->withErrors($validator->messages())->withInput();
          } else {
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

    public function show($id)
    {
        $courts = Court::find($id);
        $association = Association::find($courts->assoc_id);
        return view('administration.view_court')->with('court', $courts)->with('assoc', $association);
    }

    public function delete($id)
    {
        $courts = Court::find($id);
        $courts->delete();
        \Session::flash('message', 'Successfully deleted Court!');
        return redirect()->to('court');
    }

}
