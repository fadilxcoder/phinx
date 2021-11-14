# PHINX 

- https://phinx.org/ (phinx)
- https://book.cakephp.org/phinx/0/en/index.html (Phinx Documentation)
- https://book.cakephp.org/phinx/0/en/migrations.html (Writing Migrations)
- https://book.cakephp.org/phinx/0/en/seeding.html (Database Seeding)
- https://book.cakephp.org/phinx/0/en/commands.html (Commands)

## Notes

- Install using cmd : `composer require robmorgan/phinx`

- Create directory in project files : `db/migrations` & `db/seeds`

- Initialization : `vendor/bin/phinx init`

- Database configs located in `phinx.php`

- Creating a migration : `vendor/bin/phinx create UserMigration` - will create file *YYYYMMDDHHMMSS_user_migration.php* in `db/migrations`

- Add codes in `change()` method of the newly created file

- Executing a migration : `vendor/bin/phinx migrate -e development` , in **development** environment

- Creating a table seeder : `vendor/bin/phinx seed:create UserSeeder` - will create file in `db/seeds`

- Add codes in `run()` method in **UserSeeder** class

- Execute the seeder : `vendor/bin/phinx seed:run`

- Print the queries to standard output without executing them `vendor/bin/phinx rollback --dry-run`

- `vendor/bin/phinx status` -  list of all migrations

- Adding a column to table through migration - `vendor/bin/phinx migrate -t 20211114101311XXXXXXXX`

- Executing specific seeder : `vendor/bin/phinx seed:run -s UserCompanySeeder`

## Usage

- `vendor/bin/phinx seed:run`

- `vendor/bin/phinx seed:run -s UserCompanySeeder`

- `vendor/bin/phinx migrate -t 20211114083508` & `vendor/bin/phinx seed:run -s UserSeeder`