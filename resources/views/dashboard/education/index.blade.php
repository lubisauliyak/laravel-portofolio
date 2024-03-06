@extends('dashboard.layout')

@section('containt')
    <p class="card-title">Pendidikan</p>
    <div class="pb-3"><a href="{{ route('education.create') }}" class="btn btn-primary">+ Pendidikan</a></div>
    <div class="table-responsive">
        <table class="table table-stripped">
            <thead>
                <tr>
                    <th class="col-1">No</th>
                    <th>Sekolah</th>
                    <th>Bidang Studi</th>
                    <th>Sejak</th>
                    <th>Nilai</th>
                    <th class="col-2">Keterangan</th>
                </tr>
            </thead>
            <tbody>
                <?php $i = 1; ?>
                @foreach ($data as $item)
                    <tr>
                        <td>{{ $i }}</td>
                        <td>{{ $item->info1 }}</td>
                        <td>{{ $item->title }}</td>
                        <td>{{ $item->start_date_id }} - {{ $item->end_date_id }}</td>
                        <td>{{ $item->info2 }}</td>
                        <td>
                            <a href="{{ route('education.edit', $item->id) }}" class="btn btn-sm btn-warning">Edit</a>
                            <form onsubmit="return confirm('Yakin untuk menghapus pendidikan yang dipilih dari daftar?')"
                                action="{{ route('education.destroy', $item->id) }}" method="POST"
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
