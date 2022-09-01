<x-slot name="header">Cevaplarım</x-slot>
<div class="card">
  <div class="card-body">

    <table style="margin-left:150px;"; class="table table-bordered mt-5">
      <thead>
        <tr>
          <th scope="col">Sınav Adı</th>
          <th scope="col">Soru Numarası</th>
          <th scope="col">Verilen Cevap</th>
          <th scope="col">Sonuç</th>
          <th scope="col">Kitapçık</th>
        </tr>
      </thead>
      <tbody>
        @foreach($examanswers->students as $answer)
        <tr>
          <td style="margin-left:150px;" >{{ $exam}}</td>
          <td style="margin-left:150px;" >{{$answer->pivot->question_id}}</td>
          <td style="margin-left:150px;">{{$answer->pivot->answer}}</td>
          <td style="margin-left:150px;">{{$answer->pivot->result}}</td>
          <td style="margin-left:150px;">{{$answer->pivot->kitapcik}}</td>
        </tr>
        @endforeach
      </tbody>
    </table>

  </div>
</div>
