@php
    /** @var \App\Models\Heroes */
@endphp
<div class="row justify-content-center">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <div class="card-title"></div>
                <ul class="nav nav-tabs" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" data-toggle="tab" href="#maindata" role="tab"></a>
                    </li>
                </ul>
                <br>
                <div class="tab-content">
                    <div class="tab-pane active" id="maindata" role="tabpanel">
                        <div class="form-group">
                            <label for="title">Заголовок</label>
                            <input name="title" value=""
                                   id="title"
                                   type="text"
                                   class="form-control"
                                   minlength="3"
                                   required>
                        </div>

                        <div class="form-group">
                            <label for="slug">Идентификатор</label>
                            <input name="slug" value="{{$item->slug}}"
                                   id="slug"
                                   type="text"
                                   class="form-control">
                        </div>


                        <div class="form-group">
                            <label for="description">Описание</label>
                            <textarea name="description"
                                      id="description"
                                      class="form-control"
                                      roews="3">  </textarea>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
