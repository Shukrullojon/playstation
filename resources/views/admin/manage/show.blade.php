@extends('layouts.admin')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-4 col-12">
                <div class="small-box bg-success">
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
                            Narxi:
                        </p>

                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-6">
                <div class="small-box bg-success">
                    <div class="inner">
                        <h3>
                            Xaridlar:
                        </h3>
                        <p>

                        </p>

                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-6">
                <div class="small-box bg-success">
                    <div class="inner">
                        <h3>
                            Umumiy:
                        </h3>
                        <p>

                        </p>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
