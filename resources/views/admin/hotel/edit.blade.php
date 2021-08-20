@extends('admin.layout.default')

@section('title', $title)

@section('breadcrumb')
<li class="breadcrumb-item"><a href="{{ route('admin.hotel') }}">Oteller</a></li>
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
                    <form method="post" action="{{ route('admin.hotel.save') }}">
                        @csrf
                        @if ($hotel)
                            <input type="hidden" name="id" value="{{ $hotel->id }}">
                        @endif

                        <div class="card-body">
                            <div class="form-group">
                                <label>Partner</label>
                                <x-select name="partner_id" selected="{{ $hotel->partner_id }}" :list=$partner_ />
                            </div>

                            <div class="form-group">
                                <label>Lokasyon</label>
                                <x-select name="location_id" selected="{{ $hotel->location_id }}" :list=$location_ />
                            </div>

                            <div class="form-group">
                                <label>Otel Adı</label>
                                <input type="text" class="form-control" name="name" value="{{ $hotel->name }}"
                                    required>
                            </div>

                            <div class="form-group">
                                <label>Adres</label>
                                <textarea class="form-control" rows="3" name="info_s[address]"
                                    placeholder="Otele ait tam adresi">{{ isset($hotel->info_s['address']) ? $hotel->info_s['address'] : null }}</textarea>
                            </div>

                            <div class="form-group">
                                <label>Web Sitesi</label>
                                <input type="text" class="form-control" name="info_s[website]"
                                    value="{{ isset($hotel->info_s['website']) ? $hotel->info_s['website'] : null }}">
                            </div>

                            <div class="form-group">
                                <label>E-posta</label>
                                <input type="text" class="form-control" name="info_s[email]"
                                    value="{{ isset($hotel->info_s['email']) ? $hotel->info_s['email'] : null }}">
                            </div>

                            <div class="form-group">
                                <label>Telefon</label>
                                <input type="text" class="form-control" name="info_s[phone]"
                                    value="{{ isset($hotel->info_s['phone']) ? $hotel->info_s['address'] : null }}">
                            </div>

                            <div class="form-group">
                                <label>Yıldız</label>
                                <input type="number" class="form-control" name="star" value="{{ $hotel->star }}"
                                    required>
                            </div>

                            <div class="form-group">
                                <label>Tesis Özellikleri</label>
                                @foreach (App\Models\Hotel::getSpecR(true) as $key => $value)
                                    <div class="custom-control custom-checkbox">
                                        <input class="custom-control-input" type="checkbox"
                                            id="cbox-spec-{{ $key }}" value="{{ $key }}"
                                            name="spec_x[{{ $key }}]" @if(in_array($key , $hotel->spec_x)) checked="checked" @endif>
                                        <label for="cbox-spec-{{ $key }}" class="custom-control-label">
                                            {{ $value }}
                                        </label>
                                    </div>
                                @endforeach
                            </div>

                            <div class="form-group">
                                <label>Pansiyon Tipleri</label>
                                @foreach (App\Models\Hotel::getBoardR(true) as $key => $value)
                                    <div class="custom-control custom-checkbox">
                                        <input class="custom-control-input" type="checkbox"
                                            id="cbox-board-{{ $key }}" value="{{ $key }}"
                                            name="board_x[{{ $key }}]" @if(in_array($key , $hotel->board_x)) checked="checked" @endif>
                                        <label for="cbox-board-{{ $key }}" class="custom-control-label">
                                            {{ $value }}
                                        </label>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Gönder</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
</section>
@endsection
