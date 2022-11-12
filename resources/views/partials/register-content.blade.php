    <form id="display2" class="sr-only" action="{{ route('partials/register') }}" method="POST">
        @csrf

        <div class="form-group mb-3">
            <div class="row">
                <div class="col-6">
                    <!-- <label class="ml-2">Nama Depan</label> -->
                    <input name="name" type="text" placeholder="Nama depan" required="" autofocus="" class="form-control rounded-pill border-0 shadow-sm">
                </div>
                <div class="col-6">
                    <input name="name_end" type="text" placeholder="Nama belakang" required="" class="form-control rounded-pill border-0 shadow-sm">
                </div>
            </div>
        </div>
        <div class="form-group mb-3">
            <input name="email" type="email" placeholder="Email address" required="" class="form-control rounded-pill border-0 shadow-sm px-4">
        </div>
        <div class="form-group mb-3">
            <input name="password" type="password" placeholder="Password" required="" class="form-control rounded-pill border-0 shadow-sm px-4 text-primary">
        </div>
        <div class="form-group mb-3">
            <input name="password_confirmation" type="password" placeholder="Konfirmasi Password" required="" class="form-control rounded-pill border-0 shadow-sm px-4 text-primary">
        </div>
        <input type="hidden" name="image" value="images/user-thumbnail.png">
        <button type="submit" class="btn btn-block text-uppercase mb-2 rounded-pill shadow-sm" style="background-color: #F6D166;">Register</button>
    </form>