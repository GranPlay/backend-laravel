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

class ManagerController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth',['except'=>['terms_of_use','private_policies']]);
    }
    
    public function index()
    {
        return view('administration.managers');
    }

    public function create()
    {
        return view('administration.create_new_managers');
    }

}
