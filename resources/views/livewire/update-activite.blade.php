<x-slot name="header">Aktivite Güncelle</x-slot>
  <div class="card">
    <div class="card-body">
        <form wire:submit.prevent="updateActivite" action="#">
          @method('PUT')
          @csrf
          <div style="margin-left:150px;" class="form-group">
            <label>Activite Başlığı</label>
            <input wire:model="activity.title" type="text" class="form-control" name="title">
          </div>
          <div style="margin-left:150px;" class="form-group">
            <label>Activite Açıklaması</label>
            <textarea wire:model="activity.description" class="form-control" rows="4" name="description"></textarea>
          </div>
          @if(auth()->user()->type=='admin')
            <div style="margin-left:150px;" class="form-group">
              <label>Görevli Kullanıcı</label><br>
              <select wire:model="user_id" name="user_id">
                @foreach($users as $user)
                <option value="{{$user->id}}">{{$user->name}}</option>
                @endforeach
              </select>
            </div>
          @endif


          <div style="margin-left:150px;" class="form-group">
            <label>Başlangıç Tarihi</label>
            <input wire:model="activity.started_at" type="datetime" class="form-control" name="started_at" >
          </div>
          <div style="margin-left:150px;" class="form-group">
            <label>Bitiş Tarihi Olacak mı?</label>
            <input id="isFinished" @if($activity->finished_at)) checked @endif type="checkbox">
          </div>
          <div style="display: none; margin-left:150px;" id="finishinput" class="form-group">
            <label>Bitiş Tarihi</label>
            <input wire:model="activity.finished_at" type="datetime" class="form-control" name="finished_at">
          </div>

          <div style="margin-left:150px;" class="form-group">
            <label>Tamamlanma Durumu</label><br>
            <select wire:model="activity.status" name="status">
              <option value="completed">Tamamlandı</option>
              <option value="notcompleted">Tamamlanmadı</option>
            </select>
          </div>
          <div class="form-group">
            <button type="submit" class="btn btn-success btn-sm btn-block">Aktiviteyi Güncelle</button>
          </div>
        </form>
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
