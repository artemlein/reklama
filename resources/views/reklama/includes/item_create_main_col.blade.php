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
                        <label for="name">Название канала</label>
                        <input  name="name"
                                id="name"
                                type="text"
                                class="form-control"
                                minlength="3"
                        >
                    </div>

                    <div class="tab-pane active" id="maindata" role="tabpanel">
                        <div class="form-group">
                            <label for="url">Ссылка на канал</label>
                            <input  name="url"
                                    id="url"
                                    type="text"
                                    class="form-control"
                                    minlength="3"
                            >
                        </div>

                        <div class="form-group">
                            <label for="price">Цена</label>
                            <input  name="price"
                                    id="price"
                                    type="text"
                                    class="form-control"
                                    minlength="3"

                            >
                        </div>

                        <div class="form-group">
                            <label for="subscribe">Подписчиков</label>
                            <select  name="subscribe"
                                     id="subscribe"
                                     class="form-control"
                                     placeholder="Выберите категорию"
                                     required>

                                    <option value="0 - 1.000">
                                        0-1.000
                                    </option>
                                 <option value="1 000 - 10 000">
                                        1.000 - 10.000
                                    </option>
                                 <option value="10 000 - 25 000">
                                        10.000 - 25.000
                                    </option>
                                 <option value="25 000 - 50 000">
                                        25.000 - 50.000
                                    </option>
                                <option value="50 000 - 100 000">
                                        50.000 - 100.000
                                    </option>
                                <option value="100 000 - 500 000">
                                        100.000 - 500.000
                                    </option>
                                <option value="500 000 - ...">
                                        500.000 - ...
                                    </option>

                            </select>
                        </div>
                        </div> <div class="form-group">
                            <label for="like">Like</label>
                            <input  name="like"
                                    id="like"
                                    type="text"
                                    class="form-control"
                                    minlength="3"

                            >
                        </div> <div class="form-group">
                            <label for="shows">Среднее кол-во просмотров</label>
                            <input  name="shows"
                                    id="shows"
                                    type="text"
                                    class="form-control"
                                    minlength="3"

                            >
                    </div> <div class="form-group">
                            <label for="url_vk">VK url</label>
                            <input  name="url_vk"
                                    id="url_vk"
                                    type="text"
                                    class="form-control"
                                    minlength="3"

                            >

                        <div class="form-group">
                            <label for="updateVideo">Выход видео</label>
                            <select  name="updateVideo"
                                     id="updateVideo"
                                     class="form-control"
                                     placeholder="Выберите категорию"
                                     required>

                                <option value="7 видео в неделю">
                                    7 видео в неделю
                                </option>
                                <option value="3 - 4 видео в неделю">
                                    3 - 4 видео в неделю
                                </option>
                                <option value="2 видео в неделю">
                                    2 видео в неделю
                                </option>
                                <option value="1 видео в неделю">
                                    1 видео в неделю
                                </option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="message">Сообщение</label>
                            <input  name="message"
                                    id="message"
                                    type="text"
                                    class="form-control"
                                    minlength="3"

                            >

                        <button type="submit" class="btn btn-primary">Создать</button>


                    </div>
                </div>
            </div>
        </div>
    </div>
</div>