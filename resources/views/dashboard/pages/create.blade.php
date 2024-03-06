@extends('dashboard.layout')

@section('containt')
    <form action="{{ route('pages.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="title" class="form-label">Judul :</label>
            <input type="text" class="form-control" name="title" id="title" aria-describedby="helpId"
                placeholder="Judul" value="{{ Session::get('title') }}" />

        </div>
        <div class="mb-3">
            <label for="containt" class="form-label">Isi Halaman :</label>
            <textarea class="form-control summernote" name="containt" id="containt" rows="5">{{ Session::get('containt') }}</textarea>
        </div>
        <div>
            <a href="{{ route('pages.index') }}" class="btn btn-secondary">
                Kembali</a>
            <button class="btn btn-primary" name="submit" type="submit">Tambahkan</button>
        </div>
    </form>
@endsection
