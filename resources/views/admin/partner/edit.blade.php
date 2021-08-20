@extends('admin.layout.default')

@section('title', $title)

@section('breadcrumb')
<li class="breadcrumb-item"><a href="{{ route('admin.partner') }}">Partnerler</a></li>
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
                    <form method="post" action="{{ route('admin.partner.save') }}">
                        @csrf
                        @if ($partner)
                            <input type="hidden" name="id" value="{{ $partner->id }}">
                        @endif

                        <div class="card-body">
                            <div class="form-group">
                                <label>Partner Adı</label>
                                <input type="text" name="name" class="form-control" value="{{ $partner->name }}"
                                    required>
                            </div>
                            <div class="form-group">
                                <label>Yetkili Adı</label>
                                <input type="text" name="cname" class="form-control" value="{{ $partner->cname }}"
                                    required>
                            </div>
                            <div class="form-group">
                                <label>Yetkili Telefon</label>
                                <input type="text" name="mpno" class="form-control" value="{{ $partner->mpno }}">
                            </div>
                            <div class="form-group">
                                <label>Yetkili E-posta</label>
                                <input type="text" name="email" class="form-control" value="{{ $partner->email }}">
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
