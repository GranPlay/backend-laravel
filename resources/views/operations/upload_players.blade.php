@extends('layouts.master')

@section('content')

<div class="row" style="margin: 22px;">
  <div class="p-h-md p-v bg-white box-shadow pos-rlt col-lg-3 pull-right " style="border: 1px solid #e8ecf2;">
    <form class="input-group col-lg-12 pull-right">
      <input type="text" class="form-control no-border input-sm no-bg " maxlength="25" placeholder="Search Players..." >
       <span class="input-group-btn" >
         <button type="submit" class="btn btn-sm no-bg btn-icon no-shadow no-padder"  style="background-color:#FDBA4F; border-radius:3px">
           <i class="ti-search" ></i>
         </button>
       </span>
     </form>
  </div>
</div>

@endsection
