@php
    /** @var \App\Models\Report $item */
@endphp
<div class="row justify-content-center">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <div class="card-title"></div>
                <ul class="nav nav-tabs">
                    <li class="nav-item">
                        <a class="nav-link active" data-toggle="tab" href="#maindata" role="tab">Основные данные</a>
                    </li>
                </ul>
                <br>
                <div class="tab-content">
                    <div class="form-group">
                        <ul class="show-list">
                            <li>
                                <h2>Название канала</h2>
                                <div class="description">
                                    {{ $channel->name }}
                                </div>
                            </li>
                            <li>
                                <h2>Ссылка на канал</h2>
                                <div class="description">
                                    <a href="{{ $channel->url }}" target="_blank">{{ $channel->url }}</a>
                                </div>
                            </li>
                            <li>
                                <h3>Подписчики</h3>
                                <div class="description">
                                    {{ $channel->subscribe }}
                                </div>
                            </li>

                            <li>
                                <h3>Цена</h3>
                                <div class="description">

                                            {{ $channel->price }}

                                </div>
                            </li>
                            <li>
                                <h3>Среднее количество просмотров</р2>
                                <div class="description">

                                    {{ $channel->shows }}

                                </div>
                            </li>
                            <li>
                                <h3>Лайки</h3>
                                <div class="description">

                                    {{ $channel->like }}

                                </div>
                            </li>
                            <li>
                                <h2>Публикация видео</h2>
                                <div class="description">

                                    {{ $channel->updateVideo }}

                                </div>
                            </li>
                            <li>
                                <h2>Сообщение пользователя</h2>
                                <div class="description">

                                    {{ $channel->message }}

                                </div>
                            </li>
                        </ul>
                        <div class="float-right">
                            <a href="{{ route('reklama.declineChannel', ['vkId' => $channel->vkId, 'group_id' => $channel->id] ) }}" class="btn btn-danger mr-2">Отклонить</a>
                            <a href="{{ route('reklama.message', ['vkId' => $channel->vkId, 'group_id' => $channel->id] ) }}" class="btn btn-success">Подтвердить</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
