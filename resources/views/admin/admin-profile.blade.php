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
        <h2 class="text-center">Account Admin</h2>
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
                    <img src="{{ asset("assets/icon/profile_icon.png") }}" alt="Profile Picture">
                    <div>
                        <h5>{{ $admin->name }}</h5>
                        <p>{{ $admin->email }}</p>
                        <a href="{{route('admin.logout')}}" class="text-danger">Keluar</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>