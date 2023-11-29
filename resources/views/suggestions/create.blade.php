@extends('suggestions.layouts.main')

@section('container')
<div class="container">
    <div class="suggest">
        <form action="/suggestions" method="post" id="suggestionForm">
            @csrf
            <label for="saran"><h1>Suggestion</h1></label>
            <hr>
            <p>Evaluating Today, Improving Tomorrow</p>
            <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
            <input type="hidden" name="project_id" value="{{ $project }}">
            <textarea name="suggestion" id="saran" placeholder="Enter a message..." required maxlength="300"></textarea>
            <button type="submit">Send</button>
            <a href="/projects/{{ $project }}/tasks"><p style="text-align: right;" class="button-link">Back</p></a>
        </form>
    </div>
</div>

<script>
    document.getElementById('suggestionForm').addEventListener('submit', function() {
      alert('Suggestion berhasil dikirim!');
    });
  </script>
@endsection