<?php session_start(); ?>
<style>
    a:hover {
        color: black;
        font-weight: bolder;
    }
</style>
<nav class="navbar opacity-75 navbar-expand-lg bg-body-secondary sticky-top">
    <div class="container-fluid">
        <a class="navbar-brand" title="iDiscuss" href="index.php">iDiscuss</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" title="Home" href="index.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" title="About" href="about.php">About</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" title="Categories" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Categories
                    </a>
                    <?php
                    include "partials/_dbconnect.php";
                    $sql = "SELECT * FROM `categories`";
                    $result = mysqli_query($conn, $sql);
                    ?>
                    <ul class="dropdown-menu">
                        <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                            <li><a class="dropdown-item" title="<?= $row['category_name']; ?>" href="threadlist.php?id=<?php echo $row['category_id']; ?>"><?= $row['category_name']; ?></a></li>
                        <?php } ?>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="contact.php" title="Contact" class="nav-link ">Contact</a>
                </li>
            </ul>
            <form action="search.php" method="get" class="d-flex" role="search">
                <input class="form-control me-2 bg-body-tertiary" title=" Seach iDiscuss" name="search" type="search" placeholder="&#128269; Search iDiscuss" aria-label="Search">
                <button class="btn btn-sm btn-dark mx-2"  title="Search" type="submit"> Search</button>
            </form>
          
            <?php if (isset($_SESSION['loggedin']) == true) { ?>
                 Welcome&nbsp  <b> "<?php echo  $_SESSION['username'];?>"</b>
            <?php } ?>
            <?php if (!isset($_SESSION['loggedin']) == true) { ?> <button class="btn-sm py-2 btn btn-outline-secondary m-1" title="Login" data-bs-toggle="modal" data-bs-target="#staticBackdrop1"> Login</button>


                <button class="btn btn-sm btn-outline-secondary m-1 py-2" title="Signup" data-bs-toggle="modal" data-bs-target="#staticBackdrop">Signup</button>
            <?php } else { ?>
                <button class="btn btn-sm btn-outline-secondary m-1" title="Logout"><a class="text-dark text-decoration-none" href="logout.php"> Logout </a></button>
            <?php } ?>  
            </form>

        </div>
</nav>
<div class="modal fade " id="staticBackdrop1" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-body-secondary">
                <h1 class="modal-title fs-5 " id="staticBackdrop1">Login to iDiscuss</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body bg-body-secondary">
                <form action="login.php" method="post">
                    <div class="mb-3 ">
                        <label for="username" class="form-label">Username</label>
                        <input type="text" required class="form-control bg-body-tertiary" id="username" name="username" aria-describedby="emailHelp">
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" name="password" required class="form-control bg-body-tertiary" id="password">
                    </div>

                    <div class="modal-footer bg-body-secondary">
                        <button type="submit" class="btn btn-secondary">Login</button>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade " id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-body-secondary">
                <h1 class="modal-title fs-5 " id="staticBackdropLabel">Sign up to iDiscuss</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body bg-body-secondary">
                <form action="signup.php" method="post">
                    <div class="mb-3 ">
                        <label for="username" class="form-label">Username</label>
                        <input type="text" required class="form-control bg-body-tertiary" id="username" name="username" aria-describedby="emailHelp">
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" name="password" required class="form-control bg-body-tertiary" id="password">
                    </div>
                    <div class="mb-3">
                        <label for="cpassword" class="form-label">Confirm Password</label>
                        <input type="password" name="cpassword" required class="form-control bg-body-tertiary" id="exampleInputPassword1">
                        <div id="cpassword" class="form-text">Make sure that confirm password is same as password.</div>
                    </div>
                    <div class="modal-footer bg-body-secondary">
                        <button type="submit" class="btn btn-secondary">Signup</button>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>