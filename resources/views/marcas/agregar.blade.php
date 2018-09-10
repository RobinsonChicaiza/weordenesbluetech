@extends('layouts.app')

@section('content')
<div class="row">
  <div class="table table-responsive">
    <table class="table table-bordered" id="table">
      <tr>
        <th width="150px">No</th>
        <th>Title</th>
        <th>Body</th>
        <th>Create At</th>
        <th class="text-center" width="150px">
          <a href="#" class="btn btn-success btn-sm">
            <i class="glyphicon glyphicon-plus"></i>
          </a>
        </th>
      </tr>
      
        <tr >
          <td>HHHHHH</td>
          <td>HHHH</td>
          <td>HHHH</td>
          <td>JJJJ</td>
          <td>
            	<a href="#" class="show-modal btn btn-info btn-sm" >
              <i class="fa fa-eye"></i>
            </a>
            <a href="#" class="edit-modal btn btn-warning btn-sm" d>
              <i class="glyphicon glyphicon-pencil"></i>
            </a>
            <a href="#" class="delete-modal btn btn-danger btn-sm" >
              <i class="glyphicon glyphicon-trash"></i>
            </a>
          </td>
        </tr>
    
    </table>
  </div>

</div>
    @endsection