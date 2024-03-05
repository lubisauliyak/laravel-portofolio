@extends('dashboard.layout')

@section('containt')
    <p class="card-title">Recent Purchases</p>
    <div class="pb-3"><a href="{{ route('pages.create') }}" class="btn btn-primary">+ Tambah Halaman</a></div>
    <div class="table-responsive">
        <table class="table table-stripped">
            <thead>
                <tr>
                    <th class="col-1">No</th>
                    <th>Judul</th>
                    <th class="col-2">Keterangan</th>
                </tr>
            </thead>
            <tbody>
                <?php $i = 1; ?>
                @foreach ($data as $item)
                    <tr>
                        <td>{{ $i }}</td>
                        <td>{{ $item->title }}</td>
                        <td>
                            <a href="{{ route('pages.edit', $item->id) }}" class="btn btn-sm btn-warning">Edit</a>
                            <form onsubmit="return confirm('Yakin untuk menghapus data ini?')"
                                action="{{ route('pages.destroy', $item->id) }}" method="POST" style="display: inline;">
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
