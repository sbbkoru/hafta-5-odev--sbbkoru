@extends('admin.layout.default')

@section('title', $title)

@section('breadcrumb')
<li class="breadcrumb-item"><a href="{{ route('admin.hotel') }}">Odalar</a></li>
<li class="breadcrumb-item active">{{ $title }}</li>
@endsection

@section('content')

<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">{{ $title }}</h3>
                    </div>
                    <form method="post" action="{{ route('admin.room.save') }}">
                        @csrf
                        @if ($room)
                            <input type="hidden" name="id" value="{{ $room->id }}">
                        @endif

                        <div class="card-body">

                        <div class="form-group">
                                <label>Choose Your Hotel</label>
                                <x-select class="test" name="hotel_id" selected="{{ $room->hotel_id }}"
                                    :list=$hotel_ />
                            </div>

                            <div class="form-group">
                                <label>Status</label>
                                <input type="text" class="form-control" name="status" value="{{ $room->status }}"
                                    required>
                            </div>

                            <div class="form-group">
                                <label>Room Name</label>
                                <input type="text" class="form-control" name="name" value="{{ $room->name }}"
                                    required>
                            </div>

                            <div class="form-group">
                                <label>Stock</label>
                                <input type="text" class="form-control" name="stock" value="{{ $room->stock }}"
                                    required>
                            </div>

                            <div class="form-group">
                                <label>Adult Number</label>
                                <input type="text" class="form-control" name="adt_cnt"
                                    value="{{ $room->adt_cnt }}" required>
                            </div>

                            <div class="form-group">
                                <label>Children Number</label>
                                <input type="text" class="form-control" name="kid_cnt"
                                    value="{{ $room->kid_cnt }}" required>
                            </div>

                            <div class="input-group mb-3">
                                <input type="text" class="form-control" name="bed" value="{{ $room->bed }}" required>
                                    <div class="input-group-append" >
                                        <span class="input-group-text">Yatak</span>
                                    </div>
                             </div>

                             <div class="form-group">
                                <label>Room Specialities</label>
                                @foreach (App\Models\Room::getSpecR(true) as $key => $value)
                                    <div class="custom-control custom-checkbox">
                                        <input class="custom-control-input" type="checkbox"
                                            id="cbox-info-{{ $key }}" value="{{ $key }}"
                                            name="info_s[{{ $key }}]" @if(in_array($key , $room->info_s)) checked="checked" @endif>
                                        <label for="cbox-info-{{ $key }}" class="custom-control-label">
                                            {{ $value }}
                                        </label>
                                    </div>
                                @endforeach
                            </div>


                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Submit</button>
                            <a href="{{ route('admin.room.delete', ['id' => $room->id]) }}"
                                                class="btn btn-danger">
                                                <i class="fa fa-trash"></i> Delete Room</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
</section>
@endsection
