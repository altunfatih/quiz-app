<x-app-layout>
    <x-slot name="header">{{$quiz->title}}</x-slot>
    <div class="card">
        <div class="card-body">
          <p class="card-text">
              <div class="row">
                <div class="col-md-4">
                    <ul class="list-group">
                        @if ($quiz->my_rank)
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            Sıralamam
                            <span class="btn btn-success" style="font-size: 80%">#{{ $quiz->my_rank}}</span>
                        </li>
                        @endif
                        @if ($quiz->my_result)
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            Puan
                            <span class="btn btn-danger" style="font-size: 80%">{{ $quiz->my_result->point}}</span>
                        </li>
                        @endif
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
                        @if ($quiz->my_result)
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            Katılımcı Sayısı
                            <span class="btn btn-secondary" style="font-size: 80%">{{ $quiz->details['join_count'] }}</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                          Ortalama Puan
                          <span class="btn btn-secondary" style="font-size: 80%">{{ $quiz->details['avg'] }}</span>
                        </li>
                        @endif
                      </ul>
                      <div class="card">
                          <div class="card-body">
                              <h5 class="card-title">İlk 10</h5>
                              <ul class="list-group">
                                  @foreach ($quiz->topTen as $result)
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        <img class="w-8 h-8" rounded-full src="{{ $result->user->profile_photo_url }}">
                                        <strong>{{$loop->iteration}}.</strong>
                                        {{ $result->user->name }}
                                        <span class="btn btn-success" style="font-size: 80%">{{ $result->point }}</span>
                                    </li>
                                  @endforeach
                              </ul>
                          </div>
                      </div>
                </div>
                <div class="col-md-8">
                    {{$quiz->description}}
                </p>
              <a href="{{ route('quiz.join', $quiz->slug) }}" class="btn btn-primary">Quize Katıl</a>
                </div>
              </div>

        </div>
      </div>
</x-app-layout>
