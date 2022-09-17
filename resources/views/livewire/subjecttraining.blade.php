<x-slot name="header">Randevu Oluştur</x-slot>
 @if($errors->any())
   <div class="alert alert-danger">
     @foreach($errors->all() as $error)
       <li>{{$error}}</li>
     @endforeach
   </div>
 @endif
 <div class="card">
   <div class="card-body ml-100">
     @if(session()->has('message'))
       <div style="margin-left:150px;" class="alert alert-info">{{session('message')}}</div>
     @endif
       <form wire:submit.prevent="insertAppointment" method="POST">
         @csrf
         <div style="margin-left:100px;" class="form-group">
             <label>Öğretmen Seç</label><br>
             <select wire:model="appointment.teacher_id">
               @foreach($teachers as $teacher)
               <option value="{{$teacher->id}}">{{$teacher->name}}</option>
               @endforeach
             </select>
         </div>
         <div style=" display: none; margin-left:100px;" class="form-group">
           <label>Öğrenci</label>
           <input wire:model="appointment.student_id" type="text" class="form-control" name="student_id" value="{{old('student_id')}}">
         </div>
         <div style="margin-left:100px;" class="form-group">
           <label>Konu</label>
           <input wire:model="appointment.subject" type="text" class="form-control" name="subject" value="{{old('subject')}}">
         </div>
         <div style="margin-left:100px;" class="form-group">
           <label>Başlangıç Tarihi</label>
           <input wire:model="appointment.start_at" type="datetime-local" class="form-control" name="start_at" value="{{old('start_at')}}">
         </div>
         <div style="margin-left:100px;" class="form-group">
           <label>Bitiş Tarihi</label>
           <input wire:model="appointment.finish_at" type="datetime-local" class="form-control" name="finish_at" value="{{old('finish_at')}}">
         </div>
         <div class="form-group">
           <button type="submit" class="btn btn-success btn-sm btn-block">Randevuyu Kaydet</button>
         </div>

   </div>
 </div>
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
