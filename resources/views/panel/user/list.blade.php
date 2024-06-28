@extends('panel.master')
@section('content')
<section class="section" style="height: 85vh;">
    <div class="card">
        @include('_message')
        <div class="card-header d-flex justify-content-between">
            <h5 class="card-title">User List</h5>
            <div><a href="{{ url('/panel/user/add') }}" class="btn btn-success mt-3">Add User</a></div>
        </div>
        <div class="card-body">
          <!-- Bordered Table -->
          <table class="table table-bordered">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Role</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody>

                 @forelse ($getRecord as $value)
                <tr>
                    <th scope="row">{{ $value->id }}</th>
                    <td>{{ $value->name }}</td>
                    <td>{{ $value->email }}</td>
                    <td>{{ $value->role_name }}</td>
                    <td>
                        <a href="{{ route('user.edit',$value->id) }}" class="btn btn-sm btn-success">Edit</a>
                        <a href="{{ route('user.delete',$value->id) }}" class="btn btn-sm btn-danger">Delete</a>
                    </td>
                  </tr>
                @empty
                  <p class="text-danger text-center">No User Found!</p>
                @endforelse

            </tbody>
          </table>
          <!-- End Bordered Table -->


        </div>
      </div>
</section>




@endsection







{{--    --}}
