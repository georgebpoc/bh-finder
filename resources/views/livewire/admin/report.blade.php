<div>
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">{{ __('Reports') }}</h1>

    @if (session('success'))
        <div class="alert alert-success border-left-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    {{-- @if (session('status'))
        <div class="alert alert-success border-left-success" role="alert">
            {{ session('status') }}
        </div>
    @endif --}}

    @if ($showModal)
        <div class="modal fade show" style="display: block;" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">My Modal</h5>
                        <button type="button" class="close" wire:click="toggleModal">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <!-- Your modal content goes here -->
                        <p>This is the content of the modal.</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" wire:click="toggleModal">Close</button>
                        <!-- Additional modal buttons can be added here -->
                    </div>
                </div>
            </div>
        </div>
    @endif

    <div class="row">

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2" wire:click="handleReport('reservation')"
                style="cursor: pointer">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Reservations
                                ({{ now()->format('F') }})
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                {{-- {{ $reservationsCurrenMonth }} --}}
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-calendar fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2" wire:click="handleReport('netProfit')"
                style="cursor: pointer">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Net Profit (Overall)
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                {{-- &#8369;{{ number_format(($houses * $amountPerAccount), 2) }} --}}
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fa-solid fa-money-bill fa-2x text-gray-300"></i>
                            {{-- <i class="fas fa-credit-card"></i> --}}
                            {{-- <i class="fas fa-dollar-sign "></i> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-info shadow h-100 py-2" wire:click="handleReport('housesRooms')"
                style="cursor: pointer">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Houses/Rooms</div>
                            <div class="row no-gutters align-items-center">
                                <div class="col-auto">
                                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">
                                        {{-- {{ $houses }}/{{ $rooms }} --}}
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fa-solid fa-house-lock fa-2x text-gray-300"></i>
                            {{-- <i class="fas fa-clipboard-list "></i> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Users -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-2" wire:click="handleReport('clients')"
                style="cursor: pointer">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">{{ __('Clients') }}
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                {{-- {{ $clients }} --}}
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-users fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Users -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2" wire:click="handleReport('vacantRooms')"
                style="cursor: pointer">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                {{ __('Vacant Rooms') }}
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                {{-- {{ $vacantRooms }} --}}
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fa fa-sign-in fa-2x text-gray-300" aria-hidden="true"></i>
                            {{-- <i class="fas fa-users fa-2x text-gray-300"></i> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2" wire:click="handleReport('occupiedRooms')"
                style="cursor: pointer">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Occupied Rooms
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                {{-- {{ $occupiedRooms }} --}}
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fa-solid fa-money-bill fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2" wire:click="handleReport('occupancyRate')"
                style="cursor: pointer">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Occupancy Rate
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                {{-- {{ number_format(($occupiedRooms / $vacantRooms) * 100, 2) }}% --}}
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fa-solid fa-money-bill fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2" wire:click="handleReport('managements')"
                style="cursor: pointer">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Managements
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                {{-- {{ $managements }} --}}
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fa-solid fa-money-bill fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-6" style="height: 400px;">
            {{-- <livewire:livewire-column-chart :column-chart-model="$reservationRooms" /> --}}
        </div>
        <div class="col-lg-6" style="height: 400px;">

            {{-- <livewire:livewire-column-chart :line-chart-model="$lineChartModel" /> --}}
        </div>
    </div>
</div>

@livewireChartsScripts
