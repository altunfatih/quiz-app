<x-app-layout>
    <x-slot name="header">Quiz List</x-slot>
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">
                <a href="{{route('quizzes.create')}}" class="btn btn-sm btn-primary"><i class="fa fa-plus"></i> Created Quiz</a>
            </h5>
            <table class="table table-bordered">
                <thead>
                  <tr>
                    <th scope="col">Quiz</th>
                    <th scope="col">Soru Sayısı</th>
                    <th scope="col">Durum</th>
                    <th scope="col">Bitiş Tarihi</th>
                    <th scope="col">İşlemler</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($quizzes as $quiz)
                    <tr>
                        <td>{{ $quiz->title }}</td>
                        <td>{{ $quiz->questions_count }}</td>
                        <td>
                            @switch($quiz->status)
                                @case('publish')
                                    <span class="btn btn-sm btn-success">Aktif</span>
                                @break
                                @case('passive')
                                    <span class="btn btn-sm btn-danger">Pasif</span>
                                @break
                                @case('draft')
                                    <span class="btn btn-sm btn-warning">Taslak</span>
                                @break
                            @endswitch
                        </td>
                        <td>{{ $quiz->finished_at }}</td>
                        <td>
                            <a href="{{ route('questions.index', $quiz->id) }}" class="btn btn-sm btn-warning"><i class="fa fa-question"></i></a>
                            <a href="{{ route('quizzes.edit', $quiz->id) }}" class="btn btn-sm btn-primary"><i class="fa fa-edit"></i></a>
                            <a href="{{ route('quizzes.destroy', $quiz->id) }}" class="btn btn-sm btn-danger"><i class="fa fa-times"></i></a>
                        </td>
                    </tr>
                  @endforeach
                </tbody>
              </table>
              {{$quizzes->links()}}
        </div>
    </div>
</x-app-layout>
