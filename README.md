
# SebaStock – Laravel Video Selling Platform

## Project Overview
**SebaStock** is a Laravel-based platform designed for video creators to upload, price, and sell their videos online. The platform ensures secure transactions, content moderation, and copyright protection through watermarking. Admin approval is required before videos go live, providing a curated and high-quality marketplace for buyers.

## Key Features
- Seller registration and login system.
- Video upload with title, description, pricing, and automatic watermarking.
- Admin dashboard for approving, managing, and moderating uploaded videos.
- Secure checkout process with payment gateway integration.
- Shopping cart system for buyers.
- Download access granted only after successful payment.
- Responsive and user-friendly design for a seamless experience.

## Technologies Used
- **Backend:** Laravel 8+
- **Database:** MySQL
- **Authentication:** Laravel Passport (for API security)
- **Frontend:** Blade Templates, Bootstrap
- **Other:** Payment Gateway Integration, Video Watermarking, RESTful APIs

## Installation
1. Clone the repository:
   ```bash
   git clone https://github.com/your-username/sebastock-laravel-video-selling-platform.git
   ```
2. Install dependencies:
   ```bash
   composer install
   npm install && npm run dev
   ```
3. Configure the `.env` file:
   - Set up your database connection.
   - Configure mail and payment gateway settings.
4. Run migrations:
   ```bash
   php artisan migrate
   ```
5. Start the server:
   ```bash
   php artisan serve
   ```

## Requirements
- PHP 7.4 or higher
- Composer
- Node.js and NPM
- MySQL Database

## License
This project is licensed for personal and professional portfolio demonstration purposes.
