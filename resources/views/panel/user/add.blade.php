@extends('panel.master')
@section('content')
    <section class="section" style="height: 85vh;">
       <div class="row">
        <div class="col-md-7">
            <div class="card">
                @include('_message')
                <div class="card-header d-flex justify-content-between">
                    <h5 class="card-title">Add User</h5>
                    <div><a href="{{ url('/panel/user') }}" class="btn btn-success mt-3">User List</a></div>
                </div>
                <div class="card-body">
                    <form action="" method="POST">
                        @csrf
                        <div class="form-group mt-3">
                            <label for="name">Name</label>
                            <input type="text" name="name" value="{{ old('name') }}" placeholder="name" id="name" class="form-control mt-2">
                        </div>

                        <div class="form-group mt-3">
                            <label for="email">Email</label>
                            <input type="text" value="{{ old('email') }}" name="email" placeholder="email" id="email" class="form-control mt-2">
                            <div class="text-danger">{{ $errors->first('email') }}</div>
                        </div>

                        <div class="form-group mt-3">
                            <label for="password">Password</label>
                            <input type="password" name="password" placeholder="password" id="password" class="form-control mt-2">
                        </div>

                        <div class="form-group mt-3">
                            <label for="role">Role</label>
                            <select name="role_id" required id="" class="form-control mt-2" style="cursor: pointer">
                                <option value="">-- Select Role --</option>
                                @foreach ($getRole as $value)
                                    <option {{ (old('role_id') == $value->id) ? 'selected' : ''}} value="{{ $value->id }}">{{ $value->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <button class="btn btn-success mt-4" type="submit">Submit</button>

                    </form>


                </div>
            </div>
        </div>
       </div>
    </section>
@endsection







{{--    --}}
