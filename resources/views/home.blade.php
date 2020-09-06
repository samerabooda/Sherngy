@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@push('js')
<script>
    const messaging = firebase.messaging();
    messaging.usePublicVapidKey("BGhHkgERfsmS_UOmP8FhHT1f0IrzX7qmdTKnqjX3QhFmvid23o2xFpkUZg2B7DFgIsFthQiNS_BbqfjFSdKnBZg");

</script>

    @endpush
