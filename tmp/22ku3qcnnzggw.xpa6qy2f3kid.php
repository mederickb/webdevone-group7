<main>
    <aside class="sidebar">
        <div class="user-section">
            <div class="user-icon">
                <img src="<?= ($BASE) ?>/img/profile.jpg" alt="User Profile">
            </div>
            <div class="user-login">
                <a href="<?= ($BASE) ?>/login" class="text-login">Login</a><span class="edit-icon"><a href="<?= ($BASE) ?>/profile"><img width="30" height="30" src="https://img.icons8.com/wired/64/edit.png" alt="edit"/></a></span>
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

    <div class="updating-task">
        <h2>Updating</h2>
        <input type="text" class="task-input" placeholder="">
        <div class="date-time">
          <div class="date-field">
            <label for="important-due-date">Due Date</label>
            <input type="date" id="important-due-date">
          </div>
          <div class="time-field">
            <label for="important-due-time">Due Time</label>
            <input type="time" id="important-due-time">
          </div>
        </div>
        <button class="update-btn">Update</button>
    </div>
</main>
