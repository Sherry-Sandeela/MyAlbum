<!DOCTYPE html>
<html>
<head>
    <title>Password Reset Code</title>
</head>
<body style="font-family: Arial, sans-serif; background-color: #f4f6f8; padding: 20px; margin: 0;">
    <table align="center" cellpadding="0" cellspacing="0" width="100%" style="max-width: 600px; background: #ffffff; border-radius: 8px; box-shadow: 0 4px 10px rgba(0,0,0,0.1);">
        <tr>
            <td style="padding: 20px; text-align: center; background: #4CAF50; border-top-left-radius: 8px; border-top-right-radius: 8px;">
                <h2 style="color: #ffffff; margin: 0;">Password Reset Request</h2>
            </td>
        </tr>
        <tr>
            <td style="padding: 30px; color: #333333; font-size: 16px; line-height: 1.6;">
                <p>Hello,</p>
                <p>You recently requested to reset your password. Use the following OTP code to proceed:</p>

                <div style="text-align: center; margin: 20px 0;">
                    <span style="display: inline-block; background: #4CAF50; color: #ffffff; padding: 12px 24px; font-size: 24px; font-weight: bold; border-radius: 6px;">
                        {{ $otp }}
                    </span>
                </div>

                <p>This code will expire in <strong>1 minute</strong>. If you didn’t request a password reset, please ignore this email.</p>

                <p style="margin-top: 30px;">Thanks,<br><strong>Your App Team</strong></p>
            </td>
        </tr>
        <tr>
            <td style="padding: 15px; text-align: center; background: #f1f1f1; font-size: 12px; color: #777777; border-bottom-left-radius: 8px; border-bottom-right-radius: 8px;">
                &copy; {{ date('Y') }} YourApp. All rights reserved.
            </td>
        </tr>
    </table>
</body>
</html>
