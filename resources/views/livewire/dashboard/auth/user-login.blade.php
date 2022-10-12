<div>
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">Devam etmek için giriş yapmalısınız</p>
      @if(session()->has('message'))
        <div class="alert alert-info">{{session('message')}}</div>
      @endif

      <form wire:submit.prevent="userLogin">
        @error('email')
        <div class="text-danger">{{$message}}</div>
        @enderror
        <div class="input-group mb-3">
          <input wire:model="email" type="email" class="form-control" @if(Cookie::has('email')) value="{{Cookie::get('email')}}" @endif name="email" placeholder="Email adresi">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        @error('password')
        <div class="text-danger">{{$message}}</div>
        @enderror
        <div class="input-group mb-3">
          <input  wire:model="password" type="password" class="form-control" @if(Cookie::has('password')) value="{{Cookie::get('password')}}" @endif name="password" placeholder="Şifre">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-8">
            <div class="icheck-primary">
              <input wire:model="remember" @if(Cookie::has('password')) checked @endif type="checkbox" id="remember">
              <label for="remember">
                Beni Hatırla
              </label>
            </div>
          </div>
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block">Giriş Yap</button>
          </div>
          <!-- /.col -->
        </div>
      </form>




      <p class="mb-1">
        <a href="/forgetpassword">Şifremi Unuttum</a>
      </p>
      <p class="mb-0">
        <a href="register.html" class="text-center">Register a new membership</a>
      </p>
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
