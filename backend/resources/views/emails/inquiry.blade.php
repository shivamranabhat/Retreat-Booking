<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking Confirmation - Yoga Retreat</title>
</head>
<body style="font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; line-height: 1.6; color: #333; background-color: #f7f7f7; margin: 0; padding: 0;">
    <table width="100%" cellpadding="0" cellspacing="0" style="max-width: 600px; margin: 0 auto; background-color: #ffffff; box-shadow: 0 0 10px rgba(0,0,0,0.1);">
        <tr>
            <td style="padding: 40px 30px; text-align: center; background-color: #0fbc69;">
                <img src="{{asset('main/images/logo.png')}}" alt="Yoga Retreat Logo" style="max-width: 250px; filter: brightness(0) invert(1);">
            </td>
        </tr>
        <tr>
            <td style="padding: 40px 30px;">
                <p style="margin-bottom: 20px;">Dear {{$name}},</p>
                <p style="margin-bottom: 20px;">We're thrilled to inform that we have received your booking for our upcoming yoga retreat. Please wait until our host approved your booking. Get ready for a transformative experience that will nourish your body, mind, and soul.</p>
                <table width="100%" cellpadding="0" cellspacing="0" style="background-color: #e6fff0; border-radius: 5px; margin-bottom: 20px;">
                    <tr>
                        <td style="padding: 20px;">
                            <h2 style="color: #0fbc69; margin-top: 0; margin-bottom: 15px; font-size: 22px; font-weight: 300;">Booking Details</h2>
                            <table width="100%" cellpadding="0" cellspacing="0">
                                <tr>
                                    <td style="padding: 5px 0;"><strong>{{$category_name}}:</strong></td>
                                    <td style="padding: 5px 0;">{{$package_name}}</td>
                                </tr>
                                <tr>
                                    <td style="padding: 5px 0;"><strong>Date:</strong></td>
                                    <td style="padding: 5px 0;">{{$start_date}} - {{$end_date}}</td>
                                </tr>
                                <tr>
                                    <td style="padding: 5px 0;"><strong>Location:</strong></td>
                                    <td style="padding: 5px 0;">{{$location_name}}</td>
                                </tr>
                                <tr>
                                    <td style="padding: 5px 0;"><strong>No.of Guests:</strong></td>
                                    <td style="padding: 5px 0;">{{$people}}</td>
                                </tr>
                                <tr>
                                    <td style="padding: 5px 0;"><strong>Accommodation:</strong></td>
                                    <td style="padding: 5px 0;">{{$room_name}}</td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                </table>

                <p style="margin-bottom: 20px;">If you have any questions or special requirements, please don't hesitate to reach out. We're here to ensure you have a wonderful and rejuvenating experience.</p>
                <p style="margin-bottom: 5px;">Namaste,</p>
                <p style="margin-bottom: 20px;"><strong>The Yoga Holiday Team</strong></p>
            </td>
        </tr>
        <tr>
            <td style="background-color: #e6fff0; padding: 20px 30px; text-align: center;">
                <p style="margin-bottom: 10px; font-size: 14px;">Connect with us</p>
                <a href="#" style="display: inline-block; margin: 0 5px;"><img src="{{asset('main/images/facebook.png')}}" alt="Facebook" style="width: 30px; height: 30px;"></a>
                <a href="#" style="display: inline-block; margin: 0 5px;"><img src="{{asset('main/images/instagram.png')}}" alt="Instagram" style="width: 30px; height: 30px;"></a>
                <a href="#" style="display: inline-block; margin: 0 5px;"><img src="{{asset('main/images/whatsapp.png')}}" alt="Whatsapp" style="width: 30px; height: 30px;"></a>
            </td>
        </tr>
        <tr>
            <td style="background-color: #0fbc69; color: #ffffff; padding: 20px 30px; text-align: center; font-size: 12px;">
                <p style="margin-bottom: 10px;">&copy; 2024 Yoga Retreat. All rights reserved.</p>
                <p style="margin-bottom: 0;">If you have any questions, please contact us at <a href="mailto:info@yogaretreat.com" style="color: #ffffff; text-decoration: underline;">info@yogaretreat.com</a></p>
            </td>
        </tr>
    </table>
</body>
</html>