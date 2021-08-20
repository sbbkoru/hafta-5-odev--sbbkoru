<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">{{ $title }}</h3>
                    </div>
                    <form method="post" action="{{ route('admin.location.save') }}">
                        @csrf

                        @if ($location)
                            <input type="hidden" name="id" value="{{ $location->id }}">
                        @endif
                        <input type="hidden" name="zone_id" value="{{ request()->get('zone_id') }}">
                        <div class="card-body">
                            <div class="form-group">
                                <label>Ülke Seçimi</label>
                                <x-status selected="{{ $location->status }}" />
                            </div>
                            <div class="form-group">
                                <label>Lokasyon Adı</label>
                                <input type="text" name="name" class="form-control" value="{{ $location->name }}"
                                    required>
                            </div>
                            <div class="form-group">
                                <label>Lokasyon Kodu</label>
                                <input type="text" name="code" class="form-control" value="{{ $location->code }}">
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
