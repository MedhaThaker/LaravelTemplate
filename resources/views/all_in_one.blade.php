<!doctype html>
<html lang="en">

<head>
  <title>User Info Form</title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>
  <h1 style="text-align: center;">All in one form ({{ !empty($data->id) ? 'Edit' : 'Add' }})</h1>
  <!-- <div class="alert alert-primary" role="alert">
        <strong></strong>
    </div> -->
  <div class="section">
    <div class="container">

      <form action="{{!empty($data->id) ? route('user.update',$data->id) : route('user.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        {{method_field('PUT')}}
        <div class="row">
          <div class="col-md-4">
            <div class="form-group">
              <label for="f_name">First Name</label>
              <input type="text" class="form-control" name="f_name" id="f_name" placeholder="Please enter first name" value="{{ !empty($data->f_name) ? $data->f_name : '' }}">
            </div>
          </div>
          <div class="col-md-4">
            <div class="form-group">
              <label for="m_name">Middle Name</label>
              <input type="text" class="form-control" name="m_name" id="m_name" placeholder="Please enter middle name" value="{{ !empty($data->m_name) ? $data->m_name : '' }}">
            </div>
          </div>
          <div class="col-md-4">
            <div class="form-group">
              <label for="l_name">Last Name</label>
              <input type="text" class="form-control" name="l_name" id="l_name" placeholder="Please enter last name" value="{{ !empty($data->l_name) ? $data->l_name : '' }}">
            </div>
          </div>
          <div class="col-md-4">
            <div class="form-group">
              <label for="email">Email</label>
              <input type="email" class="form-control" name="email" id="email" placeholder="Please enter email" value="{{ !empty($data->email) ? $data->email : '' }}">
            </div>
          </div>
          <div class="col-md-4">
            <div class="form-group">
              <label for="dob">Date of birth</label>
              <input type="date" class="form-control" name="dob" id="dob" placeholder="Please enter date of birth" value="{{ !empty($data->dob) ? $data->dob : '' }}">
            </div>
          </div>
          <div class="col-md-4">
            <div class="form-group">
              <label for="gender">Gender</label>
              <div class="form-check form-check-inline">
                <label class="form-check-label">
                  <input class="form-check-input" type="radio" name="gender" id="male" value="male" {{!empty($data->gender) && ($data->gender == "male" ) ? "checked" : ''}}> <label for="male">Male</label><br>
                  <input class="form-check-input" type="radio" name="gender" id="female" value="female" {{!empty($data->gender) && ($data->gender == "female" ) ? "checked" : ''}}> <label for="female">Female</label><br>
                  <input class="form-check-input" type="radio" name="gender" id="other" value="other" {{!empty($data->gender) && ($data->gender == "other" ) ? "checked" : ''}}> <label for="other">Other</label><br>
                  <input class="form-check-input" type="radio" name="gender" id="prefer" value="prefer not to say" {{!empty($data->gender) && ($data->gender == "prefer not to say" ) ? "checked" : ''}}> <label for="prefer">Prefer not to say</label><br>
                </label>
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="form-group">
              <label for="mobile">Mobile</label>
              <input type="text" class="form-control" name="mobile" id="mobile" placeholder="Please enter mobile number" value="{{ !empty($data->mobile) ? $data->mobile : '' }}">
            </div>
          </div>
          <div class="col-md-4">
            <div class="form-group">
              <label for="age">Age</label>
              <input type="text" class="form-control" name="age" id="age" readonly value="{{ !empty($data->age) ? $data->age : '' }}">
            </div>
          </div>
          <div class="col-md-4">
            <div class="form-group">
              <label for="country">Country</label>
              <input type="text" class="form-control" name="country" id="country" placeholder="Please enter country name" value="{{ !empty($data->country) ? $data->country : '' }}">
            </div>
          </div>
          <div class="col-md-4">
            <div class="form-group">
              <label for="state">State</label>
              <input type="text" class="form-control" name="state" id="state" placeholder="Please enter state name" value="{{ !empty($data->state) ? $data->state : '' }}">
            </div>
          </div>
          <div class="col-md-4">
            <div class="form-group">
              <label for="city">City</label>
              <input type="text" class="form-control" name="city" id="city" placeholder="Please enter city name" value="{{ !empty($data->city) ? $data->city : '' }}">
            </div>
          </div>
          <div class="col-md-4">
            <div class="form-group">
              <label for="address">Address</label>
              <textarea class="form-control" name="address" id="address" rows="3" placeholder="Please enter cddress">{{ !empty($data->address) ? $data->address : '' }}</textarea>
            </div>
          </div>
          <div class="col-md-4">
            <div class="form-group">
              <label for="pincode">Pincode</label>
              <input type="text" class="form-control" name="pincode" id="pincode" placeholder="Please enter pincode" value="{{ !empty($data->pincode) ? $data->pincode : '' }}">
            </div>
          </div>
          <div class="col-md-4">
            <div class="form-group">
              <label for="nationality">Nationality</label>
              <input type="text" class="form-control" name="nationality" id="nationality" placeholder="Please enter nationality" value="{{ !empty($data->nationality) ? $data->nationality : '' }}">
            </div>
          </div>
          <div class="col-md-4">
            <div class="form-group">
              <label for="profile_photo_path">Profile Photo</label>
              <input type="file" class="form-control-file" name="profile_photo_path" id="profile_photo_path" placeholder="Please upload profile photo">
            </div>
          </div>
          <div class="col-md-4">
            <div class="form-group">
              <label for="occupation">Occupation</label>
              <input type="text" class="form-control" name="occupation" id="occupation" placeholder="Please enter occupation" value="{{ !empty($data->occupation) ? $data->occupation : '' }}">
            </div>
          </div>
        <div class="col-md-4">
            <div class="form-group">
              <label for="company_name">Company Name</label>
              <input type="text" class="form-control" name="company_name" id="company_name" placeholder="Please enter company name" value="{{ !empty($data->company_name) ? $data->company_name : '' }}">
            </div>
          </div>
        <div class="col-md-4">
            <div class="form-group">
              <label for="education_level">Education Level</label>
              <input type="text" class="form-control" name="education_level" id="education_level" placeholder="Please enter education level" value="{{ !empty($data->education_level) ? $data->education_level : '' }}">
            </div>
          </div>
        <div class="col-md-4">
            <div class="form-group">
              <label for="marital_status">Marital Status</label>
              <input type="text" class="form-control" name="marital_status" id="marital_status" placeholder="Please enter marital status" value="{{ !empty($data->marital_status) ? $data->marital_status : '' }}">
            </div>
          </div>
        <div class="col-md-4">
            <div class="form-group">
              <label for="preffered_language">Preffered Language</label>
              <input type="text" class="form-control" name="preffered_language" id="preffered_language" placeholder="Please enter preffered language" value="{{ !empty($data->preffered_language) ? $data->preffered_language : '' }}">
            </div>
          </div>
        <div class="col-md-4">
            <div class="form-group">
              <label for="religion">Religion</label>
              <input type="text" class="form-control" name="religion" id="religion" placeholder="Please enter religion" value="{{ !empty($data->religion) ? $data->religion : '' }}">
            </div>
          </div>
        <div class="col-md-4">
            <div class="form-group">
              <label for="interests">Interests</label>
              <input type="text" class="form-control" name="interests" id="interests" placeholder="Please enter interests" value="{{ !empty($data->interests) ? $data->interests : '' }}">
            </div>
          </div>
        <div class="col-md-4">
            <div class="form-group">
              <label for="preffered_communication_method">Preffered Communication Method</label>
              <input type="text" class="form-control" name="preffered_communication_method" id="preffered_communication_method" placeholder="Please enter preference" value="{{ !empty($data->preffered_communication_method) ? $data->preffered_communication_method : '' }}">
            </div>
          </div>
          <div class="col-md-4" style="display:{{ !empty($data->password) ? 'none' : 'block' }}" >
            <div class="form-group">
              <label for="password">Password</label>
              <input type="password" class="form-control" name="password" id="password" placeholder="Please enter password" >
            </div>
          </div>
          <div class="col-md-4" style="display:{{ !empty($data->password) ? 'none' : 'block' }}">
            <div class="form-group">
              <label for="confraimed_password">Re-enter Password</label>
              <input type="text" class="form-control" name="confraimed_password" id="confraimed_password" placeholder="Please enter password again">
            </div>
          </div>
        </div>
        <button type="submit" class="btn btn-primary">{{ !empty($data->id) ? 'Update' : 'Add' }}</button>
    </div>
    </form>

  </div>
  </div>
  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>