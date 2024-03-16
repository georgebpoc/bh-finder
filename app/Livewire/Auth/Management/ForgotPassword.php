<?php

namespace App\Livewire\Auth\Management;

use App\Mail\ResetPassword;
use App\Models\User;
use Error;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Rule;
use Livewire\Component;
use Illuminate\Support\Str;

class ForgotPassword extends Component
{
    #[Rule('required')]
    public $email;

    public function forgotPasswordEmail()
    {
        DB::beginTransaction();

        try {
            $validated = $this->validate();

            // Check if the email exists
            $userExists = User::where('email', $validated['email'])->first();

            if (!$userExists) {
                $this->addError('email', 'Email does not exists');
                return;
            }

            $token = Str::random(64);

            // Insert the token in the password_Reset

            DB::table('password_reset_tokens')
                ->insert([
                    'email' => $validated['email'],
                    'token' => $token
                ]);

            Mail::to($validated['email'])
                ->send(new ResetPassword(env('APP_URL') . '/management/reset-password/' . $token, $userExists->firstName));

            DB::commit();

            session()->flash('status', 'Email successfully send.');

            $this->redirect('/management/forgot-password');
        } catch (\Throwable $th) {
            DB::rollBack();
            throw new Error($th->getMessage());
        }
    }

    public function managementLogin()
    {
        return $this->redirect('/management/login', navigate: true);
    }

    #[Layout('components.layouts.managementGuest')]
    public function render()
    {
        return view('livewire.auth.management.forgot-password');
    }
}
