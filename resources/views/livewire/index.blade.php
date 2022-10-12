<x-slot name="header">Yapılacak Aktiviteler</x-slot>
  <div class="card">
    <div class="card-body">
      <h5 class="card-title float-right">
        <a href="/dashboard/create" class="btn btn-sm btn-primary"><i class="fa fa-plus"></i> Aktivite OLuştur</a>
      </h5>
        <div class="form-row">
          <div class="col-md-2">
            <input type="text" name="title" value="{{request()->get('title')}}"  placeholder="Aktivite Adı" class="form-control">
          </div>
          @if(auth()->user()->type=="admin")
            <div class="col-md-2">
              <select class="form-control"  wire:model="durum">
                <option value="">Durum Seçiniz</option>
                <option  value="completed">Tamamlandı</option>
                <option  value="notcompleted">Tamamlanmadı</option>
              </select>
            </div>
            <div class="col-md-2">
              <select class="form-control" wire:model="byuser">
                <option value="">Kullanıcı Seçiniz</option>
                @foreach($users as $user)
                <option value="{{$user->id}}">{{$user->name}}</option>
                @endforeach
              </select>
            </div>
          @endif
        </div>
      <table style="margin-left:150px;"class="table table-bordered mt-5">
        <thead>
          <tr>
            <th scope="col">Aktivite Adı</th>
            <th scope="col">Durum</th>
            <th scope="col">Bitiş Tarihi</th>
            <th scope="col">İşlemler</th>
          </tr>
        </thead>
        <tbody>
          @foreach($activities as $activite)
          <tr>
            <td>{{ $activite->title}}</td>
            <td>{{$activite->status}}</td>
            <td>{{$activite->finished_at}}</td>
            <td>
              <a href="/dashboard/duzenle/{{ $activite->id }}" class="btn btn-sm btn-primary">Güncelle</a>
              <a href="/dashboard/sil/{{$activite->id}}" class="btn btn-sm btn-danger">Sil</a>
            </td>
          </tr>
          <tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
