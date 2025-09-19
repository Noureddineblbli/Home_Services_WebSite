# 🏠 Home Services Website

A **Laravel-based web application** for booking and managing home services (cleaning, plumbing, electrical, gardening, etc.).  
The platform connects **clients** with **service providers** and provides an **admin dashboard** for managing users, services, and bookings.

---

## 🚀 Features

- 🔑 **Authentication & Authorization** (Clients, Providers, Admins)
- 📋 **Service Listings** – browse and request different home services
- 🛒 **Booking System** – clients can book services with scheduling
- 📊 **Admin Dashboard** – manage users, services, and reservations
- 🌐 **Responsive Design** – built with Laravel Blade + TailwindCSS
- 🔒 Secure routes & validation

---

## 🛠️ Tech Stack

- **Backend:** Laravel 10 (PHP Framework)
- **Frontend:** Blade Templates, TailwindCSS, JavaScript
- **Database:** MySQL / MariaDB
- **Build Tools:** Laravel Mix, NPM
- **Authentication:** Laravel Breeze / Passport (depending on setup)

---

## 📂 Project Structure

```
Home_Services_WebSite/
│-- app/             # Application logic (Models, Controllers, Policies)
│-- database/        # Migrations & seeders
│-- public/          # Public assets (CSS, JS, images)
│-- resources/       # Views (Blade templates), CSS, JS
│-- routes/          # Route definitions (web.php, api.php)
│-- tests/           # PHPUnit tests
│-- .env.example     # Example environment config
│-- composer.json    # PHP dependencies
│-- package.json     # Node.js dependencies
```

---

## ⚙️ Installation & Setup

### 1. Clone the Repository
```bash
git clone https://github.com/Noureddineblbli/Home_Services_WebSite.git
cd Home_Services_WebSite
```

### 2. Install Dependencies
```bash
composer install
npm install && npm run dev
```

### 3. Configure Environment
```bash
cp .env.example .env
```
- Update `.env` with your database and mail settings.

### 4. Generate Key
```bash
php artisan key:generate
```

### 5. Run Migrations & Seeders
```bash
php artisan migrate --seed
```

### 6. Start the Development Server
```bash
php artisan serve
```
👉 App will be available at: **http://127.0.0.1:8000**

---

## 🧪 Running Tests

```bash
php artisan test
```

---

## 📸 Screenshots (Optional)

_Add screenshots of your home page, booking system, and admin dashboard here._

---

## 📌 Roadmap

- ✅ Basic CRUD for services and bookings  
- ✅ Authentication system  
- ⬜ Payment integration (Stripe/PayPal)  
- ⬜ Multi-language support  
- ⬜ Mobile app integration (future)  

---

## 🤝 Contributing

1. Fork the repo  
2. Create a feature branch (`git checkout -b feature-name`)  
3. Commit changes (`git commit -m 'Add new feature'`)  
4. Push to branch (`git push origin feature-name`)  
5. Open a Pull Request  

---

## 📄 License

This project is licensed under the **MIT License**.  

---

## 👨‍💻 Author

Developed by **[Noureddine Blibli](https://github.com/Noureddineblbli)**  
Feel free to reach out for collaboration or feedback!
