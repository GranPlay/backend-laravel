<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ManagerController extends Controller
{
  public function index()
  {
      return view('administration.managers');
  }

  public function view()
  {
      return view('administration.create_new_managers');
  }

  public function create()
  {
      return view('administration.create_new_managers');
  }

  public function store()
  {
      return view('administration.create_new_managers');
  }

  public function edit()
  {
      return view('administration.create_new_managers');
  }

  public function update()
  {
      return view('administration.create_new_managers');
  }

  public function destroy()
  {
      return view('administration.create_new_managers');
  }
}
