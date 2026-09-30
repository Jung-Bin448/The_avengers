<?php
$current_page = 'quests';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quest - Level Up Life</title>
    <!-- FontAwesome Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- App Stylesheet -->
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="../assests/css/style.css">
</head>
<body>
    <div class="app-container">
        
        <!-- Standardized Sidebar Navigation -->
        <aside class="sidebar">
            <a href="collection.php" class="nav-item <?php echo ($current_page == 'collection') ? 'active' : ''; ?>">
                <i class="fa-regular fa-folder"></i>
                <span>Collection</span>
            </a>
            <a href="dashboard.php" class="nav-item <?php echo ($current_page == 'dashboard') ? 'active' : ''; ?>">
                <i class="fa-solid fa-border-all"></i>
                <span>Dashboard</span>
            </a>
            <a href="quests.php" class="nav-item <?php echo ($current_page == 'quests') ? 'active' : ''; ?>">
                <i class="fa-solid fa-shield-halved"></i>
                <span>Quest</span>
            </a>
            <a href="party.php" class="nav-item <?php echo ($current_page == 'party') ? 'active' : ''; ?>">
                <i class="fa-solid fa-users"></i>
                <span>Party</span>
            </a>
            <a href="profile.php" class="nav-item <?php echo ($current_page == 'profile') ? 'active' : ''; ?>">
                <i class="fa-regular fa-user"></i>
                <span>Profile</span>
            </a>
        </aside>

        <!-- Main Workspace Canvas -->
        <main class="main-content">
            
            <!-- Calendar Card -->
            <div class="quest-calendar-card">
                <div class="quest-calendar-header">
                    <h2 class="quest-calendar-title">30 Sep, 26 Wednesday</h2>
                    <div class="quest-calendar-nav">
                        <button type="button" class="quest-nav-btn"><i class="fa-solid fa-chevron-left"></i></button>
                        <button type="button" class="quest-nav-btn"><i class="fa-solid fa-chevron-right"></i></button>
                    </div>
                </div>

                <!-- Calendar Grid Render -->
                <div class="quest-calendar-grid">
                    <div class="quest-day-header">Sun</div>
                    <div class="quest-day-header">Mon</div>
                    <div class="quest-day-header">Tue</div>
                    <div class="quest-day-header">Wed</div>
                    <div class="quest-day-header">Thu</div>
                    <div class="quest-day-header">Fri</div>
                    <div class="quest-day-header">Sat</div>
                    
                    <div class="quest-day-number empty"></div>
                    <div class="quest-day-number empty"></div>
                    <div class="quest-day-number">1</div>
                    <div class="quest-day-number">2</div>
                    <div class="quest-day-number">3</div>
                    <div class="quest-day-number">4</div>
                    <div class="quest-day-number">5</div>
                    <div class="quest-day-number">6</div>
                    <div class="quest-day-number">7</div>
                    <div class="quest-day-number">8</div>
                    <div class="quest-day-number">9</div>
                    <div class="quest-day-number">10</div>
                    <div class="quest-day-number">11</div>
                    <div class="quest-day-number">12</div>
                    <div class="quest-day-number">13</div>
                    <div class="quest-day-number">14</div>
                    <div class="quest-day-number">15</div>
                    <div class="quest-day-number">16</div>
                    <div class="quest-day-number">17</div>
                    <div class="quest-day-number">18</div>
                    <div class="quest-day-number">19</div>
                    <div class="quest-day-number">20</div>
                    <div class="quest-day-number">21</div>
                    <div class="quest-day-number">22</div>
                    <div class="quest-day-number">23</div>
                    <div class="quest-day-number">24</div>
                    <div class="quest-day-number">25</div>
                    <div class="quest-day-number">26</div>
                    <div class="quest-day-number">27</div>
                    <div class="quest-day-number">28</div>
                    <div class="quest-day-number">29</div>
                    <div class="quest-day-number active">30</div>
                </div>
            </div>

            <!-- Quests List Header -->
            <div class="quest-header-row">
                <div class="quest-section-title">
                    <span>Today's Quests</span>
                    <i class="fa-solid fa-chevron-down" style="font-size: 16px; color: #94a3b8; cursor: pointer;"></i>
                </div>
                
                <!-- Plus Button Triggers Modal -->
                <button type="button" id="openQuestModalBtn" class="quest-add-btn">
                    <i class="fa-solid fa-plus"></i>
                </button>
            </div>

            <!-- Empty Quests State -->
            <div class="quest-empty-msg">
                <p>No quests scheduled for this date.</p>
            </div>

        </main>
    </div>

    <!-- CREATE QUEST POPUP MODAL -->
    <div id="questModal" class="quest-modal-overlay">
        <div class="quest-modal-container">
            
            <!-- Modal Header -->
            <div class="quest-modal-header">
                <button type="button" class="modal-back-btn" id="closeQuestModalBtn">
                    <i class="fa-solid fa-chevron-left"></i>
                    <span>Create New Quest</span>
                </button>
            </div>

            <!-- Modal Content Form -->
            <form class="quest-modal-form" action="quests.php" method="POST">
                
                <!-- Title Field -->
                <div class="modal-form-group">
                    <input type="text" class="modal-input-field" name="quest_title" placeholder="Defeat the Inbox Dragon" required>
                </div>

                <!-- Textarea Field -->
                <div class="modal-form-group">
                    <textarea class="modal-textarea-field" name="quest_details" rows="3" placeholder="Add quest details, sub-objectives, or notes...."></textarea>
                </div>

                <!-- Quest Type Options -->
                <div class="modal-type-section">
                    <h4 class="modal-section-subtitle">QUEST TYPE</h4>
                    <div class="modal-types-grid">
                        
                        <label class="modal-type-pill active">
                            <input type="radio" name="quest_type" value="daily_bounty" checked>
                            <i class="fa-solid fa-swords"></i>
                            <span>Daily Bounty</span>
                        </label>

                        <label class="modal-type-pill">
                            <input type="radio" name="quest_type" value="boss_raid">
                            <i class="fa-solid fa-shield-cat"></i>
                            <span>Boss Raid</span>
                        </label>

                        <label class="modal-type-pill">
                            <input type="radio" name="quest_type" value="side_quest">
                            <i class="fa-solid fa-vial"></i>
                            <span>Side Quest</span>
                        </label>

                        <button type="button" class="modal-btn-add-type">
                            <span>Add Type</span>
                        </button>

                    </div>
                </div>

                <!-- Date Badge Row -->
                <div class="modal-dates-row">
                    <div class="modal-date-badge">
                        <span class="modal-date-label">Start:</span>
                        <span class="modal-date-value">Today</span>
                    </div>
                    <div class="modal-date-divider"></div>
                    <div class="modal-date-badge">
                        <span class="modal-date-danger-label">Deadline:</span>
                        <span class="modal-date-danger-value">Tomorrow</span>
                    </div>
                </div>

                <!-- Action Button -->
                <div class="modal-submit-container">
                    <button type="submit" class="modal-btn-primary">
                        Accept & Post Quest
                    </button>
                </div>

            </form>
        </div>
    </div>

    <!-- Modal Toggle JavaScript -->
    <script>
        const modal = document.getElementById('questModal');
        const openBtn = document.getElementById('openQuestModalBtn');
        const closeBtn = document.getElementById('closeQuestModalBtn');

        openBtn.addEventListener('click', () => {
            modal.classList.add('show');
        });

        closeBtn.addEventListener('click', () => {
            modal.classList.remove('show');
        });

        window.addEventListener('click', (e) => {
            if (e.target === modal) {
                modal.classList.remove('show');
            }
        });
    </script>
</body>
</html>