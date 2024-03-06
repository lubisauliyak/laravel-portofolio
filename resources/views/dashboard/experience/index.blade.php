@extends('dashboard.layout')

@section('containt')
    <p class="card-title">Pengalaman</p>
    <div class="pb-3"><a href="{{ route('experience.create') }}" class="btn btn-primary">+ Pengalaman</a></div>
    <div class="table-responsive">
        <table class="table table-stripped">
            <thead>
                <tr>
                    <th class="col-1">No</th>
                    <th>Posisi</th>
                    <th>Nama Perusahaan</th>
                    <th>Sejak</th>
                    <th class="col-2">Keterangan</th>
                </tr>
            </thead>
            <tbody>
                <?php $i = 1; ?>
                @foreach ($data as $item)
                    <tr>
                        <td>{{ $i }}</td>
                        <td>{{ $item->title }}</td>
                        <td>{{ $item->info1 }}</td>
                        <td>{{ $item->start_date_id }} - {{ $item->end_date_id }}</td>
                        <td>
                            <a href="{{ route('experience.edit', $item->id) }}" class="btn btn-sm btn-warning">Edit</a>
                            <form onsubmit="return confirm('Yakin untuk menghapus pengalaman yang dipilih dari daftar?')"
                                action="{{ route('experience.destroy', $item->id) }}" method="POST"
                                style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-danger" name="submit" type="submit">Hapus</button>
                            </form>
                        </td>
                    </tr>
                    <?php $i++; ?>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
