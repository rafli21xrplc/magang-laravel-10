<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
        integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <title>Employee</title>
</head>

<body>


    <button data-drawer-target="default-sidebar" data-drawer-toggle="default-sidebar" aria-controls="default-sidebar"
        type="button"
        class="inline-flex items-center p-2 mt-2 ms-3 text-sm text-gray-500 rounded-lg sm:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600">
        <span class="sr-only">Open sidebar</span>
        <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20"
            xmlns="http://www.w3.org/2000/svg">
            <path clip-rule="evenodd" fill-rule="evenodd"
                d="M2 4.75A.75.75 0 012.75 4h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 4.75zm0 10.5a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5a.75.75 0 01-.75-.75zM2 10a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 10z">
            </path>
        </svg>
    </button>

    <aside id="default-sidebar"
        class="fixed top-0 left-0 z-40 w-64 h-screen transition-transform -translate-x-full sm:translate-x-0"
        aria-label="Sidebar">
        <div class="h-full px-3 py-4 overflow-y-auto bg-gray-50 dark:bg-gray-800">
            <ul class="space-y-2 font-medium">
                <li>
                    <a href="{{ route('employee.index') }}"
                        class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                        <svg class="w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white"
                            aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                            viewBox="0 0 22 21">
                            <path
                                d="M16.975 11H10V4.025a1 1 0 0 0-1.066-.998 8.5 8.5 0 1 0 9.039 9.039.999.999 0 0 0-1-1.066h.002Z" />
                            <path
                                d="M12.5 0c-.157 0-.311.01-.565.027A1 1 0 0 0 11 1.02V10h8.975a1 1 0 0 0 1-.935c.013-.188.028-.374.028-.565A8.51 8.51 0 0 0 12.5 0Z" />
                        </svg>
                        <span class="ms-3 font-poppins">Dashboard</span>
                    </a>
                </li>

            </ul>
        </div>
    </aside>

    <div class="p-4 sm:ml-64">

        @if (session('success'))
            <x-alert-success-component :success="session('success')" />
        @endif

        @if (session('error'))
            <x-alert-error-component :error="session('error')" />
        @endif

        @if ($errors->any())
            <x-alert-validation-component :errors="$errors" />
        @endif


        <div class="w-full flex justify-between items-center mb-3 mt-1 pl-3 ">
            <div>
                <h3 class="text-lg font-semibold text-slate-800 font-poppins">Projects with Invoices</h3>
                <p class="text-slate-500 font-poppins">Overview of the current activities.</p>
            </div>
            <div class="ml-3">
                <div class="w-full max-w-sm min-w-[200px] relative">
                    <div class="relative flex justify-end">
                        <button data-modal-target="add-modal" data-modal-toggle="add-modal"
                            class="font-poppins block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                            type="button">
                            Add
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <div class="p-4 ">
            <div class="grid grid-cols-1 gap-4">
                <div class="">
                    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                            <thead
                                class="font-poppins text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                <tr>
                                    <th scope="col" class="px-6 py-3">
                                        NO
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Username
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Positon
                                    </th>
                                    <th scope="col" class="px-6 py-3 text-center">
                                        Action
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($employee as $i => $val)
                                    <tr
                                        class="font-poppins odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                                        <th scope="row"
                                            class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                            {{ $i + 1 }}
                                        </th>
                                        <td class="px-6 py-4 font-poppins">
                                            {{ $val->name }}
                                        </td>
                                        </td>
                                        <td class="px-6 py-4 font-poppins">
                                            {{ $val->position }}
                                        </td>
                                        <td class="px-6 py-4 ">
                                            <div class="flex justify-center gap-2 text-center font-poppins">
                                                <button data-id="{{ $val->id }}" data-name="{{ $val->name }}"
                                                    data-position="{{ $val->position }}"
                                                    class="font-medium text-yellow-600 dark:text-yellow-500 hover:underline btn-update">Edit</button>
                                                <button data-id="{{ $val->id }}"
                                                    class="font-medium text-red-600 dark:text-red-500 hover:underline btn-delete">Delete</button>
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="4" class="p-4 text-center">
                                            <img src="{{ asset('no_data.svg') }}" alt="No Data" class="mx-auto w-32">
                                            <p class="text-sm text-slate-500 mt-4 font-poppins">No data available</p>
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <div id="add-modal" tabindex="-1" aria-hidden="true"
        class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative p-4 w-full max-w-2xl max-h-full">
            <!-- Modal content -->
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                <!-- Modal header -->
                <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                    <h3 class="font-poppins text-xl font-semibold text-gray-900 dark:text-white">
                        Add Employee
                    </h3>
                    <button type="button"
                        class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                        data-modal-hide="add-modal">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                </div>
                <!-- Modal body -->
                <div class="py-4">
                    <form class="max-w-lg mx-auto" method="POST" action="{{ route('employee.store') }}">
                        @csrf
                        @method('POST')
                        <div class="mb-5">
                            <label for="name"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white font-poppins">Your
                                Name</label>
                            <input type="text" id="name" name="name"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white  dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="mahardika" required />
                        </div>
                        <div class="mb-5">
                            <label for="position"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white font-poppins">Your
                                Position</label>
                            <input type="position" id="position" name="position"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="CTO" required />
                        </div>
                        <div class="flex justify-end">
                            <button type="submit"
                                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
                        </div>
                    </form>

                </div>

            </div>
        </div>
    </div>

    <div id="update-modal" tabindex="-1" aria-hidden="true"
        class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative p-4 w-full max-w-2xl max-h-full">
            <div class="relative bg-white rounded-lg shadow">
                <div class="flex items-center justify-between p-4 border-b rounded-t">
                    <h3 class="text-xl font-semibold text-gray-900">Update Employee</h3>
                    <button type="button" id="close-modal"
                        class="text-gray-400 hover:bg-gray-200 rounded-lg w-8 h-8">
                        &times;
                    </button>
                </div>
                <div class="py-4">
                    <form class="max-w-lg mx-auto" id="updateForm" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="mb-5">
                            <label for="update-name"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white font-poppins">Your
                                Name</label>
                            <input type="text" id="update-name" name="name"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="mahardika" required />
                        </div>
                        <div class="mb-5">
                            <label for="update-position"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white font-poppins">Your
                                Position</label>
                            <input type="position" id="update-position" name="position"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="CTO" required />
                        </div>
                        <div class="flex justify-end">
                            <button type="submit"
                                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>

    <x-ask-delete-component />

    <script>
        $(document).ready(function() {
            $('.btn-update').click(function() {
                // Ambil data dari tombol
                var employee = $(this).data('id');
                var name = $(this).data('name');
                var position = $(this).data('position');

                // Set action URL untuk form
                var actionUrl = `employee/${employee}`;
                $('#updateForm').attr('action', actionUrl);

                // Isi nilai ke dalam modal input
                $('#update-name').val(name);
                $('#update-position').val(position);

                // Tampilkan modal
                $('#update-modal').removeClass('hidden').addClass('flex');
            });

            // Close modal
            $('#close-modal').click(function() {
                $('#update-modal').addClass('hidden').removeClass('flex');
            });
        });
    </script>

    <script>
        $(document).ready(function() {
            $('.btn-delete').click(function() {
                var id = $(this).data('id');

                var actionUrl = `employee/${id}`;
                $('#form-delete').attr('action', actionUrl);

                $('#delete-modal').removeClass('hidden').addClass('flex');
            });

            $('#close-modal, #cancel-delete').click(function() {
                $('#delete-modal').addClass('hidden').removeClass('flex');
            });
        });
    </script>
</body>

</html>
