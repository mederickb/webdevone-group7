    <main>
        <aside class="sidebar">
            <div class="user-section">
                <div class="user-icon">
                    <img src="<?= ($BASE) ?>/img/profile.jpg" alt="User Profile">
                </div>
                <div class="user-name">
                    <span class="text-login"><?= ($SESSION['fullname']) ?></span>
                    <form action="<?= ($BASE) ?>/logout" method="post">
                        <input type="submit" class="btn btn-primary" value="Logout"></input>
                    </form>
                </div>   
            </div>
            <h3>MY LISTS<span><img width="30" height="30" src="https://img.icons8.com/ios-filled/50/search--v1.png" alt="search--v1"/></span></h3>
            <div class="list-task">All Tasks <span class="menu-toggle">≡</span></div>
            <div>
                <div class="list-item">ToDo <a href="<?= ($BASE) ?>/new" class="addnew">+</a></div>
                <div class="list-item">Done <a href="<?= ($BASE) ?>/new" class="addnew">+</a></div>
                <div class="list-item">Overdue Task <a href="<?= ($BASE) ?>/new" class="addnew">+</a></div>
                <div class="list-item">Important! <a href="<?= ($BASE) ?>/new" class="addnew">+</a></div>
            </div>
        </aside>

        <div class="profile-container">
            <div class="profile">
                <h2>My Profile</h2>
                <div class="profile-picture">
                    <img src="<?= ($BASE) ?>/img/profile.jpg" alt="Profile Picture">
                    <button class="btn btn-upload">Upload</button>
                </div>
                <form class="profile-form" action="<?= ($BASE) ?>/update-profile" method="post">
                    <div class="name-fields">
                        <input type="text" name="firstName" placeholder="FirstName" required>
                        <input type="text" name="lastName" placeholder="LastName" required>
                    </div>
                    <input type="password" name="currentPassword" placeholder="Current Password">
                    <input type="password" name="newPassword" placeholder="New Password">
                    <div class="button-group">
                        <button type="button" class="btn btn-secondary">Cancel</button>
                        <input type="submit" class="btn btn-primary" value="Save"></input>
                    </div>
                </form>
            </div>
        </div>
    </main>