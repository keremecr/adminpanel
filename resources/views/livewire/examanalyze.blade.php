<x-slot name="header">Sınav Analizi</x-slot>
<div class="card">
  <div class="card-body">
    <h5 style="margin-left:150px;">Yanlışlarım</h5>
    <table style="margin-left:150px;" class="table table-bordered mt-5">
      <thead>
        <tr>
          <th scope="col">Sınav Adı</th>
          <th scope="col">Soru Numarası</th>
          <th scope="col">Verilen Cevap</th>
          <th scope="col">Doğru Cevap</th>
          <th scope="col">Konu</th>
          <th scope="col">Kitapçık</th>
        </tr>
      </thead>
      <tbody>
        @for ($i =0; $i <  $indexcount; $i++)
          <tr>
            <td style="margin-left:150px;" >{{ $exam->name }}</td>
            <td style="margin-left:150px;" >{{$wrongnumbers[$i]}}</td>
            <td style="margin-left:150px;">{{$wrongstudentanswers[$i]}}</td>
            <td style="margin-left:150px;">{{$trueanswers[$i]}}</td>
            <td style="margin-left:150px;">{{$wrongsubjects[$i]}}</td>
            <td style="margin-left:150px;">{{$kitapcik}}</td>
          </tr>
        @endfor
      </tbody>
    </table>
    <h5 style="margin-left:150px;" >Sınav puanım:{{$point}}</h5>

  </div>
</div>
