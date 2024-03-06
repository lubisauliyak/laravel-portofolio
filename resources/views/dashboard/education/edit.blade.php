@extends('dashboard.layout')

@section('containt')
    <form action="{{ route('education.update', $data->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="info1" class="form-label">Sekolah :</label>
            <input type="text" class="form-control" name="info1" id="info1" aria-describedby="helpId"
                placeholder="Sekolah atau Universitas" value="{{ $data->info1 }}" />
        </div>
        <div class="mb-3">
            <label for="title" class="form-label">Bidang Studi :</label>
            <input type="text" class="form-control" name="title" id="title" aria-describedby="helpId"
                placeholder="Bidang Studi atau Jurusan" value="{{ $data->title }}" />
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
            <label for="info2" class="form-label">Nilai :</label>
            <input type="text" class="form-control" name="info2" id="info2" aria-describedby="helpId"
                placeholder="Nilai atau IPK" value="{{ $data->info2 }}" />
        </div>
        <div class="mb-3">
            <label for="containt" class="form-label">Deskripsi :</label>
            <textarea class="form-control summernote" name="containt" id="containt" rows="5">{{ $data->containt }}</textarea>
        </div>
        <div class="mb-3">
            <label for="info3" class="form-label">Keahlian :</label>
            <input type="text" class="form-control" name="info3" id="info3" aria-describedby="helpId"
                placeholder="Contoh: Leadership, ..." value="{{ $data->info3 }}" />
        </div>
        <div>
            <a href="{{ route('education.index') }}" class="btn btn-secondary">
                Kembali</a>
            <button class="btn btn-primary" name="submit" type="submit">Simpan</button>
        </div>
    </form>
@endsection
