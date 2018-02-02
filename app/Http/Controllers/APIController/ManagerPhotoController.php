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

class ManagerPhotoController extends Controller
{
      public function __construct()
      {
          $this->middleware('auth',['except'=>['terms_of_use','private_policies']]);
      }

      public function index($id)
      {
          $manager = Manager::find($id);
          $user = User::find($manager->user_id);
          $managerphoto= ManagerPhoto::where('manager_id', $id)->get();
          return view('administration.add_manager_photos')->with('user', $user)->with('manager', $manager)->with('managerphoto', $managerphoto);
      }

      public function store(Request $request, $id)
      {
        $fields = array(
            'url'     => 'required',
            'title'   => 'required',
        );
        $validator = Validator::make($request->all(), $fields);

        // process the login
        if ($validator->fails()) {
            return  redirect()->back()->withErrors($validator->messages())->withInput();
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

            \Session::flash('message', 'Successfully saved Image!');
            return redirect()->to('/manager_photos/' . $id);
        }
      }


      public function delete($id, $manager_id)
      {
            $manager_photos = ManagerPhoto::find($id);
            $manager_photos->delete();
            \Session::flash('message', 'Successfully deleted Manager Photo!');
            return redirect()->to('manager_photos/'. $manager_id);
      }

}
