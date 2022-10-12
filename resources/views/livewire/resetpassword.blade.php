<div>
  <div class="card">
    <div style="margin-left:100px;" class="card-body login-card-body">
      <p class="login-box-msg">Devam etmek için giriş yapmalısınız</p>
      @if(session()->has('message'))
        <div class="alert alert-info">{{session('message')}}</div>
      @endif

      <form>
        @method('PUT')
        @csrf
        <div style="margin-left:100px;" class="input-group mb-3">
          <input wire:model="user.email" type="email" class="form-control" name="email" placeholder="Email adresi">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div style="margin-left:100px;" class="input-group mb-3">
          <input  wire:model="password" type="password" class="form-control"  name="password" placeholder="Şifre">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div style="margin-left:100px;" class="input-group mb-3">
          <input  wire:model="confirmpassword" type="password" class="form-control"  name="password" placeholder="Şifre Tekrar">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div style="margin-left:100px;" class="col-4">
          <button wire:click="changepassword" type="submit" class="btn btn-primary btn-block">Şifremi Yenile</button>
        </div>
      </form>
</div>
