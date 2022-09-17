<div>
  <x-slot name="header">Randevu Güncelle</x-slot>
<div class="card">
  <div class="card-body">
    @if(session()->has('message'))
      <div style="margin-left:150px;" class="alert alert-info">{{session('message')}}</div>
    @endif
      <form wire:submit.prevent="updateAppointment">
        @method('PUT')
        @csrf
        <div style="margin-left:150px;" class="form-group">
          <label>Öğretmen Adı</label>
          <select wire:model="appointment.teacher_id" name="teacher_id">
            @foreach($teachers as $teacher)
            <option value="{{$teacher->id}}">{{$teacher->name}}</option>
            @endforeach
          </select>
         </div>
         <div style="margin-left:150px;" class="form-group">
           <label>Konu</label>
           <select wire:model="appointment.subject" name="grup_id">
             @foreach($subjects as $subject)
             <option value="{{$subject->name}}">{{$subject->name}}</option>
             @endforeach
           </select>
         </div>
         <div style="margin-left:100px;" class="form-group">
           <label>Başlangıç Tarihi</label>
           <input wire:model="appointment.start_at" type="datetime-local" class="form-control" name="start_at" value="{{old('start_at')}}">
         </div>
         <div style="margin-left:100px;" class="form-group">
           <label>Bitiş Tarihi</label>
           <input wire:model="appointment.finish_at" type="datetime-local" class="form-control" name="finish_at" value="{{old('finish_at')}}">
         </div>
        <div style="margin-left:100px;" class="form-group">
          <button type="submit" class="btn btn-success btn-sm btn-block">Randevuyu Güncelle</button>
        </div>
      </form>
  </div>
</div>
</div>
