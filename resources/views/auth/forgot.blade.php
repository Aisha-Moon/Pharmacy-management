@extends('layouts.app')
@section('content')

{{-- login starts --}}
              <div class="card mb-3">

                <div class="card-body">

                  <div class="pt-4 pb-2">
                    @include('layouts._message')

                    <h5 class="card-title text-center pb-0 fs-4">Forgot Password</h5>
                    <p class="text-center small">Enter your Email to Reset Password</p>
                  </div>

                  <form class="row g-3 needs-validation" method="post" action={{ url('forgot_post') }} novalidate>
                    {{ csrf_field() }}
                    <div class="col-12">
                      <label for="email" class="form-label">Email</label>
                      <div class="input-group has-validation">
                        <span class="input-group-text" id="inputGroupPrepend">@</span>
                        <input type="email" name="email" class="form-control" id="email" required>
                        <div class="invalid-feedback">Please enter your username.</div>
                      </div>
                    </div>


                    <div class="col-12">
                      <button class="btn btn-primary w-100" type="submit">Reset</button>
                    </div>
                    <div class="col-12">
                      <p class="small mb-0">Want to Login? <a href="{{ url('/') }}">Login Here</a></p>
                    </div>
                  </form>

                </div>
              </div>
{{-- login ends --}}

@endsection
