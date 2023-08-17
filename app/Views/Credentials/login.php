<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <title>ExpertBill</title>
    <meta name="description" content="Experts options for Billing" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link
      rel="stylesheet"
      href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
    />
    <style>
      body {
        background: #f8f9fa;
        font-family: "Poppins", sans-serif;
        margin: 0;
        display: flex;
        justify-content: center;
        align-items: center;
        min-height: 100vh;
      }

      .card {
        border: none;
        border-radius: 20px;
        background-color: #ffffff;
        box-shadow: 0px 40px 80px rgba(0, 0, 0, 0.15);
        overflow: hidden;
        width: 90%;
        max-width: 600px;
        position: relative;
        z-index: 1;
      }

      .card:before {
        content: "";
        position: absolute;
        top: -20%;
        left: 50%;
        transform: translateX(-50%);
        width: 200%;
        height: 140%;
        background: linear-gradient(30deg, #0056b3, #007bff);
        clip-path: polygon(0 0, 100% 0%, 100% 75%, 0% 100%);
        z-index: -1;
      }

      .card-header {
        color: white;
        text-align: center;
        padding: 3rem 2rem;
        position: relative;
        z-index: 2;
      }

      .nav-tabs .nav-link {
        color: #ffffff;
        font-weight: bold;
        border: none;
        border-radius: 0;
        transition: color 0.3s;
      }

      .nav-tabs .nav-link.active {
        background-color: transparent;
        color: #ffd700;
      }

      .form-group label {
        font-weight: bold;
        color: #fff;

        letter-spacing: 0.5px;
      }

      .form-control {
        border: none;
        border-radius: 10px;
        padding: 1.5rem;
        background-color: #f8f9fa;
        color: #333;
        box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
      }

      .form-control:focus {
        outline: none;
      }

      .btn-primary {
        background-color: #ffd700;
        border: none;
        border-radius: 10px;
        padding: 1.5rem;
        transition: background-color 0.3s;
        font-weight: bold;
        letter-spacing: 1px;
        text-transform: uppercase;
        width: 100%;
        cursor: pointer;
        box-shadow: 0px 4px 10px rgba(255, 215, 0, 0.4);
      }

      .btn-primary:hover {
        background-color: #ffd700;
      }

      #forgotPasswordLink {
        color: #ffffff;
        text-decoration: none;
        transition: color 0.3s;
      }

      #forgotPasswordLink:hover {
        color: #ffd700;
      }
    </style>
  </head>
  <body>
    <div
      class="container-fluid bg-dark vh-100 d-flex align-items-center justify-content-center"
    >
      <div class="card p-0">
        <div class="card-header bg-primary text-white text-center">
          <ul class="nav nav-tabs card-header-tabs" id="myTab" role="tablist">
            <li class="nav-item">
              <a
                class="nav-link active"
                id="login-tab"
                data-toggle="tab"
                href="#login"
                role="tab"
                aria-controls="login"
                aria-selected="true"
                >Login</a
              >
            </li>
            <li class="nav-item">
              <a
                class="nav-link"
                id="signup-tab"
                data-toggle="tab"
                href="#signup"
                role="tab"
                aria-controls="signup"
                aria-selected="false"
                >Signup</a
              >
            </li>
          </ul>
        </div>
        <div class="card-body">
          <div class="tab-content" id="myTabContent">
            <div
              class="tab-pane fade show active"
              id="login"
              role="tabpanel"
              aria-labelledby="login-tab"
            >
              <!-- Login Form -->
              <form
                id="loginForm"
                action="<?= base_url('Credentials/login_check') ?>"
                method="post"
              >
                <?= csrf_field() ?>

                <div class="form-group">
                  <label for="Email">Email</label>
                  <input
                    type="email"
                    class="form-control"
                    id="Email"
                    name="email"
                    placeholder="Enter email"
                    required
                  />
                </div>
                <div class="form-group">
                  <label for="Password">Password</label>
                  <input
                    type="password"
                    class="form-control"
                    id="Password"
                    name="password"
                    placeholder="Password"
                    required
                  />
                </div>
                <button type="submit" class="btn btn-primary btn-block">
                  Login
                </button>
              </form>
              <a
                href="#"
                class="mt-3 d-block text-center"
                id="forgotPasswordLink"
                >Forgot password?</a
              >
            </div>
            <div
              class="tab-pane fade"
              id="signup"
              role="tabpanel"
              aria-labelledby="signup-tab"
            >
              <!-- Signup Form -->
              <form
                id="signupForm"
                action="<?= base_url('Credentials/Register') ?>"
                method="post"
              >
              <?= csrf_field() ?>
                <div class="form-group">
                  <label for="FirstName">First Name</label>
                  <input
                    type="text"
                    class="form-control"
                    id="FirstName"
                    name="first_name"
                    placeholder="Enter your First name"
                    required
                  />
                  <label for="LastName">Last Name</label>
                  <input
                    type="text"
                    class="form-control"
                    id="LastName"
                    name="last_name"
                    placeholder="Enter your Last name"
                    required
                  />
                </div>
                <div class="form-group">
                  <label for="Email">Email address</label>
                  <input
                    type="email"
                    class="form-control"
                    id="Email"
                    name="email"
                    placeholder="email@email.com"
                    required
                  />
                </div>
                <div class="form-group">
                  <label for="Contact">Contact Number</label>
                  <input
                    type="tel"
                    class="form-control"
                    id="Contact"
                    name="contact_number"
                    placeholder="Contact Number"
                    required
                  />
                </div>
                <div class="form-group">
                  <label for="Password">Password</label>
                  <input
                    type="password"
                    class="form-control"
                    id="Password"
                    name="password"
                    placeholder="Password"
                    required
                  />
                </div>
                <button type="submit" class="btn btn-primary btn-block">
                  Signup
                </button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script></script>
  </body>
</html>
