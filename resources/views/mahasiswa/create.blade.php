<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Data Mahasiswa Sistem Informasi C 2019') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <a href="{{ route('dashboard') }}" class="bg-red-500 hover:bg-red-700 rounded px-3 py-2 text-white">
                Kembali
            </a>
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg mt-5 p-5">
                <form class="w-full" action="{{ route('store') }}" method="POST">
                    @csrf
                    <div class="flex flex-wrap -mx-3 mb-6">
                        <div class="w-full md:w-1/2 px-3 md:mb-0">
                            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">
                                NIM
                            </label>
                            <input
                                class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white"
                                type="text" placeholder="Masukan NIM" name="nim" required>
                        </div>
                        <div class="w-full md:w-1/2 px-3">
                            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">
                                Nama Lengkap
                            </label>
                            <input
                                class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" type="text" placeholder="Masukan nama lengkap" name="name" required>
                        </div>
                    </div>
                    <div class="flex flex-wrap -mx-3 mb-6">
                        <div class="w-full md:w-1/2 px-3">
                            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">
                                Tanggal Lahir
                            </label>
                            <input
                                class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" type="date" name="birth" required>
                        </div>
                        <div class="w-full md:w-1/2 px-3 md:mb-0">
                            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">
                                Jenis Kelamin
                            </label>
                            <div class="relative">
                                <select
                                    class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500" name="gender" required>
                                    <option>Laki-laki</option>
                                    <option>Perempuan</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="w-full">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">
                            Alamat Email
                        </label>
                        <input
                            class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" type="email" name="email" placeholder="Masukan alamat email" required>
                    </div>
                    <div class="flex">
                        <button type="submit" class="w-1/4 py-2 mt-5 mx-auto bg-blue-500 hover:bg-blue-600 rounded text-white">
                            Submit
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>