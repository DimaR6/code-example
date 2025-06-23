# 🚀 Laravel Docker Setup

This project runs Laravel inside Docker using PHP, Apache, and MySQL.

---

## 🐳 Start Docker Containers

Build and start the containers:

```bash
docker compose up -d --build
```

---

## 📌 Notes

- Make sure your `.env` file is configured to connect to the `db` service:
  ```env
  DB_HOST=db
  DB_PORT=3306
  DB_DATABASE=laravel
  DB_USERNAME=laravel
  DB_PASSWORD=secret
  ```

- PhpMyAdmin (if enabled) is available at:  
  👉 [http://localhost:8080](http://localhost:8080)

---

## ⚙️ Install Laravel Dependencies

Enter the container and set up Laravel:

```bash
docker exec -it laravel_app bash
composer install
php artisan key:generate
php artisan migrate
exit
```

---

## ✅ You're Done!

Your Laravel application is now running at:

👉 [http://localhost:8000](http://localhost:8000)

---

Happy coding! 🎉