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
            </div>

            <div class="form-group">
                <label for="group_id">Номер записи</label>
                <input  name="group_id"
                        id="group_id"
                        type="text"
                        class="form-control"
                        minlength="3"
                        value="{{ $item->group_id }}"

                >
            </div>
            <div class="form-group">
                <label for="vkId">VK ID</label>
                <input  name="vkId"
                        id="vkId"
                        type="text"
                        class="form-control"
                        minlength="3"
                        value="{{ $item->vkId }}"

                >
             </div>
            <div class="form-group">
                <label for="message">Сообщение</label>
                <textarea  name="message"
                        id="message"
                        class="form-control"
                        minlength="3"
                ></textarea>
            </div>


                        <button type="submit" class="btn btn-primary">Отправить</button>


                    </div>
                </div>
            </div>
        </div>
    </div>
</div>