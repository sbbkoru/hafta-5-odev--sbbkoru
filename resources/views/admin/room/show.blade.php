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
                                            @forelse ($roomList as $room)
                                            <a href="{{ route('admin.room.prcedit', ['hotel_id' => $room->hotel_id, 'id' => $room->id]) }}"
                                                    class="btn btn-block btn-secondary btn-lg mt-2 ">{{ $room->name }}
                                                    </a>
                                            @empty
                                            @endforelse
                </div>
            </div>
        </div>
</section>
@endsection

