@extends('admin.layouts.app')

@section('content')
<div class="row">
    <div class="col-xl-12">
        <div class="card mb-3">
            <div class="row no-gutters">
                <div class="col-md-12">
                    <div class="card-body">
                        <h5 class="card-title pt-2">Settings</h5>

                        <!-- Display Success Message -->
                        @if(session('status-success'))
                            <div class="alert alert-success">
                                {{ session('status-success') }}
                            </div>
                        @endif
<form action="{{ route('admin.setting.store') }}" method="POST" enctype="multipart/form-data">
    @csrf

                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                            <div class="form-group">
                                <label for="facebook">Facebook Link</label>
                                <input type="text" class="form-control" name="facebook" id="facebook" placeholder="Facebook Link" value="{{ $settings->facebook ?? '' }}">
                            </div>

                            <div class="form-group">
                                <label for="instagram">Instagram Link</label>
                                <input type="text" class="form-control" name="instagram" id="instagram" placeholder="Instagram Link" value="{{ $settings->instagram ?? '' }}">
                            </div>

                            <div class="form-group">
                                <label for="twitter">Twitter Link</label>
                                <input type="text" class="form-control" name="twitter" id="twitter" placeholder="Twitter Link" value="{{ $settings->twitter ?? '' }}">
                            </div>

                            <div class="form-group">
                                <label for="youtube">Youtube Link</label>
                                <input type="text" class="form-control" name="youtube" id="youtube" placeholder="Youtube Link" value="{{ $settings->youtube ?? '' }}">
                            </div>


                            <div class="form-group">
                                <label for="phone">Phone</label>
                                <input type="text" class="form-control" name="phone[]" id="phone1" placeholder="Phone Number" value="{{ $phones[0] ?? '' }}">
                            </div>

                            <!-- Additional Phone Fields (will be added dynamically) -->
                            <div id="additional-phones">
                                @foreach($phones as $index => $phone)
                                    @if ($index > 0) <!-- Skip the first phone number field -->
                                        <div class="form-group" id="phone{{ $index + 1 }}-container">
                                            <label for="phone{{ $index + 1 }}">Phone {{ $index + 1 }}</label>
                                            <input type="text" class="form-control" name="phone[]" id="phone{{ $index + 1 }}" placeholder="Phone Number" value="{{ $phone }}">
                                            <button type="button" class="btn btn-danger mt-1" onclick="removePhoneField({{ $index + 1 }})">Remove</button>
                                        </div>
                                    @endif
                                @endforeach
                            </div>

                            <!-- Button to Add More Phone Numbers -->
                            <button type="button" class="btn btn-secondary" id="add-phone-btn">Add Another Phone Number</button>

                            <script>
                                document.addEventListener("DOMContentLoaded", function () {
                                    let phoneCount = {{ count($phones) }};  // Count of the existing phone numbers

                                    // Maximum number of phone fields allowed
                                    const maxPhones = 3;

                                    // Add event listener for "Add Phone Number" button
                                    document.getElementById("add-phone-btn").addEventListener("click", function() {
                                        // If the phoneCount is less than the maximum allowed, add a new phone field
                                        if (phoneCount < maxPhones) {
                                            phoneCount++;

                                            // Create a new input field for phone number
                                            let phoneFieldHTML = `
                                                <div class="form-group" id="phone${phoneCount}-container">
                                                    <label for="phone${phoneCount}">Phone ${phoneCount}</label>
                                                    <input type="text" class="form-control" name="phone[]" id="phone${phoneCount}" placeholder="Phone Number">
                                                    <button type="button" class="btn btn-danger mt-1" onclick="removePhoneField(${phoneCount})">Remove</button>
                                                </div>
                                            `;

                                            // Append the new phone field to the additional phones container
                                            document.getElementById("additional-phones").insertAdjacentHTML('beforeend', phoneFieldHTML);
                                        } else {
                                            alert('You can add a maximum of 3 phone numbers.');
                                        }
                                    });
                                });

                                // Function to remove a phone number field
                                function removePhoneField(phoneCount) {
                                    document.getElementById(`phone${phoneCount}-container`).remove();
                                }
                            </script>


                            <div class="form-group">
                                <label for="fax">Fax</label>
                                <input type="text" class="form-control" name="fax" id="fax" placeholder="Fax Number" value="{{ $settings->fax ?? '' }}">
                            </div>



                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="text" class="form-control" name="email" id="email" placeholder="Email" value="{{ $settings->email ?? '' }}">
                            </div>


                            <div class="form-group">
                                <label for="address">Address</label>
                                <input type="text" class="form-control" name="address" id="address" placeholder="Address" value="{{ $settings->address ?? '' }}">
                            </div>

                            <div class="form-group">
                                <label for="url">Site URL</label>
                                <input type="text" class="form-control" name="url" id="url" placeholder="Site URL" value="{{ $settings->url ?? '' }}">
                            </div>

                            <div class="form-group">
                                <label for="address">Location</label>
                                <input type="text" class="form-control" name="location" id="location" placeholder="Location URL" value="{{ $settings->location ?? '' }}">
                            </div>

                            <!-- Add in your <head> or before your script -->
                            <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />
                            <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>

                                                        <div id="admin-map" style="width: 100%; height: 200px; margin-top: 10px;"></div>

                            <script>
                                document.addEventListener("DOMContentLoaded", function() {
                                    var locationInput = document.getElementById('location');
                                    var map = L.map('admin-map').setView([51.505, -0.09], 13);

                                    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                                        attribution: '&copy; OpenStreetMap contributors'
                                    }).addTo(map);

                                    var marker;

                                    function updateMap() {
                                        var url = locationInput.value;
                                        var regex = /@(-?\d+\.\d+),(-?\d+\.\d+)/;
                                        var matches = url.match(regex);
                                        if (matches && matches.length >= 3) {
                                            var coords = [parseFloat(matches[1]), parseFloat(matches[2])];
                                            map.setView(coords, 15);
                                            if (marker) {
                                                marker.setLatLng(coords);
                                            } else {
                                                marker = L.marker(coords).addTo(map);
                                            }
                                        }
                                    }

                                    locationInput.addEventListener('input', updateMap);
                                    updateMap(); // Initialize on page load
                                });
                            </script>


                            <!--<div class="form-group">-->
                            <!--    <label for="logo">Logo</label>-->
                            <!--    <input type="file" name="logo" class="form-control">-->
                            <!--    @if (!empty($settings->logo))-->
                            <!--        <div class="mt-2">-->
                            <!--            <p>Current Image:</p>-->
                            <!--            <img src="{{ asset($settings->logo) }}" class="img-thumbnail" alt="Logo" width="150px" height="150px">-->
                            <!--        </div>-->
                            <!--        <div class="mt-2">-->
                            <!--            <input type="checkbox" name="remove_logo" value="1"> Remove-->
                            <!--        </div>-->
                            <!--    @endif-->
                            <!--</div>-->

                            <div class="form-group mt-4">
                                <button type="submit" class="btn btn-primary btn-pill">Save Settings</button>
                                <button type="button" class="btn btn-light btn-pill">Cancel</button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
