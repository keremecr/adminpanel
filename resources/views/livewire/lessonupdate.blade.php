<x-slot name="header">Ders Güncelle</x-slot>
  <div class="card">
    <div class="card-body">
      @if(session()->has('message'))
        <div style="margin-left:150px;" class="alert alert-info">{{session('message')}}</div>
      @endif
        <form wire:submit.prevent="updateLesson" action="#">
          @method('PUT')
          @csrf
          <div style="margin-left:150px;" class="form-group">
            <label>Ders İsmi</label>
            <input wire:model="ders.name" type="text" class="form-control" name="name">
          </div>
          <div class="form-group">
            <button type="submit" class="btn btn-success btn-sm btn-block">Dersi Güncelle</button>
          </div>
        </form>
    </div>
  </div>
