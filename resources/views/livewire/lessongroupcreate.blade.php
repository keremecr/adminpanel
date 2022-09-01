<x-slot name="header">Ders Grubu Oluştur</x-slot>
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
       <form wire:submit.prevent="insertLessongroup" method="POST">
         @csrf
         <div style="margin-left:150px;" class="form-group">
           <label>Ders Adı</label>
           <select wire:model="dersgrup.ders_id" name="ders_id">
             <option>Ders seçiniz</option>
             @foreach($lessons as $lesson)
             <option value="{{$lesson->id}}">{{$lesson->name}}</option>
             @endforeach
           </select>
          </div>
          <div style="margin-left:150px;" class="form-group">
            <label>Alan Adı</label>
            <select wire:model="dersgrup.grup_id" name="grup_id">
              <option>Alan seçiniz</option>
              @foreach($groups as $group)
              <option value="{{$group->id}}">{{$group->name}}</option>
              @endforeach
            </select>
          </div>
          <div style="margin-left:100px;" class="form-group">
            <label>Katsayı</label>
            <input wire:model="dersgrup.katsayi" type="text" class="form-control" name="katsayi" value="{{old('katsayi')}}">
          </div>


         <div class="form-group">
           <button type="submit" class="btn btn-success btn-sm btn-block">Ders grubunu Kaydet</button>
         </div>
<link href="//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css" rel="stylesheet">
