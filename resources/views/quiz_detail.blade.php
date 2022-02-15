<x-app-layout>
    <x-slot name="header">{{$quiz->title}}</x-slot>
    <div class="card">
        <div class="card-body">
          <p class="card-text">
              <div class="row">
                <div class="col-md-4">
                    <ul class="list-group">
                        @if ($quiz->finished_at)
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            Son Katılım Tarihi
                            <span class="btn btn-secondary" style="font-size: 80%">{{ $quiz->finished_at}}</span>
                        </li>
                        @endif
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            Soru Sayısı
                            <span class="btn btn-secondary" style="font-size: 80%">{{ $quiz->questions_count }}</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            Katılımcı Sayısı
                            <span class="btn btn-secondary" style="font-size: 80%">14</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                          Ortalama Puan
                          <span class="btn btn-secondary" style="font-size: 80%">2</span>
                        </li>
                      </ul>
                </div>
                <div class="col-md-8">
                    {{$quiz->description}}
                </p>
              <a href="#" class="btn btn-primary">Quize Katıl</a>
                </div>
              </div>

        </div>
      </div>
</x-app-layout>
