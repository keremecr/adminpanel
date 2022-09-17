<x-slot name="header">Ders Grubu Güncelle</x-slot>
  <div class="card">
    <div class="card-body">
      @if(session()->has('message'))
        <div style="margin-left:150px;" class="alert alert-info">{{session('message')}}</div>
      @endif
        <form wire:submit.prevent="updateLessongroup" action="#">
          @method('PUT')
          @csrf
          <div style="margin-left:150px;" class="form-group">
            <label>Ders Adı</label>
            <select wire:model="lessongroup.ders_id" name="ders_id">
              @foreach($lessons as $lesson)
              <option value="{{$lesson->id}}">{{$lesson->name}}</option>
              @endforeach
            </select>
           </div>
           <div style="margin-left:150px;" class="form-group">
             <label>Alan Adı</label>
             <select wire:model="lessongroup.grup_id" name="grup_id">
               @foreach($groups as $group)
               <option value="{{$group->id}}">{{$group->name}}</option>
               @endforeach
             </select>
           </div>
           <div style="margin-left:100px;" class="form-group">
             <label>Katsayı</label>
             <input wire:model="lessongroup.katsayi" type="text" class="form-control" name="katsayi">
           </div>

          <div class="form-group">
            <button type="submit" class="btn btn-success btn-sm btn-block">Ders grubunu Güncelle</button>
          </div>
        </form>
    </div>
  </div>
