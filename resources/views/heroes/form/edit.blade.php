@extends('layouts.app')
@section('content')
    @php /** @var \App\Models\Heroes $item */ @endphp
    @if($errors->any())
        <div class="row justify-content-center">
            <div class="col-md-11">
                <div class="alert alert-danger" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">x</span>
                    </button>
                    {{ $errors->first() }}
                </div>
            </div>
        </div>
    @endif

    @if(session('success'))
        <div class="row justify-content-center">
            <div class="col-md-11">
                <div class="alert alert-success" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">x</span>
                    </button>
                    {{ session()->get('success') }}
                </div>
            </div>
        </div>
    @endif
    <div class="row justify-content-center">

    </div>
    @if($item->exists)
        <div class="row justify-content-center" style="margin-top: 15px;">
            <div class="col-md-12">
                <div class="row justify-content-center">
                    <div class="card col-md-8">
                        <div class="card-body ">
                            <form method="POST" action="{{ route('heroes.update', $item->id) }}"
                                  enctype="multipart/form-data">
                                @method('PATCH')
                                @else
                                    <form method="POST" action="{{ route('heroes.store') }}"
                                          enctype="multipart/form-data">
                                        @endif
                                        @csrf


                                        <div class="form-group">
                                            <label for="nickname">Nickname</label>
                                            <input type="text" class="form-control" id="nickname" name="nickname"
                                                   aria-describedby="emailHelp" placeholder="Enter nickname"
                                                   value="{{ $item->nickname }}">

                                        </div>
                                        <div class="form-group">
                                            <label for="real_name">Real name</label>
                                            <input type="text" class="form-control" id="real_name" name="real_name"
                                                   placeholder="Enter real name hero" value="{{ $item->real_name }}">
                                        </div>
                                        <div class="form-group">
                                            <label for="origin_description">Description</label>
                                            <textarea class="form-control" id="origin_description"
                                                      name="origin_description"
                                                      aria-describedby="emailHelp"
                                                      placeholder="Enter description hero">{{ $item->origin_description }}</textarea>

                                        </div>
                                        <div class="form-group">
                                            <label for="superpowers">Superpowers</label>
                                            <textarea class="form-control" id="superpowers" name="superpowers"
                                                      aria-describedby="emailHelp"
                                                      placeholder="Enter superpowers hero">{{ $item->superpowers }}</textarea>

                                        </div>
                                        <div class="form-group">
                                            <label for="catch_phrase">Catch phrase</label>
                                            <textarea class="form-control" id="catch_phrase" name="catch_phrase"
                                                      aria-describedby="emailHelp"
                                                      placeholder="Enter catch phrase hero">{{ $item->catch_phrase }}</textarea>

                                        </div>

                                        <div class="form-group">
                                            <label for="main_hero_image">Main photo</label>

                                            <div class="input-group mb-3">

                                                <div class="custom-file">
                                                    <input type="file"
                                                           id="main_hero_image" name="main_hero_image"
                                                           accept="image/jpg,image/jpeg,image/png,image/gif">

                                                </div>
                                            </div>

                                        </div>
                                        <div class="form-group">
                                            <label for="catch_phrase">Gallery hero</label>
                                            <div class="input-group mb-3">

                                                <div class="custom-file">
                                                    <input type="file" type='file' class="file"
                                                           multiple='multiple'
                                                           id="heroes_images" name="heroes_images[]"
                                                           accept="image/jpg,image/jpeg,image/png,image/gif">

                                                </div>
                                            </div>


                                        </div>


                                        <div class="form-group">
                                            <button type="submit" class="btn btn-primary">Save</button>
                                        </div>


                                    </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @if($item->exists)
            <div class="row justify-content-center" style="margin-top: 10px;">

                    <div class="card col-md-8">
                        <div class="card-body">
                <form method="POST" action="{{ route('heroes.destroy',$item->id) }}">
                    @method('DELETE')
                    @csrf



                                    <button type="submit" class="btn btn-danger">Delete hero</button>

                </form>
                            </div>


                    </div>

            </div>

        @endif
        @if(!empty($item->heroesImages[0]))



            <div class="row justify-content-center"
                 style="margin-top: 10px; margin-bottom: 10px;">
                <div class="card col-md-8">
                    <div class="card-body">
                        <div class="form-group">
                            @foreach($item->heroesImages as $image)

                                <div class="card justify-content-center"
                                     style="margin: 5px; position:relative; width: 200px; height: 300px; display: inline-block; overflow: hidden;">
                                    <form method="POST"
                                          action="{{ route('heroes-image.destroy',$image->id) }}">
                                        @method('DELETE')
                                        @csrf
                                        <button type="submit" class="btn bg-danger"
                                                style="position:absolute; top: -10px; right: -10px; z-index: 1; border-radius: 50%; padding: 5px 15px; font-size: 20px;">

                                            <span class="text-white">x</span>
                                        </button>
                                    </form>
                                    <img src="{{ asset('image/'. $image->src) }}" alt="..."
                                         style="max-width: 200px; position: absolute; top: 51%;left: 51%; transform: translate(-51%,-51%);">
                                    @if($image->main)
                                        <div class="bg-primary"
                                             style="position: absolute; bottom: 0;width: 100%; padding: 2px 2px 0 2px; color: white; text-align: center; border-radius: 2px; ">
                                            <span>Main photo</span></div>
                                    @endif
                                </div>
                                @empty($item->heroesImages)
                                    <div>Gallery is empty</div>
                                @endempty
                            @endforeach
                        </div>
                    </div>

                </div>
            </div>

        @else

        @endif
@endsection
