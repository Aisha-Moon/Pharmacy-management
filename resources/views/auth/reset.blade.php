@extends('layouts.app')
@section('content')


<div class="card mb-3">

    <div class="card-body">

      <div class="pt-4 pb-2">
        @include('layouts._message')
        <h5 class="card-title text-center pb-0 fs-4">Reset Password</h5>
        <p class="text-center small">Enter new Password & Confirm</p>
      </div>

      <form class="row g-3 needs-validation" method="post" action="{{ url('reset/'.$token) }}" novalidate>
        {{ csrf_field() }}
        <div class="col-12">
          <label for="password" class="form-label">Password</label>
          <div class="input-group has-validation">
            <span class="input-group-text" id="inputGroupPrepend">@</span>
            <input type="password" name="password" class="form-control" id="password" required value={{old('password')}}>
            <span style="color:red;" > {{$errors->first('password')}}</span>
            <div class="invalid-feedback">Please enter your new password</div>
          </div>
        </div>

        <div class="col-12">
          <label for="confirm_pass" class="form-label">Confirm Password</label>
          <input type="confirm_pass" name="confirm_password" class="form-control" id="confirm_pass" required>
          <span style="color:red;" > {{$errors->first('confirm_password')}}</span>

          <div class="invalid-feedback">Please enter your password!</div>
        </div>

       
        <div class="col-12">
          <button class="btn btn-primary w-100" type="submit">Reset</button>
        </div>
       
      </form>

    </div>
  </div>


@endsection
