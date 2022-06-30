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
                                            <button type="button" room_id="{{ $room->id }}" class="btn btn-default product_button" data-toggle="modal" data-target="#modal-xl">
                                                +
                                            </button>
                                        @endif
                                        @if(!empty($room->package->order))
                                            @foreach($room->package->order as $o)
                                                <br>
                                                {{ $o->name }} - {{ $o->count }} x {{ number_format($o->price,2,',',' ') }} = {{ number_format($o->count*$o->price,2,',',' ') }} so'm
                                            @endforeach
                                        @endif
                                    </p>
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

    <div class="modal fade" id="modal-xl">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Mahsulotlar</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <input name="room_id" type="hidden" value="" class="room_id">
                        @foreach($categories as $category)
                            <div class="col-lg-3 col-md-12">
                                <p>{{ $category->name }}</p>
                                <div class="small-box bg-default">
                                    @if(!empty($category->products))
                                        @foreach($category->products as $product)
                                            <div class="inner" style="display: flex; align-items: center; gap: 5px">
                                                <img style="display: inline-block" src="{{ asset("uploads/".$product->image) }}" class="img_adminsmal">
                                                {{ $product->name }}
                                                <input type="text" class="form-control productCount{{ $product->id }}">
                                                <button style="display: inline-block" class="btn btn-success submitButton" buttonProdutId="{{ $product->id }}">save</button>
                                            </div>
                                        @endforeach
                                    @endif
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->
@endsection

@section('scripts')
    <script>
        $(document).on("click",".product_button",function (){
            var room = $(this).attr("room_id");
            $(".room_id").val(room);
        });

        $(document).on("click",".submitButton",function (){
            var product_id = $(this).attr("buttonProdutId");
            var productCount = $(".productCount"+product_id).val();
            var room_id = $(".room_id").val();

            $.ajax({
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                type:'POST',
                url:'{{ route('addPackage') }}',
                data:{
                    product_id:product_id,
                    productCount:productCount,
                    room_id:room_id
                },
                success:function(data){
                    console.log(data);
                }
            });
        });

    </script>
@endsection
