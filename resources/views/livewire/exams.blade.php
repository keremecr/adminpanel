<div>
  <x-slot name="header">Sınavlar</x-slot>
  <div class="card">
    @if(session()->has('message'))
      <div style="margin-left:150px;" class="alert alert-info">{{session('message')}}</div>
    @endif
    <div class="card-body">
      @if(auth()->user()->type=="admin")
        <h5 class="card-title float-right">
          <a href="/dashboard/examcreate" class="btn btn-sm btn-primary"><i class="fa fa-plus"></i> Sınav Oluştur</a>
        </h5>
      @endif
      <table style="margin-left:150px;" class="table table-bordered mt-5">
        <thead>
          <tr>
            <th scope="col">Sınav Adı</th>
          </tr>
        </thead>
        <tbody style="margin-left:150px;">
          @if(auth()->user()->type=="admin")
            @foreach($exams as $exam)
            <tr>
              <td style="margin-left:150px;">{{ $exam->name}}</td>
              <td style="margin-left:150px;">{{ $exam->date}}</td>
              <td>
                <a href="/dashboard/answerkeys/{{$exam->id}}" class="btn btn-sm btn-primary">Cevaplar</a>
                <a href="/dashboard/examupdate/{{$exam->id}}" class="btn btn-sm btn-primary">Güncelle</a>
                <a wire:click="deleteExam({{$exam->id}})" class="btn btn-sm btn-danger">Sil</a>
              </td>
            </tr>
            <tr>
            @endforeach
          @endif
          @if(auth()->user()->type=="user")
            @foreach(array_combine($exams, $dates) as $exam => $date)
            <tr>
              <td style="margin-left:150px;">{{ $exam }}</td>
              <td style="margin-left:150px;">{{ $date}}</td>
              <input type="hidden" wire:model="exam">
              <td>
                <a href="/dashboard/exams/studentanswers/{{$exam}}" class="btn btn-sm btn-primary">Cevaplarım</a>
                <a href="/dashboard/exams/examanalyze/{{$exam}}" class="btn btn-sm btn-primary">Sınav Analizi</a>
              </td>
            </tr>
            <tr>
            @endforeach
          @endif
        </tbody>
      </table>

    </div>
  </div>
</div>
