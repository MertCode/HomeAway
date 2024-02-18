@extends('admin.admin_dashboard')
@section('admin')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <style>
        #showImage {
            width: 100px;
            /* Set a fixed width */
            height: 100px;
            /* Set a fixed height */
            object-fit: cover;
            /* Maintain aspect ratio and crop if necessary */
            object-position: center;
            /* Center the image within its container */
            border-radius: 50%;
            /* Ensure the image is circular */
        }

        #profilePicture {
            width: 100px;
            /* Set a fixed width */
            height: 100px;
            /* Set a fixed height */
            object-fit: cover;
            /* Maintain aspect ratio and crop if necessary */
            object-position: center;
            /* Center the image within its container */
            border-radius: 50%;
            /* Ensure the image is circular */
        }
    </style>

    <div class="page-content">

        <div class="row profile-body">
            <!-- left wrapper start -->
            <div class="d-none d-md-block col-md-4 col-xl-4 left-wrapper">
                <div class="card rounded">
                    <div class="card-body">
                        <div class="d-flex align-items-center justify-content-between mb-2">
                            <div>
                                <img id="profilePicture" class="wd-100 rounded-circle"
                                    src="{{ !empty($profileData->photo) ? url('upload/admin/images/' . $profileData->photo) : url('upload/no_image.jpg') }}"
                                    alt="profile picture">


                                <span class="h4 ms-3 text-white">{{ $profileData->username }}</span>
                            </div>

                        </div>

                        <div class="mt-3">
                            <label class="tx-11 fw-bolder mb-0 text-uppercase">Name:</label>
                            <p class="text-muted">{{ $profileData->name }}</p>
                        </div>
                        <div class="mt-3">
                            <label class="tx-11 fw-bolder mb-0 text-uppercase">Email:</label>
                            <p class="text-muted">{{ $profileData->email }}</p>
                        </div>
                        <div class="mt-3">
                            <label class="tx-11 fw-bolder mb-0 text-uppercase">Phone:</label>
                            <p class="text-muted">{{ $profileData->phone }}</p>
                        </div>
                        <div class="mt-3">
                            <label class="tx-11 fw-bolder mb-0 text-uppercase">Adress:</label>
                            <p class="text-muted">{{ $profileData->adress }}</p>
                        </div>
                        <div class="mt-3 d-flex social-links">
                            <a href="javascript:;" class="btn btn-icon border btn-xs me-2">
                                <i data-feather="github"></i>
                            </a>
                            <a href="javascript:;" class="btn btn-icon border btn-xs me-2">
                                <i data-feather="twitter"></i>
                            </a>
                            <a href="javascript:;" class="btn btn-icon border btn-xs me-2">
                                <i data-feather="instagram"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- left wrapper end -->
            <!-- middle wrapper start -->
            <div class="col-md-8 col-xl-8 middle-wrapper">
                <div class="row">
                    <div class="card">
                        <div class="card-body">
                            <h6 class="card-title">Edit Profile</h6>

                            <form method="POST" action="{{ route('admin.profile.store') }}" class="forms-sample"
                                enctype="multipart/form-data">
                                @csrf



                                <div class="mb-3">
                                    <label for="exampleInputUsername1" class="form-label">Username</label>
                                    <input type="text" name="username" class="form-control" id="exampleInputUsername1"
                                        autocomplete="off" value="{{ $profileData->username }}" />
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputName1" class="form-label">Name</label>
                                    <input type="text" name="name" class="form-control" id="exampleInputName1"
                                        autocomplete="off" value="{{ $profileData->name }}" />

                                </div>

                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Email</label> <input type="email"
                                        name="email" class="form-control" id="exampleInputEmail1" autocomplete="off"
                                        value="{{ $profileData->email }}" />
                                </div>

                                <div class="mb-3">
                                    <label for="exampleInputPhone1" class="form-label">Phone</label>
                                    <input type="text" name="phone" class="form-control" id="exampleInputPhone1"
                                        autocomplete="off" value="{{ $profileData->phone }}" />
                                </div>

                                <div class="mb-3">

                                    <label for="exampleInputAdress1" class="form-label">Adress</label>
                                    <input type="text" name="adress" class="form-control" id="exampleInputAdress1"
                                        autocomplete="off" value="{{ $profileData->adress }}" />
                                </div>

                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Photo</label>

                                    <input class="form-control" name="photo" type="file" id="image">

                                </div>


                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label"> </label>

                                    <img id="showImage" class="wd-80 rounded-circle"
                                        src="{{ !empty($profileData->photo) ? url('upload/admin/images/' . $profileData->photo) : url('upload/no_image.jpg') }}"
                                        alt="profile picture">

                                </div>


                                <button type="submit" class="btn btn-primary me-2">
                                    Submit
                                </button>
                                <button class="btn btn-secondary">Cancel</button>
                            </form>
                        </div>
                    </div>

                </div>
            </div>
            <!-- middle wrapper end -->
            <!-- right wrapper start -->
            <!-- right wrapper end -->
        </div>
    </div>

    <script type="text/javascript">
        $(document).ready(function() {
            $('#image').change(function(e) {
                if (e.target.files && e.target.files[0]) { // Check if a file was selected
                    var reader = new FileReader();

                    reader.onload = function(e) {
                        $('#showImage').attr('src', e.target.result); // Corrected the id to showImage
                    }

                    reader.readAsDataURL(e.target.files[0]);
                } else {
                    console.log('No file was selected'); // For debugging
                }
            });
        });
    </script>
@endsection
