<x-slot name="header">Randevularım</x-slot>
<div class="card">
  @if(session()->has('message'))
    <div style="margin-left:150px;" class="alert alert-info">{{session('message')}}</div>
  @endif
  <div class="card-body">
      <h5 class="card-title float-right">
      </h5>
    <table style="margin-left:150px;" class="table table-bordered mt-5">
      <thead>
        <tr>
          <th scope="col">Öğretmen Adı</th>
          <th scope="col">Konu</th>
          <th scope="col">Ders Başlangıcı</th>
          <th scope="col">Ders Bitişi</th>
          <th scope="col">Randevu Alınma Zamanı</th>
          <th scope="col">İşlemler</th>
        </tr>
      </thead>
      <tbody style="margin-left:150px;">
        @foreach($student->teachers as $appointment)
        <tr>
          <td style="margin-left:150px;">{{ $appointment->name}}</td>
          <td style="margin-left:150px;">{{ $appointment->pivot->subject}}</td>
          <td style="margin-left:150px;">{{ $appointment->pivot->start_at}}</td>
          <td style="margin-left:150px;">{{ $appointment->pivot->finish_at}}</td>
          <td style="margin-left:150px;">{{ $appointment->pivot->created_at}}</td>
          <td>
            <a href="/dashboard/appointmentupdate/{{$appointment->pivot->id}}" class="btn btn-sm btn-primary">Güncelle</a>
            <a wire:click="deleteAppointment({{$appointment->pivot->id}})" class="btn btn-sm btn-danger">Sil</a>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>

  </div>
</div>
