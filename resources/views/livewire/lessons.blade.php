<x-slot name="header">Dersler</x-slot>
<div class="card">
  <div class="card-body">
    @if(auth()->user()->type=="admin")
      <h5 class="card-title float-right">
        <a href="/dashboard/lessoncreate" class="btn btn-sm btn-primary"><i class="fa fa-plus"></i> Ders Oluştur</a>
      </h5>
    @endif
    <table style="margin-left:150px;" class="table table-bordered mt-5">
      <thead>
        <tr>
          <th scope="col">Ders Adı</th>
        </tr>
      </thead>
      <tbody style="margin-left:150px;">
        @foreach($lessons as $lesson)
        <tr>
          <td style="margin-left:150px;">{{ $lesson->name}}</td>
          <td>
            <a href="/dashboard/lessonupdate/{{$lesson->id}}" class="btn btn-sm btn-primary">Güncelle</a>
            <a wire:click="deleteLesson({{$lesson->id}})" class="btn btn-sm btn-danger">Sil</a>
          </td>
        </tr>
        <tr>
        @endforeach
      </tbody>
    </table>

  </div>
</div>
