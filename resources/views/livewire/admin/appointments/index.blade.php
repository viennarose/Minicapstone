<div>
    <div>
    <div class="row">
        @include('livewire.admin.appointments.create')
        @include('livewire.admin.appointments.edit')
        @include('livewire.admin.appointments.delete')
        <div class="col-md-12">
            @if (session()->has('message'))
                <h5 class="alert alert-sucess text-success">{{ session('message') }}</h5>
            @endif
        </div>
    </div>
    <div>

    {{-- <div class="flex flex-col">
        <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
          <div class="py-2 inline-block min-w-full sm:px-6 lg:px-8">
            <div class="overflow-hidden">
              <table class="min-w-full">
                <thead class="bg-white border-b">
                  <tr>
                    <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                        ID
                    </th>
                    <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                        Name
                    </th>
                    <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                        Email
                    </th>
                    <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                        Service
                    </th>
                    <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                        Contact
                    </th>
                    <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                        Schedule
                    </th>
                    <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                        Reference Code
                    </th>
                    <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                        Actions
                    </th>
                  </tr>
                </thead>
                <tbody>
                    @forelse ($appointments as $appointment)
                  <tr class="bg-white border-b transition duration-300 ease-in-out hover:bg-gray-100">
                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">1</td>
                    <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                        {{ $appointment->id }}
                    </td>
                    <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                        {{ $appointment->firstName}} {{$appointment->lastName }}
                    </td>
                    <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                        {{ $appointment->email }}
                    </td>
                    <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                        {{ $appointment->service->service_type}}
                    </td>
                    <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                        {{ $appointment->contact }}
                    </td>
                    <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                        {{ \Carbon\Carbon::parse($appointment->schedule)->format('M j, Y h:i a')}}
                    </td>
                    <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                        {{ $appointment->refNum }}
                    </td>
                    <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                       Edit
                    </td>
                  </tr>

                  @empty
                      <tr>
                          <td colspan="5">No Record Found</td>
                      </tr>

                  @endforelse
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div> --}}

    <div class="card" style="height: 500px; width: 950px; margin-left:40px; margin-top:50px">
        @csrf
        <div class="card-header bg-info d-flex">
            <h3 class="text-center fw-bold mt-3" style="font-family: Fantasy;">Current Appointments</h3>
            <a data-bs-toggle="modal" data-bs-target="#appointmentModal" class="ms-auto mt-3">
                <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-plus-circle" viewBox="0 0 16 16">
                    <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                    <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
                </svg>
            </a>
        </div>
        <div class="d-flex mt-3 justify-content-between input-group">
            <div class="col-md-3 mt-3 ms-5">
                <select class="form-select mt-1" name="services_id" wire:model="service">
                    <option value="all">All Services</option>
                    @foreach($services as $service)
                        <option value="{{$service->id}}">{{$service->service_type}}</option>
                    @endforeach
                </select>
            </div>
            {{-- <div class="col-md-2">
                <label class="ms-3">From:</label>
                <input type="date" wire:model="fromDate" class="form-control">
            </div>
            <div class="col-md-2">
                <label class="ms-3">To:</label>
                <input type="date" wire:model="toDate" class="form-control">
            </div> --}}
            <div class="col-md-4 d-flex form-group mt-3 me-3 border">
            <input type="search" wire:model="search" class="form-control" placeholder="Search..." />
            </div>
        </div>
        <div class="card-body table-responsive">
            <table id="example1" class="table table-borderd table-sm table-hover">
                <thead class="text-center table-dark">
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Service</th>
                        <th>Contact</th>
                        <th>Schedule</th>
                        <th>Reference Code</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    {{-- @if($schedule == \Carbon\Carbon::now()->addDays(1)) --}}
                    @forelse ($appointments as $appointment)
                        {{-- @if($appointment->schedule >= \Carbon\Carbon::now() ) --}}
                        <tr>
                            <td class="fw-light">{{ $appointment->id }}</td>
                            <td class="fw-light">{{ $appointment->firstName}} {{$appointment->lastName }}</td>
                            <td class="fw-light">{{ $appointment->email }}</td>
                            <td class="fw-light">{{ $appointment->service->service_type}}</td>
                            <td class="fw-light">{{ $appointment->contact }}</td>
                            <td class="fw-light">{{ \Carbon\Carbon::parse($appointment->schedule)->format('M j, Y h:i a')}}</td>
                            <td class="fw-light">{{ $appointment->refNum }}</td>
                            <td>
                                <a type="button" data-bs-toggle="modal" data-bs-target="#updateAppointmentModal" wire:click="editAppointment({{$appointment->id}})">
                                    <i class="bi bi-pencil-square" style="color:rgb(0, 81, 255);"></i>
                                </a>
                                <a type="button" data-bs-toggle="modal" data-bs-target="#deleteAppointmentModal" wire:click="deleteAppointment({{$appointment->id}})">
                                    <i class="bi bi-trash3" style="color:red;"></i>
                                </a>

                                {{-- <button wire:click="export">
                                    Download File
                                </button> --}}
                            </td>
                        </tr>
                        {{-- @endif --}}
                    @empty
                        <tr>
                            <td colspan="5">No Record Found</td>
                        </tr>

                    @endforelse

                </tbody>
            </table>
            <div>
                {{ $appointments->links() }}
            </div>
        </div>
    </div>
    </div>
</div>
