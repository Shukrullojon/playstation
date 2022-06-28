@extends('layouts.admin')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-4 col-12">
                <div class="small-box bg-info">
                    <div class="inner">
                        <h3>
                            @if(!empty($package->room))
                                Xona: {{ $package->room->name }}
                            @endif
                        </h3>
                        <p>
                            Boshlanish vaqti: {{ date("H:i:s", strtotime($package->start_date)) }} <br>
                            Tugash vaqti: {{ date("H:i:s", strtotime($package->end_date)) }} <br>
                            Vaqt: @if(!empty($difference->h)) {{ $difference->h }}  soat @endif @if($difference->i) {{ $difference->i }} minut @endif<br>
                            Narxi: {{ number_format($difference->h*$package->room->price + ($difference->i/60)*$package->room->price,2,","," ") }}
                        </p>

                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-6">
                <div class="small-box bg-info">
                    <div class="inner">
                        <h3>
                            Xaridlar:
                        </h3>
                        <p>
                            @php $all = 0; @endphp
                            @if(!empty($package->order))
                                @foreach($package->order as $o)
                                    <br>
                                    @php $all = $all + $o->price * $o->count; @endphp
                                    {{ $o->name }} - {{ $o->count }} x {{ number_format($o->price,2,',',' ') }} = {{ number_format($o->count*$o->price,2,',',' ') }} so'm
                                @endforeach
                            @endif
                        </p>

                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-6">
                <div class="small-box bg-info">
                    <div class="inner">
                        <h3>
                            Umumiy: {{ number_format($difference->h*$package->room->price + ($difference->i/60)*$package->room->price + $all,2,","," ") }} so'm
                        </h3>
                        @if($package->state == 2)
                            <a href="{{ route("manageClozePackage",$package->id) }}" class="btn btn-danger">Yopish</a>
                        @endif

                        <p>

                        </p>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
