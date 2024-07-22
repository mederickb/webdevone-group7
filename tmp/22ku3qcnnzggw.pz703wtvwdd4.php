<main>
    <div class="sidebar">
        <h1>OUR TEAM</h1>
        <div class="team-container">
            <div class="team-member">
                <div class="member-icon">
                    <img src="<?= ($BASE) ?>/img/profile.jpg" alt="Member Profile">
                </div>
                <div class="info">
                    <h2>Team Member 1</h2>
                    <p>Developer</p>
                    <p>A brief description about...</p>
                </div>
            </div>
            <div class="team-member">
                <div class="member-icon">
                    <img src="<?= ($BASE) ?>/img/profile.jpg" alt="Member Profile">
                </div>
                <div class="info">
                    <h2>Team Member 2</h2>
                    <p>Designer</p>
                    <p>A brief description about...</p>
                </div>
            </div>
        </div>
    </div>

    <div class="form-container">
        <form class="contact-form" action="<?= ($BASE) ?>/submit-contact" method="post">
          <div class="name-fields">
            <input type="text" name="firstName" placeholder="FirstName" required>
            <input type="text" name="lastName" placeholder="LastName" required>
          </div>
          <div class="form-field">
            <input type="email" id="email" name="email" placeholder="Email" required>
          </div>
          <div class="form-field">
            <textarea id="comments" name="comments" rows="4" placeholder="Welcome to leave your comments..." required></textarea>
          </div>
          <button type="submit">Send</button>
        </form>
    </div>
</main>