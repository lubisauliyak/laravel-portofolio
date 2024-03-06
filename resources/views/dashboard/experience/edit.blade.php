@extends('dashboard.layout')

@section('containt')
    <form action="{{ route('experience.update', $data->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="title" class="form-label">Posisi :</label>
            <input type="text" class="form-control" name="title" id="title" aria-describedby="helpId"
                placeholder="Posisi" value="{{ $data->title }}" />

        </div>
        <div class="mb-3">
            <label for="info1" class="form-label">Perusahaan :</label>
            <input type="text" class="form-control" name="info1" id="info1" aria-describedby="helpId"
                placeholder="Nama Perusahaan" value="{{ $data->info1 }}" />
        </div>
        <div class="mb-3">
            <div class="row">
                <div class="col-auto">Tanggal Mulai :</div>
                <div class="col-auto"><input type="date" class="form-control form-control-sm" name="start_date"
                        placeholder="dd/mm/yyyy" value="{{ $data->start_date }}"></div>
                <div class="col-auto"></div>
                <div class="col-auto">Tanggal Selesai :</div>
                <div class="col-auto"><input type="date" class="form-control form-control-sm" name="end_date"
                        placeholder="dd/mm/yyyy" value="{{ $data->end_date }}"></div>
            </div>
        </div>
        <div class="mb-3">
            <label for="containt" class="form-label">Deskripsi :</label>
            <textarea class="form-control summernote" name="containt" id="containt" rows="5">{{ $data->containt }}</textarea>
        </div>
        <div class="mb-3">
            <label for="info3" class="form-label">Keahlian :</label>
            <input type="text" class="form-control" name="info3" id="info3" aria-describedby="helpId"
                placeholder="Contoh: Negosiasi, ..." value="{{ $data->info3 }}" />
        </div>
        <div>
            <a href="{{ route('experience.index') }}" class="btn btn-secondary">
                Kembali</a>
            <button class="btn btn-primary" name="submit" type="submit">Simpan</button>
        </div>
    </form>
@endsection
