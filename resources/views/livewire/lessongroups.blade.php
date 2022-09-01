<x-slot name="header">Ders Grupları</x-slot>
<div class="card">
  @if(session()->has('message'))
    <div style="margin-left:150px;" class="alert alert-info">{{session('message')}}</div>
  @endif
  <div class="card-body">
    @if(auth()->user()->type=="admin")
      <h5 class="card-title float-right">
        <a href="/dashboard/lessongroupcreate" class="btn btn-sm btn-primary"><i class="fa fa-plus"></i> Ders Grubu Oluştur</a>
      </h5>
    @endif
    <table style="margin-left:150px;" class="table table-bordered mt-5">
      <thead>
        <tr>
          <th scope="col">Ders Adı</th>
          <th scope="col">Alan Adı</th>
          <th scope="col">İşlemler</th>
        </tr>
      </thead>
      <tbody style="margin-left:150px;">
        @foreach($lessongroups as $lessongroup)
        <tr>
          <td style="margin-left:150px;">{{ $lessongroup->name}}</td>
          <td>
            <ul>
              @foreach($lessongroup->groups as $group)
                <li>{{$group->name}}- Katsayısı:{{$group->pivot->katsayi}}</li>
                @if(auth()->user()->type=="admin")
                  <a href="/dashboard/lessongroupupdate/{{$lessongroup->id}}/{{$group->name}}" class="btn btn-sm btn-primary">Güncelle</a>
                  <a href="/dashboard/lessongroupdelete/{{$lessongroup->id}}/{{$group->name}}" class="btn btn-sm btn-danger">Sil</a>
                @endif
              @endforeach
            </ul>
        </tr>
        <tr>
        @endforeach
      </tbody>
    </table>

  </div>
</div>
