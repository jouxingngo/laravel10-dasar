@extends('layouts.main')
@section('title', 'Student Create')
@push('style')
@endpush
@push('script')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.min.js"></script>
<!-- Tambahkan ini di bagian bawah halaman (sebelum </body>) -->
<script>
    $(document).ready(function() {
        // Mengaktifkan Select2 pada elemen select dengan id 'teacher'
        $('#teacher').select2({
            placeholder: "Pilih Guru", // Placeholder jika tidak ada pilihan yang dipilih
           // Menambahkan opsi untuk menghapus pilihan
        });
    });
</script>
@endpush
@section('content')
    <div class=" mt-4 mx-auto col-8">
            <form action="{{ route('classes.store') }}" method="post">
                @csrf
                <div class="mb-3">
                    <label class="form-label" for="name">Name :</label>
                    <input type="text" class="form-control" id="name" name="name">
                </div>
                
                <div class="mb-3">
                    <label class="form-label" for="teacher">Teacher :</label>
                    <select class="form-control" name="teacher_id" id="teacher">
                        <option selected disabled>-- Pilih --</option>
                        @forelse ($teachers as $teacher)
                            <option value="{{ $teacher->id }}">
                                {{ $teacher->name }} - {{ $teacher->id }}
                            </option>
                        @empty
                            <option disabled>Tidak ada data guru</option>
                        @endforelse
                    </select>
                </div>
                
                
                <div class="mb-3">
                    <button type="submit" class="btn btn-success">Save</button>
                </div>
                

            </form>
        </div>

@endsection
