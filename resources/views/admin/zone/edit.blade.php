<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">{{ $title }}</h3>
                    </div>
                    <form method="post" action="{{ route('admin.zone.save') }}">
                        @csrf

                        @if ($zone)
                            <input type="hidden" name="id" value="{{ $zone->id }}">
                        @endif

                        <div class="card-body">
                            <div class="form-group">
                                <label>Ülke Seçimi</label>
                                <x-select class="test" name="country_id" selected="{{ $zone->country_id }}"
                                    :list=$country_ />
                            </div>
                            <div class="form-group">
                                <label>Bölge Adı</label>
                                <input type="text" name="name" class="form-control" value="{{ $zone->name }}"
                                    required>
                            </div>
                            <div class="form-group">
                                <label>Bölge Kodu</label>
                                <input type="text" name="code" class="form-control" value="{{ $zone->code }}">
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
