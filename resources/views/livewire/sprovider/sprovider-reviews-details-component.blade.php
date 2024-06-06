<div>
    <style>
        .review {
            border: 1px solid #ddd;
            padding: 15px;
            border-radius: 5px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .review p {
            margin: 0 0 10px;
        }

        .review .text-muted {
            font-size: 0.9em;
        }
        .material-icons-outlined.star {
            color: gold;
        }

        .material-icons-outlined.empty-star {
            color: lightgray;
        }
    </style>
    <h1>Historique des avis</h1>
    <div class="row" style="font-weight: 600;">
        <div class="col-md-12">
            <h3>Avis</h3>
            @foreach ($reviews as $review)
                <div class="review card mb-3">
                    <div class="card-body">
                        <p class="mb-1"><strong>Notation:</strong>
                            @for ($i = 0; $i < 5; $i++)
                                <span class="material-icons-outlined {{ $i < $review->rating ? 'star' : 'empty-star' }}">
                                    {{ $i < $review->rating ? 'star' : 'star_outline' }}
                                </span>
                            @endfor
                            ({{ $review->rating }}/5)
                        </p>
                        <p>{{ $review->comment }}</p>
                        <p class="text-muted"><small>par {{ $review->user->name }} le {{ $review->created_at->format('d M Y') }}</small></p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
