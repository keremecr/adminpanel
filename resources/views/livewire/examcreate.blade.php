<x-slot name="header">Sınav Oluştur</x-slot>
 @if($errors->any())
   <div class="alert alert-danger">
     @foreach($errors->all() as $error)
       <li>{{$error}}</li>
     @endforeach
   </div>
 @endif
 <div class="card">
   <div class="card-body ml-100">
       <form wire:submit.prevent="insertExam" method="POST">
         @csrf
         <div style="margin-left:150px;" class="form-group">
           <label>Sınav Tipi</label>
           <select wire:model="exam.type_id" name="type_id">
             <option>Tip seçiniz</option>
             @foreach($examtypes as $examtype)
             <option value="{{$examtype->id}}">{{$examtype->name}}</option>
             @endforeach
           </select>
          </div>
         <div style="margin-left:150px;" class="form-group">
           <label>Sınav Adı</label>
           <input wire:model="exam.name" type="text" class="form-control" name="name">
        </div>
        <div style="margin-left:100px;" class="form-group">
          <label>Tarihi</label>
          <input wire:model="exam.date" type="datetime-local" class="form-control" name="date">
        </div>
        <div class="form-group">
           <button type="submit" class="btn btn-success btn-sm btn-block">Ders grubunu Kaydet</button>
        </div>
<link href="//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css" rel="stylesheet">
