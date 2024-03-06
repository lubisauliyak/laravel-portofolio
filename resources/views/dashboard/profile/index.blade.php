@extends('dashboard.layout')

@section('containt')
    <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row justify-content-between">
            <div class="col-5">
                <h3>Biodata</h3>
                @if (get_meta_value('_photo'))
                    <img style="max-width:100px; max-height:100px" src="{{ asset('photo') . '/' . get_meta_value('_photo') }}"
                        alt="">
                @endif
                <div class="mb-3">
                    <label for="_photo" class="form-label">Foto Profil :</label>
                    <input type="file" class="form-control form-control-sm" name="_photo" id="_photo">
                </div>
                <div class="mb-3">
                    <label for="_fullname" class="form-label">Nama Lengkap :</label>
                    <input type="text" class="form-control form-control-sm skill" name="_fullname" id="_fullname"
                        aria-describedby="helpId" value="{{ get_meta_value('_fullname') }}" />
                </div>
                <div class="mb-3">
                    <label for="_aboutme" class="form-label">Tentang Saya :</label>
                    <textarea class="form-control summernote" name="_aboutme" id="_aboutme" rows="5">{{ get_meta_value('_aboutme') }}</textarea>
                </div>
                <div class="mb-3">
                    <label for="_city" class="form-label">Kota :</label>
                    <input type="text" class="form-control form-control-sm skill" name="_city" id="_city"
                        aria-describedby="helpId" value="{{ get_meta_value('_city') }}" />
                </div>
                <div class="mb-3">
                    <label for="_region" class="form-label">Provinsi :</label>
                    <input type="text" class="form-control form-control-sm skill" name="_region" id="_region"
                        aria-describedby="helpId" value="{{ get_meta_value('_region') }}" />
                </div>
            </div>
            <div class="col-5">
                <h3>Kontak</h3>
                <div class="mb-3">
                    <label for="_telepon" class="form-label">No HP :</label>
                    <input type="text" class="form-control form-control-sm skill" name="_telepon" id="_telepon"
                        aria-describedby="helpId" placeholder="08xx..." value="{{ get_meta_value('_telepon') }}" />
                </div>
                <div class="mb-3">
                    <label for="_email" class="form-label">Email :</label>
                    <input type="text" class="form-control form-control-sm skill" name="_email" id="_email"
                        aria-describedby="helpId" placeholder="email@gmail.com" value="{{ get_meta_value('_email') }}" />
                </div>
                <h3>Media Sosial</h3>
                <div class="mb-3">
                    <label for="_instagram" class="form-label">Instagram :</label>
                    <input type="text" class="form-control form-control-sm skill" name="_instagram" id="_instagram"
                        aria-describedby="helpId" placeholder="https://www.instagram.com/username"
                        value="{{ get_meta_value('_instagram') }}" />
                </div>
                <div class="mb-3">
                    <label for="_linkedin" class="form-label">LinkedIn :</label>
                    <input type="text" class="form-control form-control-sm skill" name="_linkedin" id="_linkedin"
                        aria-describedby="helpId" placeholder="https://www.linkedin.com/in/username"
                        value="{{ get_meta_value('_linkedin') }}" />
                </div>
                <div class="mb-3">
                    <label for="_github" class="form-label">Github :</label>
                    <input type="text" class="form-control form-control-sm skill" name="_github" id="_github"
                        aria-describedby="helpId" placeholder="https://github.com/username"
                        value="{{ get_meta_value('_github') }}" />
                </div>
            </div>
        </div>

        <div>
            <button class="btn btn-primary" name="submit" type="submit">Simpan</button>
        </div>
    </form>
@endsection
