<x-slot name="header">Sınav Güncelle</x-slot>
  <div class="card">
    <div class="card-body">
        <form wire:submit.prevent="updateExam" action="#">
          @method('PUT')
          @csrf
          <div style="margin-left:150px;" class="form-group">
            <label>Sınav Adı</label>
            <input wire:model="exam.name" type="text" class="form-control" name="name">
          </div>
          <div style="margin-left:150px;" class="form-group">
            <label>Sınav Tipi</label>
            <select wire:model="exam.type_id" name="grup_id">
              @foreach($examtypes as $examtype)
              <option value="{{$examtype->id}}">{{$examtype->name}}</option>
              @endforeach
            </select>
          </div>
          <div style="margin-left:100px;" class="form-group">
            <label>Tarihi</label>
            <input wire:model="exam.date" type="datetime-local" class="form-control" name="date">
          </div>
          <div class="form-group">
            <button type="submit" class="btn btn-success btn-sm btn-block">Sınavı Güncelle</button>
          </div>
        </form>
    </div>
  </div>
