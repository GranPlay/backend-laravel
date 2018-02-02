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

class CourtPhotoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth',['except'=>['terms_of_use','private_policies']]);
    }

    public function index($id)
    {
        $courts = Court::find($id);
        $association = Association::find($courts->assoc_id);
        $courtphoto= CourtPhoto::where('court_id', $courts->id)->get();
        return view('administration.add_court_photos')->with('court', $courts)->with('assoc', $association)->with('courtphoto', $courtphoto);
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
          return redirect()->to('/court_photos/' . $id);
      }
    }

    public function delete($id, $court_id)
    {
          $court_photos = CourtPhoto::find($id);
          $court_photos->delete();

          \Session::flash('message', 'Successfully deleted Court Photo!');
          return redirect()->to('court_photos/'. $court_id);
    }
}
