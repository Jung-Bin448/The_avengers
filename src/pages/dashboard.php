<?php
session_start();

$username = $_SESSION['username'] ?? 'Alex';
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dashboard</title>
  <link rel="stylesheet" href="../assests/css/style.css">
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body class="dashboard-body">

  <div class="dashboard-container">
    <!-- Sidebar -->
    <aside class="sidebar">
      <nav class="sidebar-menu">
        <a href="collection.php" class="nav-item">
          <svg class="nav-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor"><path d="M22 19a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h5l2 3h9a2 2 0 0 1 2 2z"></path></svg>
          Collection
        </a>
        <a href="dashboard.php" class="nav-item active">
          <svg class="nav-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor"><rect x="3" y="3" width="7" height="7"></rect><rect x="14" y="3" width="7" height="7"></rect><rect x="14" y="14" width="7" height="7"></rect><rect x="3" y="14" width="7" height="7"></rect></svg>
          Dashboard
        </a>
        <a href="quest.php" class="nav-item">
          <svg class="nav-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"></polygon></svg>
          Quest
        </a>
        <a href="party.php" class="nav-item">
          <svg class="nav-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle><path d="M23 21v-2a4 4 0 0 0-3-3.87"></path><path d="M16 3.13a4 4 0 0 1 0 7.75"></path></svg>
          Party
        </a>
        <a href="profile.php" class="nav-item">
          <svg class="nav-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg>
          Profile
        </a>
      </nav>
    </aside>

    <!-- Main Content -->
    <main class="main-content">
      <!-- Header -->
      <header class="top-header">
        <div class="user-greeting">
          <h1>Hi, Alex!</h1>
          <p class="subtitle">Level 5 Adventurer</p>
        </div>

        <div class="level-progress-wrapper">
          <div class="progress-label">Level Progress: <strong>72%</strong></div>
          <div class="progress-track">
            <div class="progress-fill" style="width: 72%;"></div>
          </div>
        </div>

        <button type="button" class="notification-btn" aria-label="Notifications">
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" class="bell-icon">
            <path d="M18 8A6 6 0 0 0 6 8c0 7-3 9-3 9h18s-3-2-3-9"></path>
            <path d="M13.73 21a2 2 0 0 1-3.46 0"></path>
          </svg>
        </button>
      </header>

      <!-- Daily Quests -->
      <section class="daily-quests-card">
        <div class="quests-info">
          <h2>Daily Quests</h2>
          <p>2 of 5 Completed</p>
        </div>
        <div class="radial-progress" style="--value: 40;">
          <span>40%</span>
        </div>
      </section>

      <!-- Stats Grid -->
      <section class="stats-grid">
        <div class="stat-card">
          <div class="stat-icon energy-icon">⚡</div>
          <h3>Energy</h3>
          <p>100 / 100</p>
        </div>

        <div class="stat-card">
          <div class="stat-icon gold-icon">🪙</div>
          <h3>Gold</h3>
          <p>1,240</p>
        </div>

        <div class="stat-card">
          <div class="stat-icon streak-icon">🔥</div>
          <h3>Streak</h3>
          <p>7 Days</p>
        </div>

        <div class="stat-card">
          <div class="stat-icon skill-icon">✦</div>
          <h3>Skill Points</h3>
          <p>5 Available</p>
        </div>
      </section>

      <!-- Chart Section -->
      <section class="chart-card">
        <div class="chart-header">
          <h2>Skill Mastery / XP History</h2>
          <p>Avg: 450 XP/day</p>
        </div>
        <div class="chart-container">
          <canvas id="xpChart"></canvas>
        </div>
        <a href="#" class="fab-btn">+</a>
      </section>
    </main>
  </div>

  <script>
    const ctx = document.getElementById('xpChart').getContext('2d');
    new Chart(ctx, {
      type: 'line',
      data: {
        labels: ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun'],
        datasets: [
          {
            data: [40, 70, 150, 110, 80, 40, 60],
            borderColor: '#a855f7',
            backgroundColor: 'rgba(168, 85, 247, 0.1)',
            tension: 0.4,
            pointBackgroundColor: '#a855f7',
            pointRadius: 4
          },
          {
            data: [40, 50, 80, 120, 160, 120, 80],
            borderColor: '#06b6d4',
            backgroundColor: 'rgba(6, 182, 212, 0.1)',
            tension: 0.4,
            pointBackgroundColor: '#06b6d4',
            pointRadius: 4
          }
        ]
      },
      options: {
        responsive: true,
        maintainAspectRatio: false,
        plugins: { legend: { display: false } },
        scales: {
          x: { grid: { display: false }, ticks: { color: '#8a99ad' } },
          y: { grid: { color: 'rgba(255, 255, 255, 0.05)' }, ticks: { color: '#8a99ad' } }
        }
      }
    });
  </script>
</body>
</html>