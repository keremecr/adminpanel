<x-slot name="header">Kayıtlı Öğrenciler</x-slot>
<div class="card">
  @if(session()->has('message'))
    <div style="margin-left:150px;" class="alert alert-info">{{session('message')}}</div>
  @endif
  <div class="card-body">
    <h5 class="card-title float-right">
      <a href="/dashboard/studentcreate" class="btn btn-sm btn-primary"><i class="fa fa-plus"></i> Öğrenci Ekle</a>
    </h5>

    <table style="min-weight:600px; margin-left:150px;" class="table table-bordered mt-5">
      <thead>
        <tr>
          <th scope="col">Öğrenci Adı</th>
          <th scope="col">Sınıfı</th>
          <th scope="col">Grubu</th>
          <th scope="col">Kayıt Ücreti</th>
          <th scope="col">Ödenen Miktar</th>
          <th scope="col">İşlemler</th>
        </tr>
      </thead>
      <tbody style="margin-left:150px;">
        @foreach($students as $student)
        <tr>
          <td style="margin-left:150px;">{{ $student->name}}</td>
          <td style="margin-left:150px;">{{$student->sinif}}</td>
          <td style="margin-left:150px;">{{$student->group}}</td>
          <td style="margin-left:150px;">{{$student->fee}}</td>
          <td style="margin-left:150px;">{{$student->odenenmiktar}}</td>
          <td>
            <a href="/dashboard/ogrenciduzenle/{{ $student->id }}" class="btn btn-sm btn-primary">Güncelle</a>
            <a href="/dashboard/ogrencisil/{{$student->id}}" class="btn btn-sm btn-danger">Sil</a>
          </td>
        </tr>
        <tr>
        @endforeach
      </tbody>
    </table>

  </div>
</div>
