@extends('layouts.app')

@section('assets')
    <link href="{{ asset('css/candidates.css') }}" rel="stylesheet" type="text/css" />
@endsection

@section('content')
    <div class="container-lg py-5">
        <h1 class="title-our-candidates pb-5">Our Candidates</h1>
        <div class="candidates-container">
            @foreach ($candidates as $candidate)
                <div id="candidate{{ $candidate->id }}" class="candidate frosted-glass my-0 position-relative @if ($candidate->id == 1)
                    candidate-active @endif">
                    <h2 class="m-3 mb-0 fw-bold position-absolute">#0{{ $candidate->id }}</h2>
                    <img src="{{ asset("/img/".$candidate->image) }}" class="mx-auto">
                </div>
            @endforeach
        </div>
    </div>

    @foreach ($candidates as $candidate)
        <div 
            id="candidate{{ $candidate->id }}-content"
            class="@if ($candidate->id > 1)
                d-none
            @endif"
        >
            <div class="container main-content pt-5">
                <h1 class="title-candidates-1 pt-4">Candidate #{{ $candidate->id }}</h1>
                <h2 class="candidate-name pt-5">{{ $candidate->name }}</h2>
                <h3 class="text-center py-2">{{ $candidate->tagline }}</h3>

                <h2 class="work-program pt-5 pb-3">Work Programs</h2>
                <ol class="work-program-list pb-5">
                    @foreach ($candidate->work_programs as $wp)
                        <li class="fs-4 h4">{{ $wp->work_program }}</li>
                    @endforeach
                </ol>
                <div class="video-wrapper my-5">
                    <div class="video-container d-flex justify-content-center">
                        <iframe src="{{ $candidate->campaign_url }}" width="640"
                            height="360"></iframe>
                    </div>
                </div>
        
                <h3 class="video-desc py-5">{{ $candidate->target }}
                </h3>
            </div>
            <div class="org-experience py-5">
                <h2 class="org-experience-title pb-3 fw-bold">Organization Experience</h2>
                @foreach ($candidate->experiences as $e)
                    <h4 class="org-experience-desc">{{ $e->experience }}</h4>
                @endforeach
            </div>
    </div> 
    @endforeach
@endsection

@section('scripts')
    <script>
        const candidate1 = document.getElementById("candidate1");
        const candidate2 = document.getElementById("candidate2");
        const candidate3 = document.getElementById("candidate3");

        const candidate1Content = document.getElementById("candidate1-content");
        const candidate2Content = document.getElementById("candidate2-content");
        const candidate3Content = document.getElementById("candidate3-content");

        const removeActiveClasses = () => {
            candidate1.classList.remove("candidate-active");
            candidate2.classList.remove("candidate-active");
            candidate3.classList.remove("candidate-active");
        }

        const hideClasses = () => {
            candidate1Content.classList.add("d-none");
            candidate2Content.classList.add("d-none");
            candidate3Content.classList.add("d-none");
        }

        const toggle = (candidateEl, contentEl) => {
            if (candidateEl.classList.contains("candidate-active")) {
                return;
            }
            removeActiveClasses();
            hideClasses();

            candidateEl.classList.add("candidate-active");
            contentEl.classList.remove("d-none");
        }

        candidate1.addEventListener("click", (e) => toggle(candidate1, candidate1Content));
        candidate2.addEventListener("click", (e) => toggle(candidate2, candidate2Content));
        candidate3.addEventListener("click", (e) => toggle(candidate3, candidate3Content));
    </script>
@endsection