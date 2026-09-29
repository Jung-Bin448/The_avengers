<?php
// src/pages/connected-accounts.php

$accounts = [
    [
        'id' => 'discord',
        'name' => 'Discord',
        'icon' => 'fab fa-discord',
        'status' => 'Connected',
        'connected' => true
    ],
    [
        'id' => 'google_play',
        'name' => 'Google Play Games',
        'icon' => 'fas fa-gamepad',
        'status' => 'Connected',
        'connected' => true
    ],
    [
        'id' => 'steam',
        'name' => 'Steam',
        'icon' => 'fab fa-steam',
        'status' => 'Not Connected',
        'connected' => false
    ]
];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connected Guild Accounts</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            background-color: #0d1117;
            color: #ffffff;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            padding: 40px;
        }

        .container {
            max-width: 900px;
            margin: 0 auto;
        }

        .header {
            display: flex;
            align-items: center;
            font-size: 24px;
            font-weight: 600;
            margin-bottom: 40px;
        }

        .header a {
            color: #ffffff;
            text-decoration: none;
            margin-right: 15px;
            font-size: 20px;
        }

        .account-card {
            background-color: #161b22;
            border-radius: 12px;
            padding: 20px 30px;
            margin-bottom: 25px;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .account-info {
            display: flex;
            align-items: center;
            gap: 20px;
        }

        .account-icon {
            font-size: 28px;
            color: #8b949e;
            width: 40px;
            text-align: center;
        }

        .account-name {
            font-size: 16px;
            font-weight: 600;
        }

        .account-actions {
            display: flex;
            align-items: center;
            gap: 30px;
        }

        .status-badge {
            font-size: 14px;
        }

        .status-badge.connected {
            color: #2ea043;
        }

        .status-badge.disconnected {
            color: #8b949e;
        }

        .btn {
            padding: 10px 24px;
            border-radius: 8px;
            border: none;
            font-weight: 600;
            cursor: pointer;
            font-size: 14px;
            transition: opacity 0.2s;
        }

        .btn-disconnect {
            background-color: #7d2727;
            color: #ffffff;
        }

        .btn-connect {
            background-color: #5865f2;
            color: #ffffff;
        }

        .btn:hover {
            opacity: 0.85;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <a href="settings.php">&lt;</a>
            <span>Connected Guild Accounts</span>
        </div>

        <div class="accounts-list">
            <?php foreach ($accounts as $account): ?>
                <div class="account-card">
                    <div class="account-info">
                        <div class="account-icon">
                            <i class="<?php echo htmlspecialchars($account['icon']); ?>"></i>
                        </div>
                        <div class="account-name"><?php echo htmlspecialchars($account['name']); ?></div>
                    </div>
                    <div class="account-actions">
                        <span class="status-badge <?php echo $account['connected'] ? 'connected' : 'disconnected'; ?>">
                            <?php echo htmlspecialchars($account['status']); ?>
                        </span>
                        <form action="../api/connected-accounts.php" method="POST" style="margin: 0;">
                            <input type="hidden" name="provider" value="<?php echo htmlspecialchars($account['id']); ?>">
                            <?php if ($account['connected']): ?>
                                <input type="hidden" name="action" value="disconnect">
                                <button type="submit" class="btn btn-disconnect">Disconnect</button>
                            <?php else: ?>
                                <input type="hidden" name="action" value="connect">
                                <button type="submit" class="btn btn-connect">Connect</button>
                            <?php endif; ?>
                        </form>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</body>
</html>