CREATE DATABASE IF NOT EXISTS level_up_life;
USE level_up_life;

--User Table
CREATE TABLE users (
    user_id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL UNIQUE,
    email VARCHAR(100) NOT NULL UNIQUE,
    password_hash VARCHAR(255) NOT NULL,

    coins INT NOT NULL DEFAULT 0,
    xp INT NOT NULL DEFAULT 0,
    level INT NOT NULL DEFAULT 1,

    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);




-- Quests Table
CREATE TABLE shop_items (
    item_id INT AUTO_INCREMENT PRIMARY KEY,
    item_name VARCHAR(100) NOT NULL,
    description TEXT,
    item_type ENUM('avatar', 'banner', 'decoration') NOT NULL,
    image_path VARCHAR(255) NOT NULL,
    price INT NOT NULL DEFAULT 0,
    is_available BOOLEAN DEFAULT TRUE,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);



-- 
CREATE TABLE user_items (
    user_item_id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    item_id INT NOT NULL,
    purchased_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,

    FOREIGN KEY (user_id) REFERENCES users(user_id)
        ON DELETE CASCADE,

    FOREIGN KEY (item_id) REFERENCES shop_items(item_id)
        ON DELETE CASCADE,

    UNIQUE (user_id, item_id)
);

CREATE TABLE badges (
    badge_id INT AUTO_INCREMENT PRIMARY KEY,
    badge_name VARCHAR(100) NOT NULL,
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

CREATE TABLE user_badges (
    user_badge_id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    badge_id INT NOT NULL,
    earned_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,

    FOREIGN KEY (user_id) REFERENCES users(user_id)
        ON DELETE CASCADE,

    FOREIGN KEY (badge_id) REFERENCES badges(badge_id)
        ON DELETE CASCADE,

    UNIQUE (user_id, badge_id)
);