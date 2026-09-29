<?php
// src/pages/parties.php

$chats = [
    [
        'id' => 1,
        'name' => 'Guild Raid Squad',
        'sub' => '4 members online',
        'time' => '8:06',
        'active' => true,
        'online' => true
    ],
    [
        'id' => 2,
        'name' => 'Alchemist Party',
        'sub' => '',
        'time' => 'Yesterday',
        'active' => false,
        'online' => false
    ],
    [
        'id' => 3,
        'name' => 'Tank & Healer Main',
        'sub' => '6 members online',
        'time' => 'Sunday',
        'active' => false,
        'online' => true
    ],
    [
        'id' => 4,
        'name' => 'Dragon Slayers Club',
        'sub' => '',
        'time' => 'Thursday',
        'active' => false,
        'online' => false
    ]
];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Direct Messages & Parties</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            background-color: #0b0e14;
            color: #ffffff;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            display: flex;
            height: 100vh;
            padding: 30px;
        }

        .messaging-container {
            display: flex;
            width: 100%;
            background-color: #121721;
            border-radius: 16px;
            overflow: hidden;
        }

        .chat-sidebar {
            width: 320px;
            background-color: #161b22;
            padding: 20px;
            border-right: 1px solid #21262d;
            display: flex;
            flex-direction: column;
        }

        .sidebar-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }

        .sidebar-title {
            font-size: 16px;
            font-weight: 600;
        }

        .add-btn {
            background-color: transparent;
            border: 1px solid #30363d;
            color: #ffffff;
            width: 28px;
            height: 28px;
            border-radius: 50%;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: background 0.2s;
        }

        .add-btn:hover {
            background-color: #21262d;
        }

        .search-box {
            position: relative;
            margin-bottom: 20px;
        }

        .search-box input {
            width: 100%;
            padding: 10px 10px 10px 35px;
            background-color: #0d1117;
            border: 1px solid #30363d;
            border-radius: 20px;
            color: #ffffff;
            font-size: 14px;
            outline: none;
        }

        .search-box i {
            position: absolute;
            left: 12px;
            top: 50%;
            transform: translateY(-50%);
            color: #8b949e;
        }

        .chat-list {
            display: flex;
            flex-direction: column;
            gap: 8px;
        }

        .chat-item {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 10px 12px;
            border-radius: 10px;
            cursor: pointer;
            transition: background 0.2s;
            text-decoration: none;
            color: inherit;
        }

        .chat-item:hover,
        .chat-item.active {
            background-color: #21262d;
        }

        .avatar-section {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .avatar {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background-color: #2e3545;
            position: relative;
        }

        .avatar.online::after {
            content: '';
            position: absolute;
            bottom: 0;
            right: 0;
            width: 10px;
            height: 10px;
            background-color: #2ea043;
            border-radius: 50%;
            border: 2px solid #161b22;
        }

        .chat-info .chat-name {
            font-size: 14px;
            font-weight: 600;
        }

        .chat-info .chat-sub {
            font-size: 12px;
            color: #2ea043;
            margin-top: 2px;
        }

        .chat-time {
            font-size: 12px;
            color: #8b949e;
        }

        .chat-content {
            flex: 1;
            background-color: #121721;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #8b949e;
        }
    </style>
</head>
<body>

    <div class="messaging-container">
        <div class="chat-sidebar">
            <div class="sidebar-header">
                <span class="sidebar-title">Direct Messages</span>
                <button class="add-btn" type="button"><i class="fas fa-plus"></i></button>
            </div>
            
            <div class="search-box">
                <i class="fas fa-search"></i>
                <input type="text" placeholder="Search">
            </div>

            <div class="chat-list">
                <?php foreach ($chats as $chat): ?>
                    <a href="parties.php?chat_id=<?php echo (int)$chat['id']; ?>" class="chat-item <?php echo $chat['active'] ? 'active' : ''; ?>">
                        <div class="avatar-section">
                            <div class="avatar <?php echo $chat['online'] ? 'online' : ''; ?>"></div>
                            <div class="chat-info">
                                <div class="chat-name"><?php echo htmlspecialchars($chat['name']); ?></div>
                                <?php if (!empty($chat['sub'])): ?>
                                    <div class="chat-sub"><?php echo htmlspecialchars($chat['sub']); ?></div>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="chat-time"><?php echo htmlspecialchars($chat['time']); ?></div>
                    </a>
                <?php endforeach; ?>
            </div>
        </div>

        <div class="chat-content">
            <p>Select a chat to start messaging</p>
        </div>
    </div>

</body>
</html>