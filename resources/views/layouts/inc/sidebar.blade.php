<div class="sidebar pe-4 pb-3">
    <nav class="navbar bg-secondary navbar-dark">
        <a href="index.html" class="navbar-brand mx-4 mb-3">
            <h3 class="text-primary"><i class="fa fa-user-edit me-2"></i>Quizz</h3>
        </a>
        <div class="d-flex align-items-center ms-4 mb-4">
            <div class="position-relative">
                <img class="rounded-circle" src="{{ asset('inc/backend') }}/img/user.jpg" alt=""
                    style="width: 40px; height: 40px;">
                <div
                    class="bg-success rounded-circle border border-2 border-white position-absolute end-0 bottom-0 p-1">
                </div>
            </div>
            <div class="ms-3">
                <h6 class="mb-0"> {{ Auth::user()->name }}</h6>
               
            </div>
        </div>
        <div class="navbar-nav w-100">

            @if (Auth::user()->type == 'admin')
                <a href="index.html" class="nav-item nav-link"><i class="fa fa-tachometer-alt me-2"></i>Dashboard</a>
                <a href="{{ route('quiz.index') }}" class="nav-item nav-link"><i
                        class="fa fa-tachometer-alt me-2"></i>Quizz</a>
                <a href="{{ route('question.index') }}" class="nav-item nav-link"><i
                        class="fa fa-tachometer-alt me-2"></i>Quiz Question</a>
                <div class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i
                            class="fa fa-laptop me-2"></i>Elements</a>
                    <div class="dropdown-menu bg-transparent border-0">
                        <a href="button.html" class="dropdown-item">Buttons</a>
                        <a href="typography.html" class="dropdown-item">Typography</a>
                        <a href="element.html" class="dropdown-item">Other Elements</a>
                    </div>
                </div>
            @else
                @php
                    $quizes = App\Models\Quiz::latest()
                        ->take(5)
                        ->get();
                @endphp
                @foreach ($quizes as $quiz)
                    <a href="{{ route('userQuiz.exam', $quiz->id) }}" class="nav-item nav-link"><i
                            class="fa fa-th me-2"></i>{{ $quiz->title }}</a>
                @endforeach
            @endif
        </div>
    </nav>
</div>
