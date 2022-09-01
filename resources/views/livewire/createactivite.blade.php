<x-slot name="header">Aktivite Oluştur</x-slot>
 @if($errors->any())
   <div class="alert alert-danger">
     @foreach($errors->all() as $error)
       <li>{{$error}}</li>
     @endforeach
   </div>
 @endif
 <div class="card">
   <div class="card-body ml-100">
       <form wire:submit.prevent="insertActivite" method="POST">
         @csrf
         <div style="margin-left:100px;" class="form-group">
           <label>Activite Başlığı</label>
           <input wire:model="title" type="text" class="form-control" name="title" value="{{old('title')}}">
         </div>
         <div style="margin-left:100px;" class="form-group">
           <label>Activite Açıklaması</label>
           <textarea wire:model="description" class="form-control" rows="4" name="description">
             {{old('description')}}
           </textarea>
         </div>
         @if(auth()->user()->type=='admin')
           <div style="margin-left:100px;" class="form-group">
             <label>Görevli Kullanıcı</label><br>
             <select wire:model="user_id" name="user_id">
               @foreach($users as $user)
               <option value="{{$user->id}}">{{$user->name}}</option>
               @endforeach
             </select>
           </div>
         @endif

         <div style="margin-left:100px;" class="form-group">
           <label>Başlangıç Tarihi</label>
           <input wire:model="started_at" type="datetime-local" class="form-control" name="started_at" value="{{old('started_at')}}">
         </div>
         <div style="margin-left:100px;" class="form-group">
           <label>Bitiş Tarihi Olacak mı?</label>
           <input id="isFinished" type="checkbox">
         </div>

         <div style="display: none; margin-left:100px;" id="finishinput"  class="form-group">
           <label>Bitiş Tarihi</label>
           <input wire:model="finished_at" type="datetime-local" class="form-control" name="finished_at" value="{{old('finished_at')}}">
         </div>
         <div class="form-group">
           <button type="submit" class="btn btn-success btn-sm btn-block">Aktiviteyi Kaydet</button>
         </div>

   </div>
 </div>
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script>
  $('#isFinished').change(function(){
    if($('#isFinished').is(':checked')){
      $('#finishinput').show();
    }else{
      $('#finishinput').hide();
    }
  })
</script>
