<x-admin-layout>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-8 lg:px-8 flex">
            <div class="bg-cyan overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    Total Services <br>
                   {{$totalServices}}
                </div>
            </div>
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    Total Appointments <br>
                   {{$totalAppointments}}
                </div>
            </div>
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    Total Users <br>
                   {{$totalUsers}}
                </div>
            </div>
        </div>
    </div>
</x-admin-layout>
