<main>
    <aside class="sidebar">
        <div class="user-section">
            <div class="user-icon">
                <img src="<?= ($BASE) ?>/img/profile.jpg" alt="User Profile">
            </div>
            <div class="user-name">
                <span class="text-login"><?= ($SESSION['fullname']) ?></span><span class="edit-icon"><a href="<?= ($BASE) ?>/profile"><img width="30" height="30" src="https://img.icons8.com/wired/64/edit.png" alt="edit"/></a></span>
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
    <div class="new-task">
        <h2>New Task</h2>
        <form action="<?= ($BASE) ?>/save-task" method="post">
            <input type="text" class="task-input" name="task" placeholder="Enter new task" required>
            <div class="date-time">
              <div class="date-field">
                <label for="due-date">Due Date</label>
                <input type="date" id="due-date" name="due-date" required>
              </div>
              <div class="time-field">
                <label for="due-time">Due Time</label>
                <input type="time" id="due-time" name="due-time" required>
              </div>
            </div>
            <button type="submit" class="save-btn">Save</button>
        </form>
    </div>
</main>
