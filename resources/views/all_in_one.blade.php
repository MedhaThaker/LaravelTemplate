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
    <h1 style="text-align: center;">All in one form</h1>
    <div class="alert alert-primary" role="alert">
        <strong></strong>
    </div>
      <div class="section">
        <div class="container">
            <div class="row">
                <form action="{{route('user.store')}}" method="post">
                    @csrf
                    <div class="form-group">
                      <label for="f_name">First Name</label>
                      <input type="text" class="form-control" name="f_name" id="f_name" placeholder="Please enter first name" value="">
                    </div>
                    <div class="form-group">
                      <label for="m_name">Middle Name</label>
                      <input type="text" class="form-control" name="m_name" id="m_name" placeholder="Please enter middle name" value="">
                    </div>
                    <div class="form-group">
                      <label for="l_name">Last Name</label>
                      <input type="text" class="form-control" name="l_name" id="l_name" placeholder="Please enter last name" value="">
                    </div>
                    <div class="form-group">
                      <label for="email">Email</label>
                      <input type="email" class="form-control" name="email" id="email" placeholder="Please enter email" value="">
                    </div>
                    <div class="form-group">
                      <label for="dob">Date of birth</label>
                      <input type="date" class="form-control" name="dob" id="dob" placeholder="Please enter date of birth" value="">
                    </div>
                    <div class="form-group">
                      
                   
                    <label for="gender">Gender</label>

                    <div class="form-check form-check-inline">
                      <label class="form-check-label">
                        <input class="form-check-input" type="radio" name="gender" id="gender" value="male"> Male
                        <input class="form-check-input" type="radio" name="gender" id="gender" value="female"> Female
                        <input class="form-check-input" type="radio" name="gender" id="gender" value="other"> Other
                        <input class="form-check-input" type="radio" name="gender" id="gender" value="prefer not to say"> Prefer not to say
                      </label>
                    </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
      </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>