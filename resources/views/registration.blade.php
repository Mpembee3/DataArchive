<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>Member Registration Form</title>

  <!-- Bootstrap CSS Files -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
<main>
  <div class="container">
    <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-lg-6 col-md-6 d-flex flex-column align-items-center justify-content-center">

            <div class="card">
              <div class="card-body">
                <h5 class="card-title">Enter Your Information</h5>

                <!-- Registration Form -->
                <form method="POST" action="{{ route('createUser') }}" class="row g-3 needs-validation" novalidate>
                                @csrf
                                <div class="col-md-6">
                                    <label for="fname" class="form-label">First Name</label>
                                    <input type="text" name="fname" class="form-control" id="fname" required value="{{ old('fname') }}">
                                    @error('fname')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <label for="lname" class="form-label">Last Name</label>
                                    <input type="text" name="lname" class="form-control" id="lname" required value="{{ old('lname') }}">
                                    @error('lname')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="email" name="email" class="form-control" id="email" required value="{{ old('email') }}">
                                    @error('email')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <label for="phone" class="form-label">Phone</label>
                                    <input type="text" name="phone" class="form-control" id="phone" required value="{{ old('phone') }}">
                                    @error('phone')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <label for="gender" class="form-label">Gender</label>
                                    <select name="gender" class="form-select" id="gender" required>
                                        <option selected disabled value="">Select gender</option>
                                        <option value="Male" {{ old('gender') == 'Male' ? 'selected' : '' }}>Male</option>
                                        <option value="Female" {{ old('gender') == 'Female' ? 'selected' : '' }}>Female</option>
                                    </select>
                                    @error('gender')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <label for="birthdate" class="form-label">Date of Birth</label>
                                    <input type="date" name="birthdate" class="form-control" id="birthdate" min="1940-01-01" required value="{{ old('birthdate') }}">
                                    @error('birthdate')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <label for="supervisor" class="form-label">Supervisor</label>
                                    <select name="supervisor_id" class="form-select" id="supervisor">
                                        <option selected disabled>Select Supervisor</option>
                                        @foreach($users as $user)
                                            @if($user->member)
                                                <option value="{{ $user->member->id }}" {{ old('supervisor_id') == $user->member->id ? 'selected' : '' }}>
                                                    {{ $user->member->fname }} {{ $user->member->lname }}
                                                </option>
                                            @endif
                                        @endforeach
                                    </select>
                                    @error('supervisor_id')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <label for="address" class="form-label">Address</label>
                                    <input type="text" name="address" class="form-control" id="address" required value="{{ old('address') }}">
                                    @error('address')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-8">
                                    <label class="form-label">Marital Status</label>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="marital_status" id="single" value="Single" {{ old('marital_status', 'Single') == 'Single' ? 'checked' : '' }}>
                                        <label class="form-check-label" for="single">Single</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="marital_status" id="married" value="Married" {{ old('marital_status') == 'Married' ? 'checked' : '' }}>
                                        <label class="form-check-label" for="married">Married</label>
                                    </div>
                                    @error('marital_status')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-12">
                                    <button class="btn btn-primary" type="submit">Register</button>
                                </div>
                            </form>

              </div>
            </div>

          </div>
        </div>

      </div>
    </section>
  </div>
</main>

<!-- Bootstrap JS Files -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
