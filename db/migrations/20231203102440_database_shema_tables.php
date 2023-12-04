<?php
declare(strict_types=1);

use Phinx\Migration\AbstractMigration;

final class DatabaseShemaTables extends AbstractMigration
{
    /**
     * Change Method.
     *
     * Write your reversible migrations using this method.
     *
     * More information on writing migrations is available here:
     * https://book.cakephp.org/phinx/0/en/migrations.html#the-change-method
     *
     * Remember to call "create()" or "update()" and NOT "save()" when working
     * with the Table class.
     */
    public function up(): void
    {
        $sql = '
            CREATE TABLE `credit_cards` (
                `id` integer PRIMARY KEY AUTO_INCREMENT,
                `user_id` integer,
                `type` text,
                `number` text,
                `amount` integer
            );
            
            CREATE TABLE `users` (
                `id` integer PRIMARY KEY AUTO_INCREMENT,
                `username` varchar(255),
                `first_name` varchar(255),
                `last_name` varchar(255),
                `is_enable` bool,
                `dob` varchar(255)
            );
            
            CREATE TABLE `informations` (
                `id` integer PRIMARY KEY AUTO_INCREMENT,
                `user_id` integer,
                `ipv4` varchar(255),
                `ipv6` varchar(255),
                `email` varchar(255),
                `mac_address` text
            );
            
            ALTER TABLE `credit_cards` ADD FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
            
            ALTER TABLE `informations` ADD FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
        '
        ;

        $this->execute($sql);
    }

    public function down(): void
    {
        $sql = '
            DROP TABLE IF EXISTS `users`;
            DROP TABLE IF EXISTS `credit_cards`;
            DROP TABLE IF EXISTS `informations`;
        '
        ;
        $this->execute($sql);
    }
}
