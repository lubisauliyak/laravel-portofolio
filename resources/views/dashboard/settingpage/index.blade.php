@extends('dashboard.layout')

@section('containt')
    <form action="{{ route('settingpage.update') }}" method="POST">
        @csrf
        <div class="form-group row">
            <label class="col-sm-2">Tentang</label>
            <div class="col-sm-6">
                <select class="form-control form-control-sm" name="_aboutpage" id="_aboutpage">
                    <option value="">Pilih</option>
                    @foreach ($pagedata as $item)
                        <option value="{{ $item->id }}"
                            {{ get_meta_value('_aboutpage') == $item->id ? 'selected' : '' }}>
                            {{ $item->title }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-2">Ketertarikan</label>
            <div class="col-sm-6">
                <select class="form-control form-control-sm" name="_interestpage" id="_interestpage">
                    <option value="">Pilih</option>
                    @foreach ($pagedata as $item)
                        <option value="{{ $item->id }}"
                            {{ get_meta_value('_interestpage') == $item->id ? 'selected' : '' }}>
                            {{ $item->title }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-2">Pelatihan dan Sertifikat</label>
            <div class="col-sm-6">
                <select class="form-control form-control-sm" name="_certificationpage" id="_certificationpage">
                    <option value="">Pilih</option>
                    @foreach ($pagedata as $item)
                        <option value="{{ $item->id }}"
                            {{ get_meta_value('_certificationpage') == $item->id ? 'selected' : '' }}>
                            {{ $item->title }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div>
            <button class="btn btn-primary" name="submit" type="submit">Simpan</button>
        </div>
    </form>
@endsection
