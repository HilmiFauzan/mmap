    <form id="display1" action="{{ route('partials/signin') }}" method="POST">
        @csrf
            @if(session('errors'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    Something it's wrong:
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                    <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                    </ul>
                </div>
            @endif
            @if (Session::has('success'))
                <div class="alert alert-success">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                    {{ Session::get('success') }}
                </div>
            @endif
            @if (Session::has('error'))
                <div class="alert alert-danger">
                    {{ Session::get('error') }}
                </div>
            @endif
        <div class="form-group mb-3">
            <input name="email_login" type="email" placeholder="Email address" required="" autofocus="" class="form-control rounded-pill border-0 shadow-sm px-4">
        </div>
        <div class="form-group mb-3">
            <input name="password_login" type="password" placeholder="Password" required="" class="form-control rounded-pill border-0 shadow-sm px-4 text-primary">
        </div>
        <div class="custom-control custom-checkbox mb-3">
            <input id="customCheck1" type="checkbox" checked class="custom-control-input">
            <label for="customCheck1" class="custom-control-label">Remember password</label>
        </div>
        <button type="submit" class="btn btn-block text-uppercase mb-2 rounded-pill shadow-sm" style="background-color: #F6D166;">Sign in</button>
    </form>