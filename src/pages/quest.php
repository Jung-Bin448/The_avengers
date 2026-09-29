<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Quest - Gamified App</title>
  <link rel="stylesheet" href="../assests/css/style.css">
</head>
<body class="dashboard-body">

  <div class="dashboard-container">
    
    <!-- Sidebar Navigation -->
    <aside class="sidebar">
      <nav class="sidebar-menu">
        <a href="collection.php" class="nav-item">
          <svg class="nav-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
            <path d="M22 19a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h5l2 3h9a2 2 0 0 1 2 2z"></path>
          </svg>
          <span>Collection</span>
        </a>

        <a href="dashboard.php" class="nav-item">
          <svg class="nav-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
            <rect x="3" y="3" width="7" height="7"></rect>
            <rect x="14" y="3" width="7" height="7"></rect>
            <rect x="14" y="14" width="7" height="7"></rect>
            <rect x="3" y="14" width="7" height="7"></rect>
          </svg>
          <span>Dashboard</span>
        </a>

        <a href="quest.php" class="nav-item active">
          <svg class="nav-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
            <path d="M14.5 17.5L3 6V3h3l11.5 11.5"></path>
            <path d="M13 19l6-6"></path>
            <path d="M16 16l4 4"></path>
            <path d="M19 13l4 4"></path>
          </svg>
          <span>Quest</span>
        </a>

        <a href="party.php" class="nav-item">
          <svg class="nav-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
            <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
            <circle cx="9" cy="7" r="4"></circle>
            <path d="M23 21v-2a4 4 0 0 0-3-3.87"></path>
            <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
          </svg>
          <span>Party</span>
        </a>

        <a href="profile.php" class="nav-item">
          <svg class="nav-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
            <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
            <circle cx="12" cy="7" r="4"></circle>
          </svg>
          <span>Profile</span>
        </a>
      </nav>
    </aside>

    <!-- Main Content Canvas -->
    <main class="main-content quest-main">
      
      <!-- Date Header & Calendar Controls -->
      <header class="calendar-header">
        <h1 class="current-date-title">01 Sep, 26 <span class="day-name">Tuesday</span></h1>
        <div class="calendar-nav-btns">
          <button class="cal-btn" aria-label="Previous Month">&lt;</button>
          <button class="cal-btn" aria-label="Next Month">&gt;</button>
        </div>
      </header>

      <!-- Calendar Container -->
      <div class="calendar-card">
        <div class="calendar-grid">
          <div class="cal-day-label">Sun</div>
          <div class="cal-day-label">Mon</div>
          <div class="cal-day-label">Tue</div>
          <div class="cal-day-label">Wed</div>
          <div class="cal-day-label">Thu</div>
          <div class="cal-day-label">Fri</div>
          <div class="cal-day-label">Sat</div>

          <div class="cal-date active-date">1</div>
          <div class="cal-date">2</div>
          <div class="cal-date">3</div>
          <div class="cal-date">4</div>
          <div class="cal-date">5</div>
          <div class="cal-date">6</div>
          <div class="cal-date">7</div>
          <div class="cal-date">8</div>
          <div class="cal-date">9</div>
          <div class="cal-date">10</div>
          <div class="cal-date">11</div>
          <div class="cal-date">12</div>
          <div class="cal-date">13</div>
          <div class="cal-date">14</div>
          <div class="cal-date">15</div>
          <div class="cal-date">16</div>
          <div class="cal-date">17</div>
          <div class="cal-date">18</div>
          <div class="cal-date">19</div>
          <div class="cal-date">20</div>
          <div class="cal-date">21</div>
          <div class="cal-date">22</div>
          <div class="cal-date">23</div>
          <div class="cal-date">24</div>
          <div class="cal-date">25</div>
          <div class="cal-date">26</div>
          <div class="cal-date">27</div>
          <div class="cal-date">28</div>
          <div class="cal-date">29</div>
          <div class="cal-date">30</div>
          <div class="cal-date">31</div>
        </div>
      </div>

      <!-- Quests Section Header -->
      <div class="quests-section-header">
        <div class="quests-dropdown-title">
          <h2>Today's Quests</h2>
          <svg class="dropdown-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5">
            <path d="M6 9l6 6 6-6"></path>
          </svg>
        </div>
        <button id="openQuestModal" class="add-quest-btn" aria-label="Add Quest">+</button>
      </div>

      <!-- Quest List -->
      <div class="quest-list">
        <div class="quest-item">
          <div class="quest-type-header">
            <span class="quest-type-title">MAIN QUEST</span>
            <svg class="quest-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
              <path d="M14.5 17.5L3 6V3h3l11.5 11.5"></path>
              <path d="M13 19l6-6"></path>
              <path d="M16 16l4 4"></path>
              <path d="M19 13l4 4"></path>
            </svg>
          </div>
          <h3 class="quest-name">Defeat the Website Design Audit</h3>
          <p class="quest-meta">11:20 AM - 12:20 PM &bull; <span class="xp-badge">+150 XP</span></p>
        </div>

        <div class="quest-item">
          <div class="quest-type-header">
            <span class="quest-type-title">DAILY HABIT</span>
            <svg class="quest-icon icon-lightning" viewBox="0 0 24 24" fill="currentColor">
              <path d="M13 2L3 14h9l-1 8 10-12h-9l1-8z"></path>
            </svg>
          </div>
          <h3 class="quest-name">Complete 30 Minutes of Code Practice</h3>
          <p class="quest-meta">3:00 PM - 3:30 PM &bull; <span class="xp-badge">+100 XP</span></p>
        </div>

        <div class="quest-item">
          <div class="quest-type-header">
            <span class="quest-type-title">SIDE QUEST</span>
            <svg class="quest-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
              <path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"></path>
            </svg>
          </div>
          <h3 class="quest-name">Alignment Sync with Client Guild</h3>
          <p class="quest-meta">12:30 PM - 1:00 PM &bull; <span class="xp-badge">+75 XP</span></p>
        </div>

        <div class="quest-item">
          <div class="quest-type-header">
            <span class="quest-type-title">MILESTONE</span>
            <svg class="quest-icon icon-trophy" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
              <path d="M6 9H4.5a2.5 2.5 0 0 1 0-5H6"></path>
              <path d="M18 9h1.5a2.5 2.5 0 0 0 0-5H18"></path>
              <path d="M4 22h16"></path>
              <path d="M10 14.66V17c0 .55-.47.98-.97 1.21C7.85 18.75 7 20.24 7 22"></path>
              <path d="M14 14.66V17c0 .55.47.98.97 1.21C16.15 18.75 17 20.24 17 22"></path>
              <path d="M18 2H6v7a6 6 0 0 0 12 0V2z"></path>
            </svg>
          </div>
          <h3 class="quest-name">Submit Version 1.0 Milestone Build</h3>
          <p class="quest-meta">4:20 PM - 5:00 PM &bull; <span class="xp-badge">+500 XP</span></p>
        </div>
      </div>

    </main>

  </div>

  <!-- Create Quest Modal -->
  <div id="questModal" class="modal-overlay">
    <div class="modal-card">
      
      <!-- Back / Title -->
      <div class="modal-header">
        <button id="closeQuestModal" class="back-btn">&lt;</button>
        <h2 class="modal-title">Create New Quest</h2>
      </div>

      <form class="create-quest-form" onsubmit="event.preventDefault();">
        <!-- Title Input -->
        <div class="form-group">
          <input type="text" class="quest-input" placeholder="Defeat the Inbox Dragon">
        </div>

        <!-- Description Input -->
        <div class="form-group">
          <textarea class="quest-textarea" rows="3" placeholder="Add quest details, sub-objectives, or notes...."></textarea>
        </div>

        <!-- Quest Type Selection -->
        <div class="quest-type-section">
          <label class="section-label">QUEST TYPE</label>
          <div class="type-pills-row">
            
            <button type="button" class="type-pill active">
              <svg class="pill-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <path d="M14.5 17.5L3 6V3h3l11.5 11.5"></path>
                <path d="M13 19l6-6"></path>
              </svg>
              <span>Daily Bounty</span>
            </button>

            <button type="button" class="type-pill">
              <span class="boss-icon">S</span>
              <span>Boss Raid</span>
            </button>

            <button type="button" class="type-pill">
              <svg class="pill-icon icon-flask" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <path d="M10 2v7.527a2 2 0 0 1-.211.896L4.72 20.55A1 1 0 0 0 5.613 22h12.774a1 1 0 0 0 .893-1.45l-5.069-10.127A2 2 0 0 1 14 9.527V2"></path>
                <line x1="8.5" y1="2" x2="15.5" y2="2"></line>
              </svg>
              <span>Side Quest</span>
            </button>

            <button type="button" class="type-pill add-type-btn">
              <span>Add Type</span>
            </button>

          </div>
        </div>

        <!-- Date Settings Pill -->
        <div class="date-picker-card">
          <div class="date-cell">
            <span class="date-text">Start: <strong>Today</strong></span>
          </div>
          <div class="date-divider"></div>
          <div class="date-cell">
            <span class="date-text text-danger">Deadline: Tomorrow</span>
          </div>
        </div>

        <!-- Submit Button -->
        <div class="form-submit-container">
          <button type="submit" class="btn-primary-quest">Accept &amp; Post Quest</button>
        </div>
      </form>

    </div>
  </div>

  <script>
    const modal = document.getElementById('questModal');
    const openBtn = document.getElementById('openQuestModal');
    const closeBtn = document.getElementById('closeQuestModal');

    openBtn.addEventListener('click', () => {
      modal.classList.add('active');
    });

    closeBtn.addEventListener('click', () => {
      modal.classList.remove('active');
    });

    modal.addEventListener('click', (e) => {
      if (e.target === modal) {
        modal.classList.remove('active');
      }
    });

    // Pill selection toggle
    document.querySelectorAll('.type-pill:not(.add-type-btn)').forEach(pill => {
      pill.addEventListener('click', function() {
        document.querySelectorAll('.type-pill').forEach(p => p.classList.remove('active'));
        this.classList.add('active');
      });
    });
  </script>

</body>
</html>