@extends('layouts.auth')

@section('content')
<div id="suggest">
    <h1 class="h2 fw-bold text-shadow">Input your NIM or lecturer code</h1>
</div>
<div id="code-container" class="blur">
    <form action="{{ route('login') }}" method="post" id="validate-form" name="validateform" class="px-sm-5 pt-3 pb-4">
        @csrf
        <input type="text" name="nim" id="code" value="{{ old('nim') }}" placeholder="e.g. 2400000000, D100">
        @if (session('message'))
            <p class="pt-2 mb-0">
                {{ session('message') }}
            </p>
        @endif
    </form>
</div>

@endsection
