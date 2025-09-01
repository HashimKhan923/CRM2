<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to Lockmytimes</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }
        .email-container {
            max-width: 600px;
            margin: 0 auto;
            background-color: #ffffff;
            border: 1px solid #dddddd;
        }
        .cta-button {
            display: inline-block;
            padding: 12px 25px;
            font-size: 16px;
            color: #ffffff !important;
            background-color: #5d87ff;
            text-decoration: none;
            border-radius: 5px;
        }
    </style>
</head>
<body>
    <table class="email-container" width="100%" cellpadding="0" cellspacing="0" border="0" align="center">
        <!-- Header -->
        <tr>
            <td bgcolor="#e7f1fb" style="padding:15px;">
                <table width="100%" cellpadding="0" cellspacing="0">
                    <tr>
                        <td align="left">
                            <img src="https://skartistic.com/wp-content/uploads/2025/08/Screenshot_2025-08-27_002258-removebg-preview.png" alt="Company Logo" width="240" height="70" style="display:block;">
                        </td>
                    </tr>
                </table>
            </td>
        </tr>

        <!-- Banner -->
        <tr>
            <td>
                <img src="https://skartistic.com/wp-content/uploads/2025/08/welcome-to-lockmytimes-gif.gif" alt="Welcome Banner" width="100%" style="display:block;">
            </td>
        </tr>

<!-- Content -->
<tr>
    <td style="padding:20px; color:#333333; font-size:16px; line-height:1.6;">
        <h1 style="font-size:24px; color:#333333; margin-bottom:20px;">Hi, {{$name}}!</h1>
        <p>Thank you for subscribing to Lockmytimes! Your Admin account is now active, giving you full access to manage your team, monitor activity, and control settings from your dashboard.</p>
        
        <p><strong>Your Admin dashboard login details:</strong></p>
        <ul style="margin:20px 0; padding-left:20px; color:#666666;">
            <li><strong>Dashboard URL:</strong> <a href="https://dashboard.lockmytimes.com/auth/login">https://dashboard.lockmytimes.com/auth/login</a></li>
            <li><strong>Email:</strong> {{$email}}</li>
            <li><strong>Password:</strong> {{$password}}</li>
            <li><strong>Product Key:</strong> {{$product_key}}</li>
        </ul>

        <p>We recommend logging in immediately and updating your password for security.</p>

        <p>As an Admin, you can:</p>
        <ul style="margin:20px 0; padding-left:20px; color:#666666;">
            <li>Create and manage user accounts for your team.</li>
            <li>Track work hours, tasks, and productivity in real time.</li>
            <li>Access detailed reports to analyze performance.</li>
            <li>Customize settings to fit your organization’s workflow.</li>
        </ul>

        <!-- Button Left Aligned -->
        <table align="left" cellpadding="0" cellspacing="0" border="0" style="margin:20px 0;">
            <tr>
                <td align="left">
                    <a href="https://dashboard.lockmytimes.com/auth/login" class="cta-button">Go to Admin Dashboard</a>
                </td>
            </tr>
        </table>
        <br><br><br>
        <p>If you have any questions or need assistance, our support team is always ready to help. Reach out anytime at 
            <a href="mailto:support@lockmytimes.com">support@lockmytimes.com</a>.
        </p>
        <p>Welcome aboard,<br>Lockmytimes Team</p>
    </td>
</tr>

        <!-- Footer -->
        <tr>
            <td bgcolor="#e7f1fb" style="padding:20px; font-size:14px; color:#000000;">
                <table width="100%" cellpadding="0" cellspacing="0">
                    <tr>
                        <!-- Logo -->
                        <td align="left" valign="top">
                            <img src="https://skartistic.com/wp-content/uploads/2025/08/Screenshot_2025-08-27_002258-removebg-preview.png" alt="Company Logo" width="150" style="display:block;">
                        </td>

                        <!-- Social Icons -->
                        <td align="right" valign="top">
                            <table cellpadding="0" cellspacing="0">
                                <tr>
                                    <td colspan="5" align="right" style="font-size:14px; color:#000000; padding-bottom:10px;">
                                        Find us on social media platforms
                                    </td>
                                </tr>
                                <tr>
                                    <td align="center" style="padding-right:10px;">
                                        <a href="https://www.facebook.com/profile.php?id=61574441738061&rdid=lSPvNTH0V8PZtD2A&share_url=https%3A%2F%2Fwww.facebook.com%2Fshare%2F17hobPgyAf%2F#" target="_blank">
                                            <img src="https://skartistic.com/wp-content/uploads/2025/08/3.png" alt="Facebook" width="20" height="20" style="display:block;">
                                        </a>
                                    </td>
                                    <td align="center" style="padding-right:10px;">
                                        <a href="https://www.instagram.com/lockmytimes" target="_blank">
                                            <img src="https://skartistic.com/wp-content/uploads/2025/08/4.png" alt="Instagram" width="20" height="20" style="display:block;">
                                        </a>
                                    </td>
                                    <td align="center" style="padding-right:10px;">
                                        <a href="https://Youtube.com" target="_blank">
                                            <img src="https://skartistic.com/wp-content/uploads/2025/08/5.png" alt="YouTube" width="20" height="20" style="display:block;">
                                        </a>
                                    </td>
                                    <td align="center" style="padding-right:10px;">
                                        <a href="https://Linkedin.com" target="_blank">
                                            <img src="https://skartistic.com/wp-content/uploads/2025/08/6.png" alt="LinkedIn" width="20" height="20" style="display:block;">
                                        </a>
                                    </td>
                                    <td align="center">
                                        <a href="https://Twitter.com" target="_blank">
                                            <img src="https://skartistic.com/wp-content/uploads/2025/08/7.png" alt="Twitter" width="20" height="20" style="display:block;">
                                        </a>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                </table>
                <table width="100%" cellpadding="0" cellspacing="0">
                    <tr>
                        <td align="center" style="border-top:1px solid #dddddd; padding-top:15px; font-size:12px; color:#000000;">
                            © 2025 Lockmytimes, All Rights Reserved.
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
</body>
</html>