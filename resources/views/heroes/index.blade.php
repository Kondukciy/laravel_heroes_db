@extends('layouts.app')

@section('content')
    @if(!empty($paginator))
    <div class="container">
        <div class="row">

            @foreach($paginator as $item)
                <div class="col-md-6" style=" padding: 5px;">
                    <div class="card" style="height: 100%;">


                            @if(!empty($item->heroesImages->first()))
                                @foreach($item->heroesImages as $image)
                            @if($image->heroes_id == $item->id && $image->main == true)
                                <div style="position: relative;
    padding-top: 60%;
    overflow: hidden;
    border-top-right-radius: 5px;
    border-top-left-radius: 5px;">
                                    <div style="position: absolute;
    width: 100%;
    bottom: 0;
    right: 0;
    top: 0;
    left: 0;">
                                        <img src="{{ asset('image/'. $item->heroesImages->first()->src) }}"
                                              class="" alt=""
                                              style=" max-height: 500px; width: 100%;">
                                    </div>
                                </div>

                                @break
                               @endif
                            @endforeach
                                @else
                            <div style="position: relative;
    padding-top: 60%;
    overflow: hidden;
    border-top-right-radius: 5px;
    border-top-left-radius: 5px;">
                                <div class="justify-content-center text-center" style="position: absolute;
    width: 100%;
    bottom: 0;
    right: 0;
    top: 51%;
    left: 0;">
                                   <div class="d-inline-block" style="font-weight: bold;
font-size: 21px;">Image not found</div>
                                </div>
                            </div>
                                @endif

                        <div class="card-body">
                            <h5 class="card-title">{{ $item->nickname }}</h5>
                            <p class="card-text">{{ $item->origin_description }}</p>


                            <button class="btn btn-primary align-bottom"><a href="{{ route('heroes.show', $item->id) }}"
                                                                            style="color:white; text-decoration: none;">Details</a>
                            </button>
                            <button class="btn btn-danger align-bottom"><a href="{{ route('heroes.edit', $item->id) }}"
                                                                            style="color:white; text-decoration: none;">Edit</a>
                            </button>

                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        @if($paginator->total() > $paginator->count())

            <div class="row justify-content-center" style="margin-top: 10px; margin-bottom: 10px;">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            {{ $paginator->links() }}
                        </div>
                    </div>
                </div>
            </div>
        @endif
    </div>
    @endif
@endsection
