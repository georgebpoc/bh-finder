<div>
    <button wire:click="back" class="btn btn-sm btn-primary mb-3"><i class="fa fa-chevron-left" aria-hidden="true"></i>
        Back</button>

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">{{ __('Boarding House Room Details:') }}</h1>

    <div class="row">
        <div class="col-lg-12 mb-3">
            <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">
                    @foreach ($room->getRoomImages as $key => $image)
                        <div class="carousel-item {{ $key === 0 ? 'active' : '' }}" style="width: 100%; height: 60vh;">
                            <img src="{{ asset('storage/images/' . $image->imageUrl) }}" class="d-block rounded"
                                style="width: 100%; height: 100%; object-fit:cover;" alt="...">
                        </div>
                    @endforeach
                </div>
                <button class="carousel-control-prev" type="button" data-target="#carouselExampleControls"
                    data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-target="#carouselExampleControls"
                    data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </button>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-8">
            <div class="card shadow mb-4">
                <div class="form-row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                Detail
                            </div>
                            <div class="card-body">

                                <div class="d-flex justify-content-between align-items-center">
                                    <a class="nav-link" href="#" id="userDropdown" role="button"
                                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <figure class="img-profile rounded-circle avatar font-weight-bold"
                                            data-initial="">
                                            <img src="{{ asset('storage/images/' . $room->getHouse->getUser->profileImage) }}"
                                                alt="">
                                        </figure>
                                        <span class="mr-2 d-none d-lg-inline text-gray-600 small">Hosted by
                                            {{ $room->getHouse->getUser->firstName }}
                                            {{ $room->getHouse->getUser->lastName }}</span>
                                    </a>

                                    <div class="d-flex flex-column">
                                        <span>
                                            <i class="fa fa-phone" aria-hidden="true"></i>
                                            {{ $room->getHouse->contact }}
                                        </span>
                                        <div class="d-flex">
                                            @foreach ($room->getHouse->getSocialLinks as $social)
                                                <span class="mx-1" style="font-size: 18px;">
                                                    <a href="{{ $social->link }}"
                                                        style="text-decoration: none;
                                                        color: inherit;">
                                                        @if ($social->getSocialMediaType->serial_id === 1)
                                                            <i class="fa-brands fa-facebook"></i>
                                                        @elseif($social->getSocialMediaType->serial_id === 2)
                                                            <i class="fa-brands fa-instagram"></i>
                                                        @elseif($social->getSocialMediaType->serial_id === 3)
                                                            <i class="fa-brands fa-twitter"></i>
                                                        @endif
                                                    </a>
                                                </span>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>


                                <hr>
                                <h6>Nearby Attractions</h6>
                                <ul>
                                    @foreach ($room->getHouse->nearbyAttraction as $attraction)
                                        <li> {{ $attraction->distance }} {{ $attraction->distanceTypes->name }} away
                                            from
                                            {{ $attraction->name }}</li>
                                    @endforeach
                                </ul>
                                <hr>
                                <h6>What this place offers</h6>
                                <ul>
                                    @foreach ($room->amenities as $amenity)
                                        <li>{{ $amenity->name }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-4">
            <div class="card shadow mb-4">
                <div class="card-body">
                    <form wire:submit="save" autocomplete="off">
                        <div class="form-group font-weight-bold">
                            <span>&#8369; {{ number_format($room->monthlyDeposit, 2) }}</span>
                        </div>

                        <hr>

                        <div class="form-row">
                            <div class="col-md-6 mb-3">
                                <label for="validationTooltip01">CHECK-IN</label>
                                <input type="date" wire:model="checkIn" class="form-control">
                                @error('checkIn')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="validationTooltip02">CHECK-OUT(Optional)</label>
                                <input type="date" wire:model="checkOut" class="form-control">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="note">Note</label>
                            <textarea type="text" wire:model="note" class="form-control" id="note" autocomplete="off"></textarea>
                            <div>
                                @error('note')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <hr>

                        <div class="form-group">
                            <label for="address2" class="font-weight-bold">Payment</label>

                            @php
                                $total = $room->monthlyDeposit * 2;
                            @endphp
                            <div class="d-flex justify-content-between">
                                <p>Total Monthly Deposit</p>
                                <span><span>&#8369; {{ number_format($room->monthlyDeposit, 2) }}</span></span>
                            </div>
                            <div class="d-flex justify-content-between">
                                <p>One Month Advance</p>
                                <span><span>&#8369; {{ number_format($room->monthlyDeposit, 2) }}</span></span>
                            </div>
                            <hr>

                            {{-- <div class="d-flex justify-content-between">
                                <p>BH finder fee</p>
                                <span><span>&#8369;{{ number_format(500, 2) }}</span></span>
                            </div> --}}
                            <div class="d-flex justify-content-between">
                                <p>Total</p>
                                <span><span>&#8369;{{ number_format($total, 2) }}</span></span>
                            </div>
                        </div>

                        <hr>

                        <button type="submit" class="my-3 btn btn-danger d-block w-100"
                            {{ in_array($room->id, $reservations) ? 'disabled' : '' }}>
                            <i class="fa fa-book" aria-hidden="true"></i>
                            <span>Reserve</span>
                        </button>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
