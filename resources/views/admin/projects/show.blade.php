@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="header my-3">
            <a href="{{ route('admin.projects.index') }}" class="btn btn-danger">Back to the Projects</a>
        </div>
        @if ($project->image)
            <div class="img_thumb">
                <img src="{{ asset('storage/' . $project->image) }}" alt=" {{ $project->name }}">
            </div>
        @endif
        <div class="container">
            <h1>Project Title: {{ $project->name }}</h1>
            <p>Type: {{ $project->type?->type ?: 'None' }}</p>
            <div class="text-box">
                <h3>Description:</h3>
                <p>{{ $project->description }}</p>
            </div>
            <div class="text-box">
                <h3>Project owner:</h3>
                <p>{{ $project->owner }}</p>
            </div>
            <div class="text-box">
                <h3>Project contributors:</h3>
                <p>{{ $project->contributors }}</p>
            </div>
            <div class="text-box">
                <h3>Project language:</h3>
                <p>{{ $project->languages }}</p>
            </div>
            <div class="text-box">
                <h3>Project technologies:</h3>
                @forelse ($project->technologies as $technology)
                    <p>{{ $technology->name }}</p>
                @empty
                    <p>None technology</p>
                @endforelse
            </div>
            @if ($project->leads->count())
                <div class="text-box">
                    <h3>Lead :</h3>
                    <p>
                        @foreach ($project->leads as $lead)
                            <p>Author: {{ $lead->author }}</p>
                            <h6>Text:</h6>
                            <p>{{ $lead->message }}</p>
                            <form action="{{ route('admin.leads.destroy', $lead) }}" method="POST">
                                @method('DELETE')
                                @csrf
                                <button class="btn btn-danger btn-sm">Delete</button>
                           </form>
                        @endforeach
                    </p>
                </div>
            @endif
        </div>
    </div>
@endsection
