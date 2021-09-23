<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Data Mahasiswa Sistem Informasi C 2019') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            @if(session()->has('success'))
                <div class="bg-green-500 rounded p-5 mb-5 text-white text-center font-semibold">
                    <h2>{{ session('success') }}</h2>
                </div>
            @endif
            
            @if(session()->has('failed'))
                <div class="bg-red-500 rounded p-5 mb-5 text-white text-center font-semibold">
                    <h2>{{ session('failed') }}</h2>
                </div>
            @endif

            <a href="{{ route('create') }}" class="bg-blue-500 hover:bg-blue-700 rounded px-3 py-2 text-white">
                Tambah Mahasiswa
            </a>
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg mt-5">
                <table class="table-auto">
                    <thead>
                      <tr>
                        <th class="p-4 text-left">No.</th>
                        <th class="p-4 text-left">NIM</th>
                        <th class="p-4 text-left w-2/12">Nama</th>
                        <th class="p-4 text-left w-2/12">Email</th>
                        <th class="p-4 text-left">Jenis Kelamin</th>
                        <th class="p-4 text-left">Tanggal Lahir</th>
                        <th class="p-4 text-left w-2/12">Aksi</th>
                      </tr>
                    </thead>
                    <tbody id="tbody-mahasiswa">
                        @forelse ($mahasiswas as $mahasiswa)
                        <tr>
                            <td class="p-4 text-left">{{ $loop->iteration }}</td>
                            <td class="p-4 text-left">{{ $mahasiswa->nim }}</td>
                            <td class="p-4 text-left">{{ $mahasiswa->name }}</td>
                            <td class="p-4 text-left">{{ $mahasiswa->email }}</td>
                            <td class="p-4 text-left">{{ $mahasiswa->gender }}</td>
                            <td class="p-4 text-left">{{ \Carbon\Carbon::parse($mahasiswa->birth)->format('d M Y') }}</td>
                            <td class="p-4 text-left flex">
                                <a href="{{ route('edit', $mahasiswa->id) }}" class="mr-2 px-3 py-1 transition bg-green-500 hover:bg-green-700 rounded text-white">
                                    Edit
                                </a>
                                <form action="{{ route('delete', $mahasiswa->id) }}" method="POST" class="flex">
                                    @csrf
                                    @method('DELETE')
                                    <button type="button" class="ml-2 px-3 py-1 transition bg-red-500 hover:bg-red-700 rounded text-white" onclick="deleteMahasiswa(this)">
                                        Hapus
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="7">
                                <h1 class="text-center mb-5 text-gray-600">
                                    Belum ada data
                                </h1>
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                  </table>
            </div>
        </div>
    </div>

    @push('javascript')
        <script type="text/javascript">
            function deleteMahasiswa(element) {
                let confirmDelete = confirm('Konfirmasi hapus data ?');
                if (confirmDelete) { 
                    element.parentElement.submit();
                } else {
                    console.log('batal')
                }
            }
        </script>
    @endpush
</x-app-layout>
