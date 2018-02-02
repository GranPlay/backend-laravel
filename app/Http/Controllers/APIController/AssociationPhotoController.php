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


class AssociationPhotoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth',['except'=>['terms_of_use','private_policies']]);
    }

    public function index($id)
    {
        $association = Association::find($id);
        $associationphoto= AssociationPhoto::where('assoc_id', $id)->get();
        return view('administration.add_association_photos')->with('assoc', $association)->with('associationphoto', $associationphoto);
    }

    public function store(Request $request, $id)
    {
      $fields = array(
          'url'     => 'required',
          'title'   => 'required',
      );
      $validator = Validator::make($request->all(), $fields);

        if ($validator->fails()) {
          return  redirect()->back()->withErrors($validator->messages())->withInput();

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

           \Session::flash('message', 'Successfully saved Image!');
           return redirect()->to('/association_photos/' . $id);
      }
    }

    // public function show($id)
    // {
    //     $assoc =  Association::find($id);
    //     return view('administration.view_association_photos')->with('association', $assoc);
    // }

    public function delete($id, $assoc_id)
    {
        $association_photos = AssociationPhoto::find($id);
        $association_photos->delete();
        \Session::flash('message', 'Successfully deleted Association Photo!');
        return redirect()->to('association_photos/'. $assoc_id);
    }

}
