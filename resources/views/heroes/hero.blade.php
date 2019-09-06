@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card"  style="margin-top: 10px;">
                    <div class="row">
                        <div class="col-md-3 text-center">
                            <div style="
    padding: 10px;">
                                <div style="display: inline-block;
    position: relative;
    width: 80%;
    overflow: hidden;
    height: 150px;
    width: 150px;
    border-radius: 50%;">
                                    @if(!empty($mainImage->first()->src))
                                    <img src="{{ asset('image/'.$mainImage->first()->src) }}"
                                         class="" alt=""
                                         style="
                                     position: absolute;
    top: 51%;
    left: 51%;
    width: 102%;
    height: 102%;
    object-fit: cover;
    transform: translateX(-51%) translateY(-51%);
};">
                                        @else
                                        <div style="
                                     position: absolute;
    top: 51%;

    width: 102%;
    height: 102%;
font-weight: bold;
font-size: 17px;
};">Image not found</div>
                                        @endif

                                </div>
                            </div>
                        </div>

                        <div class="col-md-8">
                            <div style="display: table; height: 100%;width: 100%;">
                                <div style="display: table-cell; vertical-align: middle; text-align: center; ">
                                    <div style="display: inline-block; font-size: 35px;">
                                    <div class="text-primary">{{ $item->nickname }}</div>
                                    <div>{{ $item->real_name }}</div>
                                    </div>

                                </div>

                            </div>
                        </div>
                    </div>
                </div>

                <div class="card" style="margin-top: 10px;">
                    <div class="card-body">
                        <h4 class="card-title">Origin description</h4>
                        <p class="card-text">{{ $item->origin_description }}</p>
                    </div>
                    <div class="card-body">
                        <h4 class="card-title">Superpowers</h4>
                        <p class="card-text">{{ $item->superpowers }}</p>
                    </div>
                    <div class="card-body">
                        <h4 class="card-title">Catch phrase</h4>
                        <p class="card-text">{{ $item->catch_phrase }}</p>
                    </div>
                </div>

                <div class="card" style="margin-top: 10px;">
                    @if(!empty($gallery[0]))
                    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                        <ol class="carousel-indicators">
                            @php $is_start = true; $c = -1; @endphp
                            @foreach($gallery as $image)
                            <li data-target="#carouselExampleIndicators" data-slide-to="@php echo $c++; @endphp" class="@php if(true === $is_start) { $is_start = false; echo "active"; } @endphp"></li>
                            @endforeach
                        </ol>
                        <div class="carousel-inner">
                            @php $is_start = true;  @endphp
                            @foreach($gallery as $image)
                            <div class="carousel-item @php if(true === $is_start) { $is_start = false; echo "active"; } @endphp text-center justify-content-center">
                                <img src="{{ asset('image/'. $image->src) }}" class="d-inline-block w-auto " alt="..." style="max-height: 300px;">
                            </div>
                            @endforeach
                        </div>
                        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>
                        @else
                    <div class="row justify-content-center">
                        <div style="padding: 15px;">Gallery is empty</div>
                    </div>
                        @endif
                </div>
                <div class="card" style="margin-top: 10px; margin-bottom: 10px;">
                    <button class="btn btn-primary"><a href="{{ route('heroes.edit',$item->id) }}" class="text-white w-100 d-block" style="text-decoration: none;">Edit</a></button>
                </div>
            </div>
        </div>
    </div>
@endsection
