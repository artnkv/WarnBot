## WarnBOT

### Database tables structure
Нужно будет вручную создать несколько таблиц:

```sql
CREATE TABLE `members`(
    `local_id` INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `user_id` INT(11) NOT NULL,
    `warn` tinyint(1) DEFAULT '0',
    `admin` tinyint(1) DEFAULT '0',
    `balance` int(11) DEFAULT '0',
    `first_name` VARCHAR(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
    `last_name` VARCHAR(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
    `fname_gen` VARCHAR(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
    `lname_gen` VARCHAR(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
    `fname_dat` VARCHAR(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
    `lname_dat` VARCHAR(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
    `fname_acc` VARCHAR(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
    `lname_acc` VARCHAR(255) COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_general_ci
```
```sql
CREATE TABLE `operations` (
    `id` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `object` int(11) NOT NULL,
    `type` int(11) NOT NULL,
    `time` int(11) NOT NULL,
    `executor` int(11) NOT NULL,
    `comment` text COLLATE utf8mb4_general_ci NOT NULL,
    `result` int(11) NOT NULL,
    `description` text COLLATE utf8mb4_general_ci NOT NULL,
    `new_balance` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
```
```sql
CREATE TABLE `requests` (
    `request_id` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `message_id` int(11) NOT NULL,
    `confirmed` tinyint(1) NOT NULL,
    `moderator_id` int(11) NOT NULL,
    `from_id` int(11) NOT NULL,
    `photos` text COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
```