<?php

namespace App\Http\Controllers;
use App\Association;

use Illuminate\Http\Request;

class AssociationController extends Controller
{
  // public function index()
  // {
  //   $association = Association::paginate(5);
  //   return view('administration.association')->with('association_view', $association);
  //
  // }
  //
  // public function show($id)
  // {
  //           $association = Association::find($id);
  //           $user = User::find($association->user_id);
  //           return view('administration.view_association')->with('assoc', $association)->with('user', $user);
  // }
  //
  // public function create()
  // {
  //     return view('administration.create_new_association');
  // }
  //
  // public function store(Request $request)
  // {
  //
  //   $fields = array(
  //       'name'                  => 'required',
  //       'streetline1'           => 'required',
  //       'neighbourhood'         => 'required',
  //       'city'                  => 'required',
  //       'country'               => 'required',
  //       'longitude'             => 'required',
  //       'latitude'              => 'required',
  //       'postalcode'            => 'required',
  //       'phone1'                => 'required',
  //       'associationtype'       => 'required',
  //
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
  //       $association = new Association;
  //       $association->name          = $request->input('name');
  //       $association->description   = $request->input('description');
  //       $association->weburl        = $request->input('weburl');
  //       $association->fbpageurl     = $request->input('fbpageurl');
  //       $association->streetline1   = $request->input('streetline1');
  //       $association->streetline2   = $request->input('streetline2');
  //       $association->neighbourhood = $request->input('neighbourhood');
  //       $association->state      = $request->input('state');
  //       $association->city      = $request->input('city');
  //       $association->country   = $request->input('country');
  //       $association->longitude = $request->input('longitude');
  //       $association->latitude  = $request->input('latitude');
  //       $association->postalcode= $request->input('postalcode');
  //       $association->phone1    = $request->input('phone1');
  //       $association->phone2    = $request->input('phone2');
  //       $association->phone3    = $request->input('phone3');
  //       $association->associationtype   = $request->input('associationtype');
  //       if ($request->input('allowcommercialreservations')) $association->allowcommercialreservations = TRUE;
  //       else $association->allowcommercialreservations = FALSE;
  //       $association->user_id    = Auth::user()->id;
  //       $association->save();
  //
  //       \Session::flash('message', 'Successfully created Association!');
  //       return redirect()->to('/association');
  //   }
  //
  // }
  //
  // public function edit($id)
  // {
  //     $association = Association::find($id);
  //     $user = User::find($association->user_id);
  //
  //     // show the edit form and pass the nerd
  //     return view('administration.edit_association')->with('assoc', $association)->with('user', $user);
  // }
  //
  // public function update(Request $request, $id)
  // {
  //
  //       $fields = array(
  //
  //           'name'                  => 'required',
  //           'streetline1'           => 'required',
  //           'neighbourhood'         => 'required',
  //           'city'                  => 'required',
  //           'country'               => 'required',
  //           'longitude'             => 'required',
  //           'latitude'              => 'required',
  //           'postalcode'            => 'required',
  //           'phone1'                => 'required',
  //           'associationtype'       => 'required',
  //
  //       );
  //       $validator = Validator::make($request->all(), $fields);
  //
  //       // process the login
  //       if ($validator->fails()) {
  //           return redirect()->back()->withErrors($validator->messages());
  //
  //       } else {
  //
  //           $association = Association::find($id);
  //           $association->name          = $request->input('name');
  //           $association->description   = $request->input('description');
  //           $association->weburl        = $request->input('weburl');
  //           $association->fbpageurl     = $request->input('fbpageurl');
  //           $association->streetline1   = $request->input('streetline1');
  //           $association->streetline2   = $request->input('streetline2');
  //           $association->neighbourhood = $request->input('neighbourhood');
  //           $association->state      = $request->input('state');
  //           $association->city      = $request->input('city');
  //           $association->country   = $request->input('country');
  //           $association->longitude = $request->input('longitude');
  //           $association->latitude  = $request->input('latitude');
  //           $association->postalcode= $request->input('postalcode');
  //           $association->phone1    = $request->input('phone1');
  //           $association->phone2    = $request->input('phone2');
  //           $association->phone3    = $request->input('phone3');
  //           $association->associationtype   = $request->input('associationtype');
  //           if ($request->input('allowcommercialreservations')) $association->allowcommercialreservations = TRUE;
  //           else $association->allowcommercialreservations = FALSE;
  //           $association->user_id    = Auth::user()->id;
  //           $association->save();
  //
  //           \Session::flash('message', 'Successfully Updated Association!');
  //           return redirect()->to('/association');
  //
  //       }
  // }
  //
  // public function destroy($id)
  // {
  //
  //       // delete
  //           ReservationPolicy::where('assoc_id',$id)->delete();
  //           Court::where('assoc_id',$id)->delete();
  //           TimePricePolicy::where('assoc_id',$id)->delete();
  //           $association = Association::find($id);
  //           $association->delete();
  //
  //           // redirect
  //           \Session::flash('message', 'Successfully deleted Association!');
  //           return redirect()->to('association');
  // }
  //
  //
  //
  // public function add_association_photos($id)
  // {
  //     // return view('administration.add_association_photos');
  //     $association = Association::find($id);
  //     // return $association;
  //     return view('administration.add_association_photos')->with('assoc', $association);
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
  //
  //                   $association = Association::findOrFail($id);
  //                   $file = $request->file('url');
  //                    $extension = mb_strtolower($file->getClientOriginalExtension());
  //                    if ($extension == 'jpg' || $extension == 'png' || $extension == 'gif')
  //                    {
  //                      $destinationPath = 'images/association/' . $association->id;
  //                      if (!File::exists($destinationPath))
  //                        {
  //                          File::makeDirectory($destinationPath, 0777, true);
  //                        }
  //                        $image = 'IMG_Association_' . $association->id . '.jpg';
  //                        $file->move($destinationPath, $image);
  //
  //                         $assoc_photo = new AssociationImage;
  //                         $assoc_photo->url           = $image;
  //                         $assoc_photo->title         = $request->input('title');
  //                         $assoc_photo->description   = $request->input('description');
  //                         $assoc_photo->assoc_id      = $association->id;
  //                         $assoc_photo->save();
  //
  //                     }
  //
  //       // store
  //
  //
  //
  //
  //
  //       \Session::flash('message', 'Successfully saved Image!');
  //       return redirect()->to('/view_association_photos/' . $id);
  //   }
  //
  // }
  //
  // public function view_association_photos($id)
  // {
  //     $assoc =  Association::find($id);
  //     return view('administration.view_association_photos')->with('association', $assoc);
  //     // $association = Association::find($id);
  //     // // return $association;
  //     // return view('administration.view')->with('assoc', $association);
  // }
}
