<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

Ceci est le référentiel officiel du projet sablux immoplus.com, construit avec Laravel.

Laravel est accessible, puissant et fournit les outils requis pour les grandes applications robustes.

## Installation on a local environment

1. Cloner le dépôt

```bash
git clone git@gitlab.com:webamadou/immoplus.git
```

2. Déplacer-vous vers le dossier du projet

```bash
cd immoplus
```

3. Créez le fichier .env à partir de l'exemple

```bash
cp .env.example .env
```

4. Modifiez votre .env et définissez l'accès à votre base de données et tout ce qui est nécessaire. Créez la base de données puis éditez le fichier .env
   ex:

```bash
DB_DATABASE=sabluximmoplusdb
DB_USERNAME=root
DB_PASSWORD=dbpassword
```

5. Exécutez Composer pour installer les dépendances

```bash
composer install
```

6. Générez votre clé unique .env

```bash
php artisan key:generate
```

7. Exécutez npm pour installer les dépendances

```bash
npm install
```

8. Initialiser tailwindcss

```
npx tailwindcss init
```

9. Compiler les assets

```bash
npm run dev
```

10. Exécutez les migrations et les seedings

```bash
php artisan migrate --seed
```

## Happy coding 🎉

---

Powered by:

<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>
