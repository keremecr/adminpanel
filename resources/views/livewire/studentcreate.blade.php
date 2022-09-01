<x-slot name="header">Öğrenci Ekle</x-slot>
 @if($errors->any())
   <div class="alert alert-danger">
     @foreach($errors->all() as $error)
       <li>{{$error}}</li>
     @endforeach
   </div>
 @endif
 <div class="card">
   @if(session()->has('message'))
     <div style="margin-left:150px;" class="alert alert-info">{{session('message')}}</div>
   @endif
   <div class="card-body ml-100">
       <form wire:submit.prevent="insertStudent" method="POST">
         @csrf
         <div style="margin-left:150px;" class="form-group">
           <label>Öğrenci Adı</label>
           <input wire:model="student.name" type="text" class="form-control" name="name">
        </div>
        <div style="margin-left:150px;" class="form-group">
          <label>Sınıfı</label>
          <input wire:model="student.sinif" type="text" class="form-control" name="sinif">
        </div>
        <div style="margin-left:150px;" class="form-group">
          <label>Alanı</label>
          <input wire:model="student.group" type="text" class="form-control" name="group">
        </div>
        <div style="margin-left:150px;" class="form-group">
          <label>Kayıt Ücreti</label>
          <input wire:model="student.fee" type="text" class="form-control" name="fee">
        </div>
        <div style="margin-left:150px;" class="form-group">
          <label>Ödenen Miktar</label>
          <input wire:model="student.odenenmiktar" type="text" class="form-control" name="odenenmiktar">
        </div>
        <div class="form-group">
           <button type="submit" class="btn btn-success btn-sm btn-block">Öğrenciyi Kaydet</button>
        </div>
<link href="//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css" rel="stylesheet">
