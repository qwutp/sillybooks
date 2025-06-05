@extends('layouts.app')

@section('title', $book->title . ' - ' . $book->author->name)

@section('content')
    <div class="container" style="padding: 2rem 0;">
        <div style="display: flex; gap: 2rem; margin-bottom: 3rem;">
            <!-- Book Cover -->
            <div style="flex-shrink: 0;">
                <div style="width: 300px; height: 400px; border-radius: 0.5rem; overflow: hidden; box-shadow: 0 4px 12px rgba(0,0,0,0.15);">
                    @if($book->cover_image && file_exists(public_path('images/books/' . $book->cover_image)))
                        <img src="{{ asset('images/books/' . $book->cover_image) }}" alt="{{ $book->title }}" style="width: 100%; height: 100%; object-fit: cover;">
                    @else
                        <div style="width: 100%; height: 100%; background: #e5e7eb; display: flex; align-items: center; justify-content: center; color: #9ca3af;">Нет обложки</div>
                    @endif
                </div>
            </div>
            
            <!-- Book Details -->
            <div style="flex: 1;">
                <h1 style="font-size: 2rem; margin-bottom: 1rem; color: #333;">{{ $book->title }}</h1>
                
                <div style="display: flex; gap: 1rem; margin-bottom: 2rem;">
                    <button class="btn btn-primary" style="padding: 0.75rem 2rem;">Читать</button>
                    
                    @auth
                    <div style="display: flex; gap: 0.5rem;">
                        <button class="book-status-btn" data-book-id="{{ $book->id }}" data-status="want_to_read" 
                                style="padding: 0.5rem 1rem; border: 2px solid #B57219; background: {{ $userBookStatus == 'want_to_read' ? '#B57219' : 'white' }}; color: {{ $userBookStatus == 'want_to_read' ? 'white' : '#B57219' }}; border-radius: 0.5rem; cursor: pointer; font-size: 0.875rem; transition: all 0.2s;">
                            Хочу прочитать
                        </button>
                        
                        <button class="book-status-btn" data-book-id="{{ $book->id }}" data-status="reading"
                                style="padding: 0.5rem 1rem; border: 2px solid #10B981; background: {{ $userBookStatus == 'reading' ? '#10B981' : 'white' }}; color: {{ $userBookStatus == 'reading' ? 'white' : '#10B981' }}; border-radius: 0.5rem; cursor: pointer; font-size: 0.875rem; transition: all 0.2s;">
                            Читаю сейчас
                        </button>
                        
                        <button class="book-status-btn" data-book-id="{{ $book->id }}" data-status="completed"
                                style="padding: 0.5rem 1rem; border: 2px solid #6366F1; background: {{ $userBookStatus == 'completed' ? '#6366F1' : 'white' }}; color: {{ $userBookStatus == 'completed' ? 'white' : '#6366F1' }}; border-radius: 0.5rem; cursor: pointer; font-size: 0.875rem; transition: all 0.2s;">
                            Прочитано
                        </button>
                    </div>
                    @else
                    <div style="padding: 0.5rem 1rem; background: #f3f4f6; color: #6b7280; border-radius: 0.5rem; font-size: 0.875rem;">
                        <a href="{{ route('login') }}" style="color: #B57219; text-decoration: none;">Войдите</a>, чтобы добавить книгу в список
                    </div>
                    @endauth
                </div>
                
                <div style="margin-bottom: 2rem;">
                    <p style="line-height: 1.6; color: #374151; font-size: 1rem;">
                        {{ $book->description }}
                    </p>
                </div>
                
                <!-- Genres -->
                <div style="display: flex; flex-wrap: wrap; gap: 0.5rem; margin-bottom: 2rem;">
                    @foreach($book->genres as $genre)
                        <span style="background: #f3f4f6; color: #374151; padding: 0.5rem 1rem; border-radius: 1rem; font-size: 0.875rem;">{{ $genre->name }}</span>
                    @endforeach
                </div>
                
                <!-- Book Info -->
                <div style="background: #f9fafb; padding: 1.5rem; border-radius: 0.5rem;">
                    <div style="display: grid; grid-template-columns: repeat(2, 1fr); gap: 1rem;">
                        @if($book->age_rating)
                        <div>
                            <span style="color: #B57219; font-weight: 500;">Возрастные ограничения:</span>
                            <span style="color: #374151;">{{ $book->age_rating }}+</span>
                        </div>
                        @endif
                        
                        @if($book->publisher)
                        <div>
                            <span style="color: #B57219; font-weight: 500;">Издательство:</span>
                            <span style="color: #374151;">{{ $book->publisher }}</span>
                        </div>
                        @endif
                        
                        @if($book->year)
                        <div>
                            <span style="color: #B57219; font-weight: 500;">Год выхода издания:</span>
                            <span style="color: #374151;">{{ $book->year }}</span>
                        </div>
                        @endif
                        
                        @if($book->pages)
                        <div>
                            <span style="color: #B57219; font-weight: 500;">Бумажных страниц:</span>
                            <span style="color: #374151;">{{ $book->pages }}</span>
                        </div>
                        @endif
                        
                        @if($book->language)
                        <div>
                            <span style="color: #B57219; font-weight: 500;">Язык:</span>
                            <span style="color: #374151;">{{ $book->language }}</span>
                        </div>
                        @endif
                        
                        @if($book->author)
                        <div>
                            <span style="color: #B57219; font-weight: 500;">Автор:</span>
                            <a href="{{ route('author.show', $book->author->id) }}" style="color: #374151; text-decoration: none;">{{ $book->author->name }}</a>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Reviews Section -->
        <div>
            <h2 style="font-size: 1.5rem; margin-bottom: 2rem; color: #333;">Отзывы</h2>
            
            @auth
            <div style="background: #f9fafb; padding: 1.5rem; border-radius: 0.5rem; margin-bottom: 2rem;">
                <form action="{{ route('reviews.store') }}" method="POST">
                    @csrf
                    <input type="hidden" name="book_id" value="{{ $book->id }}">
                    
                    <div style="margin-bottom: 1rem;">
                        <label style="display: block; margin-bottom: 0.5rem; font-weight: 500;">Ваша оценка:</label>
                        <div style="display: flex; gap: 0.25rem;">
                            @for($i = 1; $i <= 5; $i++)
                                <button type="button" class="star-rating" data-rating="{{ $i }}" style="background: none; border: none; cursor: pointer; font-size: 1.5rem; color: #d1d5db;">★</button>
                            @endfor
                        </div>
                        <input type="hidden" name="rating" id="rating-input" required>
                    </div>
                    
                    <div style="margin-bottom: 1rem;">
                        <textarea name="content" placeholder="Напишите ваш отзыв..." style="width: 100%; min-height: 100px; padding: 0.75rem; border: 1px solid #d1d5db; border-radius: 0.5rem; resize: vertical;" required></textarea>
                    </div>
                    
                    <button type="submit" class="btn btn-primary">Опубликовать отзыв</button>
                </form>
            </div>
            @endauth
            
            @foreach($book->reviews as $review)
            <div style="border: 1px solid #e5e7eb; border-radius: 0.5rem; padding: 1.5rem; margin-bottom: 1.5rem;" id="review-{{ $review->id }}">
                <div style="display: flex; align-items: center; margin-bottom: 1rem;">
                    <div style="width: 48px; height: 48px; border-radius: 50%; overflow: hidden; margin-right: 1rem;">
                        @if($review->user->avatar && file_exists(public_path('images/avatars/' . $review->user->avatar)))
                            <img src="{{ asset('images/avatars/' . $review->user->avatar) }}" alt="{{ $review->user->name }}" style="width: 100%; height: 100%; object-fit: cover;">
                        @else
                            <div style="width: 100%; height: 100%; background: #B57219; display: flex; align-items: center; justify-content: center; color: white; font-weight: bold;">{{ substr($review->user->name, 0, 1) }}</div>
                        @endif
                    </div>
                    <div style="flex: 1;">
                        <div style="display: flex; align-items: center; gap: 1rem;">
                            <h3 style="margin: 0; font-weight: 600;">{{ $review->user->name }}</h3>
                            <span style="color: #6b7280; font-size: 0.875rem;">{{ $review->created_at->diffForHumans() }}</span>
                            @if($review->created_at != $review->updated_at)
                                <span style="color: #6b7280; font-size: 0.75rem; font-style: italic;">(изменено)</span>
                            @endif
                        </div>
                        <div style="display: flex; margin-top: 0.25rem;">
                            @for($i = 1; $i <= 5; $i++)
                                <span style="color: {{ $i <= $review->rating ? '#FFD700' : '#d1d5db' }};">★</span>
                            @endfor
                        </div>
                    </div>
                    
                    @auth
                    @if($review->user_id === auth()->id() || auth()->user()->isAdmin())
                    <div style="display: flex; gap: 0.5rem;">
                        @if($review->user_id === auth()->id())
                        <button onclick="editReview({{ $review->id }})" style="background: none; border: none; color: #6b7280; cursor: pointer; padding: 0.25rem;">
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"/>
                                <path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"/>
                            </svg>
                        </button>
                        @endif
                        
                        <form action="{{ route('reviews.destroy', $review->id) }}" method="POST" style="display: inline;" onsubmit="return confirm('Вы уверены, что хотите удалить этот отзыв?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" style="background: none; border: none; color: #ef4444; cursor: pointer; padding: 0.25rem;">
                                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <polyline points="3,6 5,6 21,6"/>
                                    <path d="M19,6v14a2,2 0 0,1 -2,2H7a2,2 0 0,1 -2,-2V6m3,0V4a2,2 0 0,1 2,-2h4a2,2 0 0,1 2,2v2"/>
                                    <line x1="10" y1="11" x2="10" y2="17"/>
                                    <line x1="14" y1="11" x2="14" y2="17"/>
                                </svg>
                            </button>
                        </form>
                    </div>
                    @endif
                    @endauth
                </div>
                
                <div class="review-content-{{ $review->id }}">
                    <p style="color: #374151; line-height: 1.6; margin-bottom: 1rem;">
                        {{ $review->content }}
                    </p>
                </div>
                
                <!-- Edit form (hidden by default) -->
                <div class="edit-form-{{ $review->id }}" style="display: none;">
                    <form action="{{ route('reviews.update', $review->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        
                        <div style="margin-bottom: 1rem;">
                            <label style="display: block; margin-bottom: 0.5rem; font-weight: 500;">Оценка:</label>
                            <div style="display: flex; gap: 0.25rem;">
                                @for($i = 1; $i <= 5; $i++)
                                    <button type="button" class="edit-star-rating" data-review-id="{{ $review->id }}" data-rating="{{ $i }}" style="background: none; border: none; cursor: pointer; font-size: 1.5rem; color: {{ $i <= $review->rating ? '#FFD700' : '#d1d5db' }};">★</button>
                                @endfor
                            </div>
                            <input type="hidden" name="rating" id="edit-rating-input-{{ $review->id }}" value="{{ $review->rating }}" required>
                        </div>
                        
                        <div style="margin-bottom: 1rem;">
                            <textarea name="content" style="width: 100%; min-height: 100px; padding: 0.75rem; border: 1px solid #d1d5db; border-radius: 0.5rem; resize: vertical;" required>{{ $review->content }}</textarea>
                        </div>
                        
                        <div style="display: flex; gap: 0.5rem;">
                            <button type="submit" class="btn btn-primary" style="padding: 0.5rem 1rem; font-size: 0.875rem;">Сохранить</button>
                            <button type="button" onclick="cancelEdit({{ $review->id }})" class="btn" style="padding: 0.5rem 1rem; font-size: 0.875rem; background: #6b7280; color: white; border: none; border-radius: 0.5rem; cursor: pointer; font-family: Druk Wide Cyr">Отмена</button>
                        </div>
                    </form>
                </div>
                
                <div class="review-actions-{{ $review->id }}" style="display: flex; gap: 1rem;">
                    <button class="like-button" data-review-id="{{ $review->id }}" style="background: none; border: none; color: #6b7280; cursor: pointer; display: flex; align-items: center; gap: 0.5rem; transition: color 0.2s;">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"/>
                        </svg>
                        <span>Нравится</span>
                    </button>
                    
                    <button style="background: none; border: none; color: #6b7280; cursor: pointer; display: flex; align-items: center; gap: 0.5rem;">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"/>
                        </svg>
                        <span>Комментарии</span>
                    </button>
                </div>
            </div>
            @endforeach
            
            @if($book->reviews->count() == 0)
                <div style="text-align: center; padding: 3rem; color: #6b7280;">
                    <p>Пока нет отзывов на эту книгу.</p>
                    @auth
                        <p>Станьте первым, кто оставит отзыв!</p>
                    @endauth
                </div>
            @endif
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            console.log('Page loaded, initializing book status buttons');
            
            // Star rating functionality for new reviews
            document.querySelectorAll('.star-rating').forEach(star => {
                star.addEventListener('click', function() {
                    const rating = this.dataset.rating;
                    document.getElementById('rating-input').value = rating;
                    
                    document.querySelectorAll('.star-rating').forEach((s, index) => {
                        if (index < rating) {
                            s.style.color = '#FFD700';
                        } else {
                            s.style.color = '#d1d5db';
                        }
                    });
                });
            });
            
            // Star rating functionality for edit forms
            document.querySelectorAll('.edit-star-rating').forEach(star => {
                star.addEventListener('click', function() {
                    const rating = this.dataset.rating;
                    const reviewId = this.dataset.reviewId;
                    document.getElementById(`edit-rating-input-${reviewId}`).value = rating;
                    
                    document.querySelectorAll(`.edit-star-rating[data-review-id="${reviewId}"]`).forEach((s, index) => {
                        if (index < rating) {
                            s.style.color = '#FFD700';
                        } else {
                            s.style.color = '#d1d5db';
                        }
                    });
                });
            });
            
            // Like button hover effect
            document.querySelectorAll('.like-button').forEach(button => {
                button.addEventListener('mouseenter', function() {
                    this.style.color = '#ef4444';
                });
                
                button.addEventListener('mouseleave', function() {
                    this.style.color = '#6b7280';
                });
            });
            
            // Book status functionality
            document.querySelectorAll('.book-status-btn').forEach(button => {
                console.log('Found button:', button.dataset.status);
                
                button.addEventListener('click', function() {
                    console.log('Button clicked:', this.dataset.status);
                    
                    const bookId = this.dataset.bookId;
                    const status = this.dataset.status;
                    
                    console.log('Book ID:', bookId, 'Status:', status);
                    
                    // Show loading state
                    const originalText = this.textContent;
                    this.textContent = 'Загрузка...';
                    this.disabled = true;
                    
                    // Get CSRF token
                    const token = document.querySelector('meta[name="csrf-token"]');
                    if (!token) {
                        console.error('CSRF token not found');
                        this.textContent = originalText;
                        this.disabled = false;
                        showMessage('Ошибка: CSRF токен не найден', 'error');
                        return;
                    }
                    
                    const csrfToken = token.getAttribute('content');
                    console.log('CSRF token:', csrfToken);
                    
                    const requestData = {
                        book_id: parseInt(bookId),
                        status: status
                    };
                    
                    console.log('Sending request:', requestData);
                    
                    fetch('/user-books/update-status', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': csrfToken,
                            'Accept': 'application/json'
                        },
                        body: JSON.stringify(requestData)
                    })
                    .then(response => {
                        console.log('Response status:', response.status);
                        console.log('Response headers:', response.headers);
                        
                        if (!response.ok) {
                            return response.text().then(text => {
                                console.error('Response error:', text);
                                throw new Error(`HTTP ${response.status}: ${text}`);
                            });
                        }
                        return response.json();
                    })
                    .then(data => {
                        console.log('Response data:', data);
                        
                        if (data.success) {
                            // Update button styles
                            document.querySelectorAll('.book-status-btn').forEach(btn => {
                                const btnStatus = btn.dataset.status;
                                btn.disabled = false;
                                
                                if (btnStatus === 'want_to_read') {
                                    btn.textContent = 'Хочу прочитать';
                                } else if (btnStatus === 'reading') {
                                    btn.textContent = 'Читаю сейчас';
                                } else if (btnStatus === 'completed') {
                                    btn.textContent = 'Прочитано';
                                }
                                
                                if (btnStatus === status) {
                                    // Active state
                                    if (btnStatus === 'want_to_read') {
                                        btn.style.background = '#B57219';
                                        btn.style.color = 'white';
                                    } else if (btnStatus === 'reading') {
                                        btn.style.background = '#10B981';
                                        btn.style.color = 'white';
                                    } else if (btnStatus === 'completed') {
                                        btn.style.background = '#6366F1';
                                        btn.style.color = 'white';
                                    }
                                } else {
                                    // Inactive state
                                    btn.style.background = 'white';
                                    if (btnStatus === 'want_to_read') {
                                        btn.style.color = '#B57219';
                                    } else if (btnStatus === 'reading') {
                                        btn.style.color = '#10B981';
                                    } else if (btnStatus === 'completed') {
                                        btn.style.color = '#6366F1';
                                    }
                                }
                            });
                            
                            // Show success message
                            showMessage('Статус книги обновлен!', 'success');
                        } else {
                            throw new Error(data.message || 'Произошла ошибка');
                        }
                    })
                    .catch(error => {
                        console.error('Error:', error);
                        
                        // Reset button
                        this.textContent = originalText;
                        this.disabled = false;
                        
                        showMessage('Произошла ошибка: ' + error.message, 'error');
                    });
                });
            });
            
            // Helper function to show messages
            function showMessage(text, type) {
                const message = document.createElement('div');
                message.style.cssText = `
                    position: fixed; 
                    top: 20px; 
                    right: 20px; 
                    background: ${type === 'success' ? '#10B981' : '#EF4444'}; 
                    color: white; 
                    padding: 1rem; 
                    border-radius: 0.5rem; 
                    z-index: 1000;
                    box-shadow: 0 4px 12px rgba(0,0,0,0.15);
                `;
                message.textContent = text;
                document.body.appendChild(message);
                
                setTimeout(() => {
                    message.remove();
                }, 5000);
            }
        });
        
        // Edit review functions
        function editReview(reviewId) {
            document.querySelector(`.review-content-${reviewId}`).style.display = 'none';
            document.querySelector(`.edit-form-${reviewId}`).style.display = 'block';
            document.querySelector(`.review-actions-${reviewId}`).style.display = 'none';
        }
        
        function cancelEdit(reviewId) {
            document.querySelector(`.review-content-${reviewId}`).style.display = 'block';
            document.querySelector(`.edit-form-${reviewId}`).style.display = 'none';
            document.querySelector(`.review-actions-${reviewId}`).style.display = 'flex';
        }
    </script>
@endsection
