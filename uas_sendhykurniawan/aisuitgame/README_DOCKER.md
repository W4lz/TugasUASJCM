# AI Suit Game - Docker Setup

Panduan untuk menjalankan aplikasi AI Suit Game di Docker.

## Prerequisites

- Docker Desktop terinstall ([Download Docker](https://www.docker.com/products/docker-desktop))
- Docker Compose terinstall (biasanya sudah include dengan Docker Desktop)

## Cara Menjalankan

### 1. Build dan Run Container

```bash
# Navigasi ke folder project
cd D:\Projects\AI_suit_game

# Build image dan jalankan container
docker-compose up -d

# atau jika ingin melihat log real-time
docker-compose up
```

### 2. Akses Aplikasi

Buka browser dan kunjungi:
```
http://localhost:8080
```

## Perintah Docker Useful

### Melihat status container
```bash
docker-compose ps
```

### Melihat log
```bash
docker-compose logs -f aisuitgame
```

### Stop container
```bash
docker-compose stop
```

### Start ulang container
```bash
docker-compose start
```

### Restart container
```bash
docker-compose restart
```

### Hapus container dan image
```bash
docker-compose down
```

### Rebuild container (jika ada perubahan file)
```bash
docker-compose up -d --build
```

### Enter container bash
```bash
docker-compose exec aisuitgame bash
```

## Troubleshooting

### Port 8080 sudah digunakan
Ubah port di `docker-compose.yml`:
```yaml
ports:
  - "8081:80"  # Ganti 8080 dengan port yang tersedia
```

### Permission Denied
Jalankan PowerShell sebagai Administrator

### Perubahan file tidak terlihat
Container sudah memonitor perubahan file secara real-time karena ada `volumes`. Refresh browser jika perlu.

## Struktur File

```
AI_suit_game/
├── Dockerfile           # Konfigurasi Docker
├── docker-compose.yml   # Konfigurasi Docker Compose
├── .dockerignore        # File/folder yang diabaikan saat build
├── .env.example         # Contoh environment variables
├── aisuitgame.php       # Main application
├── suit_game-*.jpg      # Assets gambar
└── README_DOCKER.md     # File ini
```

## Notes

- Container menggunakan PHP 8.2 dengan Apache
- Volume dipetakan sehingga perubahan file langsung terlihat tanpa rebuild
- Timezone diset ke Asia/Jakarta
- Container akan auto-restart jika crash

## Lihat juga

- [Dokumentasi Docker](https://docs.docker.com/)
- [Dokumentasi Docker Compose](https://docs.docker.com/compose/)
- [PHP Docker Image](https://hub.docker.com/_/php)
