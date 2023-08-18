<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <title>ExpertBill</title>
    <meta name="description" content="Experts options for Billing" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!-- Set Content Security Policy meta tag -->

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
        padding: 1.5rem 2rem; /* Reduced padding for smaller heading */
        position: relative;
        z-index: 2;
        display: flex;
        flex-direction: column; /* Change to column direction */
        align-items: center;
      }

      .toggle-container {
        display: flex;
        flex-direction: column; /* Align items vertically */
        align-items: center;
        margin-top: 0.5rem; /* Adjust margin if needed */
        margin-bottom: 0.5rem; /* Adjust margin if needed */
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

      .custom-switch {
        position: relative;
        display: inline-block;
        width: 60px;
        height: 34px;
        margin-right: 10px;
      }

      .custom-switch input {
        display: none;
      }

      .slider {
        position: absolute;
        cursor: pointer;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background-color: #ccc;
        transition: 0.4s;
        border-radius: 34px;
      }

      .slider:before {
        position: absolute;
        content: "";
        height: 26px;
        width: 26px;
        left: 4px;
        bottom: 4px;
        background-color: #fff;
        transition: 0.4s;
        border-radius: 50%;
        box-shadow: 0px 2px 4px rgba(0, 0, 0, 0.2);
      }

      input:checked + .slider {
        background-color: #2196f3; /* Blue color when checked */
      }

      input:checked + .slider:before {
        transform: translateX(26px);
        background-color: #ffd700; /* Yellow color when checked */
      }

      .slider.round {
        border-radius: 34px;
      }

      .slider.round:before {
        border-radius: 50%;
      }
    </style>
  </head>
  <body>
    <div
      class="container-fluid bg-dark vh-100 d-flex align-items-center justify-content-center"
    >
      <div class="card p-0">
        <div class="card-header bg-primary text-white text-center">
          <div class="toggle-container">
            <label class="custom-switch">
              <input
                type="checkbox"
                class="custom-control-input"
                id="toggleSwitch"
              />
              <span class="slider round"></span>
            </label>
            <label class="form-check-label">Switch to Signup</label>
          </div>
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

            <!-- ... Rest of your HTML code ... -->

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
                <div class="form-row">
                  <div class="form-group col-md-6">
                    <label for="Username">Username</label>
                    <input
                      type="text"
                      class="form-control"
                      id="Username"
                      name="username"
                      placeholder="Username"
                      required
                    />
                  </div>

                  <div class="form-group col-md-6">
                    <label for="FirstName">First Name</label>
                    <input
                      type="text"
                      class="form-control"
                      id="FirstName"
                      name="first_name"
                      placeholder="Enter your First name"
                      required
                    />
                  </div>
                </div>
                <div class="form-row">
                  <div class="form-group col-md-6">
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
                  <div class="form-group col-md-6">
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
                </div>
                <div class="form-row">
                  <div class="form-group col-md-6">
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
                  <div class="form-group col-md-6">
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
                </div>
                <button type="submit" class="btn btn-primary btn-block">
                  Signup
                </button>
              </form>
            </div>

            <!-- ... Rest of your HTML code ... -->
          </div>
        </div>
      </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
      const toggleSwitch = document.getElementById("toggleSwitch");
      const loginForm = document.getElementById("login");
      const signupForm = document.getElementById("signup");
      const toggleLabel = document.querySelector(".form-check-label");

      toggleSwitch.addEventListener("change", () => {
        if (toggleSwitch.checked) {
          loginForm.classList.remove("show", "active");
          signupForm.classList.add("show", "active");
          toggleLabel.textContent = "Switch to Login"; // Change label text
        } else {
          signupForm.classList.remove("show", "active");
          loginForm.classList.add("show", "active");
          toggleLabel.textContent = "Switch to Signup"; // Change label text
        }
      });
    </script>
  </body>
</html>
