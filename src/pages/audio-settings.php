<?php
$current_page = 'settings';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sound Effects & Quest Audio - Level Up Life</title>
    <!-- FontAwesome Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- App Stylesheets -->
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
            
            <!-- Header with Back Button -->
            <div class="top-header">
                <a href="settings.php" class="back-link-title">
                    <i class="fa-solid fa-chevron-left"></i>
                    <h2>Sound Effects & Quest Audio</h2>
                </a>
            </div>

            <!-- Audio Settings Workspace Card -->
            <div class="dashboard-card audio-settings-card">
                <div class="audio-controls-list">
                    
                    <!-- Master Volume Slider -->
                    <div class="audio-row">
                        <div class="audio-label-group">
                            <i class="fa-solid fa-volume-high"></i>
                            <span class="audio-title">Master Volume</span>
                        </div>
                        <div class="slider-container">
                            <input type="range" id="masterVolume" min="0" max="100" value="90" class="audio-slider">
                            <span class="slider-value" id="masterVolumeVal">90%</span>
                        </div>
                    </div>

                    <!-- Sound Effects (SFX) Slider -->
                    <div class="audio-row">
                        <div class="audio-label-group">
                            <i class="fa-solid fa-sliders"></i>
                            <span class="audio-title">Sound Effects (SFX)</span>
                        </div>
                        <div class="slider-container">
                            <input type="range" id="sfxVolume" min="0" max="100" value="70" class="audio-slider">
                            <span class="slider-value" id="sfxVolumeVal">70%</span>
                        </div>
                    </div>

                    <!-- Quest / Background Music Slider -->
                    <div class="audio-row">
                        <div class="audio-label-group">
                            <i class="fa-solid fa-music"></i>
                            <span class="audio-title">Quest / Background Music</span>
                        </div>
                        <div class="slider-container">
                            <input type="range" id="bgmVolume" min="0" max="100" value="50" class="audio-slider">
                            <span class="slider-value" id="bgmVolumeVal">50%</span>
                        </div>
                    </div>

                </div>
            </div>

        </main>
    </div>

    <!-- Live Slider Value Update Script -->
    <script>
        function bindSlider(sliderId, valueId) {
            const slider = document.getElementById(sliderId);
            const valueDisplay = document.getElementById(valueId);

            const updateTrack = () => {
                const val = slider.value;
                valueDisplay.textContent = `${val}%`;
                slider.style.background = `linear-gradient(to right, #38bdf8 0%, #38bdf8 ${val}%, #1e293b ${val}%, #1e293b 100%)`;
            };

            slider.addEventListener('input', updateTrack);
            updateTrack(); // Initial run
        }

        bindSlider('masterVolume', 'masterVolumeVal');
        bindSlider('sfxVolume', 'sfxVolumeVal');
        bindSlider('bgmVolume', 'bgmVolumeVal');
    </script>
</body>
</html>