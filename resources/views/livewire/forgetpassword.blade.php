<div>
  <div class="card">
    @if(session()->has('message'))
      <div style="margin-left:100px;" class="alert alert-info">{{session('message')}}</div>
    @endif
    <div class="card-body login-card-body">
      <form wire:submit.prevent="sendcode">
        @error('email')
        <div class="text-danger">{{$message}}</div>
        @enderror
        <div style="margin-left:100px;" class="input-group mb-3">
          <input wire:model="email" type="email" class="form-control" @if(Cookie::has('email')) value="{{Cookie::get('email')}}" @endif name="email" placeholder="Email adresi">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div style="margin-left:100px;" class="col-4">
          <button type="submit" class="btn btn-primary btn-block">Kod gönder</button>
        </div>
      </form>
      <form wire:submit.prevent="gotoreset">
        <div style="margin-left:100px;" class="form-group">
          <label>Mail adresine kod geldikten sonra gelen kodu buraya gir</label>
          <input wire:model="usercode" type="text" class="form-control" name="title" value="{{old('title')}}">
        </div>
        <div style="margin-left:100px;" class="col-4">
          <button type="submit" class="btn btn-primary btn-block">Kodu Onayla</button>
        </div>
</div>
