@extends('layouts.admin')

@section('content')
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- Small boxes (Stat box) -->
            <div class="row">
                @if(!empty($rooms))
                    @foreach($rooms as $room)
                        <div class="col-lg-4 col-6">
                            <!-- small box -->
                            <div class="small-box @if(empty($room->package)) bg-success @else bg-danger @endif">
                                <div class="inner">
                                    <h3>{{ $room->name }}</h3>
                                    <p>
                                        @if(!empty($room->package))
                                            Boshlanish vaqti:
                                        @endif
                                        @if(!empty($room->package)) {{ date("H:i:s",strtotime($room->package->start_date)) }} @endif
                                    </p>
                                    <p>
                                        @if(!empty($room->package))
                                            Xaridlar:
                                        @endif
                                        @if(!empty($room->package->order))
                                            @foreach($room->package->order as $o)
                                                <br>
                                                {{ $o->name }} - {{ $o->count }} x {{ number_format($o->price,2,',',' ') }} = {{ number_format($o->count*$o->price,2,',',' ') }} so'm
                                            @endforeach
                                        @endif
                                    </p>
                                    @if(!empty($room->package))
                                        <p>Umumiy:</p>
                                    @endif
                                </div>
                                <div class="icon">
                                    <i class = "ion ion-stats-bars"></i>
                                </div>
                                @if(empty($room->package))
                                    <a href = "{{ route("manageOpen",$room->id) }}" class="small-box-footer">
                                        Ochish
                                        <i class="fas fa-arrow-circle-right"></i>
                                    </a>
                                @else
                                    <a href = "{{ route("manageCloze",$room->package->id) }}" class="small-box-footer">
                                        Yopish
                                        <i class="fas fa-arrow-circle-right"></i>
                                    </a>
                                @endif
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection
