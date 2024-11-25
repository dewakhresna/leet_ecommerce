<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .profile-header {
            display: flex;
            align-items: center;
            gap: 20px;
            margin-bottom: 20px;
        }
        .profile-header img {
            width: 100px;
            height: 100px;
            border-radius: 50%;
            object-fit: cover;
        }
        .new-arrivals {
            border: 1px solid #ddd;
            padding: 15px;
            border-radius: 10px;
        }
        .new-arrivals img {
            width: 100%;
            border-radius: 10px;
        }
        .action-links a {
            display: flex;
            align-items: center;
            gap: 10px;
            text-decoration: none;
            color: inherit;
            margin-top: 10px;
        }
        .action-links a:hover {
            color: #007bff;
        }
    </style>
</head>
<body>
    <div class="container mt-4">
        <h2 class="text-center">Account Saya</h2>
        <div class="row">
            <div class="col-md-6">
                <div class="new-arrivals">
                    {{-- <h3 class="text-center">New Arrivals</h3> --}}
                    <div class="row mt-3">
                        <div class="col-7 mb-3">
                            <img src="{{ asset('assets/profile/banner_profil_1.png')}}" alt="New Arrival 1">
                        </div>
                        <div class="col-5">
                            <img src="{{ asset('assets/profile/banner_profil_2.png')}}" alt="New Arrival 2">
                            <img src="{{ asset('assets/profile/banner_profil_3.png')}}" alt="New Arrival 3" class="mt-3">
                        </div>
                        <div class="col-4">
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="profile-header">
                    <img src="{{ $user->foto_profile ? asset('storage/' . $user->foto_profile) : asset("assets/icon/profile_icon.png") }}" alt="Profile Picture">
                    <div>
                        <h5>{{ $user->name }}</h5>
                        <p>{{ $user->email }}</p>
                        <p>{{ $user->no_hp }}</p>
                        <a href="{{route('logout')}}" class="text-danger">Keluar</a>
                        <a href="{{route('user.edit-profile', Auth::user()->id)}}" class="text-primary">Edit</a>
                    </div>
                </div>
                <p><strong>Alamat:</strong> {{ $user->alamat }}</p>
                <div class="action-links">
                    <a href="{{ route('user.keranjang', Auth::user()->id)}}">
                        <img src="{{asset('assets/icon/transaksi_icon.png')}}" alt="Cart" width="30"> Detail Transaksi
                    </a>
                    <a href="{{ route('user.pesanan', Auth::user()->id)}}">
                        <img src="{{asset('assets/icon/map_icon.png')}}" alt="Map" width="30"> Status Pesanan
                    </a>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>