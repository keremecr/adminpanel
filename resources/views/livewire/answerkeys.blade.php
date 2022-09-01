<x-slot name="header">Cevap Anahtarı</x-slot>
<div class="card">
  @if(session()->has('message'))
    <div style="margin-left:150px;" class="alert alert-info">{{session('message')}}</div>
  @endif
  <div class="card-body">
    <table style="margin-left:150px;" class="table table-bordered mt-5">
      <thead>
        <tr>
          <th scope="col">Sınav Adı</th>
          <th scope="col">Soru Numarası</th>
          <th scope="col">Doğru Cevap</th>
          <th scope="col">Katsayı</th>
          <th scope="col">Konusu</th>
          <th scope="col">Kitapçık</th>
        </tr>
      </thead>
      <tbody style="margin-left:150px;">
        @foreach($answerkeys as $answerkey)
          <tr>
            <td style="margin-left:150px;">{{ $answerkey->exam->name}}</td>
            <td style="margin-left:150px;">{{$loop->iteration}}</td>
            <td style="margin-left:150px;">{{ $answerkey->correctanswer}}</td>
            <td style="margin-left:150px;">{{ $answerkey->katsayi}}</td>
            <td style="margin-left:150px;">{{ $answerkey->subject}}</td>
            <td style="margin-left:150px;">{{ $answerkey->kitapcik}}</td>
          </tr>
        @endforeach
      </tbody>
    </table>

  </div>
</div>
