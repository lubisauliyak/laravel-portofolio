@extends('dashboard.layout')

@section('containt')
    <form action="{{ route('skill.update') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="_tools" class="form-label">Bahasa Pemrograman dan Tools :</label>
            <input type="text" class="form-control form-control-sm skill" name="_tools" id="_tools"
                aria-describedby="helpId" value="{{ get_meta_value('_tools') }}" />

        </div>
        <div class="mb-3">
            <label for="_desc" class="form-label">Deskripsi :</label>
            <textarea class="form-control summernote" name="_desc" id="_desc" rows="5">{{ get_meta_value('_desc') }}</textarea>
        </div>
        <div>
            <a href="{{ route('skill.index') }}" class="btn btn-secondary">
                Kembali</a>
            <button class="btn btn-primary" name="submit" type="submit">Simpan</button>
        </div>
    </form>
@endsection

@push('child-scripts')
    <script>
        $(document).ready(function() {
            $('.skill').tokenfield({
                autocomplete: {
                    source: [{!! $skill !!}],
                    delay: 100
                },
                showAutocompleteOnFocus: true
            });
        });
    </script>
@endpush
