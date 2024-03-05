@extends('dashboard.layout')

@section('containt')
    <form action="{{ route('pages.update', $data->id) }}" method="POST">
        @csrf
        @method('put')
        <div class="mb-3">
            <label for="title" class="form-label">Judul :</label>
            <input type="text" class="form-control" name="title" id="title" aria-describedby="helpId"
                placeholder="Judul" value="{{ $data->title }}" />

        </div>
        <div class="mb-3">
            <label for="containt" class="form-label">Isi :</label>
            <textarea class="form-control summernote" name="containt" id="containt" rows="5">{{ $data->containt }}</textarea>
        </div>
        <div>
            <a href="{{ route('pages.index') }}" class="btn btn-secondary">
                Kembali</a>
            <button class="btn btn-primary" name="submit" type="submit">Simpan</button>
        </div>
    </form>
@endsection
