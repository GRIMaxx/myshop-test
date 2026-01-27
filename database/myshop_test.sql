-- phpMyAdmin SQL Dump
-- version 5.2.1deb3
-- https://www.phpmyadmin.net/
--
-- Хост: localhost:3306
-- Время создания: Янв 27 2026 г., 03:02
-- Версия сервера: 8.0.44-0ubuntu0.24.04.1
-- Версия PHP: 8.3.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `myshop_test`
--

-- --------------------------------------------------------

--
-- Структура таблицы `customers`
--

CREATE TABLE `customers` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `customers`
--

INSERT INTO `customers` (`id`, `name`, `phone`, `email`, `created_at`, `updated_at`) VALUES
(1, 'Maurine Grady', '+77349623641', 'minnie42@example.com', '2025-09-17 05:07:31', '2026-01-27 03:00:58'),
(2, 'Perry Muller', '+77497546749', 'muhammad.johnston@example.org', '2026-01-02 12:36:54', '2026-01-27 03:00:58'),
(3, 'Karson Kuhn PhD', '+77662484739', 'georgette.tromp@example.org', '2025-08-01 14:41:12', '2026-01-27 03:00:58'),
(4, 'Ms. Clementine Green I', '+77988174121', 'schowalter.iva@example.com', '2025-09-07 07:39:12', '2026-01-27 03:00:58'),
(5, 'Glen Schimmel', '+77611947651', 'mckenzie.litzy@example.org', '2025-10-24 08:26:43', '2026-01-27 03:00:58'),
(6, 'Aniyah Krajcik', '+77322482231', 'lbahringer@example.net', '2025-10-01 00:06:13', '2026-01-27 03:00:58'),
(7, 'Dr. Ayden Ruecker Jr.', '+77262367455', 'mckenzie.brooklyn@example.net', '2025-10-18 15:13:56', '2026-01-27 03:00:58'),
(8, 'Dortha Dickinson', '+77823157002', 'erwin.ankunding@example.org', '2025-08-05 13:32:36', '2026-01-27 03:00:58'),
(9, 'Prof. Rosalia Hartmann Jr.', '+77241884229', 'harvey.devonte@example.net', '2025-08-15 16:41:13', '2026-01-27 03:00:58'),
(10, 'Luella Emard MD', '+77909289636', 'zack71@example.com', '2025-12-22 23:09:51', '2026-01-27 03:00:58'),
(11, 'Anya Mayert', '+77452581760', 'monahan.jermey@example.net', '2025-10-19 20:48:36', '2026-01-27 03:00:58'),
(12, 'Robb Predovic', '+77833907370', 'lubowitz.torrance@example.net', '2025-12-24 17:16:13', '2026-01-27 03:00:58'),
(13, 'Olen Lynch', '+77885065764', 'hassie.williamson@example.org', '2025-09-05 17:31:21', '2026-01-27 03:00:58'),
(14, 'Bertha Parisian', '+77215434147', 'kaylee.schuppe@example.net', '2025-09-16 15:13:59', '2026-01-27 03:00:58'),
(15, 'Lavon Rogahn', '+77903926925', 'flatley.jake@example.com', '2026-01-16 23:39:29', '2026-01-27 03:00:58'),
(16, 'Raul Ullrich Sr.', '+77893982290', 'freeman.leffler@example.org', '2025-09-24 08:47:09', '2026-01-27 03:00:58'),
(17, 'Ernie Hessel', '+77912244377', 'polly.bogisich@example.org', '2026-01-13 09:45:58', '2026-01-27 03:00:58'),
(18, 'Cristian White PhD', '+77188135036', 'jaleel59@example.net', '2025-10-14 21:22:26', '2026-01-27 03:00:58'),
(19, 'Claud Terry DVM', '+77774017232', 'apfeffer@example.com', '2026-01-02 10:47:19', '2026-01-27 03:00:58'),
(20, 'Melyna Ritchie', '+77418280710', 'shills@example.net', '2025-09-30 11:09:01', '2026-01-27 03:00:58');

-- --------------------------------------------------------

--
-- Структура таблицы `media`
--

CREATE TABLE `media` (
  `id` bigint UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint UNSIGNED NOT NULL,
  `uuid` char(36) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `collection_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mime_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `disk` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `conversions_disk` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `size` bigint UNSIGNED NOT NULL,
  `manipulations` json NOT NULL,
  `custom_properties` json NOT NULL,
  `generated_conversions` json NOT NULL,
  `responsive_images` json NOT NULL,
  `order_column` int UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `media`
--

INSERT INTO `media` (`id`, `model_type`, `model_id`, `uuid`, `collection_name`, `name`, `file_name`, `mime_type`, `disk`, `conversions_disk`, `size`, `manipulations`, `custom_properties`, `generated_conversions`, `responsive_images`, `order_column`, `created_at`, `updated_at`) VALUES
(1, 'App\\Models\\Ticket', 2, NULL, 'attachments', 'тестовый файл 1', 'test_smart.pdf', 'application/pdf', 'public', 'public', 36520, '[]', '[]', '[]', '[]', NULL, '2026-01-27 03:00:58', '2026-01-27 03:00:58'),
(2, 'App\\Models\\Ticket', 5, NULL, 'attachments', 'тестовый файл 1', 'test_smart.pdf', 'application/pdf', 'public', 'public', 36520, '[]', '[]', '[]', '[]', NULL, '2026-01-27 03:00:58', '2026-01-27 03:00:58'),
(3, 'App\\Models\\Ticket', 5, NULL, 'attachments', 'тестовый файл 2', 'test_smart.pdf', 'application/pdf', 'public', 'public', 36520, '[]', '[]', '[]', '[]', NULL, '2026-01-27 03:00:58', '2026-01-27 03:00:58'),
(4, 'App\\Models\\Ticket', 6, NULL, 'attachments', 'тестовый файл 1', 'test_smart.pdf', 'application/pdf', 'public', 'public', 36520, '[]', '[]', '[]', '[]', NULL, '2026-01-27 03:00:58', '2026-01-27 03:00:58'),
(5, 'App\\Models\\Ticket', 6, NULL, 'attachments', 'тестовый файл 2', 'test_smart.pdf', 'application/pdf', 'public', 'public', 36520, '[]', '[]', '[]', '[]', NULL, '2026-01-27 03:00:58', '2026-01-27 03:00:58'),
(6, 'App\\Models\\Ticket', 9, NULL, 'attachments', 'тестовый файл 1', 'test_smart.pdf', 'application/pdf', 'public', 'public', 36520, '[]', '[]', '[]', '[]', NULL, '2026-01-27 03:00:58', '2026-01-27 03:00:58'),
(7, 'App\\Models\\Ticket', 11, NULL, 'attachments', 'тестовый файл 1', 'test_smart.pdf', 'application/pdf', 'public', 'public', 36520, '[]', '[]', '[]', '[]', NULL, '2026-01-27 03:00:58', '2026-01-27 03:00:58'),
(8, 'App\\Models\\Ticket', 11, NULL, 'attachments', 'тестовый файл 2', 'test_smart.pdf', 'application/pdf', 'public', 'public', 36520, '[]', '[]', '[]', '[]', NULL, '2026-01-27 03:00:58', '2026-01-27 03:00:58'),
(9, 'App\\Models\\Ticket', 12, NULL, 'attachments', 'тестовый файл 1', 'test_smart.pdf', 'application/pdf', 'public', 'public', 36520, '[]', '[]', '[]', '[]', NULL, '2026-01-27 03:00:58', '2026-01-27 03:00:58'),
(10, 'App\\Models\\Ticket', 12, NULL, 'attachments', 'тестовый файл 2', 'test_smart.pdf', 'application/pdf', 'public', 'public', 36520, '[]', '[]', '[]', '[]', NULL, '2026-01-27 03:00:58', '2026-01-27 03:00:58'),
(11, 'App\\Models\\Ticket', 13, NULL, 'attachments', 'тестовый файл 1', 'test_smart.pdf', 'application/pdf', 'public', 'public', 36520, '[]', '[]', '[]', '[]', NULL, '2026-01-27 03:00:58', '2026-01-27 03:00:58'),
(12, 'App\\Models\\Ticket', 15, NULL, 'attachments', 'тестовый файл 1', 'test_smart.pdf', 'application/pdf', 'public', 'public', 36520, '[]', '[]', '[]', '[]', NULL, '2026-01-27 03:00:58', '2026-01-27 03:00:58'),
(13, 'App\\Models\\Ticket', 16, NULL, 'attachments', 'тестовый файл 1', 'test_smart.pdf', 'application/pdf', 'public', 'public', 36520, '[]', '[]', '[]', '[]', NULL, '2026-01-27 03:00:58', '2026-01-27 03:00:58'),
(14, 'App\\Models\\Ticket', 17, NULL, 'attachments', 'тестовый файл 1', 'test_smart.pdf', 'application/pdf', 'public', 'public', 36520, '[]', '[]', '[]', '[]', NULL, '2026-01-27 03:00:58', '2026-01-27 03:00:58'),
(15, 'App\\Models\\Ticket', 17, NULL, 'attachments', 'тестовый файл 2', 'test_smart.pdf', 'application/pdf', 'public', 'public', 36520, '[]', '[]', '[]', '[]', NULL, '2026-01-27 03:00:58', '2026-01-27 03:00:58'),
(16, 'App\\Models\\Ticket', 19, NULL, 'attachments', 'тестовый файл 1', 'test_smart.pdf', 'application/pdf', 'public', 'public', 36520, '[]', '[]', '[]', '[]', NULL, '2026-01-27 03:00:58', '2026-01-27 03:00:58'),
(17, 'App\\Models\\Ticket', 19, NULL, 'attachments', 'тестовый файл 2', 'test_smart.pdf', 'application/pdf', 'public', 'public', 36520, '[]', '[]', '[]', '[]', NULL, '2026-01-27 03:00:58', '2026-01-27 03:00:58'),
(18, 'App\\Models\\Ticket', 20, NULL, 'attachments', 'тестовый файл 1', 'test_smart.pdf', 'application/pdf', 'public', 'public', 36520, '[]', '[]', '[]', '[]', NULL, '2026-01-27 03:00:58', '2026-01-27 03:00:58'),
(19, 'App\\Models\\Ticket', 21, NULL, 'attachments', 'тестовый файл 1', 'test_smart.pdf', 'application/pdf', 'public', 'public', 36520, '[]', '[]', '[]', '[]', NULL, '2026-01-27 03:00:58', '2026-01-27 03:00:58'),
(20, 'App\\Models\\Ticket', 23, NULL, 'attachments', 'тестовый файл 1', 'test_smart.pdf', 'application/pdf', 'public', 'public', 36520, '[]', '[]', '[]', '[]', NULL, '2026-01-27 03:00:58', '2026-01-27 03:00:58'),
(21, 'App\\Models\\Ticket', 23, NULL, 'attachments', 'тестовый файл 2', 'test_smart.pdf', 'application/pdf', 'public', 'public', 36520, '[]', '[]', '[]', '[]', NULL, '2026-01-27 03:00:58', '2026-01-27 03:00:58'),
(22, 'App\\Models\\Ticket', 25, NULL, 'attachments', 'тестовый файл 1', 'test_smart.pdf', 'application/pdf', 'public', 'public', 36520, '[]', '[]', '[]', '[]', NULL, '2026-01-27 03:00:58', '2026-01-27 03:00:58'),
(23, 'App\\Models\\Ticket', 25, NULL, 'attachments', 'тестовый файл 2', 'test_smart.pdf', 'application/pdf', 'public', 'public', 36520, '[]', '[]', '[]', '[]', NULL, '2026-01-27 03:00:58', '2026-01-27 03:00:58'),
(24, 'App\\Models\\Ticket', 26, NULL, 'attachments', 'тестовый файл 1', 'test_smart.pdf', 'application/pdf', 'public', 'public', 36520, '[]', '[]', '[]', '[]', NULL, '2026-01-27 03:00:58', '2026-01-27 03:00:58'),
(25, 'App\\Models\\Ticket', 26, NULL, 'attachments', 'тестовый файл 2', 'test_smart.pdf', 'application/pdf', 'public', 'public', 36520, '[]', '[]', '[]', '[]', NULL, '2026-01-27 03:00:58', '2026-01-27 03:00:58'),
(26, 'App\\Models\\Ticket', 28, NULL, 'attachments', 'тестовый файл 1', 'test_smart.pdf', 'application/pdf', 'public', 'public', 36520, '[]', '[]', '[]', '[]', NULL, '2026-01-27 03:00:58', '2026-01-27 03:00:58'),
(27, 'App\\Models\\Ticket', 30, NULL, 'attachments', 'тестовый файл 1', 'test_smart.pdf', 'application/pdf', 'public', 'public', 36520, '[]', '[]', '[]', '[]', NULL, '2026-01-27 03:00:58', '2026-01-27 03:00:58'),
(28, 'App\\Models\\Ticket', 31, NULL, 'attachments', 'тестовый файл 1', 'test_smart.pdf', 'application/pdf', 'public', 'public', 36520, '[]', '[]', '[]', '[]', NULL, '2026-01-27 03:00:58', '2026-01-27 03:00:58'),
(29, 'App\\Models\\Ticket', 34, NULL, 'attachments', 'тестовый файл 1', 'test_smart.pdf', 'application/pdf', 'public', 'public', 36520, '[]', '[]', '[]', '[]', NULL, '2026-01-27 03:00:58', '2026-01-27 03:00:58'),
(30, 'App\\Models\\Ticket', 34, NULL, 'attachments', 'тестовый файл 2', 'test_smart.pdf', 'application/pdf', 'public', 'public', 36520, '[]', '[]', '[]', '[]', NULL, '2026-01-27 03:00:58', '2026-01-27 03:00:58'),
(31, 'App\\Models\\Ticket', 36, NULL, 'attachments', 'тестовый файл 1', 'test_smart.pdf', 'application/pdf', 'public', 'public', 36520, '[]', '[]', '[]', '[]', NULL, '2026-01-27 03:00:58', '2026-01-27 03:00:58'),
(32, 'App\\Models\\Ticket', 37, NULL, 'attachments', 'тестовый файл 1', 'test_smart.pdf', 'application/pdf', 'public', 'public', 36520, '[]', '[]', '[]', '[]', NULL, '2026-01-27 03:00:58', '2026-01-27 03:00:58'),
(33, 'App\\Models\\Ticket', 39, NULL, 'attachments', 'тестовый файл 1', 'test_smart.pdf', 'application/pdf', 'public', 'public', 36520, '[]', '[]', '[]', '[]', NULL, '2026-01-27 03:00:58', '2026-01-27 03:00:58');

-- --------------------------------------------------------

--
-- Структура таблицы `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0000_01_00_000001_create_customers_table', 1),
(2, '0000_01_00_000002_create_tickets_table', 1),
(3, '0001_01_01_000000_create_users_table', 1),
(4, '2026_01_25_081536_create_permission_tables', 1),
(5, '2026_01_25_093223_create_media_table', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\Models\\User', 1),
(2, 'App\\Models\\User', 2),
(2, 'App\\Models\\User', 3),
(2, 'App\\Models\\User', 4);

-- --------------------------------------------------------

--
-- Структура таблицы `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `roles`
--

CREATE TABLE `roles` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'web', '2026-01-27 03:00:57', '2026-01-27 03:00:57'),
(2, 'Manager', 'web', '2026-01-27 03:00:57', '2026-01-27 03:00:57');

-- --------------------------------------------------------

--
-- Структура таблицы `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint UNSIGNED NOT NULL,
  `role_id` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `tickets`
--

CREATE TABLE `tickets` (
  `id` bigint UNSIGNED NOT NULL,
  `customer_id` bigint UNSIGNED NOT NULL,
  `customer_email` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `customer_phone` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subject` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('new','in_progress','completed') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'new',
  `answered_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `tickets`
--

INSERT INTO `tickets` (`id`, `customer_id`, `customer_email`, `customer_phone`, `subject`, `message`, `status`, `answered_at`, `created_at`, `updated_at`) VALUES
(1, 1, 'minnie42@example.com', '+77349623641', 'Sint neque sint doloribus vel.', 'Eaque et maiores vero eveniet. Est inventore perspiciatis ipsum natus est. Non nulla maiores ratione delectus voluptatibus incidunt.', 'completed', NULL, '2026-01-27 03:00:58', '2026-01-27 03:00:58'),
(2, 1, 'minnie42@example.com', '+77349623641', 'Et nihil exercitationem quis officiis.', 'Qui et molestias sunt ex nihil. Impedit ut qui corrupti quia doloremque voluptatum.', 'completed', NULL, '2026-01-27 03:00:58', '2026-01-27 03:00:58'),
(3, 1, 'minnie42@example.com', '+77349623641', 'Nam quia officia fugit delectus illo quidem.', 'Libero voluptatem tempora expedita vero natus dolorum voluptatem. Dolorum consequatur dignissimos fugiat. Excepturi harum a voluptate rem veritatis quidem dolores.', 'completed', NULL, '2026-01-27 03:00:58', '2026-01-27 03:00:58'),
(4, 2, 'muhammad.johnston@example.org', '+77497546749', 'Vel et nihil molestiae tempora qui.', 'Quaerat nesciunt molestiae architecto velit iure eos. Id ratione at nisi.', 'in_progress', NULL, '2026-01-27 03:00:58', '2026-01-27 03:00:58'),
(5, 2, 'muhammad.johnston@example.org', '+77497546749', 'Maiores numquam sed saepe.', 'Voluptas praesentium minima exercitationem saepe sed ducimus vero rerum. Rerum quo placeat similique aut. Eveniet maxime eum quo sunt architecto est sequi corrupti.', 'new', NULL, '2026-01-27 03:00:58', '2026-01-27 03:00:58'),
(6, 2, 'muhammad.johnston@example.org', '+77497546749', 'Ut et officiis perferendis qui fuga.', 'Dignissimos est et cum. Vero cum nobis et quos. Rerum recusandae doloremque reprehenderit dolor alias laboriosam voluptatum.', 'new', NULL, '2026-01-27 03:00:58', '2026-01-27 03:00:58'),
(7, 3, 'georgette.tromp@example.org', '+77662484739', 'Ipsam ducimus fuga non incidunt harum.', 'Dignissimos odio tempora aut amet quos facere quis numquam. Repellat eveniet placeat qui nobis autem et ipsum. Error dolore dicta earum saepe corrupti tempora.', 'in_progress', NULL, '2026-01-27 03:00:58', '2026-01-27 03:00:58'),
(8, 3, 'georgette.tromp@example.org', '+77662484739', 'Deserunt eligendi omnis molestias.', 'Enim voluptate consectetur earum rem velit vero. Est quis maiores distinctio quo quod qui.', 'completed', NULL, '2026-01-27 03:00:58', '2026-01-27 03:00:58'),
(9, 3, 'georgette.tromp@example.org', '+77662484739', 'Repellat perferendis facere ut.', 'Rerum repellat doloremque dicta vitae. Ratione voluptatem adipisci natus ipsam repudiandae harum. Qui vitae voluptas adipisci adipisci voluptatem aut.', 'completed', NULL, '2026-01-27 03:00:58', '2026-01-27 03:00:58'),
(10, 4, 'schowalter.iva@example.com', '+77988174121', 'Sint et voluptatem excepturi aliquid dicta nesciunt.', 'Molestiae quia provident rem sequi saepe. Exercitationem sed cupiditate ut cum quae qui voluptate. Omnis voluptatem iure nihil sint.', 'completed', NULL, '2026-01-27 03:00:58', '2026-01-27 03:00:58'),
(11, 4, 'schowalter.iva@example.com', '+77988174121', 'Animi dolores molestias quae perspiciatis.', 'Ipsa temporibus eos sint nesciunt. Est voluptatibus consequuntur aliquam aut.', 'completed', NULL, '2026-01-27 03:00:58', '2026-01-27 03:00:58'),
(12, 5, 'mckenzie.litzy@example.org', '+77611947651', 'Architecto corporis sunt corporis voluptatum.', 'Ratione pariatur dolores nihil similique qui numquam quaerat omnis. Accusantium eius earum autem pariatur sint ut. Consequatur placeat fuga nulla et cupiditate et.', 'in_progress', NULL, '2026-01-27 03:00:58', '2026-01-27 03:00:58'),
(13, 5, 'mckenzie.litzy@example.org', '+77611947651', 'Earum est rerum laborum.', 'Et dolorem expedita non ut ea excepturi nisi. Officia ut maiores ut nisi et ex et.', 'new', NULL, '2026-01-27 03:00:58', '2026-01-27 03:00:58'),
(14, 6, 'lbahringer@example.net', '+77322482231', 'Et iusto id ut officiis sit.', 'Temporibus iure excepturi quasi animi consequatur. Sequi accusamus perferendis qui voluptates.', 'new', NULL, '2026-01-27 03:00:58', '2026-01-27 03:00:58'),
(15, 7, 'mckenzie.brooklyn@example.net', '+77262367455', 'Sunt veritatis nulla accusantium placeat.', 'Laboriosam quis ut perspiciatis aut at ipsam. Illum illum et culpa laborum fugit maxime repellat. Consequuntur fugiat fugit aliquam.', 'in_progress', NULL, '2026-01-27 03:00:58', '2026-01-27 03:00:58'),
(16, 7, 'mckenzie.brooklyn@example.net', '+77262367455', 'Perspiciatis sit nam consequatur voluptatem.', 'Voluptatem sit cumque iste ratione. Nulla rerum veritatis labore ut et. Assumenda pariatur occaecati ut explicabo.', 'completed', NULL, '2026-01-27 03:00:58', '2026-01-27 03:00:58'),
(17, 7, 'mckenzie.brooklyn@example.net', '+77262367455', 'Sint eaque et harum eius.', 'Ut reprehenderit consequatur doloribus. Fugit ea repellendus eos. Consequatur eius alias ea vitae omnis.', 'new', NULL, '2026-01-27 03:00:58', '2026-01-27 03:00:58'),
(18, 8, 'erwin.ankunding@example.org', '+77823157002', 'Reiciendis officiis aut et quia possimus.', 'Molestias assumenda suscipit ipsam quidem ea sed molestiae asperiores. Cum nobis non culpa. Sunt sed aut animi quisquam ut qui.', 'in_progress', NULL, '2026-01-27 03:00:58', '2026-01-27 03:00:58'),
(19, 8, 'erwin.ankunding@example.org', '+77823157002', 'Quia aliquid voluptatem enim repellendus ab amet.', 'Facilis est sunt totam omnis sed corporis. Pariatur et voluptas tempora sequi.', 'completed', NULL, '2026-01-27 03:00:58', '2026-01-27 03:00:58'),
(20, 9, 'harvey.devonte@example.net', '+77241884229', 'Aperiam rerum sed illum.', 'Consectetur et et corporis quis iste beatae voluptas. Aliquid iusto debitis quis temporibus sed. Dicta sit hic quod dolorem ullam.', 'new', NULL, '2026-01-27 03:00:58', '2026-01-27 03:00:58'),
(21, 10, 'zack71@example.com', '+77909289636', 'Ad cumque reiciendis reprehenderit accusamus cupiditate sit.', 'Consectetur voluptatem reprehenderit aliquid et modi. Aut quo excepturi qui harum vel tempora. Et consequatur voluptas quisquam deleniti ex.', 'in_progress', NULL, '2026-01-27 03:00:58', '2026-01-27 03:00:58'),
(22, 10, 'zack71@example.com', '+77909289636', 'Dicta dolores ipsam quasi assumenda.', 'Repellendus officia maiores est ut perferendis eius ad. Ut quo asperiores beatae minima alias rerum ab odio.', 'completed', NULL, '2026-01-27 03:00:58', '2026-01-27 03:00:58'),
(23, 11, 'monahan.jermey@example.net', '+77452581760', 'Perferendis aut provident qui non unde optio.', 'Qui omnis nemo ipsa corrupti tenetur et doloremque. Sapiente sint ut officiis unde et ea.', 'completed', NULL, '2026-01-27 03:00:58', '2026-01-27 03:00:58'),
(24, 11, 'monahan.jermey@example.net', '+77452581760', 'Illo non enim dolor sunt.', 'Debitis consequatur itaque ullam officia. Ab delectus quia vel quia consequatur.', 'new', NULL, '2026-01-27 03:00:58', '2026-01-27 03:00:58'),
(25, 12, 'lubowitz.torrance@example.net', '+77833907370', 'Molestias aperiam temporibus quidem ad asperiores.', 'Dolores molestiae ipsa id voluptatem voluptas est. Consequatur quis sit ducimus aut nesciunt.', 'new', NULL, '2026-01-27 03:00:58', '2026-01-27 03:00:58'),
(26, 13, 'hassie.williamson@example.org', '+77885065764', 'Necessitatibus tempore sequi commodi velit.', 'Doloremque asperiores id velit voluptatem maxime. Porro voluptate et placeat iure. Voluptas beatae voluptas in et.', 'new', NULL, '2026-01-27 03:00:58', '2026-01-27 03:00:58'),
(27, 13, 'hassie.williamson@example.org', '+77885065764', 'Quae nam a mollitia repudiandae sed et.', 'Corrupti ipsum voluptatibus dolorem voluptates. Unde autem vero a ut numquam saepe sed. Eos commodi enim saepe eos labore.', 'completed', NULL, '2026-01-27 03:00:58', '2026-01-27 03:00:58'),
(28, 13, 'hassie.williamson@example.org', '+77885065764', 'Minus tenetur accusantium cum consequuntur aliquid.', 'Nisi non quam soluta sit sed numquam cupiditate. Facilis quis quod ut. Dolores dignissimos velit adipisci dolores voluptatem numquam ab et.', 'new', NULL, '2026-01-27 03:00:58', '2026-01-27 03:00:58'),
(29, 14, 'kaylee.schuppe@example.net', '+77215434147', 'Repellendus omnis quis aut neque.', 'Laboriosam voluptate dolorum aut. Ex debitis qui quia recusandae sapiente quo sed esse.', 'in_progress', NULL, '2026-01-27 03:00:58', '2026-01-27 03:00:58'),
(30, 15, 'flatley.jake@example.com', '+77903926925', 'Sint quia inventore quidem occaecati esse.', 'Est consectetur possimus est. Et at culpa magnam corporis.', 'completed', NULL, '2026-01-27 03:00:58', '2026-01-27 03:00:58'),
(31, 15, 'flatley.jake@example.com', '+77903926925', 'Voluptates omnis reprehenderit et illo aliquid hic.', 'Minima iure ut dolorum labore dolorem vitae. Quia eum illum nulla beatae expedita laborum. Reiciendis officia ducimus aut atque tempore voluptatem sed.', 'new', NULL, '2026-01-27 03:00:58', '2026-01-27 03:00:58'),
(32, 16, 'freeman.leffler@example.org', '+77893982290', 'Amet inventore soluta praesentium laboriosam id facilis.', 'Tenetur voluptates aut dolorum impedit. Et non qui qui natus totam inventore. Quo nihil rem harum adipisci corrupti atque.', 'completed', NULL, '2026-01-27 03:00:58', '2026-01-27 03:00:58'),
(33, 17, 'polly.bogisich@example.org', '+77912244377', 'Sed qui eaque iste et molestias.', 'Rerum tenetur totam qui fuga ex consequatur repellendus quidem. Tenetur odit et doloribus quasi ipsa deleniti eius.', 'in_progress', NULL, '2026-01-27 03:00:58', '2026-01-27 03:00:58'),
(34, 18, 'jaleel59@example.net', '+77188135036', 'Aperiam nesciunt omnis soluta sit ea molestiae.', 'In velit molestiae molestiae. Iure cum sit iusto consequatur quo non.', 'new', NULL, '2026-01-27 03:00:58', '2026-01-27 03:00:58'),
(35, 18, 'jaleel59@example.net', '+77188135036', 'Et eos exercitationem porro sint.', 'Occaecati officiis quo deserunt qui. Architecto corporis magnam qui quaerat esse. Aperiam ut qui quia eaque sequi.', 'in_progress', NULL, '2026-01-27 03:00:58', '2026-01-27 03:00:58'),
(36, 19, 'apfeffer@example.com', '+77774017232', 'Sed similique ut quae.', 'Delectus delectus deserunt qui minus. Eligendi quisquam reprehenderit praesentium sit. Eaque eos magnam quia quo dolorem ut.', 'in_progress', NULL, '2026-01-27 03:00:58', '2026-01-27 03:00:58'),
(37, 20, 'shills@example.net', '+77418280710', 'Dolorum fugit beatae consequatur aut.', 'Illo nisi dolores non quos. Quisquam maiores architecto facere libero quisquam delectus sed. Tempora tenetur autem voluptas autem.', 'completed', NULL, '2026-01-27 03:00:58', '2026-01-27 03:00:58'),
(38, 20, 'shills@example.net', '+77418280710', 'Beatae ut enim quam fuga.', 'Eius reiciendis iste est. Ipsa quam excepturi non dolores natus iusto est. Nostrum facere est reprehenderit rerum officia nemo.', 'completed', NULL, '2026-01-27 03:00:58', '2026-01-27 03:00:58'),
(39, 20, 'shills@example.net', '+77418280710', 'Facilis ipsam molestiae velit voluptate nihil et.', 'Sed sequi quam et sit ea dolorem. Delectus veritatis cupiditate est aut. Temporibus natus reiciendis fugiat perspiciatis nesciunt autem.', 'in_progress', NULL, '2026-01-27 03:00:58', '2026-01-27 03:00:58');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `created_at`, `updated_at`) VALUES
(1, 'Alysa Gibson Sr.', 'admin@test.local', '$2y$12$Q3B//uUdtfp7m5O68Uf.X.3hWxLBvLk/AmxMRWXTnYVWyiXnxTy.i', '2026-01-27 03:00:57', '2026-01-27 03:00:57'),
(2, 'Dr. Kathleen Sporer', 'bosco.kiley@example.com', '$2y$12$Q3B//uUdtfp7m5O68Uf.X.3hWxLBvLk/AmxMRWXTnYVWyiXnxTy.i', '2026-01-27 03:00:58', '2026-01-27 03:00:58'),
(3, 'Alexandrea Dickens', 'mertz.macie@example.org', '$2y$12$Q3B//uUdtfp7m5O68Uf.X.3hWxLBvLk/AmxMRWXTnYVWyiXnxTy.i', '2026-01-27 03:00:58', '2026-01-27 03:00:58'),
(4, 'Tiana Beer III', 'sonia26@example.org', '$2y$12$Q3B//uUdtfp7m5O68Uf.X.3hWxLBvLk/AmxMRWXTnYVWyiXnxTy.i', '2026-01-27 03:00:58', '2026-01-27 03:00:58');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `customers_phone_unique` (`phone`),
  ADD UNIQUE KEY `customers_email_unique` (`email`),
  ADD KEY `idx_customers_created_at` (`created_at`),
  ADD KEY `idx_customers_email` (`email`),
  ADD KEY `idx_customers_phone` (`phone`),
  ADD KEY `idx_customers_name` (`name`);

--
-- Индексы таблицы `media`
--
ALTER TABLE `media`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `media_uuid_unique` (`uuid`),
  ADD KEY `media_model_type_model_id_index` (`model_type`,`model_id`),
  ADD KEY `media_order_column_index` (`order_column`);

--
-- Индексы таблицы `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Индексы таблицы `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Индексы таблицы `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`);

--
-- Индексы таблицы `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`);

--
-- Индексы таблицы `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Индексы таблицы `tickets`
--
ALTER TABLE `tickets`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx_tickets_customer_id` (`customer_id`),
  ADD KEY `idx_tickets_status_created` (`status`,`created_at`),
  ADD KEY `idx_tickets_created_at` (`created_at`),
  ADD KEY `idx_tickets_customer_email` (`customer_email`),
  ADD KEY `idx_tickets_customer_phone` (`customer_phone`),
  ADD KEY `idx_tickets_subject` (`subject`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `idx_users_name` (`name`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `customers`
--
ALTER TABLE `customers`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT для таблицы `media`
--
ALTER TABLE `media`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT для таблицы `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT для таблицы `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `tickets`
--
ALTER TABLE `tickets`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Ограничения внешнего ключа таблицы `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Ограничения внешнего ключа таблицы `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Ограничения внешнего ключа таблицы `tickets`
--
ALTER TABLE `tickets`
  ADD CONSTRAINT `idx_tickets_customer_id` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
