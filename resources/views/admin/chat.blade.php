@extends('layouts.admin-layout')

@section('title', 'Forum Chat')
@section('page-title', 'Forum Chat')

@section('content')
        <div class="row">
            <div class="col-md-8 mx-auto">
                <div class="card">
                    <!-- Chat Header -->
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h5 class="mb-0">Chat Forum</h5>
                    </div>

                    <!-- Chat Body -->
                    <div class="card-body chat-conversation" data-simplebar>
                        <ul class="list-unstyled">
                            @foreach ($messages as $message)
                                @if ($message->user_id === auth()->id())
                                    <!-- Current User's Message -->
                                    <li class="text-end mb-3">
                                        <div class="d-inline-block p-3 rounded bg-primary text-white">
                                            <small class="d-block">{{ $message->pesan }}</small>
                                            <small class="d-block text-end text-muted">
                                                {{ $message->created_at->format('H:i') }}
                                            </small>
                                        </div>
                                    </li>
                                @else
                                    <!-- Other User's Message -->
                                    <li class="mb-3">
                                        <div class="d-inline-block p-3 rounded bg-light text-dark">
                                            <small class="d-block font-weight-bold">{{ $message->user->name }}</small>
                                            <small class="d-block">{{ $message->pesan }}</small>
                                            <small class="d-block text-end text-muted">
                                                {{ $message->created_at->format('H:i') }}
                                            </small>
                                        </div>
                                    </li>
                                @endif
                            @endforeach
                        </ul>
                    </div>

                    <!-- Chat Footer -->
                    <div class="card-footer">
                        <form id="chat-form" method="POST" action="{{ route('forum-chat.send') }}">
                            @csrf
                            <div class="input-group">
                                <input type="text" name="pesan" class="form-control"
                                    placeholder="Ketik pesan Anda di sini..." required>
                                <button type="submit" class="btn btn-primary">Kirim</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
@endsection

@section('script')
    <script>
        document.getElementById('chat-form').addEventListener('submit', function(e) {
            e.preventDefault();

            const formData = new FormData(this);

            fetch(this.action, {
                    method: 'POST',
                    body: formData,
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute(
                            'content'),
                    },
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        const chatContainer = document.querySelector('.chat-conversation ul');
                        chatContainer.innerHTML += `
                    <li class="text-end mb-3">
                        <div class="d-inline-block p-3 rounded bg-primary text-white">
                            <small class="d-block">${formData.get('pesan')}</small>
                            <small class="d-block text-end text-muted">Just now</small>
                        </div>
                    </li>
                `;
                        this.reset();
                        chatContainer.scrollTop = chatContainer.scrollHeight;
                    } else {
                        alert(data.message);
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    alert('Failed to send the message. Please try again.');
                });
        });
    </script>
@endsection
