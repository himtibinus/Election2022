@extends('layouts.app')

@php
  $dateStart = '2022-10-07T13:00:00+07:00';
  $dateEnd = '2022-10-21T23:59:00+07:00';
@endphp

@section('assets')
<link href="{{ asset('css/votingPage.css') }}" rel="stylesheet" type="text/css" />
@endsection

@section('content')
    <div class="content mt-5">
        <div class="container">
            <h1 class="title">ONE FAMILY ONE GOAL!</h1>
        </div>
        <div class="container frosted-glass px-3 px-md-5 py-5">
            <div class="frosted-glass-content">
                <div class="himel content-1">
                    <h1 class="title">HIMTI ELECTION 2022</h1>
                </div>
                <h2 class="text-center fw-bold pt-3">7-21st October 2022</h2>
                <br />
                <br />
                <div class="content-2">
                    <h3 class="text-center fw-bold pb-3">
                        @if (\Carbon\Carbon::now()->format("Y-m-d\TH:i:sP") < \Carbon\Carbon::parse($dateStart)->format("Y-m-d\TH:i:sP"))
                        Voting period will open in
                        @else
                        Voting period ends in
                        @endif
                    </h3>
                    <div id="countdown" class="countdown-box mt-3" data-dateStart="{{ $dateStart }}" data-dateEnd="{{ $dateEnd }}">
                        <div class="time-container fw-bold" data-time="days">
                            <h1 class="value" id="days"></h1>
                            <p class="desc">Days</p>
                        </div>
                        <div class="time-container fw-bold" data-time="hours">
                            <h1 class="value" id="hours"></h1>
                            <p class="desc">Hours</p>
                        </div>
                        <div class="time-container fw-bold" data-time="mins">
                            <h1 class="value" id="minutes"></h1>
                            <p class="desc">Minutes</p>
                        </div>
                        <div class="time-container fw-bold" data-time="secs">
                            <h1 class="value" id="seconds"></h1>
                            <p class="desc">Seconds</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="py-5 w-100">
            @guest
                @if (\Carbon\Carbon::now()->format("Y-m-d\TH:i:sP") < \Carbon\Carbon::parse($dateStart)->format("Y-m-d\TH:i:sP"))
                    <h2 class="text-center fw-bold">Please wait until the voting period opened!</h2>
                @elseif (\Carbon\Carbon::now()->format("Y-m-d\TH:i:sP") > \Carbon\Carbon::parse($dateEnd)->format('Y-m-d
                    H:i:s'))
                    <h2 class="text-center fw-bold">The voting period has been ended.</h2>
                @else
                    <h2 class="text-center fw-bold">Please login to vote your candidate!</h2>
                @endif
            @else
                @if (\Carbon\Carbon::now()->format("Y-m-d\TH:i:sP") < \Carbon\Carbon::parse($dateStart)->format("Y-m-d\TH:i:sP"))
                    <h2 class="container text-center fw-bold ">Please wait until the voting period opened!</h2>
                @elseif(Auth::user()->email == null)
                    <h2 class="container text-center fw-bold">Your email has not been registered.</h2>
                    <h3 class="container text-center">Please input your email first!</h3>
                    <div class="d-flex justify-content-center mt-5">
                        <a style="text-decoration: none;" href="{{ route('input.email', [Auth::user()->id]) }}"
                            class="btn btn-light">Input Email</a>
                    </div>
                @elseif(Auth::user()->email_verified_at == null)
                    <h2 class="container text-center fw-bold">Please verify your email before you vote!</h2>
                    <h3 id="check-email-typo" class="container text-center">*Check your INBOX if it’s not there, please check your JUNK EMAIL</h3>
                @elseif (Auth::user()->email_verified_at != null)
                    <div class="container frosted-glass mt-0 px-3 px-md-5 py-5">
                        <h2 class="text-center fw-bold mt-4 mb-5">
                            @if (Auth::user()->voted == 1 && Auth::user()->voted_value != 0)
                            You've already voted!
                            @else
                            Choose your favorite candidate
                            @endif
                        </h2>
                        <div id="candidate-flex" class="candidate-box pt-3 mx-auto">
                            @foreach ($candidates as $candidate)
                                <div class="candidate-container mx-auto">
                                    <label class="drinkcard-candidate position-relative" for="candidate-{{ $candidate->id }}">
                                        <div 
                                            id="candidate{{ $candidate->id }}" 
                                            class="candidate frosted-glass my-0 position-relative @if(Auth::user()->voted_value == $candidate->id) candidate-voted @endif" 
                                            style="border-radius: 20px !important;"
                                            onclick="setModal({{ $candidate->id}}, '{{ $candidate->name }}')"
                                            data-bs-toggle="modal" data-bs-target="#confirmationModal"
                                        >
                                            <h2 class="m-3 mb-0 fw-bold position-absolute" style=";">#0{{ $candidate->id }}</h2>
                                            <img src="{{ asset("/img/".$candidate->image) }}" class="mx-auto">
                                        </div>
                                        <h3 class="pt-4 fw-bold h4">{{ $candidate->name }}</h3>
                                    </label>
                                    @if (Auth::user()->voted != 1)
                                        <button type="button" id="vote-btn"
                                            class="btn btn-light mt-3"
                                            onClick="setModal({{ $candidate->id}}, '{{ $candidate->name }}')"
                                            data-bs-toggle="modal" data-bs-target="#confirmationModal"
                                        >Vote
                                        </button>
                                    @endif
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <form action=" {{ route('vote', Auth::user()->id) }} " method="POST" class="candidate-selector">
                        @csrf
                        <input id="candidate-value" type="hidden" name="candidate" />
                        <div class="modal" tabindex="-1" id="confirmationModal">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 id="candidate" class="modal-title text-dark fw-bold"></h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body text-dark text-center">
                                        <div id="response">
                                        </div>
                                        <h5 class="fw-bold mt-4">Are you sure you want to vote this candidate?</h4>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No, thanks</button>
                                        <button type="submit" class="btn btn-primary">Yes, vote</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                @elseif (\Carbon\Carbon::now()->format("Y-m-d\TH:i:sP") > \Carbon\Carbon::parse($dateEnd)->format('Y-m-d
                    H:i:s'))=
                    <h2 class="fw-bold">The voting period has been ended.</h2>
                @elseif (Auth::user()->voted == 1 && Auth::user()->voted_value != 0)
                    @if (session('message'))
                        <h2 class="fw-bold">{{ session('message') }}</h2>
                    @else
                        <h2 class="fw-bold">You've already voted!</h2>
                    @endif
                @endif
            @endguest
        </div>
    </div>
@endsection

@section('scripts')
<script src="{{ URL::asset('js/countdown.js') }}"></script>
<script>
    function setModal(id, name) {
        document.getElementById('candidate-value').value = id;
        document.getElementById("candidate").innerText = `#0${id} - ${name}`;
        document.getElementById("response").innerHTML = (`<img src='img/candidate-${id}.png' alt='Candidate ${id}' style='width:64%;'>`);
    }
</script>            
@endsection