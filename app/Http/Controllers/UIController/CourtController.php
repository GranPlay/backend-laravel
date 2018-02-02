<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Court;

class CourtController extends Controller
{
  // public function index()
  // {
  //   $courts = app('App\Http\Controllers\APIController')->index();
  //   return view('administration.court')->with('court_view', $courts);
  //
  //     // return view('administration.court');
  // }
  //
  // public function view($id)
  // {
  //     $association = app('App\Http\Controllers\APIController')->view($id);
  //     return view('administration.view_court')->with('court', $courts)->with('assoc', $association);
  // }
  //
  // public function create()
  // {
  //     return view('administration.create_new_court');
  // }
  //
  // public function store(Request $request)
  // {
  //   $fields = array(
  //       'courtname' => 'required',
  //       'courttype' => 'required',
  //   );
  //
  //   $validator = Validator::make($request->all(), $fields);
  //
  //   // process the login
  //     if ($validator->fails()) {
  //
  //       return  redirect()->back()->withErrors($validator->messages());
  //
  //   } else {
  //
  //     if(Auth::user()->roles==1)
  //     {
  //       $association = $request->input('association');
  //     }
  //     elseif (Auth::user()->roles==2) {
  //       $association = Association::where('user_id',Auth::user()->id)->first()->id;
  //       // $pricetimepolicy = TimePricePolicy::where('court_id',Auth:user()->id)->first()->id;
  //     }
  //
  //     // store
  //     $court = new Court;
  //     $court->courtname  = $request->input('courtname');
  //     $court->courttype   = $request->input('courttype');
  //     if ($request->input('courtoperational')) $court->courtoperational = TRUE;
  //     else $court->courtoperational = FALSE;
  //     $court->courtdesc   = $request->input('courtdesc');
  //     $court->assoc_id    = $association;
  //     $court->save();
  //
  //     \Session::flash('message', 'Successfully created Court!');
  //     return redirect()->to('/court');
  //   }
  //
  // }
  //
  // public function edit($id)
  // {
  //
  //     $courts = Court::find($id);
  //     $association = Association::find($courts->assoc_id);
  //     // show the edit form and pass the nerd
  //     return view('administration.edit_court')
  //     ->with('court', $courts)->with('assoc', $association);
  // }
  //
  // public function update(Request $request, $id)
  // {
  //
  //       $fields = array(
  //
  //         'courtname' => 'required',
  //         'courttype' => 'required',
  //
  //       );
  //       $validator = Validator::make($request->all(), $fields);
  //
  //       // process the login
  //       if ($validator->fails()) {
  //           return redirect()->back()->withErrors($validator->messages());
  //
  //       } else {
  //           // store
  //
  //           $court = Court::find($id);
  //           $association = Association::find($court->assoc_id);
  //           $court->courtname  = $request->input('courtname');
  //           $court->courttype   = $request->input('courttype');
  //           if ($request->input('courtoperational')) $court->courtoperational = TRUE;
  //           else $court->courtoperational = FALSE;
  //           $court->courtdesc   = $request->input('courtdesc');
  //           $court->assoc_id    = $association->id;
  //           $court->save();
  //           $association->save();
  //
  //
  //           \Session::flash('message', 'Successfully Updated Court!');
  //           return redirect()->to('/court');
  //
  //       }
  // }
  //
  // public function destroy($id)
  // {
  //
  //       // delete
  //
  //           $courts = Court::find($id);
  //           $courts->delete();
  //
  //           // redirect
  //           \Session::flash('message', 'Successfully deleted Court!');
  //           return redirect()->to('court');
  // }
  //
  // public function add_court_photos($id)
  // {
  //     // return view('administration.add_court_photos');
  //     $courts = Court::find($id);
  //     $association = Association::find($courts->assoc_id);
  //     // return $association;
  //     return view('administration.add_court_photos')->with('court', $courts)->with('assoc', $association);
  // }
  //
  // public function store_association_photo(Request $request, $id)
  // {
  //   $fields = array(
  //       'url'     => 'required',
  //       'title'   => 'required',
  //   );
  //
  //   $validator = Validator::make($request->all(), $fields);
  //
  //   // process the login
  //     if ($validator->fails()) {
  //
  //       return  redirect()->back()->withErrors($validator->messages());
  //
  //   } else {
  //       // store
  //
  //       $association = Association::find($id);
  //       $assoc_photo = new AssociationImage;
  //       $assoc_photo->url           = $request->input('url');
  //       $assoc_photo->title         = $request->input('title');
  //       $assoc_photo->description   = $request->input('description');
  //       $assoc_photo->assoc_id      = $association->id;
  //       $assoc_photo->save();
  //
  //       \Session::flash('message', 'Successfully saved Image!');
  //       return redirect()->to('/view_association_photos' . $id);
  //   }
  //
  // }
  //
  // public function view_association_photos($id)
  // {
  //     return view('administration.view_association_photos');
  //     // $association = Association::find($id);
  //     // // return $association;
  //     // return view('administration.view')->with('assoc', $association);
  // }

}
