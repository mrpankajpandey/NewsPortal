
<header class="header">
    <a href="" class="brand">Pankaj</a>
    <div class="menu-btn btn btn-primary">&#8801</div>
    <div class="navigation">

        <div class="navigation-items">
            <a href="index.php">Home</a>
            <a href="">About</a>
            <?php if(!isset($_SESSION['auth_user'])) :?>
            <a class="btn btn-primary" href="login.php">Login</a>
            <a class="btn btn-primary" href="signUp.php">SignUp</a>
            <?php elseif(isset($_SESSION['auth_user'])) :?>
            <a href="./admin/index.php">
                 Hello !
               <span style="color:blue; cursor:pointer; text-transform: uppercase;"> <?= $_SESSION['auth_user']['user_name']; ?> </span>
            </a>
            <a href="" class="btn">
                <form action="logout.php" method="post">
                    <button name="logout" class="btn btn-danger" type="submit">logOut</button>
                </form>
            </a>

            <?php endif ; ?>
        </div>
    </div>
</header>

<script>
const menuBtn = document.querySelector('.menu-btn');
const navigation = document.querySelector('.navigation');

menuBtn.addEventListener('click', () => {
    menuBtn.classList.toggle('active');
    navigation.classList.toggle('active');
})
</script>