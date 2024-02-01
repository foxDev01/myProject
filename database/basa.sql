
-- Дамп структуры базы данных main
CREATE DATABASE IF NOT EXISTS `main`;
USE `main`;

-- Дамп структуры для таблица main.categories
CREATE TABLE IF NOT EXISTS `categories` (`id` bigint(20) unsigned NOT NULL AUTO_INCREMENT, `title` varchar(191) NOT NULL, `created_at` datetime, `updated_at` datetime, `deleted_at` datetime);

-- Экспортируемые данные не выделены.

-- Дамп структуры для таблица main.comments
CREATE TABLE IF NOT EXISTS `comments` (`id` bigint(20) unsigned NOT NULL AUTO_INCREMENT, `user_id` bigint(20) NOT NULL, `project_id` bigint(20) NOT NULL, `message` text NOT NULL, `created_at` datetime, `updated_at` datetime, foreign key(`project_id`) references `projects`(`id`), foreign key(`user_id`) references `users`(`id`));

-- Экспортируемые данные не выделены.

-- Дамп структуры для таблица main.failed_jobs
CREATE TABLE IF NOT EXISTS `failed_jobs` (`id` bigint(20) unsigned NOT NULL AUTO_INCREMENT, `uuid` varchar(191) NOT NULL, `connection` text NOT NULL, `queue` text NOT NULL, `payload` text NOT NULL, `exception` text NOT NULL, `failed_at` datetime default CURRENT_TIMESTAMP NOT NULL);

-- Экспортируемые данные не выделены.

-- Дамп структуры для таблица main.migrations
CREATE TABLE IF NOT EXISTS `migrations` (`id` bigint(20) unsigned NOT NULL AUTO_INCREMENT, `migration` varchar(191) NOT NULL, `batch` bigint(20) NOT NULL);

-- Экспортируемые данные не выделены.

-- Дамп структуры для таблица main.password_resets
CREATE TABLE IF NOT EXISTS `password_resets` (`email` varchar(191) NOT NULL, `token` varchar(191) NOT NULL, `created_at` datetime);

-- Экспортируемые данные не выделены.

-- Дамп структуры для таблица main.personal_access_tokens
CREATE TABLE IF NOT EXISTS `personal_access_tokens` (`id` bigint(20) unsigned NOT NULL AUTO_INCREMENT, `tokenable_type` varchar(191) NOT NULL, `tokenable_id` bigint(20) NOT NULL, `name` varchar(191) NOT NULL, `token` varchar(191) NOT NULL, `abilities` text, `last_used_at` datetime, `created_at` datetime, `updated_at` datetime);

-- Экспортируемые данные не выделены.

-- Дамп структуры для таблица main.projects
CREATE TABLE IF NOT EXISTS `projects` (id bigint(20) PRIMARY KEY AUTOINCREMENT NOT NULL, `title` varchar(191)(255) NOT NULL COLLATE BINARY, content CLOB NOT NULL COLLATE BINARY, category_id bigint(20) DEFAULT NULL, created_at DATETIME DEFAULT NULL, updated_at DATETIME DEFAULT NULL, `preview_image` varchar(191), `main_image` varchar(191), `deleted_at` datetime);

-- Экспортируемые данные не выделены.

-- Дамп структуры для таблица main.project_tags
CREATE TABLE IF NOT EXISTS `project_tags` (`id` bigint(20) unsigned NOT NULL AUTO_INCREMENT, `project_id` bigint(20) NOT NULL, `tag_id` bigint(20) NOT NULL, `created_at` datetime, `updated_at` datetime, foreign key(`project_id`) references `projects`(`id`), foreign key(`tag_id`) references `tags`(`id`));

-- Экспортируемые данные не выделены.

-- Дамп структуры для таблица main.project_user_likes
CREATE TABLE IF NOT EXISTS `project_user_likes` (`id` bigint(20) unsigned NOT NULL AUTO_INCREMENT, `project_id` bigint(20) NOT NULL, `user_id` bigint(20) NOT NULL, `created_at` datetime, `updated_at` datetime, foreign key(`project_id`) references `projects`(`id`), foreign key(`user_id`) references `users`(`id`));

-- Экспортируемые данные не выделены.

-- Дамп структуры для таблица main.tags
CREATE TABLE IF NOT EXISTS `tags` (`id` bigint(20) unsigned NOT NULL AUTO_INCREMENT, `title` varchar(191) NOT NULL, `created_at` datetime, `updated_at` datetime, `deleted_at` datetime);

-- Экспортируемые данные не выделены.

-- Дамп структуры для таблица main.users
CREATE TABLE IF NOT EXISTS `users` (id bigint(20) PRIMARY KEY AUTOINCREMENT NOT NULL, `name` varchar(191)(255) NOT NULL COLLATE BINARY, `email` varchar(191)(255) NOT NULL COLLATE BINARY, `email_verified_at` DATETIME DEFAULT NULL, password varchar(191)(255) NOT NULL COLLATE BINARY, `remember_token` varchar(191)(255) DEFAULT NULL COLLATE BINARY, `created_at` DATETIME DEFAULT NULL, `updated_at` DATETIME DEFAULT NULL, `deleted_at` DATETIME DEFAULT NULL, `role` bigint(20));

-- Экспортируемые данные не выделены.

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
