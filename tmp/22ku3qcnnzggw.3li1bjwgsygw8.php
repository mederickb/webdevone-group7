<main>
    <aside class="sidebar">
        <div class="user-section">
            <div class="user-icon">
                <img src="<?= ($BASE) ?>/img/profile.jpg" alt="User Profile">
            </div>
            <div class="user-guest">
                <h4 class="text-login">Welcome, Guest!</h4>
            </div>            
        </div>
        <h3>MY LISTS<span><img width="30" height="30" src="https://img.icons8.com/ios-filled/50/search--v1.png" alt="search--v1"/></span></h3>
        <div class="list-task">All Tasks <span class="menu-toggle">≡</span></div>
        <div class="list-container">
            <div class="list-item">ToDo <a href="<?= ($BASE) ?>/new" class="addnew">+</a></div>
            <div class="list-item">Done <a href="<?= ($BASE) ?>/new" class="addnew">+</a></div>
            <div class="list-item">Overdue Task <a href="<?= ($BASE) ?>/new" class="addnew">+</a></div>
            <div class="list-item">Important! <a href="<?= ($BASE) ?>/new" class="addnew">+</a></div>
        </div>
    </aside>

    <div class="auth-container">
        <form class="login-form" action="<?= ($BASE) ?>/login" method="post">
            <?php if ($error): ?>
                <div class="alert alert-danger custom-error"><?= ($error) ?></div>
            <?php endif; ?>
            <input type="email" name="email" placeholder="Email" required>
            <input type="password" name="password" placeholder="Password" required>
            <input type="submit" class="btn btn-primary" value="Login"></input>
        </form>

        <hr>

        <form class="signup-form" action="<?= ($BASE) ?>/signup" method="post">
            <div class="name-fields">
                <input type="text" name="firstName" placeholder="FirstName" required>
                <input type="text" name="lastName" placeholder="LastName" required>
            </div>
            <input type="email" name="email" placeholder="Email" required>
            <input type="password" name="password" placeholder="Password" required>
            <input type="submit" class="btn btn-primary" value="Signup"></input>
        </form>
    </div>
</main>

