@include('backend/layouts/header')

<!-- Page wrapper start -->
<div class="page-wrapper">

    <!-- Main container start -->
    <div class="main-container">

        @include('backend/layouts/sidebar')

        <!-- App container starts -->
        <div class="app-container">

            @include('backend/layouts/navbar')

            <!-- App body starts -->
            <div class="app-body">

                <!-- Row start -->
                <div class="row">
                    <div class="col-xxl-12">
                        <div class="card mb-4">
                            <div class="card-body">
                                <div class="custom-tabs-container">
                                    <ul class="nav nav-tabs" id="customTab2" role="tablist">
                                        <li class="nav-item" role="presentation">
                                            <a class="nav-link active" id="tab-oneA" data-bs-toggle="tab"
                                                href="#oneA" role="tab" aria-controls="oneA"
                                                aria-selected="true">General</a>
                                        </li>
                                    </ul>
                                    <div class="card-body">
                                        @if (session('success'))
                                            <div class="alert alert-success">
                                                {{ session('success') }}
                                            </div>
                                        @elseif(session('current_password'))
                                            <div class="alert alert-danger">
                                                {{ session('current_password') }}
                                            </div>
                                        @endif
                                        <div class="tab-content">
                                            <div class="tab-pane fade show active" id="oneA" role="tabpanel">
                                                <!-- Row start -->
                                                <div class="row justify-content-between">
                                                    <div class="col-xl-8 col-lg-8 col-md-8 col-sm-8 col-12">
                                                        <div class="card mb-4">
                                                            <div class="card-header">
                                                                <h5 class="card-title">Personal Details</h5>
                                                            </div>
                                                            <form action="/update-profile/{{ $user->id }}"
                                                                method="post">
                                                                @csrf
                                                                <div class="card-body px-0">
                                                                    <!-- Row start -->
                                                                    <div class="row">
                                                                        <div class="col-6">
                                                                            <!-- Form Field Start -->
                                                                            <div class="mb-3">
                                                                                <label for="fullName"
                                                                                    class="form-label">Full Name</label>
                                                                                <input type="text"
                                                                                    class="form-control" id="fullName"
                                                                                    value="{{ $user->nama }}"
                                                                                    name="name"
                                                                                    placeholder="Full Name" />
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-6">
                                                                            <!-- Form Field Start -->
                                                                            <div class="mb-3">
                                                                                <label for="emailId"
                                                                                    class="form-label">Email</label>
                                                                                <input type="email"
                                                                                    class="form-control" name="email"
                                                                                    value="{{ $user->email }}"
                                                                                    id="emailId"
                                                                                    placeholder="Email ID" />
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-6">
                                                                            <!-- Form Field Start -->
                                                                            <div class="mb-3">
                                                                                <label for="emailId"
                                                                                    class="form-label">Role</label>
                                                                                <input type="email"
                                                                                    class="form-control" name="role"
                                                                                    value="{{ $user->role }}"
                                                                                    id="emailId"
                                                                                    placeholder="Email ID" disabled />
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-12">
                                                                            <!-- Form Field Start -->
                                                                        </div>
                                                                    </div>
                                                                    <!-- Row end -->
                                                                </div>

                                                        </div>
                                                    </div>
                                                    <div class="col-sm-4 col-12">
                                                        <div class="card mb-4">
                                                            <div class="card-header">
                                                                <h5 class="card-title">Reset Password</h5>
                                                            </div>
                                                            <div class="card-body px-0">
                                                                <div class="row">
                                                                    <div class="col-12">
                                                                        <!-- Form Field Start -->
                                                                        <div class="mb-3">
                                                                            <label for="currentPassword"
                                                                                class="form-label">Current
                                                                                Password</label>
                                                                            <input type="password" class="form-control"
                                                                                name="current_password"
                                                                                id="currentPassword"
                                                                                placeholder="Enter Current Password" />
                                                                        </div>
                                                                        <!-- Form Field Start -->
                                                                        <div class="mb-3">
                                                                            <label for="newPassword"
                                                                                class="form-label">New Password</label>
                                                                            <input type="password" class="form-control"
                                                                                name="new_password" id="newPassword"
                                                                                placeholder="Enter New Password" />
                                                                        </div>
                                                                        <!-- Form Field Start -->
                                                                        {{-- <div class="mb-3">
																				<label for="confirmNewPassword" class="form-label">Confirm New Password</label>
																				<input type="text" name="confirm_new_password" class="form-control" id="confirmNewPassword"
																					placeholder="Confirm New Password" />
																			</div> --}}
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- Row end -->
                                                <div class="d-flex gap-2 justify-content-end">
                                                    <button type="submit" class="btn btn-success">
                                                        Update
                                                    </button>
                                                </div>
                                            </div>
                                            </form>
                                            <div class="tab-pane fade" id="twoA" role="tabpanel">
                                                <!-- Row start -->
                                                <div class="row">
                                                    <div class="col-sm-6 xol-12">
                                                        <!-- Card start -->
                                                        <div class="card">
                                                            <div class="card-body">
                                                                <ul class="list-group">
                                                                    <li
                                                                        class="list-group-item d-flex justify-content-between align-items-center">
                                                                        Show desktop notifications
                                                                        <div class="form-check form-switch m-0">
                                                                            <input class="form-check-input"
                                                                                type="checkbox" role="switch"
                                                                                id="switchOne" />
                                                                        </div>
                                                                    </li>
                                                                    <li
                                                                        class="list-group-item d-flex justify-content-between align-items-center">
                                                                        Show email notifications
                                                                        <div class="form-check form-switch m-0">
                                                                            <input class="form-check-input"
                                                                                type="checkbox" role="switch"
                                                                                id="switchTwo" checked />
                                                                        </div>
                                                                    </li>
                                                                    <li
                                                                        class="list-group-item d-flex justify-content-between align-items-center">
                                                                        Show chat notifications
                                                                        <div class="form-check form-switch m-0">
                                                                            <input class="form-check-input"
                                                                                type="checkbox" role="switch"
                                                                                id="switchThree" />
                                                                        </div>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                        <!-- Card end -->
                                                    </div>
                                                    <div class="col-sm-6 xol-12">
                                                        <!-- Card start -->
                                                        <div class="card">
                                                            <div class="card-body">
                                                                <ul class="list-group">
                                                                    <li
                                                                        class="list-group-item d-flex justify-content-between align-items-center">
                                                                        Show purchase history
                                                                        <div class="form-check form-switch m-0">
                                                                            <input class="form-check-input"
                                                                                type="checkbox" role="switch"
                                                                                id="switchFour" />
                                                                        </div>
                                                                    </li>
                                                                    <li
                                                                        class="list-group-item d-flex justify-content-between align-items-center">
                                                                        Show orders
                                                                        <div class="form-check form-switch m-0">
                                                                            <input class="form-check-input"
                                                                                type="checkbox" role="switch"
                                                                                id="switchFive" />
                                                                        </div>
                                                                    </li>
                                                                    <li
                                                                        class="list-group-item d-flex justify-content-between align-items-center">
                                                                        Show alerts
                                                                        <div class="form-check form-switch m-0">
                                                                            <input class="form-check-input"
                                                                                type="checkbox" role="switch"
                                                                                id="switchSix" />
                                                                        </div>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                        <!-- Card end -->
                                                    </div>
                                                </div>
                                                <!-- Row end -->
                                                <div class="d-flex gap-2 mt-4 justify-content-end">
                                                    <button type="button" class="btn btn-outline-secondary">
                                                        Cancel
                                                    </button>
                                                    <button type="button" class="btn btn-success">
                                                        Update
                                                    </button>
                                                </div>
                                            </div>
                                            <div class="tab-pane fade" id="threeA" role="tabpanel">
                                                <!-- Row start -->
                                                <div class="row">
                                                    <div class="col-12">
                                                        <div class="table-responsive">
                                                            <table class="table align-middle table-bordered m-0">
                                                                <thead>
                                                                    <tr>
                                                                        <th>Bank Name</th>
                                                                        <th>Card Number</th>
                                                                        <th>Card type</th>
                                                                        <th>Expiry Date</th>
                                                                        <th>Credit Balance</th>
                                                                        <th>Actions</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    <tr>
                                                                        <td>Bank of America</td>
                                                                        <td>0000 0000 0000 0000</td>
                                                                        <td>Visa</td>
                                                                        <td>10/10/2025</td>
                                                                        <td>$100000</td>
                                                                        <td>
                                                                            <div class="form-check form-switch m-0">
                                                                                <input class="form-check-input"
                                                                                    type="checkbox" role="switch"
                                                                                    id="cardActive" />
                                                                            </div>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>Citi Group</td>
                                                                        <td>0000 0000 0000 0000</td>
                                                                        <td>Master</td>
                                                                        <td>02/24/2028</td>
                                                                        <td>$150000</td>
                                                                        <td>
                                                                            <div class="form-check form-switch m-0">
                                                                                <input class="form-check-input"
                                                                                    type="checkbox" role="switch"
                                                                                    id="cardActive2" checked />
                                                                            </div>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>Capital One</td>
                                                                        <td>0000 0000 0000 0000</td>
                                                                        <td>Visa</td>
                                                                        <td>05/05/2025</td>
                                                                        <td>$50000</td>
                                                                        <td>
                                                                            <div class="form-check form-switch m-0">
                                                                                <input class="form-check-input"
                                                                                    type="checkbox" role="switch"
                                                                                    id="cardActive3" checked />
                                                                            </div>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>Axix</td>
                                                                        <td>0000 0000 0000 0000</td>
                                                                        <td>Visa</td>
                                                                        <td>08/20/2027</td>
                                                                        <td>$100000</td>
                                                                        <td>
                                                                            <div class="form-check form-switch m-0">
                                                                                <input class="form-check-input"
                                                                                    type="checkbox" role="switch"
                                                                                    id="cardActive4" checked />
                                                                            </div>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>HDFC</td>
                                                                        <td>0000 0000 0000 0000</td>
                                                                        <td>Visa</td>
                                                                        <td>05/08/2029</td>
                                                                        <td>$90000</td>
                                                                        <td>
                                                                            <div class="form-check form-switch m-0">
                                                                                <input class="form-check-input"
                                                                                    type="checkbox" role="switch"
                                                                                    id="cardActive5" />
                                                                            </div>
                                                                        </td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- Row end -->
                                                <div class="d-flex gap-2 mt-4 justify-content-end">
                                                    <button type="button" class="btn btn-outline-secondary">
                                                        Cancel
                                                    </button>
                                                    <button type="button" class="btn btn-success">
                                                        Update
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Row end -->

                </div>
                <!-- App body ends -->


            </div>
            <!-- App container ends -->

        </div>
        <!-- Main container end -->

    </div>
    <!-- Page wrapper end -->


    @include('backend/layouts/js')
