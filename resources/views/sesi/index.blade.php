  @extends('layout')

  <style>
    .custom-margin{
      margin-top: 20px
    }
  </style>

  @section('konten')

  
  <div class="custom-margin w-50 center border rounded py-5 px-5 mx-auto">
      @include('info.pesan')
      <h1>Login</h1>


      <form action="{{ route('login') }}" method="POST">
        @csrf
        <div class="mb-3">
          <label for="email" class="form-label">Email</label>
          <input type="email" value="{{ Session::get('email') }}" name="email" class="form-control">
          @error('email')
          <p class="text-danger">{{ $message }}</p>
          @enderror

        </div>
        <div class="mb-3">
          <label for="password" class="form-label">Password</label>
          <input type="password" name="password" class="form-control">
          @error('password')
          <p class="text-danger">{{ $message }}</p>
          @enderror
    
        </div>
        <div class="mb-3 d-grid">
          <button name="submit" type="submit" class="btn btn-primary">Login</button>

        </div>
      </form>
    </div>

  @endsection