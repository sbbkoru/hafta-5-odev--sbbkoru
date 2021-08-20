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
                    <form method="post" action="{{ route('admin.room.prcsave' , ['hotel_id' => $room->hotel_id]) }}">
                        @csrf
                        @if ($room)
                            <input type="hidden" name="id" value="{{ $room->id }}">
                        @endif

                        <div class="card-body">

                            <div class="form-group">
                                <label>Adult Price</label>
                                <input type="text" class="form-control" name="adt_prc" value="{{ $room->adt_prc }}"
                                    required>
                            </div>


                            <div class="form-group">
                            <label>Children Price</label>
                                <input type="text" class="form-control" name="kid_prc" value="{{ $room->kid_prc }}"
                                    required>

                            </div>
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
</section>
@endsection
