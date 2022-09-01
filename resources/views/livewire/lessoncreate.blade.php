<x-slot name="header">Ders Oluştur</x-slot>
 @if($errors->any())
   <div class="alert alert-danger">
     @foreach($errors->all() as $error)
       <li>{{$error}}</li>
     @endforeach
   </div>
 @endif
 <div class="card">
   <div class="card-body ml-100">
       <form wire:submit.prevent="insertLesson" method="POST">
         @csrf
         <div style="margin-left:150px;" class="form-group">
           <label>Ders Adı</label>
           <input wire:model="ders.name" type="text" class="form-control" name="name" value="{{old('title')}}">
         </div>
         <div class="form-group">
           <button type="submit" class="btn btn-success btn-sm btn-block">Dersi Kaydet</button>
         </div>
