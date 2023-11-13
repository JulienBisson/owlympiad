<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231113123103 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE exchange (id INT AUTO_INCREMENT NOT NULL, status TINYINT(1) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE exchange_user (exchange_id INT NOT NULL, user_id INT NOT NULL, INDEX IDX_BB2DF6DB68AFD1A0 (exchange_id), INDEX IDX_BB2DF6DBA76ED395 (user_id), PRIMARY KEY(exchange_id, user_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE exchange_game (exchange_id INT NOT NULL, game_id INT NOT NULL, INDEX IDX_1595111E68AFD1A0 (exchange_id), INDEX IDX_1595111EE48FD905 (game_id), PRIMARY KEY(exchange_id, game_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE exchange_user ADD CONSTRAINT FK_BB2DF6DB68AFD1A0 FOREIGN KEY (exchange_id) REFERENCES exchange (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE exchange_user ADD CONSTRAINT FK_BB2DF6DBA76ED395 FOREIGN KEY (user_id) REFERENCES user (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE exchange_game ADD CONSTRAINT FK_1595111E68AFD1A0 FOREIGN KEY (exchange_id) REFERENCES exchange (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE exchange_game ADD CONSTRAINT FK_1595111EE48FD905 FOREIGN KEY (game_id) REFERENCES game (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE exchange_user DROP FOREIGN KEY FK_BB2DF6DB68AFD1A0');
        $this->addSql('ALTER TABLE exchange_user DROP FOREIGN KEY FK_BB2DF6DBA76ED395');
        $this->addSql('ALTER TABLE exchange_game DROP FOREIGN KEY FK_1595111E68AFD1A0');
        $this->addSql('ALTER TABLE exchange_game DROP FOREIGN KEY FK_1595111EE48FD905');
        $this->addSql('DROP TABLE exchange');
        $this->addSql('DROP TABLE exchange_user');
        $this->addSql('DROP TABLE exchange_game');
    }
}
