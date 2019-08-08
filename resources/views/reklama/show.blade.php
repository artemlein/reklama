@extends('layouts.app')

@section('content')
    @php
        /** @var \App\Models\Report $report */
    @endphp
    <!-- Проверка есть ли $item в базе -->




    <div class="container">
        @php
            /** @var \Illuminate\Support\ViewErrorBag $errors */
        @endphp
        @if($errors->any())
            <div class="row justify-content-center">
                <div class="col-md-11">
                    <div class="alert alert-danger">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true"></span>
                        </button>
                        {{ $errors->first() }}
                    </div>
                </div>
            </div>
        @endif



        @if(session('succes'))@endif
        <div class="row justify-content-center">
            <div class="col-md-8">
                @include('reklama.includes.item_show_main_col')
            </div>

        </div>
    </div>

@endsection