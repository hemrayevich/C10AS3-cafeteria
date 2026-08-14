<div class="card h-100 border-0 shadow-sm rounded-4 p-3 drink-card bg-white position-relative">

    <div class="d-flex align-items-center justify-content-center mb-2 bg-white rounded-3" style="height: 180px;">
        @if($drink->img)
            <img src="{{ asset('storage/' . $drink->img) }}" alt="{{ $drink->name }}"
                class="mw-100 mh-100 object-fit-contain transition-transform">
        @else
            <i class="bi bi-cup-straw display-1 text-secondary opacity-25"></i>
        @endif
    </div>

    <div class="d-flex flex-column justify-content-between flex-grow-1">
        <div>
            <div class="d-flex align-items-center gap-1 mb-2">
                <div class="interactive-rating text-warning small d-flex gap-1" data-drink-id="{{ $drink->id }}">
                    @for($i = 1; $i <= 5; $i++)
                        <i class="bi bi-star rating-star cursor-pointer" data-value="{{ $i }}"></i>
                    @endfor
                </div>
                <span class="rating-value-text text-muted ms-1" style="font-size: 0.75rem;">(0.0)</span>
            </div>

            <h6 class="fw-bold text-dark mb-2 text-truncate-2" title="{{ $drink->name }}"
                style="font-size: 0.95rem; line-height: 1.3; height: 2.6em;">
                {{ $drink->name }}
            </h6>

            <div class="fw-bold text-dark fs-5 mb-3">
                {{ number_format($drink->price, 2, '.', ' ') }} m.
            </div>
        </div>

        <div class="d-flex align-items-center gap-2 pt-2">
            <button type="button"
                class="btn btn-outline-secondary border-light-subtle rounded-3 d-flex align-items-center justify-content-center p-0 flex-shrink-0"
                style="width: 42px; height: 38px;">
                <i class="bi bi-heart text-success fs-5"></i>
            </button>

            <button type="button"
                class="btn btn-success rounded-3 w-100 d-flex align-items-center justify-content-center fw-semibold py-2"
                style="height: 38px; background-color: #28a745; border-color: #28a745;">
                <i class="bi bi-cart3 fs-5"></i>
            </button>
        </div>
    </div>

</div>

<style>
    .drink-card {
        transition: transform 0.2s ease, box-shadow 0.2s ease;
    }

    .drink-card:hover {
        transform: translateY(-3px);
        box-shadow: 0 .5rem 1rem rgba(0, 0, 0, .08) !important;
    }

    .drink-card img {
        transition: transform 0.3s ease;
    }

    .drink-card:hover img {
        transform: scale(1.05);
    }

    .text-truncate-2 {
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }

    /* Стили для кликабельных звёзд */
    .cursor-pointer {
        cursor: pointer;
        transition: transform 0.15s ease, color 0.15s ease;
    }

    .cursor-pointer:hover {
        transform: scale(1.25);
    }
</style>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const ratingContainers = document.querySelectorAll('.interactive-rating');

        ratingContainers.forEach(container => {
            const stars = container.querySelectorAll('.rating-star');
            const ratingText = container.nextElementSibling;
            let selectedRating = 0;

            stars.forEach(star => {
                // Подсветка при наведении
                star.addEventListener('mouseenter', function () {
                    const hoverVal = parseInt(this.getAttribute('data-value'));
                    highlightStars(stars, hoverVal);
                });

                // Возврат к сохраненному рейтингу
                container.addEventListener('mouseleave', function () {
                    highlightStars(stars, selectedRating);
                });

                // Клик — отправка в БАЗУ ДАННЫХ
                star.addEventListener('click', function () {
                    selectedRating = parseInt(this.getAttribute('data-value'));
                    const drinkId = container.getAttribute('data-drink-id');

                    highlightStars(stars, selectedRating);

                    // AJAX запрос на сервер
                    fetch("{{ route('client.reviews.store') }}", {
                        method: "POST",
                        headers: {
                            "Content-Type": "application/json",
                            "X-CSRF-TOKEN": "{{ csrf_token() }}"
                        },
                        body: JSON.stringify({
                            drink_id: drinkId,
                            rating: selectedRating
                        })
                    })
                        .then(response => response.json())
                        .then(data => {
                            if (data.success) {
                                if (ratingText) {
                                    ratingText.textContent = `(${selectedRating}.0)`;
                                    ratingText.classList.remove('text-muted');
                                    ratingText.classList.add('text-warning', 'fw-bold');
                                }
                            } else {
                                alert(data.message || 'Ошибка при сохранении оценки');
                            }
                        })
                        .catch(error => console.error('Ошибка:', error));
                });
            });
        });

        function highlightStars(stars, count) {
            stars.forEach((star, index) => {
                if (index < count) {
                    star.classList.remove('bi-star');
                    star.classList.add('bi-star-fill');
                } else {
                    star.classList.remove('bi-star-fill');
                    star.classList.add('bi-star');
                }
            });
        }
    });
</script>