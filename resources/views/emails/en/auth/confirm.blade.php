Welcome {{ $user->name }}
Open the following Url to confirm your registration: {{ \Illuminate\Support\Facades\URL::route('users.confirm', $user->confirm_code) }}
