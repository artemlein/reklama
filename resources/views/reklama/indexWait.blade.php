@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card mb-3">
            <div class="card-body flex-center ">
                <h1>Ожидание</h1>
            </div>
        </div>
        <div class="row justify-content-center">

            <div class="col-md-9">

                <nav class="navbar navbar-toggleable-md navbar-light bg-faded">
                    <!-- в route указывать имя которое стоит в web.php и routes.txt -->
                    <a class="btn btn-primary" href="{{ route('reklama.create') }}">Добавить</a>
                </nav>
                @if(session('success'))
                    <div class="row justify-content-center">
                        <div class="col-xs-12">
                            <div class="alert alert-success">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true"></span>
                                </button>
                                {{ session('success') }}
                            </div>
                        </div>
                    </div>
                @endif
                <div class="card">
                    <div class="card-body">
                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Имя Ютубера</th>
                                <th>Подписчики</th>
                                <th>Просмотры</th>
                                <th></th>

                                    <th></th>

                            </tr>
                            </thead>
                            <tbody>
                            @foreach($paginator as $item)
                                @php /** @var \App\Models\BlogCategory $item */ @endphp
                                @if($item->status === 0)
                                <tr>
                                    <td>{{ $item->id }}</td>
                                    <td>
                                        {{ $item->name }}
                                    </td>
                                    <td >
                                        {{ $item->subscribe }}
                                    </td>
                                    <td>
                                        <a href="{{ route('reklama.edit', $item->id) }}">
                                            {{ $item->shows }}
                                        </a>
                                    </td>
                                    <td>

                                        <a href="/reklama/show/{{ $item->id }}" class="btn btn-sm btn-primary">
                                            Показать
                                        </a>

                                    </td>

                                        <td>
                                            <form method="POST" action="{{ route('reklama.destroy', $item->id) }}">
                                                @method('DELETE')
                                                @csrf
                                                <button class="fa fa-trash forIcon btn btn-sm btn-primary" type="submit">

                                                </button>
                                            </form>
                                        </td>

                                </tr>
                                @endif
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
            <div class="col-md-3 margin-top">
                <div class="card">
                    <div class="card-body">

                        <form method="GET" action="report/search">
                            @csrf
                            <label for="search">Поиск по ID</label>
                            <input  name="search"
                                    placeholder="Введите ID"
                                    id="search"
                                    type="text"
                                    class="form-control"

                            >
                            <nav class="navbar-toggleable-md navbar-light bg-faded search" >
                                <!-- в route указывать имя которое стоит в web.php и routes.txt -->
                                <button type="submit" class="btn btn-primary">Поиск</button>
                            </nav>
                        </form>
                    </div>
                </div>

            </div>
        </div>
        @if($paginator->total() > $paginator->count())
            <br>
            <div class="row justify-content-center">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            {{ $report->links() }}
                        </div>
                    </div>
                </div>
            </div>
        @endif
    </div>
@endsection