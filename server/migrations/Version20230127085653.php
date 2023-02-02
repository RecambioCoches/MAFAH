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
        $this->addSql("insert into category (id, name) values (1, 'frenos');");
      
        $this->addSql("insert into repuesto (id, name, price, shortDescription, description, image, category_id) values (1, 'Mercury', '€3286,89', 'Unsp physl fx upper end rad, r arm, subs for fx w delay heal', 'Unspecified physeal fracture of upper end of radius, right arm, subsequent encounter for fracture with delayed healing', 'http://dummyimage.com/124x100.png/cc0000/ffffff', 1)");

        $this->addSql("insert into repuesto (id, name, price, shortDescription, description, image, category_id) values (2, 'Ford', '€6896,18', 'Other specified injuries of left elbow', 'Other specified injuries of left elbow', 'http://dummyimage.com/193x100.png/dddddd/000000', 1)");
        
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
