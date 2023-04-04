<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230404123927 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE likes (id INT AUTO_INCREMENT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE likes_users (likes_id INT NOT NULL, users_id INT NOT NULL, INDEX IDX_A87F096F2F23775F (likes_id), INDEX IDX_A87F096F67B3B43D (users_id), PRIMARY KEY(likes_id, users_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE likes_songs (likes_id INT NOT NULL, songs_id INT NOT NULL, INDEX IDX_6101D1D2F23775F (likes_id), INDEX IDX_6101D1DC365A331 (songs_id), PRIMARY KEY(likes_id, songs_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE playlists (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE playlists_users (playlists_id INT NOT NULL, users_id INT NOT NULL, INDEX IDX_79D016AE9F70CF56 (playlists_id), INDEX IDX_79D016AE67B3B43D (users_id), PRIMARY KEY(playlists_id, users_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE songs (id INT AUTO_INCREMENT NOT NULL, title VARCHAR(255) NOT NULL, artist_name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE users (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(255) NOT NULL, password VARCHAR(255) NOT NULL, is_admin TINYINT(1) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL, available_at DATETIME NOT NULL, delivered_at DATETIME DEFAULT NULL, INDEX IDX_75EA56E0FB7336F0 (queue_name), INDEX IDX_75EA56E0E3BD61CE (available_at), INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE likes_users ADD CONSTRAINT FK_A87F096F2F23775F FOREIGN KEY (likes_id) REFERENCES likes (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE likes_users ADD CONSTRAINT FK_A87F096F67B3B43D FOREIGN KEY (users_id) REFERENCES users (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE likes_songs ADD CONSTRAINT FK_6101D1D2F23775F FOREIGN KEY (likes_id) REFERENCES likes (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE likes_songs ADD CONSTRAINT FK_6101D1DC365A331 FOREIGN KEY (songs_id) REFERENCES songs (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE playlists_users ADD CONSTRAINT FK_79D016AE9F70CF56 FOREIGN KEY (playlists_id) REFERENCES playlists (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE playlists_users ADD CONSTRAINT FK_79D016AE67B3B43D FOREIGN KEY (users_id) REFERENCES users (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE likes_users DROP FOREIGN KEY FK_A87F096F2F23775F');
        $this->addSql('ALTER TABLE likes_users DROP FOREIGN KEY FK_A87F096F67B3B43D');
        $this->addSql('ALTER TABLE likes_songs DROP FOREIGN KEY FK_6101D1D2F23775F');
        $this->addSql('ALTER TABLE likes_songs DROP FOREIGN KEY FK_6101D1DC365A331');
        $this->addSql('ALTER TABLE playlists_users DROP FOREIGN KEY FK_79D016AE9F70CF56');
        $this->addSql('ALTER TABLE playlists_users DROP FOREIGN KEY FK_79D016AE67B3B43D');
        $this->addSql('DROP TABLE likes');
        $this->addSql('DROP TABLE likes_users');
        $this->addSql('DROP TABLE likes_songs');
        $this->addSql('DROP TABLE playlists');
        $this->addSql('DROP TABLE playlists_users');
        $this->addSql('DROP TABLE songs');
        $this->addSql('DROP TABLE users');
        $this->addSql('DROP TABLE messenger_messages');
    }
}
