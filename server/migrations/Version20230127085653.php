<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230127085653 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // Create product <-- los insert
        $this->addSql("insert into category (id, name) values (1, 'Frenos');");
        $this->addSql("insert into category (id, name) values (2, 'Motor');");
        $this->addSql("insert into category (id, name) values (3, 'Embrague');");
        $this->addSql("insert into category (id, name) values (4, 'Chasis');");
        $this->addSql("insert into category (id, name) values (5, 'Líquidos');");
        $this->addSql("insert into category (id, name) values (6, 'Neumáticos');");
        $this->addSql("insert into category (id, name) values (7, 'Llantas');");
        $this->addSql("insert into category (id, name) values (8, 'Aerodinámica');");

        $this->addSql("insert into repuesto (id, name, price, shortDescription, description, image, category_id) values (1, 'Válvulas', '125', 'Descripción Corta', 'Descripción larga', 'https://via.placeholder.com/350X300', 1)");

        $this->addSql("insert into repuesto (id, name, price, shortDescription, description, image, category_id) values (2, 'Llantas 25 pulgadas', '400', 'Descripción Corta', 'Descripción larga', 'https://via.placeholder.com/350X300', 7)");

        $this->addSql("insert into repuesto (id, name, price, shortDescription, description, image, category_id) values (3, 'Alerón', '1000', 'Descripción Corta', 'Descripción larga', 'https://via.placeholder.com/350X300', 8)");

        $this->addSql("insert into repuesto (id, name, price, shortDescription, description, image, category_id) values (4, 'Líquido de frenos', '20', 'Descripción Corta', 'Descripción larga', 'https://via.placeholder.com/350X300', 5)");

        $this->addSql("insert into repuesto (id, name, price, shortDescription, description, image, category_id) values (5, 'Chasis Ford', '8000', 'Descripción Corta', 'Descripción larga', 'https://via.placeholder.com/350X300', 4)");

        $this->addSql("insert into repuesto (id, name, price, shortDescription, description, image, category_id) values (6, 'Embrague rotativo', '5000', 'Descripción Corta', 'Descripción larga', 'https://via.placeholder.com/350X300', 3)");

        $this->addSql("insert into repuesto (id, name, price, shortDescription, description, image, category_id) values (7, 'Pistones', '250', 'Descripción Corta', 'Descripción larga', 'https://via.placeholder.com/350X300', 2)");

        $this->addSql("insert into repuesto (id, name, price, shortDescription, description, image, category_id) values (8, 'Pastillas de freno', '120', 'Descripción Corta', 'Descripción larga', 'https://via.placeholder.com/350X300', 1)");

        $this->addSql("insert into repuesto (id, name, price, shortDescription, description, image, category_id) values (9, 'Discos de freno', '200', 'Descripción Corta', 'Descripción larga', 'https://via.placeholder.com/350X300', 1)");

        $this->addSql("insert into repuesto (id, name, price, shortDescription, description, image, category_id) values (10, 'Retrovisor', '50', 'Descripción Corta', 'Descripción larga', 'https://via.placeholder.com/350X300', 4)");

    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE repuesto DROP FOREIGN KEY FK_D34A04AD12469DE2');
        $this->addSql('DROP TABLE category');
        $this->addSql('DROP INDEX IDX_D34A04AD12469DE2 ON repuesto');
        $this->addSql('ALTER TABLE repuesto DROP category_id');
    }
}
