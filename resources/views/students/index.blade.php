<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Students') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8 space-y-2">
            <x-card>
                <form action="{{ route('students.store') }}" method="POST">
                    @csrf
                    <div class="grid grid-cols-2 gap-2 my-2">
                        <x-text-input type="text" name="lastname" placeholder="Last Name" autocomplete="off"
                            autofocus />
                        <x-text-input type="text" name="firstname" placeholder="First Name" autocomplete="off" />
                        <x-text-input type="text" name="middlename" placeholder="Middle Name" autocomplete="off" />
                        <x-text-input type="text" name="rfid" placeholder="RFID" autocomplete="off" />
                    </div>
                    <div class="flex justify-end my-2">
                        <x-primary-button type="submit">Add Student</x-primary-button>
                    </div>
                </form>
            </x-card>
            <x-card>
                <table class="w-full table-auto text-left">
                    <thead class="uppercase bg-gray-50">
                        <tr>
                            <th>
                                Name
                            </th>
                            <th>
                                RFID
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($students as $student)
                            <tr>
                                <td>
                                    {{ $student->full_name }}
                                </td>
                                <td>
                                    {{ $student->rfid }}
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </x-card>
        </div>
    </div>
</x-app-layout>
