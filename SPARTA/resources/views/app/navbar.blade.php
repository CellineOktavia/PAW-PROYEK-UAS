<div class="d-flex justify-content-between align-items-center w-100">

    <div>

        <h4 class="fw-bold text-primary mb-0">
            SPARTA
        </h4>

        <small class="text-muted">
            Richie Motor Inventory Management System
        </small>

    </div>

    @auth

        <div class="d-flex align-items-center gap-3">

            <div class="text-end">

                <div class="fw-bold">
                    {{ Auth::user()->name }}
                </div>

                <small class="text-muted">
                    {{ strtoupper(Auth::user()->role) }}
                </small>

            </div>

            <form action="{{ route('logout') }}" method="POST">
                @csrf

                <button type="submit" class="btn btn-danger rounded-3 px-3">

                    Logout

                </button>

            </form>

        </div>

    @endauth

</div>
