</head>
<body>
  <div id="header">
    <div id="navigation">
      <ul>
        <li><a href="index.php">Home</a></li>
        <li><a href="search.php">Search</a></li>
        <?php
          session_start();
          if(isset($_SESSION['userAuthenticated'])){
            echo '<li class="right-element plain-text">Welcome, ' . $_SESSION['userName'] . '!</li>
                  <li class="right-element"><a href="php/logout.php">Logout</a></li>';
          } else {
            echo '<li class="right-element"><a href="login.php">Login</a></li>
                  <li class="right-element"><a href="registration.php">Register</a></li>';
          }
        ?>
      </ul>
    </div>
  </div>

  <div id="content">
