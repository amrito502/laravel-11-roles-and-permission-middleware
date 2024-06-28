@extends('panel.master')
@section('content')
<section class="section" style="height: 85vh;">
    <div class="card">
        @include('_message')
        <div class="card-header d-flex justify-content-between">
            <h5 class="card-title">Role List</h5>
            @if(!empty($PermissionAdd))
                <div><a href="{{ url('/panel/role/add') }}" class="btn btn-success mt-3">Add Role</a></div>
            @endif
        </div>
        <div class="card-body">
          <!-- Bordered Table -->
          <table class="table table-bordered">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                @if(!empty($PermissionEdit) || !empty($PermissionDelete))
                    <th scope="col">Action</th>
                @endif
              </tr>
            </thead>
            <tbody>
                @forelse ($getRecord as $value)
                <tr>
                    <th scope="row">{{ $value->id }}</th>
                    <td>{{ $value->name }}</td>
                    <td>
                        @if(!empty($PermissionEdit))
                         <a href="{{ route('role.edit',$value->id) }}" class="btn btn-sm btn-success">Edit</a>
                        @endif
                        @if(!empty($PermissionDelete))
                         <a href="{{ route('role.delete',$value->id) }}" class="btn btn-sm btn-danger">Delete</a>
                        @endif
                    </td>
                  </tr>
                @empty
                  <p class="text-danger text-center">No Role Found!</p>
                @endforelse
            </tbody>
          </table>
          <!-- End Bordered Table -->


        </div>
      </div>
</section>




@endsection







{{--    --}}
