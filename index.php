<?php
session_start();
include("kon.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = htmlspecialchars($_POST['email']);
    $password = htmlspecialchars(md5($_POST['pass']));

    // Hash the password using a secure hashing algorithm (e.g., bcrypt)
    // $hashedPassword = password_hash($password, PASSWORD_BCRYPT);

    $sql = "SELECT * FROM login WHERE email = '$email' AND password = '$password'";
    $result = $kon->query($sql);
    $getid = mysqli_fetch_assoc($result);


    if ($result->num_rows > 0) {
        $_SESSION['email'] = $email;
        $_SESSION['id_login'] = $getid['id_login'];
        header("Location: album.php");
        exit();
    } else {
        $output = "email atau password salah!";
    }
}

$kon->close();
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <title>Login V1</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link rel="icon" type="image/png" href="https://colorlib.com/etc/lf/Login_v1/images/icons/favicon.ico" />

  <link rel="stylesheet" type="text/css" href="https://colorlib.com/etc/lf/Login_v1/vendor/bootstrap/css/bootstrap.min.css">

  <link rel="stylesheet" type="text/css" href="https://colorlib.com/etc/lf/Login_v1/fonts/font-awesome-4.7.0/css/font-awesome.min.css">

  <link rel="stylesheet" type="text/css" href="https://colorlib.com/etc/lf/Login_v1/vendor/animate/animate.css">

  <link rel="stylesheet" type="text/css" href="https://colorlib.com/etc/lf/Login_v1/vendor/css-hamburgers/hamburgers.min.css">

  <link rel="stylesheet" type="text/css" href="https://colorlib.com/etc/lf/Login_v1/vendor/select2/select2.min.css">

  <link rel="stylesheet" type="text/css" href="https://colorlib.com/etc/lf/Login_v1/css/util.css">
  <link rel="stylesheet" type="text/css" href="https://colorlib.com/etc/lf/Login_v1/css/main.css">

  <meta name="robots" content="noindex, follow">
  <script nonce="4975cb3e-b90f-4292-adbb-12fbcf3d6255">
    (function(w, d) {
      ! function(j, k, l, m) {
        j[l] = j[l] || {};
        j[l].executed = [];
        j.zaraz = {
          deferred: [],
          listeners: []
        };
        j.zaraz.q = [];
        j.zaraz._f = function(n) {
          return async function() {
            var o = Array.prototype.slice.call(arguments);
            j.zaraz.q.push({
              m: n,
              a: o
            })
          }
        };
        for (const p of ["track", "set", "debug"]) j.zaraz[p] = j.zaraz._f(p);
        j.zaraz.init = () => {
          var q = k.getElementsByTagName(m)[0],
            r = k.createElement(m),
            s = k.getElementsByTagName("title")[0];
          s && (j[l].t = k.getElementsByTagName("title")[0].text);
          j[l].x = Math.random();
          j[l].w = j.screen.width;
          j[l].h = j.screen.height;
          j[l].j = j.innerHeight;
          j[l].e = j.innerWidth;
          j[l].l = j.location.href;
          j[l].r = k.referrer;
          j[l].k = j.screen.colorDepth;
          j[l].n = k.characterSet;
          j[l].o = (new Date).getTimezoneOffset();
          if (j.dataLayer)
            for (const w of Object.entries(Object.entries(dataLayer).reduce(((x, y) => ({
                ...x[1],
                ...y[1]
              })), {}))) zaraz.set(w[0], w[1], {
              scope: "page"
            });
          j[l].q = [];
          for (; j.zaraz.q.length;) {
            const z = j.zaraz.q.shift();
            j[l].q.push(z)
          }
          r.defer = !0;
          for (const A of [localStorage, sessionStorage]) Object.keys(A || {}).filter((C => C.startsWith("_zaraz_"))).forEach((B => {
            try {
              j[l]["z_" + B.slice(7)] = JSON.parse(A.getItem(B))
            } catch {
              j[l]["z_" + B.slice(7)] = A.getItem(B)
            }
          }));
          r.referrerPolicy = "origin";
          r.src = "/cdn-cgi/zaraz/s.js?z=" + btoa(encodeURIComponent(JSON.stringify(j[l])));
          q.parentNode.insertBefore(r, q)
        };
        ["complete", "interactive"].includes(k.readyState) ? zaraz.init() : j.addEventListener("DOMContentLoaded", zaraz.init)
      }(w, d, "zarazData", "script");
    })(window, document);
  </script>
</head>

<body>
  <div class="limiter">
    <div class="container-login100">
      <div class="wrap-login100">
        <div class="login100-pic js-tilt" data-tilt>
          <img src="login.png" alt="IMG">
        </div>

        <form class="login100-form validate-form" method="post" action="index.php">
          <span class="login100-form-title">
            Member Login
          </span>
          <div class="wrap-input100 validate-input" data-validate="Valid email is required: ex@abc.xyz">
            <input class="input100" type="text" name="email" placeholder="Email">
            <span class="focus-input100"></span>
            <span class="symbol-input100">
              <i class="fa fa-envelope" aria-hidden="true"></i>
            </span>
          </div>
          <div class="wrap-input100 validate-input" data-validate="Password is required">
            <input class="input100" type="password" name="pass" placeholder="Password">
            <span class="focus-input100"></span>
            <span class="symbol-input100">
              <i class="fa fa-lock" aria-hidden="true"></i>
            </span>
          </div>
          <div class="container-login100-form-btn">
            <button class="login100-form-btn">
              Login
            </button>
          </div>
          <div class="text-center p-t-12">
            <span class="txt1">
              Forgot
            </span>
            <a class="txt2" href="lupa.php">
              email / Password?
            </a>
          </div>
          <div class="text-center p-t-136">
            <a class="txt2" href="reg.php">
              Create your Account
              <i class="fa fa-long-arrow-right m-l-5" aria-hidden="true"></i>
            </a>
          </div>
        </form>
      </div>
    </div>
  </div>

  <script src="https://colorlib.com/etc/lf/Login_v1/vendor/jquery/jquery-3.2.1.min.js"></script>

  <script src="https://colorlib.com/etc/lf/Login_v1/vendor/bootstrap/js/popper.js"></script>
  <script src="https://colorlib.com/etc/lf/Login_v1/vendor/bootstrap/js/bootstrap.min.js"></script>

  <script src="https://colorlib.com/etc/lf/Login_v1/vendor/select2/select2.min.js"></script>

  <script src="https://colorlib.com/etc/lf/Login_v1/vendor/tilt/tilt.jquery.min.js"></script>
  <script>
    $('.js-tilt').tilt({
      scale: 1.1
    })
  </script>

  <script async src="https://www.googletagmanager.com/gtag/js?id=UA-23581568-13"></script>
  <script>
    window.dataLayer = window.dataLayer || [];

    function gtag() {
      dataLayer.push(arguments);
    }
    gtag('js', new Date());

    gtag('config', 'UA-23581568-13');
  </script>

  <script src="https://colorlib.com/etc/lf/Login_v1/js/main.js"></script>
  <script defer src="https://static.cloudflareinsights.com/beacon.min.js/v84a3a4012de94ce1a686ba8c167c359c1696973893317" integrity="sha512-euoFGowhlaLqXsPWQ48qSkBSCFs3DPRyiwVu3FjR96cMPx+Fr+gpWRhIafcHwqwCqWS42RZhIudOvEI+Ckf6MA==" data-cf-beacon='{"rayId":"830d6392aed320f9","version":"2023.10.0","token":"cd0b4b3a733644fc843ef0b185f98241"}' crossorigin="anonymous"></script>
</body>

</html>