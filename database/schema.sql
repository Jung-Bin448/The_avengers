-- ============================================
-- LEVEL UP LIFE DATABASE
-- ============================================

-- Make sure we are using the correct database
USE level_up_life;


-- ============================================
-- USERS
-- ============================================

CREATE TABLE users (
    user_id INT AUTO_INCREMENT PRIMARY KEY,

    username VARCHAR(50) NOT NULL UNIQUE,
    email VARCHAR(100) NOT NULL UNIQUE,
    password_hash VARCHAR(255) NOT NULL,

    avatar_path VARCHAR(255) DEFAULT NULL,

    xp INT NOT NULL DEFAULT 0,
    level INT NOT NULL DEFAULT 1,

    streak INT NOT NULL DEFAULT 0,

    skill_points INT NOT NULL DEFAULT 0,

    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);


-- ============================================
-- RANKS
-- ============================================

CREATE TABLE ranks (
    rank_id INT AUTO_INCREMENT PRIMARY KEY,

    rank_name VARCHAR(50) NOT NULL UNIQUE,

    description TEXT,

    min_level INT NOT NULL,
    max_level INT DEFAULT NULL,

    rank_image VARCHAR(255) DEFAULT NULL
);


-- ============================================
-- QUESTS
-- ============================================

CREATE TABLE quests (
    quest_id INT AUTO_INCREMENT PRIMARY KEY,

    user_id INT NOT NULL,

    title VARCHAR(150) NOT NULL,
    description TEXT,

    quest_type ENUM(
        'daily_bounty',
        'boss_raid',
        'side_quest'
    ) NOT NULL DEFAULT 'daily_bounty',

    xp_reward INT NOT NULL DEFAULT 0,

    status ENUM(
        'pending',
        'completed',
        'cancelled'
    ) NOT NULL DEFAULT 'pending',

    due_date DATE DEFAULT NULL,

    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,

    completed_at TIMESTAMP NULL DEFAULT NULL,

    FOREIGN KEY (user_id)
        REFERENCES users(user_id)
        ON DELETE CASCADE
);


-- ============================================
-- BADGES
-- ============================================

CREATE TABLE badges (
    badge_id INT AUTO_INCREMENT PRIMARY KEY,

    badge_name VARCHAR(100) NOT NULL UNIQUE,

    description TEXT,

    badge_image VARCHAR(255) NOT NULL,

    requirement_type ENUM(
        'tasks_completed',
        'xp_earned',
        'level_reached',
        'streak',
        'special'
    ) NOT NULL,

    requirement_value INT DEFAULT NULL,

    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);


-- ============================================
-- USER BADGES
-- Connects users with badges they earned
-- ============================================

CREATE TABLE user_badges (
    user_badge_id INT AUTO_INCREMENT PRIMARY KEY,

    user_id INT NOT NULL,
    badge_id INT NOT NULL,

    earned_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,

    FOREIGN KEY (user_id)
        REFERENCES users(user_id)
        ON DELETE CASCADE,

    FOREIGN KEY (badge_id)
        REFERENCES badges(badge_id)
        ON DELETE CASCADE,

    UNIQUE (user_id, badge_id)
);


-- ============================================
-- XP HISTORY
-- Used for XP history / graph
-- ============================================

CREATE TABLE xp_history (
    xp_history_id INT AUTO_INCREMENT PRIMARY KEY,

    user_id INT NOT NULL,

    xp_amount INT NOT NULL,

    source VARCHAR(100) DEFAULT NULL,

    recorded_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,

    FOREIGN KEY (user_id)
        REFERENCES users(user_id)
        ON DELETE CASCADE
);


-- ============================================
-- PARTIES
-- Group information
-- ============================================

CREATE TABLE parties (
    party_id INT AUTO_INCREMENT PRIMARY KEY,

    party_name VARCHAR(100) NOT NULL,

    owner_id INT NOT NULL,

    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,

    FOREIGN KEY (owner_id)
        REFERENCES users(user_id)
        ON DELETE CASCADE
);


-- ============================================
-- PARTY MEMBERS
-- Allows users to join multiple parties
-- ============================================

CREATE TABLE party_members (
    party_member_id INT AUTO_INCREMENT PRIMARY KEY,

    party_id INT NOT NULL,
    user_id INT NOT NULL,

    role ENUM(
        'owner',
        'member'
    ) NOT NULL DEFAULT 'member',

    joined_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,

    FOREIGN KEY (party_id)
        REFERENCES parties(party_id)
        ON DELETE CASCADE,

    FOREIGN KEY (user_id)
        REFERENCES users(user_id)
        ON DELETE CASCADE,

    UNIQUE (party_id, user_id)
);


-- ============================================
-- PARTY MESSAGES
-- Group chat messages
-- ============================================

CREATE TABLE party_messages (
    message_id INT AUTO_INCREMENT PRIMARY KEY,

    party_id INT NOT NULL,
    user_id INT NOT NULL,

    message_text TEXT NOT NULL,

    sent_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,

    FOREIGN KEY (party_id)
        REFERENCES parties(party_id)
        ON DELETE CASCADE,

    FOREIGN KEY (user_id)
        REFERENCES users(user_id)
        ON DELETE CASCADE
);


-- ============================================
-- OPTIONAL STARTER RANKS
-- ============================================

INSERT INTO ranks
    (rank_name, description, min_level, max_level)
VALUES
    ('Novice', 'Beginning your journey.', 1, 4),
    ('Apprentice', 'You are getting stronger.', 5, 9),
    ('Warrior', 'A skilled adventurer.', 10, 19),
    ('Elite', 'Among the strongest players.', 20, 29),
    ('Master', 'A highly experienced player.', 30, 49),
    ('Legend', 'One of the most experienced players.', 50, NULL);


ALTER TABLE users
ADD COLUMN level_title VARCHAR(50) DEFAULT 'Adventurer',
ADD COLUMN level_progress INT DEFAULT 0,
ADD COLUMN energy_current INT DEFAULT 100,
ADD COLUMN energy_max INT DEFAULT 100,
ADD COLUMN gold INT DEFAULT 0;