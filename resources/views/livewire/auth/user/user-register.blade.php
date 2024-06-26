<div class="container" style="opacity: .9">
    <div class="row justify-content-center">
        <div class="col-xl-10 col-lg-12 col-md-9">
            <div class="card o-hidden border-0 shadow-lg my-5">
                <div class="card-body p-0">
                    <div class="row">
                        <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
                        <div class="col-lg-6">
                            <div class="p-5">
                                <div class="text-center">
                                    <h1 class="h4 text-gray-900 mb-4">{{ __('Register') }}</h1>
                                </div>

                                {{-- @if ($errors->any())
                                    <div class="alert alert-danger border-left-danger" role="alert">
                                        <ul class="pl-4 my-2">
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif --}}

                                <form wire:submit="save" wire:keydown.enter="save" autocomplete="off">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">

                                    <div class="form-group">
                                        <input type="text" class="form-control form-control-user"
                                            wire:model="firstName" placeholder="{{ __('First Name') }}" autofocus>
                                        <div>
                                            @error('firstName')
                                                <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <input type="text" class="form-control form-control-user"
                                            wire:model="lastName" placeholder="{{ __('Last Name') }}">
                                        <div>
                                            @error('lastName')
                                                <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <input type="text" class="form-control form-control-user" wire:model="email"
                                            placeholder="{{ __('E-Mail Address') }}">
                                        <div>
                                            @error('email')
                                                <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <input type="text" class="form-control form-control-user"
                                            wire:model="phoneNumber"
                                            placeholder="{{ __('Phone Number (Ex: +639********* or 09*********)') }}">
                                        <div>
                                            @error('phoneNumber')
                                                <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <select class="form-control" wire:model="userRole">
                                            <option>-- Select type --</option>
                                            @foreach ($user_roles as $role)
                                                <option value="{{ $role->id }}">
                                                    {{ $role->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                        <div>
                                            @error('userRole')
                                                <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <input type="password" class="form-control form-control-user"
                                            wire:model="password" placeholder="{{ __('Password') }}">
                                        <div>
                                            @error('password')
                                                <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <input type="password" class="form-control form-control-user"
                                            wire:model="password_confirmation"
                                            placeholder="{{ __('Confirm Password') }}">
                                        <div>
                                            @error('password_confirmation')
                                                <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div x-data="{ uploading: false, progress: 0 }" x-on:livewire-upload-start="uploading = true"
                                            x-on:livewire-upload-finish="uploading = false"
                                            x-on:livewire-upload-error="uploading = false"
                                            x-on:livewire-upload-progress="progress = $event.detail.progress">
                                            <input type="file" class="form-control form-control-user"
                                                wire:model="profileImage">
                                            <!-- Progress Bar -->
                                            <div x-show="uploading">
                                                <progress max="100" x-bind:value="progress"></progress>
                                            </div>
                                            {{-- <div wire:loading wire:target="profileImage">Uploading...</div> --}}
                                            @if ($profileImage)
                                                <div
                                                    class="container d-flex align-items-center 
                                                justify-content-center my-2">
                                                    <div class="form-control-user"
                                                        style="width: 100px; height: 100px; 
                                                    position: relative; overflow:hidden;">
                                                        <img src="{{ $profileImage->temporaryUrl() }}"
                                                            class="img-thumbnail rounded-circle"
                                                            style="width: 100%; height: 100%; object-fit:cover; 
                                                    position:absolute; top:0; left:0;"
                                                            alt="">
                                                    </div>
                                                </div>
                                            @endif
                                        </div>
                                        <div>
                                            @error('profileImage')
                                                <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <input type="checkbox" wire:model="termsAndCondition">
                                        <a href="/terms-and-conditions" target="_blank">Terms and Conditions</a>
                                        <div>
                                            @error('termsAndCondition')
                                                <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <button type="submit"
                                            class="btn btn-primary btn-user btn-block 
                                        d-flex justify-content-center align-items-center">
                                            <div wire:loading wire:loading.class="opacity-50 disabled"
                                                wire:loading.attr="disabled" wire:target="save"
                                                class="spinner-border mx-2" role="status">
                                                <span class="sr-only mx-2">Loading...</span>
                                            </div>
                                            {{ __('Register') }}
                                        </button>
                                    </div>
                                </form>

                                <hr>

                                <div class="text-center">
                                    <a class="small pointer" wire:click="login" style="cursor: pointer">
                                        {{ __('Already have an account? Login!') }}
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script data-navigate-track>
    function houseTableEvents() {
        Livewire.on('success-register', (event) => {
            const Toast = Swal.mixin({
                toast: true,
                position: "top-end",
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
                didOpen: (toast) => {
                    toast.onmouseenter = Swal.stopTimer;
                    toast.onmouseleave = Swal.resumeTimer;
                }
            });
            Toast.fire({
                icon: "success",
                title: "Register successfully, Check and verify your email"
            }).then(() => {
                @this.dispatch('register-success')
            });
        })
    }

    function listener() {
        houseTableEvents()
    }

    document.addEventListener('livewire:navigated', listener)
    document.addEventListener('livewire:navigating', () => {
        document.removeEventListener('livewire:navigated', listener)
    })
</script>
