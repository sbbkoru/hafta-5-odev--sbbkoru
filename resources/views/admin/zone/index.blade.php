@extends('admin.layout.default')

@section('title', $title)
@section('content-class', 'kanban')

@section('breadcrumb')
<li class="breadcrumb-item active">{{ $title }}</li>
@endsection


@section('content')
<section class="content pb-3">
<div class="container-fluid h-100">
    <div class="card card-row card-secondary">
        <div class="card-header">
            <h3 class="card-title">
                Ülkeler
            </h3>
        </div>
        <div class="card-body">
            @foreach ($country_ as $id => $name)
                <div class="card card-primary card-outline">
                    <div class="card-header">
                        <h5 class="card-title">{{ $name }}</h5>
                        <div class="card-tools">
                            <a href="#" class="btn btn-tool btn-link">#{{ $id }}</a>
                            <a href="{{ route('admin.zone', ['country_id' => $id]) }}" class="btn btn-tool">
                                <i class="fas fa-eye"></i>
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    @if (request()->get('country_id'))
        <div class="card card-row card-primary">
            <div class="card-header">
                <h3 class="card-title">
                    Bölgeler
                </h3>
                <div class="card-tools">
                    <a href="{{ route('admin.zone.edit') }}" class="btn btn-tool j-modal">
                        <i class="fas fa-plus"></i>
                    </a>
                </div>
            </div>
            <div class="card-body">
                @foreach ($zoneCursor as $zone)
                    <div class="card card-primary card-outline">
                        <div class="card-header">
                            <h5 class="card-title"><a
                                    href="{{ route('admin.zone', ['country_id' => $zone->country_id, 'zone_id' => $zone->id]) }}">{{ $zone->name }}</a>
                            </h5>
                            <div class="card-tools">

                                <a href="{{ route('admin.zone.edit', ['zone_id' => $zone->id]) }}"
                                    class="btn btn-tool j-modal">
                                    <i class="fas fa-pen"></i>
                                </a>
                                <a href="{{ route('admin.zone.delete', ['zone_id' => $zone->id]) }}"
                                    class="btn btn-tool" onclick="return areYouSureDelete()">
                                    <i class="fas fa-trash"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    @endif

    @if (request()->get('zone_id'))
        <div class="card card-row card-default">
            <div class="card-header bg-info">
                <h3 class="card-title">
                    Lokasyonlar
                </h3>
                <div class="card-tools">
                    <a href="{{ route('admin.location.edit' , ['zone_id' => request()->get('zone_id')]) }}" class="btn btn-tool j-modal">
                        <i class="fas fa-plus" style="color:#fff"></i>
                    </a>
                </div>
            </div>
            <div class="card-body">
                @foreach ($locationCursor as $location)
                    <div class="card card-primary card-outline">
                        <div class="card-header">
                            <h5 class="card-title">{{ $location->name }} </h5>
                            <div class="card-tools">
                                <a href="{{ route('admin.location.edit', ['location_id' => $location->id,'zone_id' => request()->get('zone_id')]) }}"
                                    class="btn btn-tool j-modal">
                                    <i class="fas fa-pen"></i>
                                </a>
                                <a href="{{ route('admin.location.delete', ['location_id' => $location->id]) }}"
                                    class="btn btn-tool" onclick="return areYouSureDelete()">
                                    <i class="fas fa-trash"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    @endif
</div>
</section>
@endsection
